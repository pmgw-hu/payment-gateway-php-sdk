<?php

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
		'quantity' => 10,
		'quantityUnit' => 16,
		'unitPrice' => 16,
		'imageUrl' => 254,
		'description' => 254,
	);

	/**
	 * @return string
	 */
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_PRODUCT_ITEMS;
	}

	/**
	 * @param string $sku
	 * @return InfoOrderProductItem
	 */
	public function setSku(string $sku): InfoOrderProductItem
	{
		$this->setData($sku, 'sku');
		return $this;
	}

	/**
	 * @param string $name
	 * @return InfoOrderProductItem
	 */
	public function setName(string $name): InfoOrderProductItem
	{
		$this->setData($name, 'name');
		return $this;
	}

	/**
	 * @param  $quantity
	 * @return InfoOrderProductItem
	 */
	public function setQuantity($quantity): InfoOrderProductItem
	{
		$this->setData($quantity, 'quantity');
		return $this;
	}

	/**
	 * @param string $quantityUnit
	 * @return InfoOrderProductItem
	 */
	public function setQuantityUnit(string $quantityUnit): InfoOrderProductItem
	{
		$this->setData($quantityUnit, 'quantityUnit');
		return $this;
	}

	/**
	 * @param mixed $unitPrice
	 * @return InfoOrderProductItem
	 */
	public function setUnitPrice($unitPrice): InfoOrderProductItem
	{
		$this->setData($unitPrice, 'unitPrice');
		return $this;
	}

	/**
	 * @param string $imageUrl
	 * @return InfoOrderProductItem
	 */
	public function setImageUrl(string $imageUrl): InfoOrderProductItem
	{
		$this->setData($imageUrl, 'imageUrl');
		return $this;
	}

	/**
	 * @param string $description
	 * @return InfoOrderProductItem
	 */
	public function setDescription(string $description): InfoOrderProductItem
	{
		$this->setData($description, 'description');
		return $this;
	}
}
