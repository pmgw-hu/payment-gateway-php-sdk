<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderProductItem extends InfoAbstract
{

	const SKU = 'sku';
	const NAME = 'name';
	const QUANTITY = 'quantity';
	const QUANTITY_UNIT = 'quantityUnit';
	const UNIT_PRICE = 'unitPrice';
	const IMAGE_URL = 'imageUrl';
	const DESCRIPTION = 'description';

	/**
	 * @var array
	 */
	protected $maxLength = [
		self::SKU => 254,
		self::NAME => 254,
		self::QUANTITY => 10,
		self::QUANTITY_UNIT => 16,
		self::UNIT_PRICE => 16,
		self::IMAGE_URL => 254,
		self::DESCRIPTION => 254
	];

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
		return $this->setData($sku, self::SKU);
	}

	/**
	 * @param string $name
	 * @return InfoOrderProductItem
	 */
	public function setName(string $name): InfoOrderProductItem
	{
		return $this->setData($name, self::NAME);
	}

	/**
	 * @param  $quantity
	 * @return InfoOrderProductItem
	 */
	public function setQuantity($quantity): InfoOrderProductItem
	{
		return $this->setData($quantity, self::QUANTITY);
	}

	/**
	 * @param string $quantityUnit
	 * @return InfoOrderProductItem
	 */
	public function setQuantityUnit(string $quantityUnit): InfoOrderProductItem
	{
		return $this->setData($quantityUnit, self::QUANTITY_UNIT);
	}

	/**
	 * @param mixed $unitPrice
	 * @return InfoOrderProductItem
	 */
	public function setUnitPrice($unitPrice): InfoOrderProductItem
	{
		return $this->setData($unitPrice, self::UNIT_PRICE);
	}

	/**
	 * @param string $imageUrl
	 * @return InfoOrderProductItem
	 */
	public function setImageUrl(string $imageUrl): InfoOrderProductItem
	{
		return $this->setData($imageUrl, self::IMAGE_URL);
	}

	/**
	 * @param string $description
	 * @return InfoOrderProductItem
	 */
	public function setDescription(string $description): InfoOrderProductItem
	{
		return $this->setData($description, self::DESCRIPTION);
	}
}
