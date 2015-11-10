<?php

namespace BigFish\PaymentGateway\Transport;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;
use BigFish\PaymentGateway\Request\RequestInterface;

class SoapTransport extends TransportAbstract
{
	/**
	 * @param RequestInterface $requestInterface
	 * @return ResponseInterface
	 * @throws PaymentGatewayException
	 */
	public function sendRequest(RequestInterface $requestInterface): ResponseInterface
	{
		if (!class_exists('SoapClient')) {
			throw new PaymentGatewayException('SOAP PHP module is not loaded');
		}

		$this->initRequest($requestInterface);

		$wsdl = $this->config->getUrl() . '/api/soap/?wsdl';
		$client = new \SoapClient($wsdl, array(
				'soap_version' => SOAP_1_2,
				'cache_wsdl' => WSDL_CACHE_BOTH,
				'exceptions' => 1,
				'trace' => 1,
				'login' => $this->config->getStoreName(),
				'password' => $this->config->getApiKey(),
				'user_agent' => $this->getUserAgent(),
		));

		$soapResult = $client->__call(
			$requestInterface->getMethod(),
			array(
				array(
					'request' => $requestInterface->getData()
				)
			)
		);

		$soapResponse = $soapResult->{$requestInterface->getMethod() . 'Result'};
		$this->ucFirstResponse($soapResponse);

		return Response::createFromObject($soapResponse);
	}

	/**
	 * @return string
	 */
	function getClientType(): \string
	{
		return 'SOAP';
	}

	/**
	 * @param $soapResponse
	 */
	protected function ucFirstResponse($soapResponse)
	{
		foreach (get_object_vars($soapResponse) as $key => $value) {
			unset($soapResponse->{$key});
			$soapResponse->{ucfirst($key)} = $value;
		}
	}
}