<?php

namespace BigFish\PaymentGateway\Transport;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\Response\Response;
use BigFish\PaymentGateway\Transport\Response\ResponseInterface;

class SoapTransport extends TransportAbstract
{
	/**
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 * @throws PaymentGatewayException
	 */
	public function sendRequest(RequestInterface $request): ResponseInterface
	{
		if (!class_exists('SoapClient')) {
			throw new PaymentGatewayException('SOAP PHP module is not loaded');
		}

		$this->prepareRequest($request);

		$wsdl = $this->config->getUrl() . '/api/soap/?wsdl';
		try {
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
					$request->getMethod(),
					array(
							array(
									'request' => $request->getData()
							)
					)
			);

			$soapResponse = $soapResult->{$request->getMethod() . 'Result'};
		} catch (\Exception $exception) {
			throw new PaymentGatewayException(sprintf('Soap transport error: %s', $exception->getMessage()), $exception->getCode(), $exception);
		}
		$this->ucFirstResponse($soapResponse);

		$response = Response::createFromObject($soapResponse);
		$this->convertOutResponse($response);
		return $response;
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