<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

abstract class InitBasicAbstract extends RequestAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'providerName' => 20,
		'storeName' => 20
	);

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
	 * @return static
	 */
	public function setProviderName(string $providerName)
	{
		$this->saveData($providerName, 'providerName');
		return $this;
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxSize(string $fieldName)
	{
		if (isset($this->maxSize[$fieldName])) {
			return $this->maxSize[$fieldName];
		}
		return parent::getFieldMaxSize($fieldName);
	}

	/**
	 * Save module name under the 'moduleName' key of the $data array.
	 *
	 * @param string $moduleName
	 * @return RequestInterface
	 * @access public
	 */
	public function setModuleName(string $moduleName): RequestInterface
	{
		$this->saveData($moduleName, 'moduleName');
		return $this;
	}

	/**
	 * Save module version under the 'moduleVersion' key of the $data array.
	 *
	 * @param string $moduleVersion
	 * @return RequestInterface
	 * @access public
	 */
	public function setModuleVersion(string $moduleVersion): RequestInterface
	{
		$this->saveData($moduleVersion, 'moduleVersion');
		return $this;
	}

	/**
	 * @param string $storeName
	 * @return $this
	 */
	public function setStoreName(string $storeName)
	{
		$this->saveData($storeName, 'storeName');
		return $this;
	}
}
