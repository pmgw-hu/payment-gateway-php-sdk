<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
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
