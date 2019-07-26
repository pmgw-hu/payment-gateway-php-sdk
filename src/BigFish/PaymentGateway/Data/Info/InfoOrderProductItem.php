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

class InfoOrderProductItem extends InfoAbstract
{
	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_ORDER_PRODUCT_ITEMS;
	}

	/**
	 * @param mixed $sku
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setSku($sku)
	{
		return $this->setData($sku, 'sku');
	}

	/**
	 * @param mixed $name
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setName($name)
	{
		return $this->setData($name, 'name');
	}

	/**
	 * @param mixed $quantity
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setQuantity($quantity)
	{
		return $this->setData($quantity, 'quantity');
	}

	/**
	 * @param mixed $quantityUnit
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setQuantityUnit($quantityUnit)
	{
		return $this->setData($quantityUnit, 'quantityUnit');
	}

	/**
	 * @param mixed $unitPrice
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setUnitPrice($unitPrice)
	{
		return $this->setData($unitPrice, 'unitPrice');
	}

	/**
	 * @param mixed $imageUrl
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setImageUrl($imageUrl)
	{
		return $this->setData($imageUrl, 'imageUrl');
	}

	/**
	 * @param mixed $description
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setDescription($description)
	{
		return $this->setData($description, 'description');
	}
}
