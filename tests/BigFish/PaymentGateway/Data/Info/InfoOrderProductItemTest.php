<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Order\InfoOrderProductItem;

class InfoOrderProductItemTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('PMG00010', 'setSku'),
			array('Product', 'setName'),
			array('10', 'setQuantity'),
			array('pcs', 'setQuantityUnit'),
			array('10', 'setUnitPrice'),
			array('http://webshop.com/product/pic.jpg', 'setImageUrl'),
			array('Product description', 'setDescription')
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function sku_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setSku(str_repeat('A', 255));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function name_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setName(str_repeat('A', 255));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function quantity_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setQuantity(str_repeat(2, 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function quantityUnit_maxLengthCheck()
	{
		// max: 16
		$this->getObject()->setQuantityUnit(str_repeat('A', 17));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function unitPrice_maxLengthCheck()
	{
		// max: 16
		$this->getObject()->setUnitPrice(str_repeat('A', 17));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function imageUrl_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setImageUrl(str_repeat('A', 255));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function description_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setDescription(str_repeat('A', 255));
	}

	protected function getObject(): InfoOrderProductItem
	{
		return new InfoOrderProductItem();
	}
}
