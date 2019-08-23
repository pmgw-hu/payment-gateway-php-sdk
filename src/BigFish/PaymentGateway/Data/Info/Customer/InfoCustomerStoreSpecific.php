<?php

namespace BigFish\PaymentGateway\Data\Info\Customer;


use BigFish\PaymentGateway\Data\Info\InfoCustomer;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoCustomerStoreSpecific extends InfoCustomer
{
	use StructurePathTrait;

	const PATH = 'StoreSpecific';

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

	public function setUpdateDate(string $updateDate): self
	{
		return $this->setData($updateDate, self::UPDATE_DATE);
	}

	public function setUpdateDateIndicator(string $updateDateIndicator): self
	{
		return $this->setData($updateDateIndicator, self::UPDATE_DATE_INDICATOR);
	}

	public function setCreationDate(string $creationDate): self
	{
		return $this->setData($creationDate, self::CREATION_DATE);
	}

	public function setCreationDateIndicator(string $creationDateIndicator): self
	{
		return $this->setData($creationDateIndicator, self::CREATION_DATE_INDICATOR);
	}

	public function setPasswordChangeDate(string $passwordChangeDate): self
	{
		return $this->setData($passwordChangeDate, self::PASSWORD_CHANGE_DATE);
	}

	public function setPasswordChangeDateIndicator(string $passwordChangeDateIndicator): self
	{
		return $this->setData($passwordChangeDateIndicator, self::PASSWORD_CHANGE_DATE_INDICATOR);
	}

	public function setAuthenticationTimestamp(string $authenticationTimestamp): self
	{
		return $this->setData($authenticationTimestamp, self::AUTHENTICATION_TIMESTAMP);
	}

	public function setAuthenticationMethod(string $authenticationMethod): self
	{
		return $this->setData($authenticationMethod, self::AUTHENTICATION_METHOD);
	}

	public function setChallengeIndicator(string $challengeIndicator): self
	{
		return $this->setData($challengeIndicator, self::CHALLENGE_INDICATOR);
	}

	public function setShippingAddressFirstUse(string $shippingAddressFirstUse): self
	{
		return $this->setData($shippingAddressFirstUse, self::SHIPPING_ADDRESS_FIRST_USE);
	}

	public function setShippingAddressFirstUseIndicator(string $shippingAddressFirstUseIndicator): self
	{
		return $this->setData($shippingAddressFirstUseIndicator, self::SHIPPING_ADDRESS_FIRST_USE_INDICATOR);
	}

	public function setCardTransactionsLastDay(int $cardTransactionsLastDay): self
	{
		return $this->setData($cardTransactionsLastDay, self::CARD_TRANSACTIONS_LAST_DAY);
	}

	public function setCardCreationDate(string $cardCreationDate): self
	{
		return $this->setData($cardCreationDate, self::CARD_CREATION_DATE);
	}

	public function setCardCreationDateIndicator(string $cardCreationDateIndicator): self
	{
		return $this->setData($cardCreationDateIndicator, self::CARD_CREATION_DATE_INDICATOR);
	}

	public function setTransactionsLastDay(int $transactionsLastDay): self
	{
		return $this->setData($transactionsLastDay, self::TRANSACTION_LAST_DAY);
	}

	public function setTransactionsLastYear(int $transactionsLastYear): self
	{
		return $this->setData($transactionsLastYear, self::TRANSACTION_LAST_YEAR);
	}

	public function setPurchasesLastSixMonths(int $purchasesLastSixMonths): self
	{
		return $this->setData($purchasesLastSixMonths, self::PURCHASES_LAST_SIX_MONTHS);
	}

	public function setSuspiciousActivity(string $suspiciousActivity): self
	{
		return $this->setData($suspiciousActivity, self::SUSPICIOUS_ACTIVITY);
	}
}
