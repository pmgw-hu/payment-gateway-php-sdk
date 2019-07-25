<?php

namespace BigFish\PaymentGateway\Data;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info\InfoAbstract;
use BigFish\PaymentGateway\Data\Info\InfoOrderProductItem;

class Info extends InfoAbstract
{
	/**
	 * @param InfoAbstract $infoObject
	 * @return Info
	 */
	public function setObject(InfoAbstract $infoObject): Info
	{
		if ($infoObject instanceof InfoOrderProductItem) {
			if (!isset($this->data[$infoObject->getStructurePath()])) {
				$this->data[$infoObject->getStructurePath()] = [];
			}
			array_push($this->data[$infoObject->getStructurePath()], $infoObject->getUcFirstData());
			return $this;
		}

		$this->data[$infoObject->getStructurePath()] = $infoObject->getUcFirstData();

		return $this;
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		$finalData = [];
		foreach ($this->data as $pathString => $value) {
			$pathArray = explode('/', $pathString);
			$temp = &$finalData;

			foreach($pathArray as $key) {
				$temp = &$temp[$key];
			}
			$temp = $value;
			unset($temp);
		}

		return $finalData[$this->getStructurePath()] ?? [];
	}

	/**
	 * @return string
	 */
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO;
	}
}
