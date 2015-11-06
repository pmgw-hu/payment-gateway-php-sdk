<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway\Config;

abstract class TransportAbstract implements TransportInterface
{
	/**
	 * @var Config
	 */
	protected $config;

	/**
	 * TransportInterface constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}
}