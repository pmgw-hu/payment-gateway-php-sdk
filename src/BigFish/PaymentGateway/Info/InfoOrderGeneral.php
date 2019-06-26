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

class InfoOrderGeneral extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
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
	 * @return InfoOrderGeneral
	 */
	public function setDeliveryEmail($deliveryEmail)
	{
		$this->saveData($deliveryEmail, 'deliveryEmail');
		return $this;
	}

	/**
	 * @param string $deliveryTimeFrame
	 * @return InfoOrderGeneral
	 */
	public function setDeliveryTimeFrame($deliveryTimeFrame)
	{
		$this->saveData($deliveryTimeFrame, 'deliveryTimeFrame');
		return $this;
	}

	/**
	 * @param string $giftCardAmount
	 * @return InfoOrderGeneral
	 */
	public function setGiftCardAmount($giftCardAmount)
	{
		$this->saveData($giftCardAmount, 'giftCardAmount');
		return $this;
	}

	/**
	 * @param string $giftCardCount
	 * @return InfoOrderGeneral
	 */
	public function setGiftCardCount($giftCardCount)
	{
		$this->saveData($giftCardCount, 'giftCardCount');
		return $this;
	}

	/**
	 * @param string $giftCardCurrency
	 * @return InfoOrderGeneral
	 */
	public function setGiftCardCurrency($giftCardCurrency)
	{
		$this->saveData($giftCardCurrency, 'giftCardCurrency');
		return $this;
	}

	/**
	 * @param string $preorderDate
	 * @return InfoOrderGeneral
	 */
	public function setPreorderDate($preorderDate)
	{
		$this->saveData($preorderDate, 'preorderDate');
		return $this;
	}

	/**
	 * @param string $availability
	 * @return InfoOrderGeneral
	 */
	public function setAvailability($availability)
	{
		$this->saveData($availability, 'availability');
		return $this;
	}

	/**
	 * @param string $reorderItems
	 * @return InfoOrderGeneral
	 */
	public function setReorderItems($reorderItems)
	{
		$this->saveData($reorderItems, 'reorderItems');
		return $this;
	}

	/**
	 * @param string $shippingMethod
	 * @return InfoOrderGeneral
	 */
	public function setShippingMethod($shippingMethod)
	{
		$this->saveData($shippingMethod, 'shippingMethod');
		return $this;
	}

	/**
	 * @param string $addressMatchIndicator
	 * @return InfoOrderGeneral
	 */
	public function setAddressMatchIndicator($addressMatchIndicator)
	{
		$this->saveData($addressMatchIndicator, 'addressMatchIndicator');
		return $this;
	}

	/**
	 * @param string $differentShippingName
	 * @return InfoOrderGeneral
	 */
	public function setDifferentShippingName($differentShippingName)
	{
		$this->saveData($differentShippingName, 'differentShippingName');
		return $this;
	}

	/**
	 * @param string $transactionType
	 * @return InfoOrderGeneral
	 */
	public function setTransactionType($transactionType)
	{
		$this->saveData($transactionType, 'transactionType');
		return $this;
	}
}
