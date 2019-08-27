# BIG FISH Payment Gateway - PHP7 SDK

## Moved

New individual repository: https://github.com/bigfish-hu/payment-gateway-php7-sdk

## Version

2.4.0

## Requirements

 * PHP 7
 * for REST API you need PHP cURL extension
 * for SOAP API you need PHP SOAP extension

## Installation

BIG FISH Payment Gateway is available at packagist.org, so you can use composer to download this library.

```yml
{
    "require": {
        "bigfish/paymentgateway": "dev-php7"
    }
}
```

## Source code

https://github.com/bigfish-hu/payment-gateway-php-sdk

## Example usage

### Basic configuration

```php
$config = new \BigFish\PaymentGateway\Config();
$config->storeName = "example store name";
$config->apiKey = "ExamPleApiKey";
$config->encryptPublicKey = "publicKeyGoesHere";
$config->testMode = true;

$paymentGateway = new \BigFish\PaymentGateway($config);
```

### Init request

```php
$init = new \BigFish\PaymentGateway\Request\Init();
$init->setProviderName(\BigFish\PaymentGateway::PROVIDER_CIB) // the chosen payment method
	->setResponseUrl('http://your.companys.webshop.url/payment_gateway_response') // callback url
	->setAmount(1234)
	->setCurrency('HUF')
	->setOrderId('ORD-1234') // your custom order id
	->setLanguage('HU');

$response = $paymentGateway->send($init);
```

### Start request

```php
if (!$response->ResultCode == "SUCCESSFUL" || !$response->TransactionId) {
	// handle error here
}

$paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Start($response->TransactionId)
    );
```

### Result request

```php
$result = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Result($_GET['transactionId'])
    );
```

### Close request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Close($transActionId)
    );
```


### Refund request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Refund($transActionId, 100)
    );
```
