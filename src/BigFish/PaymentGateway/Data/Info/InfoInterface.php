<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Common\BaseInterface;

interface InfoInterface extends BaseInterface
{
	/**
	 * @return string
	 */
	public function getStructurePath(): string;
}
