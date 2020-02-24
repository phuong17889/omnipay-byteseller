<?php

namespace Omnipay\Eshoppayment\Message;

use Omnipay\Common\CreditCard;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Class AbstractRequest
 * @package Omnipay\Coinpayments\Message
 */
abstract class AbstractRequest extends BaseAbstractRequest {

	protected $liveEndpoint = "http://www.helloyoushop.com/card/doPay";

	/**
	 * @param CreditCard $value
	 *
	 * @return AbstractRequest|BaseAbstractRequest
	 */
	public function setCard($value) {
		return $this->setParameter('card', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setEmail($value) {
		return $this->setParameter('email', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setMerOrderNo($value) {
		return $this->setParameter('merOrderNo', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setProductInfo($value) {
		return $this->setParameter('productInfo', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setUserNo($value) {
		return $this->setParameter('userNo', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setIp($value) {
		return $this->setParameter('ip', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setRequestUrl($value) {
		return $this->setParameter('requestUrl', $value);
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setLanguage($value) {
		return $this->setParameter('language', $value);
	}

	public function setPaySecret($value) {
		return $this->setParameter('paySecret', $value);
	}

	/**
	 * @return mixed|CreditCard
	 */
	public function getCard() {
		return $this->getParameter('card');
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->getParameter('email');
	}

	/**
	 * @return mixed
	 */
	public function getLanguage() {
		return $this->getParameter('language');
	}

	/**
	 * @return mixed
	 */
	public function getUserNo() {
		return $this->getParameter('userNo');
	}

	/**
	 * @return mixed
	 */
	public function getMerOrderNo() {
		return $this->getParameter('merOrderNo');
	}

	/**
	 * @return mixed
	 */
	public function getProductInfo() {
		return $this->getParameter('productInfo');
	}

	/**
	 * @return mixed
	 */
	public function getRequestUrl() {
		return $this->getParameter('requestUrl');
	}

	/**
	 * @return mixed
	 */
	public function getIp() {
		return $this->getParameter('ip');
	}

	/**
	 * @param array $input
	 *
	 * @return string
	 */
	protected function getSign($input) {
		$input['paySecret'] = $this->getPaySecret();
		$buff               = "";
		foreach ($input as $k => $v) {
			if ($v != "" && !is_array($v)) {
				$buff .= $k . "=" . $v . "&";
			}
		}
		$buff = trim($buff, "&");
		return strtoupper(md5($buff));
	}

	public function getPaySecret() {
		return $this->getParameter('paySecret');
	}

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	protected function curlPost($data) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->getEndpoint());
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, 1);
	}

	/**
	 * @return string
	 */
	protected function getEndpoint() {
		return $this->liveEndpoint;
	}
}
