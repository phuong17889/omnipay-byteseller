<?php

namespace Omnipay\Eshoppayment\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Response
 */
class PurchaseResponse extends AbstractResponse {

	/**
	 * @return bool
	 */
	public function isSuccessful() {
		return isset($this->data['code']);
	}

	/**
	 * @return mixed
	 */
	public function getAmount() {
		if (isset($this->data['amount'])) {
			return $this->data['amount'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getMerOrderNo() {
		if (isset($this->data['merOrderNo'])) {
			return $this->data['merOrderNo'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getOrderNo() {
		if (isset($this->data['orderNo'])) {
			return $this->data['orderNo'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getMerNo() {
		if (isset($this->data['merNo'])) {
			return $this->data['merNo'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getCurrency() {
		if (isset($this->data['currency'])) {
			return $this->data['currency'];
		}
	}

	/**
	 * @return mixed
	 */
	public function getTradeTime() {
		if (isset($this->data['tradeTime'])) {
			return $this->data['tradeTime'];
		}
	}

	/**
	 * Does the response require a redirect?
	 *
	 * @return boolean
	 */
	public function isRedirect() {
		return false;
	}

	/**
	 * @return mixed|string|null
	 */
	public function getCode() {
		return $this->data['code'];
	}

	/**
	 * @return string|null
	 */
	public function getMessage() {
		switch ($this->data['code']) {
			case '0000':
				return 'Transaction successful';
			case '2222':
				return 'Transaction Failed - Card issue risk control';
			case '3333':
				return 'Request missing params';
			case  '4444':
				return 'Transaction Failed';
			case  '9999':
			default:
				return 'System busy';
		}
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
