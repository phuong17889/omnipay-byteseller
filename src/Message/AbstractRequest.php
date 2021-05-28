<?php

namespace Omnipay\Byteseller\Message;

use Omnipay\Byteseller\Gateway;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Class AbstractRequest
 * @package Omnipay\Byteseller\Message
 */
abstract class AbstractRequest extends BaseAbstractRequest {

	protected $liveEndpoint = "https://do.paymentmethodselection.com";

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setApiPassword($value) {
		return $this->setParameter('api_password', $value);
	}

	/**
	 * @return mixed
	 */
	public function getApiPassword() {
		return $this->getParameter('api_password');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setSubsellerId($value) {
		return $this->setParameter('subseller_id', $value);
	}

	/**
	 * @return mixed
	 */
	public function getSubsellerId() {
		return $this->getParameter('subseller_id');
	}

	/**
	 * @param $method
	 *
	 * @return AbstractRequest
	 */
	public function setMethod($method) {
		return $this->setParameter('method', $method);
	}

	/**
	 * @return mixed
	 */
	public function getMethod() {
		return $this->getParameter('method');
	}

	/**
	 * @return mixed
	 */
	public function getApiId() {
		return $this->getParameter('api_id');
	}

	/**
	 * @param $api_id
	 *
	 * @return AbstractRequest
	 */
	public function setApiId($api_id) {
		return $this->setParameter('api_id', $api_id);
	}

	/**
	 * @return mixed
	 */
	public function getOrderId() {
		return $this->getParameter('order_id');
	}

	/**
	 * @param $order_id
	 *
	 * @return AbstractRequest
	 */
	public function setOrderId($order_id) {
		return $this->setParameter('order_id', $order_id);
	}

	/**
	 * @param $email
	 *
	 * @return AbstractRequest
	 */
	public function setEmail($email) {
		return $this->setParameter('email', $email);
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->getParameter('email');
	}

	/**
	 * @return string
	 */
	protected function getEndpoint() {
		return $this->liveEndpoint;
	}
}
