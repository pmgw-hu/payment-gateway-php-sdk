<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderRecurringPayment extends InfoAbstract
{
	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_ORDER_RECURRING_PAYMENT;
	}

	/**
	 * @param string $expireDate
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderRecurringPayment
	 */
	public function setExpireDate($expireDate)
	{
		return $this->setData($expireDate, 'expireDate');
	}

	/**
	 * @param string $frequency
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderRecurringPayment
	 */
	public function setFrequency($frequency)
	{
		return $this->setData($frequency, 'frequency');
	}

	/**
	 * @param string $amountIndicator
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderRecurringPayment
	 */
	public function setAmountIndicator($amountIndicator)
	{
		return $this->setData($amountIndicator, 'amountIndicator');
	}
}
