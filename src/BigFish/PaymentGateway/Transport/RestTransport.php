<?php

namespace BigFish\PaymentGateway\Transport;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;
use BigFish\PaymentGateway\Request\RequestAbstract;
use BigFish\PaymentGateway\Request\RequestInterface;

class RestTransport extends TransportAbstract
{
	/**
	 * @return string
	 */
	function getClientType(): \string
	{
		return 'Rest';
	}

	/**
	 * @param RequestInterface $requestInterface
	 * @return ResponseInterface
	 * @throws PaymentGatewayException
	 */
	public function sendRequest(RequestInterface $requestInterface): ResponseInterface
	{
		if (!function_exists('curl_init')) {
			throw new PaymentGatewayException('cURL PHP module is not loaded');
		}

		$url = $this->config->getUrl() . '/api/rest/';

		$this->setStoreName($requestInterface);

		$curl = curl_init();
		if (!$curl) {
			throw new PaymentGatewayException('cURL initialization error');
		}

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array($this->getAuthorizationHeader()));
		curl_setopt($curl, CURLOPT_REFERER, $this->getHttpHost());
		curl_setopt($curl, CURLOPT_MAXREDIRS, 4);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$this->setTimeout($requestInterface, $curl);
		$this->setSslVerify($curl);

		$postData = array(
			'method' => $requestInterface->getMethod(),
			'json' => $this->prepareData($requestInterface),
		);

		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($curl, CURLOPT_USERAGENT, $this->getUserAgent());

		$httpResponse = curl_exec($curl);

		if ($httpResponse === false) {
			$exception = new PaymentGatewayException(sprintf('Communication error: %s', curl_error($curl)));
			curl_close($curl);
			throw $exception;
		}

		curl_close($curl);

		return Response::createFromJson($httpResponse);
	}

	/**
	 * @return string
	 */
	protected function getAuthorizationHeader()
	{
		return 'Authorization: Basic ' . base64_encode($this->config->getStoreName() . ':' . $this->config->getApiKey());
	}

	/**
	 * @param RequestInterface $requestInterface
	 * @return string
	 */
	protected function prepareData(RequestInterface $requestInterface)
	{
		return json_encode($requestInterface->getUcFirstData());
	}

	/**
	 * @param RequestInterface $requestInterface
	 * @param $curl
	 */
	protected function setTimeout(RequestInterface $requestInterface, $curl)
	{
		if (
			$requestInterface->getMethod() == RequestAbstract::REQUEST_CLOSE ||
			$requestInterface->getMethod() == RequestAbstract::REQUEST_REFUND
		) {
			// OTPay close and refund (extra timeout)
			curl_setopt($curl, CURLOPT_TIMEOUT, 600);
			return;
		}

		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	}

	/**
	 * @param $curl
	 */
	protected function setSslVerify($curl)
	{
		$sslVerify = !$this->config->isTestMode();
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $sslVerify);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $sslVerify);
	}
}