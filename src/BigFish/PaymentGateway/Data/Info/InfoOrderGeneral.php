<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderGeneral extends InfoAbstract
{
	const DELIVERY_EMAIL = 'deliveryEmail';
	const DELIVERY_TIME_FRAME = 'deliveryTimeFrame';
	const GIFT_CARD_AMOUNT = 'giftCardAmount';
	const GIFT_CARD_COUNT = 'giftCardCount';
	const GIFT_CARD_CURRENCY = 'giftCardCurrency';
	const PREORDER_DATE = 'preorderDate';
	const AVAILABILITY = 'availability';
	const REORDER_ITEMS = 'reorderItems';
	const SHIPPING_METHOD = 'shippingMethod';
	const ADDRESS_MATCH_INDICATOR = 'addressMatchIndicator';
	const DIFFERENT_SHIPPING_NAME = 'differentShippingName';
	const TRANSACTION_TYPE = 'transactionType';

	/**
	 * @var array
	 */
	protected $maxLength = [
		self::DELIVERY_EMAIL => 254,
		self::DELIVERY_TIME_FRAME => 2,
		self::GIFT_CARD_AMOUNT => 15,
		self::GIFT_CARD_COUNT => 2,
		self::GIFT_CARD_CURRENCY => 3,
		self::PREORDER_DATE => 10,
		self::AVAILABILITY => 2,
		self::REORDER_ITEMS => 2,
		self::SHIPPING_METHOD => 2,
		self::ADDRESS_MATCH_INDICATOR => 1,
		self::DIFFERENT_SHIPPING_NAME => 2,
		self::TRANSACTION_TYPE => 2,
	];

	/**
	 * @return string
	 */
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_GENERAL;
	}

	/**
	 * @param string $deliveryEmail
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDeliveryEmail($deliveryEmail)
	{
		return $this->setData($deliveryEmail, self::DELIVERY_EMAIL);
	}

	/**
	 * @param string $deliveryTimeFrame
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDeliveryTimeFrame($deliveryTimeFrame)
	{
		return $this->setData($deliveryTimeFrame, self::DELIVERY_TIME_FRAME);
	}

	/**
	 * @param string $giftCardAmount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardAmount($giftCardAmount)
	{
		return $this->setData($giftCardAmount, self::GIFT_CARD_AMOUNT);
	}

	/**
	 * @param string $giftCardCount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCount($giftCardCount)
	{
		return $this->setData($giftCardCount, self::GIFT_CARD_COUNT);
	}

	/**
	 * @param string $giftCardCurrency
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCurrency($giftCardCurrency)
	{
		return $this->setData($giftCardCurrency, self::GIFT_CARD_CURRENCY);
	}

	/**
	 * @param string $preorderDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setPreorderDate($preorderDate)
	{
		return $this->setData($preorderDate, self::PREORDER_DATE);
	}

	/**
	 * @param string $availability
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAvailability($availability)
	{
		return $this->setData($availability, self::AVAILABILITY);
	}

	/**
	 * @param string $reorderItems
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setReorderItems($reorderItems)
	{
		return $this->setData($reorderItems, self::REORDER_ITEMS);
	}

	/**
	 * @param string $shippingMethod
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setShippingMethod($shippingMethod)
	{
		return $this->setData($shippingMethod, self::SHIPPING_METHOD);
	}

	/**
	 * @param string $addressMatchIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAddressMatchIndicator($addressMatchIndicator)
	{
		return $this->setData($addressMatchIndicator, self::ADDRESS_MATCH_INDICATOR);
	}

	/**
	 * @param string $differentShippingName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDifferentShippingName($differentShippingName)
	{
		return $this->setData($differentShippingName, self::DIFFERENT_SHIPPING_NAME);
	}

	/**
	 * @param string $transactionType
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setTransactionType($transactionType)
	{
		return $this->setData($transactionType, self::TRANSACTION_TYPE);
	}
}
