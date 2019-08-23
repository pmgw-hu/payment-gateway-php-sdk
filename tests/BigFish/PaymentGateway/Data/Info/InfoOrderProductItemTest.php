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

	protected function getObject(): InfoOrderProductItem
	{
		return new InfoOrderProductItem();
	}
}
