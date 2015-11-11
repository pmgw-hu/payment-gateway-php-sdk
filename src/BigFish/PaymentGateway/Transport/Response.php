<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Response implements ResponseInterface
{
	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param string $json
	 * @return static
	 * @throws PaymentGatewayException
	 */
	public static function createFromJson(\string $json)
	{
		$decodedJson = json_decode($json);
		if (json_last_error() !== JSON_ERROR_NONE) {
			throw new PaymentGatewayException('Invalid json response. ');
		}

		return static::createFromObject($decodedJson);
	}

	/**
	 * @param \stdClass $object $object
	 * @return static
	 */
	public static function createFromObject(\stdClass $object)
	{
		$static = new static();
		$static->setData(get_object_vars($object));
		return $static;
	}

	/**
	 * @param array $data
	 */
	public function setData(array $data)
	{
		$this->data = $data;
	}

	/**
	 * @param string $name
	 * @return string
	 */
	public function __get(\string $name)
	{
		if (!isset($this->data[$name])) {
			return '';
		}

		return $this->data[$name];
	}
}