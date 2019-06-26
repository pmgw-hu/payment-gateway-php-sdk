<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Info;


use BigFish\PaymentGateway;

class InfoCustomerStoreSpecific extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'updateDate' => 10,
		'updateDateIndicator' => 2,
		'creationDate' => 10,
		'creationDateIndicator' => 2,
		'passwordChangeDate' => 10,
		'passwordChangeDateIndicator' => 2,
		'authenticationTimestamp' => 19,
		'authenticationMethod' => 2,
		'challengeIndicator' => 2,
		'shippingAddressFirstUse' => 10,
		'shippingAddressFirstUseIndicator' => 2,
		'cardTransactionsLastDay' => 3,
		'cardCreationDate' => 10,
		'cardCreationDateIndicator' => 2,
		'transactionsLastDay' => 3,
		'transactionsLastYear' => 3,
		'purchasesLastSixMonths' => 4,
		'suspiciousActivity' => 2,
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_STORE_SPECIFIC;
	}

	/**
	 * @param string $updateDate
	 * @return $this
	 */
	public function setUpdateDate($updateDate)
	{
		$this->saveData($updateDate, 'updateDate');
		return $this;
	}

	/**
	 * @param string $updateDateIndicator
	 * @return $this
	 */
	public function setUpdateDateIndicator($updateDateIndicator)
	{
		$this->saveData($updateDateIndicator, 'updateDateIndicator');
		return $this;
	}

	/**
	 * @param string $creationDate
	 * @return $this
	 */
	public function setCreationDate($creationDate)
	{
		$this->saveData($creationDate, 'creationDate');
		return $this;
	}

	/**
	 * @param string $creationDateIndicator
	 * @return $this
	 */
	public function setCreationDateIndicator($creationDateIndicator)
	{
		$this->saveData($creationDateIndicator, 'creationDateIndicator');
		return $this;
	}

	/**
	 * @param string $passwordChangeDate
	 * @return $this
	 */
	public function setPasswordChangeDate($passwordChangeDate)
	{
		$this->saveData($passwordChangeDate, 'passwordChangeDate');
		return $this;
	}

	/**
	 * @param string $passwordChangeDateIndicator
	 * @return $this
	 */
	public function setPasswordChangeDateIndicator($passwordChangeDateIndicator)
	{
		$this->saveData($passwordChangeDateIndicator, 'passwordChangeDateIndicator');
		return $this;
	}

	/**
	 * @param string $authenticationTimestamp
	 * @return $this
	 */
	public function setAuthenticationTimestamp($authenticationTimestamp)
	{
		$this->saveData($authenticationTimestamp, 'authenticationTimestamp');
		return $this;
	}

	/**
	 * @param string $authenticationMethod
	 * @return $this
	 */
	public function setAuthenticationMethod($authenticationMethod)
	{
		$this->saveData($authenticationMethod, 'authenticationMethod');
		return $this;
	}

	/**
	 * @param string $challengeIndicator
	 * @return $this
	 */
	public function setChallengeIndicator($challengeIndicator)
	{
		$this->saveData($challengeIndicator, 'challengeIndicator');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUse
	 * @return $this
	 */
	public function setShippingAddressFirstUse($shippingAddressFirstUse)
	{
		$this->saveData($shippingAddressFirstUse, 'shippingAddressFirstUse');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUseIndicator
	 * @return $this
	 */
	public function setShippingAddressFirstUseIndicator($shippingAddressFirstUseIndicator)
	{
		$this->saveData($shippingAddressFirstUseIndicator, 'shippingAddressFirstUseIndicator');
		return $this;
	}

	/**
	 * @param string $cardTransactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardTransactionsLastDay($cardTransactionsLastDay)
	{
		$this->saveData($cardTransactionsLastDay, 'cardTransactionsLastDay');
		return $this;
	}

	/**
	 * @param string $cardCreationDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDate($cardCreationDate)
	{
		$this->saveData($cardCreationDate, 'cardCreationDate');
		return $this;
	}

	/**
	 * @param string $cardCreationDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDateIndicator($cardCreationDateIndicator)
	{
		$this->saveData($cardCreationDateIndicator, 'cardCreationDateIndicator');
		return $this;
	}

	/**
	 * @param string $transactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastDay($transactionsLastDay)
	{
		$this->saveData($transactionsLastDay, 'transactionsLastDay');
		return $this;
	}

	/**
	 * @param string $transactionsLastYear
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastYear($transactionsLastYear)
	{
		$this->saveData($transactionsLastYear, 'transactionsLastYear');
		return $this;
	}

	/**
	 * @param string $purchasesLastSixMonths
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPurchasesLastSixMonths($purchasesLastSixMonths)
	{
		$this->saveData($purchasesLastSixMonths, 'purchasesLastSixMonths');
		return $this;
	}

	/**
	 * @param string $suspiciousActivity
	 * @return InfoCustomerStoreSpecific
	 */
	public function setSuspiciousActivity($suspiciousActivity)
	{
		$this->saveData($suspiciousActivity, 'suspiciousActivity');
		return $this;
	}
}
