# payever PHP SDK
[![Latest Stable Version](https://poser.pugx.org/payeverorg/payever-php-sdk/v/stable)](https://packagist.org/packages/payeverorg/payever-php-sdk)
[![Total Downloads](https://poser.pugx.org/payeverorg/payever-php-sdk/downloads)](https://packagist.org/packages/payeverorg/payever-php-sdk)
[![License](https://poser.pugx.org/payeverorg/payever-php-sdk/license)](https://packagist.org/packages/payeverorg/payever-php-sdk)

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
use Payever\Sdk\Payments\Enum\Salutation;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV3Request;

$channelEntity = new ChannelEntity();
$channelEntity->setName('api');

$purchaseEntity = new PurchaseEntity();
$purchaseEntity
    ->setAmount(500)
    ->setDeliveryFee(100)
    ->setCurrency('EUR');

$customerEntity = new CustomerEntity();
$customerEntity
    ->setType('person')
    ->setEmail('john.doe@example.com')
    ->setPhone('+450001122')
    ->setBirthdate('1990-01-01');

$cartItem = new CartItemV3Entity();
$cartItem
    ->setName('Product 1')
    ->setIdentifier('product-1')
    ->setSku('product-1')
    ->setUnitPrice(100)
    ->setTaxRate(19)
    ->setTotalAmount(400)
    ->setTotalTaxAmount(19)
    ->setQuantity(4)
    ->setDescription('product 1 description')
    ->setImageUrl('product-1.jpg')
    ->setProductUrl('product-1')
    ->setCategory('category');

$addressEntity = new CustomerAddressV3Entity();
$addressEntity
    ->setSalutation(Salutation::SALUTATION_MR)
    ->setFirstName('John')
    ->setLastName('Doe')
    ->setCity('Hamburg')
    ->setRegion('Region')
    ->setZip('10111')
    ->setStreet('Awesome street, 10')
    ->setCountry('DE')
    ->setOrganizationName('Company');

$urls = new UrlsEntity();
$urls
    ->setSuccess('http::///your.domain/success?paymentId=--PAYMENT-ID--')
    ->setPending('http::///your.domain/pending?paymentId=--PAYMENT-ID--')
    ->setFailure('http::///your.domain/failure')
    ->setCancel('http::///your.domain/cancel')
    ->setNotification('http::///your.domain/notification?paymentId=--PAYMENT-ID--');

$requestEntity = new CreatePaymentV3Request();
$requestEntity
    ->setChannel($channelEntity)
    ->setReference('1001')
    ->setPaymentMethod(PaymentMethod::METHOD_SANTANDER_DE_INSTALLMENT)
    ->setClientIp('192.168.1.1')
    ->setPurchase($purchaseEntity)
    ->setCustomer($customerEntity)
    ->setCart([$cartItem])
    ->setBillingAddress($addressEntity)
    ->setUrls($urls);

try {
    $createPaymentRequest = $paymentsApiClients->createPaymentV3Request($requestEntity);
    $createPaymentResponse = $createPaymentRequest->getResponseEntity();

    header(sprintf('Location: %s', $createPaymentResponse->getRedirectUrl()), true);
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
use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity;

$company = new CreditCompanyEntity();
$company->setExternalId('81981372');

$companyCreditRequest = new CompanyCreditRequest();
$companyCreditRequest->setCompany($company);

$b2bApiClient = new B2BApiClient($clientConfiguration);
$result = $b2bApiClient->companyCreditRequest($companyCreditRequest);
```

## License

Please see the [license file][6] for more information.

[1]: http://semver.org
[2]: http://www.php.net/
[3]: https://getcomposer.org
[4]: https://getcomposer.org/doc/00-intro.md
[5]: ../../releases
[6]: LICENSE
[7]: ../../issues
