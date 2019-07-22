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

class InfoOrderGeneral extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
		'deliveryEmail' => 254,
		'deliveryTimeFrame' => 2,
		'giftCardAmount' => 15,
		'giftCardCount' => 2,
		'giftCardCurrency' => 3,
		'preorderDate' => 10,
		'availability' => 2,
		'reorderItems' => 2,
		'shippingMethod' => 2,
		'addressMatchIndicator' => 1,
		'differentShippingName' => 2,
		'transactionType' => 2,
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_ORDER_GENERAL;
	}

	/**
	 * @param string $deliveryEmail
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDeliveryEmail($deliveryEmail)
	{
		$this->setData($deliveryEmail, 'deliveryEmail');
		return $this;
	}

	/**
	 * @param string $deliveryTimeFrame
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDeliveryTimeFrame($deliveryTimeFrame)
	{
		$this->setData($deliveryTimeFrame, 'deliveryTimeFrame');
		return $this;
	}

	/**
	 * @param string $giftCardAmount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardAmount($giftCardAmount)
	{
		$this->setData($giftCardAmount, 'giftCardAmount');
		return $this;
	}

	/**
	 * @param string $giftCardCount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCount($giftCardCount)
	{
		$this->setData($giftCardCount, 'giftCardCount');
		return $this;
	}

	/**
	 * @param string $giftCardCurrency
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCurrency($giftCardCurrency)
	{
		$this->setData($giftCardCurrency, 'giftCardCurrency');
		return $this;
	}

	/**
	 * @param string $preorderDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setPreorderDate($preorderDate)
	{
		$this->setData($preorderDate, 'preorderDate');
		return $this;
	}

	/**
	 * @param string $availability
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAvailability($availability)
	{
		$this->setData($availability, 'availability');
		return $this;
	}

	/**
	 * @param string $reorderItems
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setReorderItems($reorderItems)
	{
		$this->setData($reorderItems, 'reorderItems');
		return $this;
	}

	/**
	 * @param string $shippingMethod
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setShippingMethod($shippingMethod)
	{
		$this->setData($shippingMethod, 'shippingMethod');
		return $this;
	}

	/**
	 * @param string $addressMatchIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAddressMatchIndicator($addressMatchIndicator)
	{
		$this->setData($addressMatchIndicator, 'addressMatchIndicator');
		return $this;
	}

	/**
	 * @param string $differentShippingName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDifferentShippingName($differentShippingName)
	{
		$this->setData($differentShippingName, 'differentShippingName');
		return $this;
	}

	/**
	 * @param string $transactionType
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setTransactionType($transactionType)
	{
		$this->setData($transactionType, 'transactionType');
		return $this;
	}
}
