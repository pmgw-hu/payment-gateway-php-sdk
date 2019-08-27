# BIG FISH Payment Gateway - PHP7 SDK

## Moved
New individual repository: https://github.com/bigfish-hu/payment-gateway-php7-sdk

## Version

3.0.0

## Requirements

 * PHP 7
 * PHP cURL extension
 * PHP OpenSSL extension
 * PHP JSON extension

## Installation

BIG FISH Payment Gateway is available at packagist.org, so you can use composer to download this library.

```yml
{
    "require": {
        "bigfish/paymentgateway": "dev-php7"
    }
}
```
## Technical documentation

https://docs.paymentgateway.hu/

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
    ->setUserId('USER-1234') // your custom user id
    ->setLanguage('HU');

$response = $paymentGateway->send($init);
```

#### Start request

```php
if (!$response->ResultCode == "SUCCESSFUL" || !$response->TransactionId) {
    // handle error here
}

$paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\Start())->setTransactionId($response->TransactionId)
    );
```

#### Result request

```php
$result = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\Result())->setTransactionId($_GET['transactionId'])
    );
```

#### Close request

```php
$response = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\Close())->setTransactionId($transActionId)
    );
```


#### Refund request

```php
$response = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\Refund())
            ->setTransactionId($transActionId)
            ->setAmount(100)
    );
```


#### One click token cancel request

```php
$response = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\OneClickTokenCancel())->setTransactionId($transActionId)
    );
```

#### All one click token cancel request

```php
$response = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\OneClickTokenCancelAll())
            ->setProviderName(\BigFish\PaymentGateway::PROVIDER_BORGUN2)
            ->setUserId('userId')
    );
```
### Init Recurring Payment - InitRP

```php
$initRP = new \BigFish\PaymentGateway\Request\InitRP();
$initRP->setReferenceTransactionId("783593c87fee4d372f47f53840028682")
    ->setResponseUrl("http://your.companys.webshop.url/payment_gateway_response") // callback url
    ->setAmount(200)
    ->setCurrency("HUF")
    ->setOrderId("BF-TEST-ORDER-REG") // your custom order id
    ->setUserId("BF-TEST-USER-REG");

$response = $paymentGateway->send($initRP);
```

### Create Payment Link - PaymentLinkCreate

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
        (new \BigFish\PaymentGateway\Request\PaymentLinkCancel())->setPaymentLinkName($paymentLinkName)
    );
```

#### Details request

```php
$response = $paymentGateway->send(
        (new \BigFish\PaymentGateway\Request\PaymentLinkDetails())->setPaymentLinkName($paymentLinkName)
    );
```

### Info data


#### Basic usage
```php
$infoObject = new \BigFish\PaymentGateway\Data\Info();
 
$infoShipping = new \BigFish\PaymentGateway\Data\Info\Order\InfoOrderShippingData();
$infoShipping->setFirstName("John")
    ->setLastName("Doe")
    ->setEmail("test@testmail.com")
    ->setPhoneCc("36")
    ->setPhone("801234567")
    ->setCity("Budapest");

$infoObject->setObject($infoShipping); //add $infoShipping to $infoObject
 
$infoOrderProductItem = new \BigFish\PaymentGateway\Data\Info\Order\InfoOrderProductItem();
$infoOrderProductItem->setSku("PMG055005")
    ->setName("Product11")
    ->setQuantity("10")
    ->setQuantityUnit("db")
    ->setUnitPrice("22.00")
    ->setImageUrl("http://webhsop/product11.jpg")
    ->setDescription("Product11 desc.");

$infoObject->setData($infoOrderProductItem); //add $infoShipping to $infoObject
 
$infoOrderProductItem = new \BigFish\PaymentGateway\Data\Info\Order\InfoOrderProductItem();
$infoOrderProductItem->setSku("PMG055008")
    ->setName("Product12")
    ->setQuantity("10")
    ->setQuantityUnit("db")
    ->setUnitPrice("22.00")
    ->setImageUrl("http://webhsop/product12.jpg")
    ->setDescription("Product12 desc.");

$infoObject->setData($infoOrderProductItem); //add $infoShipping to $infoObject

```

#### Init

```php
...
    $init->setInfo($infoObject);
...
```

#### InitRP

```php
...
    $initRP->setInfo($infoObject);
...
```

#### Payment Link

```php
...
    $paymentLink->setInfo($infoObject);
...
```