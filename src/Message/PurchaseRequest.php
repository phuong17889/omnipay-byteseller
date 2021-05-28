<?php

namespace Omnipay\Byteseller\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest
 * @package Omnipay\Byteseller\Message
 */
class PurchaseRequest extends AbstractRequest {

	/**
	 * Get the raw data array for this message. The format of this varies from gateway to
	 * gateway, but will usually be either an associative array, or a SimpleXMLElement.
	 *
	 * @return mixed
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('amount', 'description', 'order_id', 'currency', 'description');
		return [
			'api_id'       => $this->getApiId(),
			'method'       => $this->getMethod(),
			'subseller_id' => $this->getParameter('subseller_id'),
			'order_id'     => $this->getOrderId(),
			'amount'       => $this->getAmount(),
			'currency'     => $this->getCurrency(),
			'description'  => $this->getDescription(),
			'email'        => $this->getEmail(),
		];
	}

	/**
	 * @return false|string
	 * @throws InvalidRequestException
	 */
	public function getSignature() {
		return hash('sha512', $this->getApiId() . $this->getMethod() . $this->getParameter('subseller_id') . $this->getOrderId() . $this->getAmount() . $this->getCurrency() . $this->getDescription() . $this->getEmail() . $this->getParameter('api_password'));
	}

	/**
	 * @param mixed $data
	 *
	 * @return PurchaseResponse|ResponseInterface
	 * @throws InvalidRequestException
	 */
	public function sendData($data) {
		$data['signature'] = $this->getSignature();
		$data['url']       = $this->liveEndpoint . '/?' . http_build_query($data);
		return new PurchaseResponse($this, $data);
	}
}
