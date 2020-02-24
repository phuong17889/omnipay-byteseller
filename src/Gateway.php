<?php

namespace Omnipay\Byteseller;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Byteseller\Message\PurchaseRequest;

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
			'userNo'    => '',
			'paySecret' => '',
		];
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setUserNo($value) {
		return $this->setParameter('userNo', $value);
	}

	/**
	 * @return mixed
	 */
	public function getUserNo() {
		return $this->getParameter('userNo');
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setPaySecret($value) {
		return $this->setParameter('paySecret', $value);
	}

	/**
	 * @return mixed
	 */
	public function getPaySecret() {
		return $this->getParameter('paySecret');
	}

	/**
	 * @param array $parameters
	 *
	 * @return AbstractRequest|PurchaseRequest
	 */
	public function purchase($parameters = []) {
		return $this->createRequest(PurchaseRequest::class, $parameters);
	}
}
