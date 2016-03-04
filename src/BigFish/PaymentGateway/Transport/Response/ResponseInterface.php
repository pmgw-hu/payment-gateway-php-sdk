<?php

namespace BigFish\PaymentGateway\Transport\Response;


interface ResponseInterface
{
	/**
	 * @return array
	 */
	public function getData(): array;

	/**
	 * @param string $json
	 * @return static
	 */
	public static function createFromJson(string $json);

	/**
	 * @param \stdClass $object $object
	 * @return static
	 */
	public static function createFromObject(\stdClass $object);

	/**
	 * @param array $data
	 * @return void
	 */
	public function setData(array $data);

	/**
	 * @param string $charset
	 */
	public function convert(string $charset);
}