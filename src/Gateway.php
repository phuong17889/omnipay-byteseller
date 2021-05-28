<?php

namespace Omnipay\Byteseller;

use Omnipay\Byteseller\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 */
class Gateway extends AbstractGateway {

	const NAME = 'Byteseller';

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return self::NAME;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDefaultParameters() {
		return [
			'api_password' => '',
			'subseller_id' => '',
		];
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
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
	 * @return Gateway
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
	 * @param array $parameters
	 *
	 * @return AbstractRequest
	 */
	public function purchase($parameters = []) {
		$parameters['api_password'] = $this->getApiPassword();
		$parameters['subseller_id'] = $this->getSubsellerId();
		return $this->createRequest(PurchaseRequest::class, $parameters);
	}
}
