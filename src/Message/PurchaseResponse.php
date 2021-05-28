<?php

namespace Omnipay\Byteseller\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Response
 */
class PurchaseResponse extends AbstractResponse {

	/**
	 * @return bool
	 */
	public function isSuccessful() {
		return true;
	}

	/**
	 * Does the response require a redirect?
	 *
	 * @return boolean
	 */
	public function isRedirect() {
		return true;
	}

	/**
	 * @return mixed|string
	 */
	public function getRedirectUrl() {
		return $this->data['url'];
	}

	/**
	 * Get the response data.
	 *
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}
}
