<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoCustomerStoreSpecific extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
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
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_STORE_SPECIFIC;
	}

	/**
	 * @param string $updateDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setUpdateDate(string $updateDate): InfoCustomerStoreSpecific
	{
		$this->setData($updateDate, 'updateDate');
		return $this;
	}

	/**
	 * @param string $updateDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setUpdateDateIndicator(string $updateDateIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($updateDateIndicator, 'updateDateIndicator');
		return $this;
	}

	/**
	 * @param string $creationDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCreationDate(string $creationDate): InfoCustomerStoreSpecific
	{
		$this->setData($creationDate, 'creationDate');
		return $this;
	}

	/**
	 * @param string $creationDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCreationDateIndicator(string $creationDateIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($creationDateIndicator, 'creationDateIndicator');
		return $this;
	}

	/**
	 * @param string $passwordChangeDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDate(string $passwordChangeDate): InfoCustomerStoreSpecific
	{
		$this->setData($passwordChangeDate, 'passwordChangeDate');
		return $this;
	}

	/**
	 * @param string $passwordChangeDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDateIndicator(string $passwordChangeDateIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($passwordChangeDateIndicator, 'passwordChangeDateIndicator');
		return $this;
	}

	/**
	 * @param string $authenticationTimestamp
	 * @return InfoCustomerStoreSpecific
	 */
	public function setAuthenticationTimestamp(string $authenticationTimestamp): InfoCustomerStoreSpecific
	{
		$this->setData($authenticationTimestamp, 'authenticationTimestamp');
		return $this;
	}

	/**
	 * @param string $authenticationMethod
	 * @return InfoCustomerStoreSpecific
	 */
	public function setAuthenticationMethod(string $authenticationMethod): InfoCustomerStoreSpecific
	{
		$this->setData($authenticationMethod, 'authenticationMethod');
		return $this;
	}

	/**
	 * @param string $challengeIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setChallengeIndicator(string $challengeIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($challengeIndicator, 'challengeIndicator');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUse
	 * @return InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUse(string $shippingAddressFirstUse): InfoCustomerStoreSpecific
	{
		$this->setData($shippingAddressFirstUse, 'shippingAddressFirstUse');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUseIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUseIndicator(string $shippingAddressFirstUseIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($shippingAddressFirstUseIndicator, 'shippingAddressFirstUseIndicator');
		return $this;
	}

	/**
	 * @param string $cardTransactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardTransactionsLastDay(string $cardTransactionsLastDay): InfoCustomerStoreSpecific
	{
		$this->setData($cardTransactionsLastDay, 'cardTransactionsLastDay');
		return $this;
	}

	/**
	 * @param string $cardCreationDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDate(string $cardCreationDate): InfoCustomerStoreSpecific
	{
		$this->setData($cardCreationDate, 'cardCreationDate');
		return $this;
	}

	/**
	 * @param string $cardCreationDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDateIndicator(string $cardCreationDateIndicator): InfoCustomerStoreSpecific
	{
		$this->setData($cardCreationDateIndicator, 'cardCreationDateIndicator');
		return $this;
	}

	/**
	 * @param string $transactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastDay(string $transactionsLastDay): InfoCustomerStoreSpecific
	{
		$this->setData($transactionsLastDay, 'transactionsLastDay');
		return $this;
	}

	/**
	 * @param string $transactionsLastYear
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastYear(string $transactionsLastYear): InfoCustomerStoreSpecific
	{
		$this->setData($transactionsLastYear, 'transactionsLastYear');
		return $this;
	}

	/**
	 * @param string $purchasesLastSixMonths
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPurchasesLastSixMonths(string $purchasesLastSixMonths): InfoCustomerStoreSpecific
	{
		$this->setData($purchasesLastSixMonths, 'purchasesLastSixMonths');
		return $this;
	}

	/**
	 * @param string $suspiciousActivity
	 * @return InfoCustomerStoreSpecific
	 */
	public function setSuspiciousActivity(string $suspiciousActivity): InfoCustomerStoreSpecific
	{
		$this->setData($suspiciousActivity, 'suspiciousActivity');
		return $this;
	}
}
