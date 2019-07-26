<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

abstract class InitBasicAbstract extends RequestAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = [
		'providerName' => 20,
		'storeName' => 20
	];

	/**
	 * Set the default values from the constants.
	 *
	 * InitAbstract constructor.
	 */
	public function __construct()
	{
		$this->setModuleName(PaymentGateway::NAME);
		$this->setModuleVersion(PaymentGateway::VERSION);
	}

	/**
	 * @param string $providerName
	 * @return $this
	 */
	public function setProviderName(string $providerName): self
	{
		return $this->setData($providerName, 'providerName');
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxLength(string $fieldName)
	{
		return $this->maxLength[$fieldName] ?? parent::getFieldMaxLength($fieldName);
	}

	/**
	 * Save module name under the 'moduleName' key of the $data array.
	 *
	 * @param string $moduleName
	 * @return $this
	 * @access public
	 */
	public function setModuleName(string $moduleName): self
	{
		return $this->setData($moduleName, 'moduleName');
	}

	/**
	 * Save module version under the 'moduleVersion' key of the $data array.
	 *
	 * @param string $moduleVersion
	 * @return $this
	 * @access public
	 */
	public function setModuleVersion(string $moduleVersion): self
	{
		return $this->setData($moduleVersion, 'moduleVersion');
	}

	/**
	 * @param string $storeName
	 * @return $this
	 */
	public function setStoreName(string $storeName): self
	{
		return $this->setData($storeName, 'storeName');
	}
}
