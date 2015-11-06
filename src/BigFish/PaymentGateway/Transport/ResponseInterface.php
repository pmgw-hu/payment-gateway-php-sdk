<?php

namespace BigFish\PaymentGateway\Transport;


interface ResponseInterface
{
	/**
	 * @return array
	 */
	public function getData(): array;

	/**
	 * @param $data
	 * @return static
	 */
	public static function create($data);

	/**
	 * @param string $json
	 * @return static
	 */
	public static function createFromJson(\string $json);

	/**
	 * @param object $object
	 * @return static
	 */
	public static function createFromObject(\object $object);
}