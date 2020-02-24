<?php

namespace Omnipay\Eshoppayment\Message;
/**
 * Class PurchaseRequest
 * @package Omnipay\Coinpayments\Message
 */
class PurchaseRequest extends AbstractRequest {

	/**
	 * @return array|mixed
	 * @throws \Omnipay\Common\Exception\InvalidRequestException
	 */
	public function getData() {
		return [
			'address'           => $this->getCard()->getAddress1(),
			'cardNum'           => $this->getCard()->getNumber(),
			'city'              => $this->getCard()->getCity(),
			'country'           => $this->getCard()->getCountry(),
			'cvv2'              => $this->getCard()->getCvv(),
			'firstName'         => $this->getCard()->getFirstName(),
			'lastName'          => $this->getCard()->getLastName(),
			'month'             => $this->getCard()->getExpiryMonth() < 10 ? '0' . $this->getCard()->getExpiryMonth() : $this->getCard()->getExpiryMonth(),
			'phone'             => $this->getCard()->getPhone(),
			'shippingAddress'   => $this->getCard()->getAddress1(),
			'shippingCity'      => $this->getCard()->getCity(),
			'shippingCountry'   => $this->getCard()->getCountry(),
			'shippingFirstName' => $this->getCard()->getFirstName(),
			'shippingLastName'  => $this->getCard()->getLastName(),
			'shippingState'     => $this->getCard()->getState(),
			'shippingTelephone' => $this->getCard()->getPhone(),
			'shippingZipcode'   => $this->getCard()->getPostcode(),
			'state'             => $this->getCard()->getState(),
			'year'              => $this->getCard()->getExpiryYear(),
			'zipCode'           => $this->getCard()->getPostcode(),
			'currency'          => $this->getCurrency(),
			'email'             => $this->getEmail(),
			'language'          => $this->getLanguage(),
			'userNo'            => $this->getUserNo(),
			'merOrderNo'        => $this->getMerOrderNo(),
			'orderPrice'        => $this->getAmount(),
			'productInfo'       => $this->getProductInfo(),
			'requestUrl'        => $this->getRequestUrl(),
			'ip'                => $this->getIp(),
		];
	}

	/**
	 * @param mixed $data
	 *
	 * @return PurchaseResponse|\Omnipay\Common\Message\ResponseInterface
	 */
	public function sendData($data) {
		ksort($data);
		$data         = array_filter($data);
		$data['sign'] = $this->getSign($data);
		$response     = $this->curlPost($data);
		return new PurchaseResponse($this, $response);
	}
}
