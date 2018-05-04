<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway;

/**
 * BIG FISH Payment Gateway Autoloader
 * 
 * @package PaymentGateway
 */
class Autoload
{
	/**
	 * Autoloader instance
	 * 
	 * @var \BigFish\PaymentGateway\Autoload
	 * @access private
	 * @static
	 */
	private static $instance;

	/**
	 * Base path
	 * 
	 * @var string
	 * @access private
	 * @static 
	 */
	private static $basePath;

	/**
	 * Register autoloader
	 * 
	 * @return void
	 * @access public
	 * @static
	 */
	public static function register()
	{
		spl_autoload_register(array(self::getInstance(), 'loadClass'));
	}

	/**
	 * Load class
	 * 
	 * @param string $class
	 * @return void
	 * @access protected
	 */
	protected function loadClass($class)
	{
		if (strpos($class, __NAMESPACE__) === 0) {
			$path = explode('\\', $class);

			array_shift($path);

			include_once(self::getClassPath($path) . '.php');
		}
	}

	/**
	 * Get autoloader instance
	 * 
	 * @return \BigFish\PaymentGateway\Autoload
	 * @access private
	 * @static
	 */
	private static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new Autoload();
		}
		return self::$instance;
	}

	/**
	 * Get base path
	 * 
	 * @return string
	 * @access private
	 * @static
	 */
	private static function getBasePath()
	{
		if (is_null(self::$basePath)) {
			self::$basePath = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
		}
		return self::$basePath;
	}
	
	/**
	 * Get class path
	 * 
	 * @param array $path
	 * @return string
	 * @access private
	 * @static
	 */
	private static function getClassPath(array $path)
	{
		return self::getBasePath() . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path);
	}

}
