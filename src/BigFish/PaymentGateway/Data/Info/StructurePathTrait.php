<?php

namespace BigFish\PaymentGateway\Data\Info;


trait StructurePathTrait
{
	public function getStructurePath(): string
	{
		return sprintf('%s/%s', parent::getStructurePath(), self::PATH);
	}
}