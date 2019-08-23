<?php

namespace BigFish\Tests\PaymentGateway\Data;


use BigFish\PaymentGateway\Data\Info;
use BigFish\PaymentGateway\Data\Info\Customer\InfoCustomerBrowser;
use BigFish\PaymentGateway\Data\Info\Order\InfoOrderGeneral;
use BigFish\PaymentGateway\Data\Info\Order\InfoOrderRecurringPayment;

class InfoTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * @test
	 */
	public function setOneInfoObjectTest()
	{
		$info = $this->getObject();

		$browser = $this->getCustomerBrowserObject();
		$browser->setUserAgent('test');
		$browser->setScreenWidth('500');
		$browser->setAcceptHeader('header');

		$info->setObject($browser);

		$this->assertArraySubset(
			[
				'Customer' => [
					'Browser' => [
						'UserAgent' => 'test',
						'ScreenWidth' => '500',
						'AcceptHeader' => 'header',
					]
				]
			],
			$info->getData()
		);
	}

	/**
	 * @test
	 */
	public function setMultipleInfoObjectTest()
	{
		$info = $this->getObject();

		$browser = $this->getCustomerBrowserObject();
		$browser->setUserAgent('test');
		$browser->setScreenWidth('500');
		$browser->setAcceptHeader('header');

		$recurring = $this->getRecurringPaymentObject();
		$recurring->setFrequency('12');

		$orderGeneral = $this->getOrderGeneralObject();
		$orderGeneral->setGiftCardCount('12');
		$orderGeneral->setReorderItems('02');
		$orderGeneral->setTransactionType('01');

		$info->setObject($browser);
		$info->setObject($orderGeneral);
		$info->setObject($recurring);

		$this->assertArraySubset(
			[
				'Customer' => [
					'Browser' => [
						'UserAgent' => 'test',
						'ScreenWidth' => '500',
						'AcceptHeader' => 'header',
					]
				],
				'Order' => [
					'General' => [
						'GiftCardCount' => '12',
						'ReorderItems' => '02',
						'TransactionType' => '01',
					],
					'RecurringPayment' => [
						'Frequency' => '12'
					]
				]
			],
			$info->getData()
		);
	}

	/**
	 * @test
	 */
	public function emptyInfoObjectTest()
	{
		$info = $this->getObject();

		$this->assertArraySubset(
			[],
			$info->getData()
		);
	}

	protected function getObject(): Info
	{
		return new Info();
	}

	protected function getCustomerBrowserObject(): InfoCustomerBrowser
	{
		return new InfoCustomerBrowser();
	}

	protected function getRecurringPaymentObject(): InfoOrderRecurringPayment
	{
		return new InfoOrderRecurringPayment();
	}

	protected function getOrderGeneralObject(): InfoOrderGeneral
	{
		return new InfoOrderGeneral();
	}
}
