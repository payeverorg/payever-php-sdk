# payever PHP SDK
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/payeverworldwide/sdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/payeverworldwide/sdk-php/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/payeverworldwide/sdk-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/payeverworldwide/sdk-php/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/payeverworldwide/sdk-php/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Latest Stable Version](https://poser.pugx.org/payever/payments-sdk-php/v/stable)](https://packagist.org/packages/payever/payments-sdk-php)
[![Total Downloads](https://poser.pugx.org/payever/payments-sdk-php/downloads)](https://packagist.org/packages/payever/payments-sdk-php)
[![License](https://poser.pugx.org/payever/payments-sdk-php/license)](https://packagist.org/packages/payever/payments-sdk-php)

The payever PHP SDK enables seamless integration with the payever platform, providing access to its e-commerce & payment features. Designed for developers, this SDK simplifies interaction with payever APIs to create powerful applications and plugins.

This library follows semantic versioning. Read more on [semver.org][1].

## Troubleshooting 

If you faced an issue you can contact us via official support channel - support@getpayever.com

## Requirements

* [PHP 5.6.0 and later][2]
* PHP cURL extension

## Installation

You can use **Composer**

### Composer

The preferred method is via [composer][3]. Follow the
[installation instructions][4] if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require payeverorg/payever-php-sdk
```

## Documentation

Raw HTTP API docs can be found here - https://docs.payever.org/api/payments/v3

### Enums

The are several list of fixed string values used inside API. For convenience they are represented as constants and grouped into classes.

* Payments
    - [`ChannelSet`](lib/Payever/Core/Enum/ChannelSet.php) - list of available payever API channels
    - [`ChannelTypeSet`](lib/Payever/Core/Enum/ChannelTypeSet.php) - list of available payever API channel types
    - [`PaymentMethod`](lib/Payever/Payments/Enum/PaymentMethod.php) - list of available payever payment methods
    - [`Status`](lib/Payever/Payments/Enum/Status.php) - list of available payever payment statuses

### API Clients

HTTP API communication with payever happens through [`PaymentsApiClient`](#paymentsapiclient) API clients.

#### Configuration

Each API client requires configuration object as the first argument of client's constructor. 
In order to get the valid configuration object you need to have valid API credentials:

- Client ID
- Client Secret
- Business UUID

Additionally, you need to tell which API channel you're using:

```php
use Payever\Sdk\Core\ClientConfiguration;
use Payever\Sdk\Core\Enum\ChannelSet;

$clientId = 'your-oauth2-client-id';
$clientSecret = 'your-oauth2-client-secret';
$businessUuid = '88888888-4444-4444-4444-121212121212';

$clientConfiguration = new ClientConfiguration();

$clientConfiguration
    ->setClientId($clientId)
    ->setClientSecret($clientSecret)
    ->setBusinessUuid($businessUuid)
    ->setChannelSet(ChannelSet::CHANNEL_MAGENTO)
    ->setApiMode(ClientConfiguration::API_MODE_LIVE)
;
```
NOTE: All examples below assume you have [`ClientConfiguration`](https://github.com/payeverworldwide/core-sdk-php/blob/main/lib/Payever/Core/ClientConfiguration.php) instantiated inside `$clientConfiguration` variable.

#### PaymentsApiClient

This API client is used in all payment-related interactions. 

##### Create payment and obtain redirect url

```php
use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\PaymentsApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest;

$paymentsApiClient = new PaymentsApiClient($clientConfiguration);

$createPaymentEntity = new CreatePaymentRequest();

$createPaymentEntity
    ->setOrderId('1001')
    ->setAmount(100.5)
    ->setFee(10)
    ->setCurrency('EUR')
    ->setPaymentMethod(PaymentMethod::METHOD_SANTANDER_DE_INSTALLMENT)
    ->setSalutation('mr')
    ->setFirstName('John')
    ->setLastName('Doe')
    ->setCity('Hamburg')
    ->setCountry('DE')
    ->setZip('10111')
    ->setStreet('Awesome street, 10')
    ->setEmail('john.doe@example.com')
    ->setPhone('+450001122')
    ->setSuccessUrl('https://your.domain/success?paymentId=--PAYMENT-ID--')
    ->setCancelUrl('https://your.domain/checkout?reason=cancel')
    ->setFailureUrl('https://your.domain/checkout?reason=failure')
    ->setNoticeUrl('https://your.domain/async-payment-callback?paymentId=--PAYMENT-ID--')
;

try {
    $response = $paymentsApiClient->createPaymentRequest($createPaymentEntity);
    $responseEntity = $response->getResponseEntity();
    
    header(sprintf('Location: %s', $responseEntity->getRedirectUrl()), true);
    exit;
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

```

##### Retrieve payment details by id

```php
use Payever\Sdk\Payments\PaymentsApiClient;
use Payever\Sdk\Payments\Http\ResponseEntity\Result\PaymentResult;

$paymentId = '--PAYMENT-ID--';
$paymentsApiClient = new PaymentsApiClient($clientConfiguration);

try {
    $response = $paymentsApiClient->retrievePaymentRequest($paymentId);
    /** @var PaymentResult $payment */
    $payment = $response->getResponseEntity()->getResult();
    $status = $payment->getStatus();
} catch(\Exception $exception) {
    echo $exception->getMessage();
}
```

##### Cancel the payment by id

```php
use Payever\Sdk\Payments\PaymentsApiClient;
use Payever\Sdk\Payments\Action\ActionDecider;

$paymentId = '--PAYMENT-ID--';
$paymentsApiClient = new PaymentsApiClient($clientConfiguration);
$actionDecider = new ActionDecider($paymentsApiClient);

try {
    if ($actionDecider->isActionAllowed($paymentId, ActionDecider::ACTION_CANCEL, false)) {
        $paymentsApiClient->cancelPaymentRequest($paymentId);
    }
} catch(\Exception $exception) {
    echo $exception->getMessage();
}
```

##### Trigger Santander shipping-goods payment action 

```php
use Payever\Sdk\Payments\PaymentsApiClient;
use Payever\Sdk\Payments\Action\ActionDecider;

$paymentId = '--PAYMENT-ID--';
$paymentsApiClient = new PaymentsApiClient($clientConfiguration);
$actionDecider = new ActionDecider($paymentsApiClient);

try {
    if ($actionDecider->isActionAllowed($paymentId, ActionDecider::ACTION_SHIPPING_GOODS, false)) {
        $paymentsApiClient->shippingGoodsPaymentRequest($paymentId);
    }
} catch(\Exception $exception) {
    echo $exception->getMessage();
}
```

##### Get Company credit level

```php
use Payever\Sdk\Payments\PaymentsApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity;

$company = new CreditCompanyEntity();
$company->setExternalId('81981372');

$companySearchCredit = new CompanyCreditRequest();
$companySearchCredit->setCompany($company);

$paymentsApiClient = new PaymentsApiClient($clientConfiguration);
$result = $paymentsApiClient->companyCredit($companySearchCredit);
```

## License

Please see the [license file][6] for more information.

[1]: http://semver.org
[2]: http://www.php.net/
[3]: https://getcomposer.org
[4]: https://getcomposer.org/doc/00-intro.md
[5]: ../../releases
[6]: LICENSE.md
[7]: ../../issues
