<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

abstract class InitBasicAbstract extends RequestAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
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
		$this->setData($providerName, 'providerName');
		return $this;
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxLength(string $fieldName)
	{
		if (isset($this->maxLength[$fieldName])) {
			return $this->maxLength[$fieldName];
		}
		return parent::getFieldMaxLength($fieldName);
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
		$this->setData($moduleName, 'moduleName');
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
		$this->setData($moduleVersion, 'moduleVersion');
		return $this;
	}

	/**
	 * @param string $storeName
	 * @return $this
	 */
	public function setStoreName(string $storeName)
	{
		$this->setData($storeName, 'storeName');
		return $this;
	}
}
