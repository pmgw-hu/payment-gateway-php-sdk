<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoCustomerStoreSpecific extends InfoAbstract
{
	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_STORE_SPECIFIC;
	}

	/**
	 * @param string $updateDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setUpdateDate($updateDate)
	{
		return $this->setData($updateDate, 'updateDate');
	}

	/**
	 * @param string $updateDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setUpdateDateIndicator($updateDateIndicator)
	{
		return $this->setData($updateDateIndicator, 'updateDateIndicator');
	}

	/**
	 * @param string $creationDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCreationDate($creationDate)
	{
		return $this->setData($creationDate, 'creationDate');
	}

	/**
	 * @param string $creationDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCreationDateIndicator($creationDateIndicator)
	{
		return $this->setData($creationDateIndicator, 'creationDateIndicator');
	}

	/**
	 * @param string $passwordChangeDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDate($passwordChangeDate)
	{
		return $this->setData($passwordChangeDate, 'passwordChangeDate');
	}

	/**
	 * @param string $passwordChangeDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDateIndicator($passwordChangeDateIndicator)
	{
		return $this->setData($passwordChangeDateIndicator, 'passwordChangeDateIndicator');
	}

	/**
	 * @param string $authenticationTimestamp
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setAuthenticationTimestamp($authenticationTimestamp)
	{
		return $this->setData($authenticationTimestamp, 'authenticationTimestamp');
	}

	/**
	 * @param string $authenticationMethod
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setAuthenticationMethod($authenticationMethod)
	{
		return $this->setData($authenticationMethod, 'authenticationMethod');
	}

	/**
	 * @param string $challengeIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setChallengeIndicator($challengeIndicator)
	{
		return $this->setData($challengeIndicator, 'challengeIndicator');
	}

	/**
	 * @param string $shippingAddressFirstUse
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUse($shippingAddressFirstUse)
	{
		return $this->setData($shippingAddressFirstUse, 'shippingAddressFirstUse');
	}

	/**
	 * @param string $shippingAddressFirstUseIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUseIndicator($shippingAddressFirstUseIndicator)
	{
		return $this->setData($shippingAddressFirstUseIndicator, 'shippingAddressFirstUseIndicator');
	}

	/**
	 * @param string $cardTransactionsLastDay
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardTransactionsLastDay($cardTransactionsLastDay)
	{
		return $this->setData($cardTransactionsLastDay, 'cardTransactionsLastDay');
	}

	/**
	 * @param string $cardCreationDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardCreationDate($cardCreationDate)
	{
		return $this->setData($cardCreationDate, 'cardCreationDate');
	}

	/**
	 * @param string $cardCreationDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardCreationDateIndicator($cardCreationDateIndicator)
	{
		return $this->setData($cardCreationDateIndicator, 'cardCreationDateIndicator');
	}

	/**
	 * @param string $transactionsLastDay
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastDay($transactionsLastDay)
	{
		return $this->setData($transactionsLastDay, 'transactionsLastDay');
	}

	/**
	 * @param string $transactionsLastYear
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastYear($transactionsLastYear)
	{
		return $this->setData($transactionsLastYear, 'transactionsLastYear');
	}

	/**
	 * @param string $purchasesLastSixMonths
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPurchasesLastSixMonths($purchasesLastSixMonths)
	{
		return $this->setData($purchasesLastSixMonths, 'purchasesLastSixMonths');
	}

	/**
	 * @param string $suspiciousActivity
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setSuspiciousActivity($suspiciousActivity)
	{
		return $this->setData($suspiciousActivity, 'suspiciousActivity');
	}
}
