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
		$this->setData($updateDate, 'updateDate');
		return $this;
	}

	/**
	 * @param string $updateDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setUpdateDateIndicator($updateDateIndicator)
	{
		$this->setData($updateDateIndicator, 'updateDateIndicator');
		return $this;
	}

	/**
	 * @param string $creationDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCreationDate($creationDate)
	{
		$this->setData($creationDate, 'creationDate');
		return $this;
	}

	/**
	 * @param string $creationDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCreationDateIndicator($creationDateIndicator)
	{
		$this->setData($creationDateIndicator, 'creationDateIndicator');
		return $this;
	}

	/**
	 * @param string $passwordChangeDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDate($passwordChangeDate)
	{
		$this->setData($passwordChangeDate, 'passwordChangeDate');
		return $this;
	}

	/**
	 * @param string $passwordChangeDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPasswordChangeDateIndicator($passwordChangeDateIndicator)
	{
		$this->setData($passwordChangeDateIndicator, 'passwordChangeDateIndicator');
		return $this;
	}

	/**
	 * @param string $authenticationTimestamp
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setAuthenticationTimestamp($authenticationTimestamp)
	{
		$this->setData($authenticationTimestamp, 'authenticationTimestamp');
		return $this;
	}

	/**
	 * @param string $authenticationMethod
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setAuthenticationMethod($authenticationMethod)
	{
		$this->setData($authenticationMethod, 'authenticationMethod');
		return $this;
	}

	/**
	 * @param string $challengeIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setChallengeIndicator($challengeIndicator)
	{
		$this->setData($challengeIndicator, 'challengeIndicator');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUse
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUse($shippingAddressFirstUse)
	{
		$this->setData($shippingAddressFirstUse, 'shippingAddressFirstUse');
		return $this;
	}

	/**
	 * @param string $shippingAddressFirstUseIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setShippingAddressFirstUseIndicator($shippingAddressFirstUseIndicator)
	{
		$this->setData($shippingAddressFirstUseIndicator, 'shippingAddressFirstUseIndicator');
		return $this;
	}

	/**
	 * @param string $cardTransactionsLastDay
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardTransactionsLastDay($cardTransactionsLastDay)
	{
		$this->setData($cardTransactionsLastDay, 'cardTransactionsLastDay');
		return $this;
	}

	/**
	 * @param string $cardCreationDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardCreationDate($cardCreationDate)
	{
		$this->setData($cardCreationDate, 'cardCreationDate');
		return $this;
	}

	/**
	 * @param string $cardCreationDateIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setCardCreationDateIndicator($cardCreationDateIndicator)
	{
		$this->setData($cardCreationDateIndicator, 'cardCreationDateIndicator');
		return $this;
	}

	/**
	 * @param string $transactionsLastDay
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastDay($transactionsLastDay)
	{
		$this->setData($transactionsLastDay, 'transactionsLastDay');
		return $this;
	}

	/**
	 * @param string $transactionsLastYear
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setTransactionsLastYear($transactionsLastYear)
	{
		$this->setData($transactionsLastYear, 'transactionsLastYear');
		return $this;
	}

	/**
	 * @param string $purchasesLastSixMonths
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setPurchasesLastSixMonths($purchasesLastSixMonths)
	{
		$this->setData($purchasesLastSixMonths, 'purchasesLastSixMonths');
		return $this;
	}

	/**
	 * @param string $suspiciousActivity
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific
	 */
	public function setSuspiciousActivity($suspiciousActivity)
	{
		$this->setData($suspiciousActivity, 'suspiciousActivity');
		return $this;
	}
}
