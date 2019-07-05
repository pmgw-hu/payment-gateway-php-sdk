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
	 * @var array
	 */
	protected $maxLength = array(
		'sku' => 254,
		'name' => 254,
		'quantity' => 254,
		'quantityUnit' => 16,
		'unitPrice' => 254,
		'price' => 254,
		'imageUrl' => 254,
		'description' => 254,
	);

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
		$this->setData($sku, 'sku');
		return $this;
	}

	/**
	 * @param mixed $name
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setName($name)
	{
		$this->setData($name, 'name');
		return $this;
	}

	/**
	 * @param mixed $quantity
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setQuantity($quantity)
	{
		$this->setData($quantity, 'quantity');
		return $this;
	}

	/**
	 * @param mixed $quantityUnit
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setQuantityUnit($quantityUnit)
	{
		$this->setData($quantityUnit, 'quantityUnit');
		return $this;
	}

	/**
	 * @param mixed $unitPrice
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setUnitPrice($unitPrice)
	{
		$this->setData($unitPrice, 'unitPrice');
		return $this;
	}

	/**
	 * @param mixed $price
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setPrice($price)
	{
		$this->setData($price, 'price');
		return $this;
	}

	/**
	 * @param mixed $imageUrl
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setImageUrl($imageUrl)
	{
		$this->setData($imageUrl, 'imageUrl');
		return $this;
	}

	/**
	 * @param mixed $description
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderProductItem
	 */
	public function setDescription($description)
	{
		$this->setData($description, 'description');
		return $this;
	}
}
