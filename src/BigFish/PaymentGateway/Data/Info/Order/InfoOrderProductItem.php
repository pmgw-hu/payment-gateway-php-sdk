<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\InfoOrder;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderProductItem extends InfoOrder
{
	use StructurePathTrait;

	const PATH = 'ProductItems';

	const SKU = 'sku';
	const NAME = 'name';
	const QUANTITY = 'quantity';
	const QUANTITY_UNIT = 'quantityUnit';
	const UNIT_PRICE = 'unitPrice';
	const IMAGE_URL = 'imageUrl';
	const DESCRIPTION = 'description';

	public function setSku(string $sku): self
	{
		return $this->setData($sku, self::SKU);
	}

	public function setName(string $name): self
	{
		return $this->setData($name, self::NAME);
	}

	public function setQuantity(int $quantity): self
	{
		return $this->setData($quantity, self::QUANTITY);
	}

	public function setQuantityUnit(string $quantityUnit): self
	{
		return $this->setData($quantityUnit, self::QUANTITY_UNIT);
	}

	public function setUnitPrice($unitPrice): self
	{
		return $this->setData($unitPrice, self::UNIT_PRICE);
	}

	public function setImageUrl(string $imageUrl): self
	{
		return $this->setData($imageUrl, self::IMAGE_URL);
	}

	public function setDescription(string $description): self
	{
		return $this->setData($description, self::DESCRIPTION);
	}
}
