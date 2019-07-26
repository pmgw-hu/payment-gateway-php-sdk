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
		return $this->setData($deliveryEmail, 'deliveryEmail');
	}

	/**
	 * @param string $deliveryTimeFrame
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDeliveryTimeFrame($deliveryTimeFrame)
	{
		return $this->setData($deliveryTimeFrame, 'deliveryTimeFrame');
	}

	/**
	 * @param string $giftCardAmount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardAmount($giftCardAmount)
	{
		return $this->setData($giftCardAmount, 'giftCardAmount');
	}

	/**
	 * @param string $giftCardCount
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCount($giftCardCount)
	{
		return $this->setData($giftCardCount, 'giftCardCount');
	}

	/**
	 * @param string $giftCardCurrency
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setGiftCardCurrency($giftCardCurrency)
	{
		return $this->setData($giftCardCurrency, 'giftCardCurrency');
	}

	/**
	 * @param string $preorderDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setPreorderDate($preorderDate)
	{
		return $this->setData($preorderDate, 'preorderDate');
	}

	/**
	 * @param string $availability
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAvailability($availability)
	{
		return $this->setData($availability, 'availability');
	}

	/**
	 * @param string $reorderItems
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setReorderItems($reorderItems)
	{
		return $this->setData($reorderItems, 'reorderItems');
	}

	/**
	 * @param string $shippingMethod
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setShippingMethod($shippingMethod)
	{
		return $this->setData($shippingMethod, 'shippingMethod');
	}

	/**
	 * @param string $addressMatchIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setAddressMatchIndicator($addressMatchIndicator)
	{
		return $this->setData($addressMatchIndicator, 'addressMatchIndicator');
	}

	/**
	 * @param string $differentShippingName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setDifferentShippingName($differentShippingName)
	{
		return $this->setData($differentShippingName, 'differentShippingName');
	}

	/**
	 * @param string $transactionType
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderGeneral
	 */
	public function setTransactionType($transactionType)
	{
		return $this->setData($transactionType, 'transactionType');
	}
}
