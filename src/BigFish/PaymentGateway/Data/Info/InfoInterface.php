<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */

namespace BigFish\PaymentGateway\Data\Info;


interface InfoInterface
{
	/**
	 * @return array
	 */
	public function getData();

	/**
	 * @return array
	 */
	public function getUcFirstData();

	/**
	 * @return string
	 */
	public function getStructurePath();
}
