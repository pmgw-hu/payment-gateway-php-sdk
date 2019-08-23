<?php

namespace BigFish\PaymentGateway\Transport\Response;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Response implements ResponseInterface
{
	/**
	 * @var array
	 */
	protected $data = [];

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
	public static function createFromJson(string $json)
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
		$result = [];
		static::getObjectVars($result, $object);
		$static->setData($result);
		return $static;
	}

	/**
	 * @param array $result
	 * @param \stdClass $object
	 */
	protected static function getObjectVars(&$result = [], \stdClass $object)
	{
		foreach (get_object_vars($object) as $name => $value) {
			if (!is_object($value)) {
				if (is_string($value) && is_array(json_decode($value, true))) {
					$result[$name] = json_decode($value, true);
				} else {
					$result[$name] = $value;
				}
				continue;
			}

			$result[$name] = [];
			static::getObjectVars($result[$name], $value);
		}
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
	 * @return string|null
	 */
	public function __get(string $name)
	{
        return $this->data[$name] ?? null;
	}

	/**
	 * @param string $charset
	 */
	public function convert(string $charset)
	{
		array_walk_recursive($this->data, function (&$item) use ($charset) {
			$item = iconv("UTF-8", $charset, $item);
		});
	}
}