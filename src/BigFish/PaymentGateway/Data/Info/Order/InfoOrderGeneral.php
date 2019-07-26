<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info\InfoAbstract;

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

	public function setDeliveryEmail($deliveryEmail): self
	{
		return $this->setData($deliveryEmail, self::DELIVERY_EMAIL);
	}

	public function setDeliveryTimeFrame(string $deliveryTimeFrame): self
	{
		return $this->setData($deliveryTimeFrame, self::DELIVERY_TIME_FRAME);
	}

	public function setGiftCardAmount(int $giftCardAmount): self
	{
		return $this->setData($giftCardAmount, self::GIFT_CARD_AMOUNT);
	}

	public function setGiftCardCount(int $giftCardCount): self
	{
		return $this->setData($giftCardCount, self::GIFT_CARD_COUNT);
	}

	public function setGiftCardCurrency(string $giftCardCurrency): self
	{
		return $this->setData($giftCardCurrency, self::GIFT_CARD_CURRENCY);
	}

	public function setPreorderDate(string $preorderDate): self
	{
		return $this->setData($preorderDate, self::PREORDER_DATE);
	}

	public function setAvailability(string $availability): self
	{
		return $this->setData($availability, self::AVAILABILITY);
	}

	public function setReorderItems(string $reorderItems): self
	{
		return $this->setData($reorderItems, self::REORDER_ITEMS);
	}

	public function setShippingMethod(string $shippingMethod): self
	{
		return $this->setData($shippingMethod, self::SHIPPING_METHOD);
	}

	public function setAddressMatchIndicator(string $addressMatchIndicator): self
	{
		return $this->setData($addressMatchIndicator, self::ADDRESS_MATCH_INDICATOR);
	}

	public function setDifferentShippingName(string $differentShippingName): self
	{
		return $this->setData($differentShippingName, self::DIFFERENT_SHIPPING_NAME);
	}

	public function setTransactionType(string $transactionType): self
	{
		return $this->setData($transactionType, self::TRANSACTION_TYPE);
	}
}
