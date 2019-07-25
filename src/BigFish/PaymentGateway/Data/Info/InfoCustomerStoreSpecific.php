<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoCustomerStoreSpecific extends InfoAbstract
{
	const UPDATE_DATE = 'updateDate';
	const UPDATE_DATE_INDICATOR = 'updateDateIndicator';
	const CREATION_DATE = 'creationDate';
	const CREATION_DATE_INDICATOR = 'creationDateIndicator';
	const PASSWORD_CHANGE_DATE = 'passwordChangeDate';
	const PASSWORD_CHANGE_DATE_INDICATOR = 'passwordChangeDateIndicator';
	const AUTHENTICATION_TIMESTAMP = 'authenticationTimestamp';
	const AUTHENTICATION_METHOD = 'authenticationMethod';
	const CHALLENGE_INDICATOR = 'challengeIndicator';
	const SHIPPING_ADDRESS_FIRST_USE = 'shippingAddressFirstUse';
	const SHIPPING_ADDRESS_FIRST_USE_INDICATOR = 'shippingAddressFirstUseIndicator';
	const CARD_TRANSACTIONS_LAST_DAY = 'cardTransactionsLastDay';
	const CARD_CREATION_DATE = 'cardCreationDate';
	const CARD_CREATION_DATE_INDICATOR = 'cardCreationDateIndicator';
	const TRANSACTION_LAST_DAY = 'transactionsLastDay';
	const TRANSACTION_LAST_YEAR = 'transactionsLastYear';
	const PURCHASES_LAST_SIX_MONTHS = 'purchasesLastSixMonths';
	const SUSPICIOUS_ACTIVITY = 'suspiciousActivity';

	/**
	 * @var array
	 */
	protected $maxLength = [
		self::UPDATE_DATE => 10,
		self::UPDATE_DATE_INDICATOR => 2,
		self::CREATION_DATE => 10,
		self::CREATION_DATE_INDICATOR => 2,
		self::PASSWORD_CHANGE_DATE => 10,
		self::PASSWORD_CHANGE_DATE_INDICATOR => 2,
		self::AUTHENTICATION_TIMESTAMP => 19,
		self::AUTHENTICATION_METHOD => 2,
		self::CHALLENGE_INDICATOR => 2,
		self::SHIPPING_ADDRESS_FIRST_USE => 10,
		self::SHIPPING_ADDRESS_FIRST_USE_INDICATOR => 2,
		self::CARD_TRANSACTIONS_LAST_DAY => 3,
		self::CARD_CREATION_DATE => 10,
		self::CARD_CREATION_DATE_INDICATOR => 2,
		self::TRANSACTION_LAST_DAY => 3,
		self::TRANSACTION_LAST_YEAR => 3,
		self::PURCHASES_LAST_SIX_MONTHS => 4,
		self::SUSPICIOUS_ACTIVITY => 2
	];



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
		return $this->setData($updateDate, self::UPDATE_DATE);
	}

	/**
	 * @param string $updateDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setUpdateDateIndicator(string $updateDateIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($updateDateIndicator, self::UPDATE_DATE_INDICATOR);
	}

	/**
	 * @param string $creationDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCreationDate(string $creationDate): InfoCustomerStoreSpecific
	{
		return $this->setData($creationDate, self::CREATION_DATE);
	}

	/**
	 * @param string $creationDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCreationDateIndicator(string $creationDateIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($creationDateIndicator, self::CREATION_DATE_INDICATOR);
	}

	/**
	 * @param string $passwordChangeDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDate(string $passwordChangeDate): InfoCustomerStoreSpecific
	{
		return $this->setData($passwordChangeDate, self::PASSWORD_CHANGE_DATE);
	}

	/**
	 * @param string $passwordChangeDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDateIndicator(string $passwordChangeDateIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($passwordChangeDateIndicator, self::PASSWORD_CHANGE_DATE_INDICATOR);
	}

	/**
	 * @param string $authenticationTimestamp
	 * @return InfoCustomerStoreSpecific
	 */
	public function setAuthenticationTimestamp(string $authenticationTimestamp): InfoCustomerStoreSpecific
	{
		return $this->setData($authenticationTimestamp, self::AUTHENTICATION_TIMESTAMP);
	}

	/**
	 * @param string $authenticationMethod
	 * @return InfoCustomerStoreSpecific
	 */
	public function setAuthenticationMethod(string $authenticationMethod): InfoCustomerStoreSpecific
	{
		return $this->setData($authenticationMethod, self::AUTHENTICATION_METHOD);
	}

	/**
	 * @param string $challengeIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setChallengeIndicator(string $challengeIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($challengeIndicator, self::CHALLENGE_INDICATOR);
	}

	/**
	 * @param string $shippingAddressFirstUse
	 * @return InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUse(string $shippingAddressFirstUse): InfoCustomerStoreSpecific
	{
		return $this->setData($shippingAddressFirstUse, self::SHIPPING_ADDRESS_FIRST_USE);
	}

	/**
	 * @param string $shippingAddressFirstUseIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUseIndicator(string $shippingAddressFirstUseIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($shippingAddressFirstUseIndicator, self::SHIPPING_ADDRESS_FIRST_USE_INDICATOR);
	}

	/**
	 * @param string $cardTransactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardTransactionsLastDay(string $cardTransactionsLastDay): InfoCustomerStoreSpecific
	{
		return $this->setData($cardTransactionsLastDay, self::CARD_TRANSACTIONS_LAST_DAY);
	}

	/**
	 * @param string $cardCreationDate
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDate(string $cardCreationDate): InfoCustomerStoreSpecific
	{
		return $this->setData($cardCreationDate, self::CARD_CREATION_DATE);
	}

	/**
	 * @param string $cardCreationDateIndicator
	 * @return InfoCustomerStoreSpecific
	 */
	public function setCardCreationDateIndicator(string $cardCreationDateIndicator): InfoCustomerStoreSpecific
	{
		return $this->setData($cardCreationDateIndicator, self::CARD_CREATION_DATE_INDICATOR);
	}

	/**
	 * @param string $transactionsLastDay
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastDay(string $transactionsLastDay): InfoCustomerStoreSpecific
	{
		return $this->setData($transactionsLastDay, self::TRANSACTION_LAST_DAY);
	}

	/**
	 * @param string $transactionsLastYear
	 * @return InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastYear(string $transactionsLastYear): InfoCustomerStoreSpecific
	{
		return $this->setData($transactionsLastYear, self::TRANSACTION_LAST_YEAR);
	}

	/**
	 * @param string $purchasesLastSixMonths
	 * @return InfoCustomerStoreSpecific
	 */
	public function setPurchasesLastSixMonths(string $purchasesLastSixMonths): InfoCustomerStoreSpecific
	{
		return $this->setData($purchasesLastSixMonths, self::PURCHASES_LAST_SIX_MONTHS);
	}

	/**
	 * @param string $suspiciousActivity
	 * @return InfoCustomerStoreSpecific
	 */
	public function setSuspiciousActivity(string $suspiciousActivity): InfoCustomerStoreSpecific
	{
		return $this->setData($suspiciousActivity, self::SUSPICIOUS_ACTIVITY);
	}
}
