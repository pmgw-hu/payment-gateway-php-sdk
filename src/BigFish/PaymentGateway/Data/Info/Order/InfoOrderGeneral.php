<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\InfoOrder;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderGeneral extends InfoOrder
{
	use StructurePathTrait;

	const PATH = 'General';

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
