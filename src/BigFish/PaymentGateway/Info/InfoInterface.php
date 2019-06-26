<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Info;


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
