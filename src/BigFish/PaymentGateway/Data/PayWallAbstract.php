<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */
namespace BigFish\PaymentGateway\Data;


abstract class PayWallAbstract
{
    /**
     * @return array
     * @access public
     */
    public function getData()
    {
        $data = array();

        foreach (array_keys(get_object_vars($this)) as $var) {
            if ($this->{$var} === null) {
                continue;
            }
            $data[ucfirst($var)] = $this->{$var};
        }
        return $data;
    }
}
