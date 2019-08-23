<?php

namespace BigFish\PaymentGateway\Data;


use BigFish\PaymentGateway\Data\Info\InfoAbstract;
use BigFish\PaymentGateway\Data\Info\Order\InfoOrderProductItem;

class Info extends InfoAbstract
{
	const PATH = 'Info';

	public function setObject(InfoAbstract $infoObject): self
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

	public function getStructurePath(): string
	{
		return self::PATH;
	}
}
