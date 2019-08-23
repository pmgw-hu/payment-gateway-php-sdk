<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Customer\InfoCustomerStoreSpecific;

class InfoCustomerStoreSpecificTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('2018-05-10', 'setUpdateDate'),
			array('03', 'setUpdateDateIndicator'),
			array('2016-04-01', 'setCreationDate'),
			array('05', 'setCreationDateIndicator'),
			array('2016-04-01', 'setPasswordChangeDate'),
			array('01', 'setPasswordChangeDateIndicator'),
			array('2019-04-28 12:00:01', 'setAuthenticationTimestamp'),
			array('05', 'setAuthenticationMethod'),
			array('01', 'setChallengeIndicator'),
			array('2016-05-05', 'setShippingAddressFirstUse'),
			array('04', 'setShippingAddressFirstUseIndicator'),
			array(5, 'setCardTransactionsLastDay'),
			array('2018-08-05', 'setCardCreationDate'),
			array('05', 'setCardCreationDateIndicator'),
			array(2, 'setTransactionsLastDay'),
			array(95, 'setTransactionsLastYear'),
			array(6, 'setPurchasesLastSixMonths'),
			array('01', 'setSuspiciousActivity')
		);
	}

	protected function getObject(): InfoCustomerStoreSpecific
	{
		return new InfoCustomerStoreSpecific();
	}
}
