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

class InfoOrderProductItem extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'sku' => 254,
		'name' => 254,
		'quantity' => 254,
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
	 * @return InfoOrderProductItem
	 */
	public function setSku($sku)
	{
		$this->saveData($sku, 'sku');
		return $this;
	}

	/**
	 * @param mixed $name
	 * @return InfoOrderProductItem
	 */
	public function setName($name)
	{
		$this->saveData($name, 'name');
		return $this;
	}

	/**
	 * @param mixed $quantity
	 * @return InfoOrderProductItem
	 */
	public function setQuantity($quantity)
	{
		$this->saveData($quantity, 'quantity');
		return $this;
	}

	/**
	 * @param mixed $unitPrice
	 * @return InfoOrderProductItem
	 */
	public function setUnitPrice($unitPrice)
	{
		$this->saveData($unitPrice, 'unitPrice');
		return $this;
	}

	/**
	 * @param mixed $price
	 * @return InfoOrderProductItem
	 */
	public function setPrice($price)
	{
		$this->saveData($price, 'price');
		return $this;
	}

	/**
	 * @param mixed $imageUrl
	 * @return InfoOrderProductItem
	 */
	public function setImageUrl($imageUrl)
	{
		$this->saveData($imageUrl, 'imageUrl');
		return $this;
	}

	/**
	 * @param mixed $description
	 * @return InfoOrderProductItem
	 */
	public function setDescription($description)
	{
		$this->saveData($description, 'description');
		return $this;
	}
}
