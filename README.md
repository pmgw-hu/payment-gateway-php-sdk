# BIG FISH Payment Gateway - PHP7 SDK

[![build status](http://ci.bigfish.hu/projects/62/status.png?ref=php7)](http://ci.bigfish.hu/projects/62/status.png?ref=php7)

## Version

2.4.0

## Requirements

 * PHP 7
 * for REST API you need PHP cURL extension

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

#### Start request

```php
if (!$response->ResultCode == "SUCCESSFUL" || !$response->TransactionId) {
	// handle error here
}

$paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Start($response->TransactionId)
    );
```

#### Result request

```php
$result = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Result($_GET['transactionId'])
    );
```

#### Close request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Close($transActionId)
    );
```


#### Refund request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\Refund($transActionId, 100)
    );
```


#### One click token cancel request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\OneClickTokenCancel($transActionId)
    );
```

#### All one click token cancel request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\OneClickTokenCancelAll($transActionId)
    );
```

### Create Payment Link

```php
$paymentLink = new \BigFish\PaymentGateway\Request\PaymentLinkCreate();
$paymentLink->setProviderName(\BigFish\PaymentGateway::PROVIDER_CIB) // the chosen payment method
	->setAmount(1234)
	->setCurrency('HUF')
	->setOrderId('ORD-1234') // your custom order id
	->setUserId('USR-1234') // your customer id
	->setLanguage('HU');

$response = $paymentGateway->send($paymentLink);
```

#### Cancel request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\PaymentLinkCancel($paymentLinkName)
    );
```

#### Details request

```php
$response = $paymentGateway->send(
        new \BigFish\PaymentGateway\Request\PaymentLinkDetails($paymentLinkName)
    );
```
