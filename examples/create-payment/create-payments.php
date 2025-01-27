<?php

/**
 * Trigger a payment using a selected payment method.
 * See https://docs.payever.org/api/payments/v3/create-payment/create-payments
 */

use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\Enum\Salutation;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\DimensionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV3Request;
use Payever\Sdk\Payments\Http\ResponseEntity\CreatePaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

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
        ->setEmail('test@example.com')
        ->setPhone('123456789')
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

    // Add attributes
    $attributes = new AttributesEntity();
    $attributes->setWeight(10);

    $dimensions = new DimensionsEntity();
    $dimensions->setHeight(10);
    $dimensions->setWidth(10);
    $dimensions->setLength(10);

    if (!empty($dimensions->toArray())) {
        $attributes->setDimensions($dimensions);
    }

    if (!empty($attributes->toArray())) {
        $cartItem->setAttributes($attributes);
    }

    $addressEntity = new CustomerAddressV3Entity();
    $addressEntity
        ->setFirstName('Test')
        ->setLastName('Test')
        ->setCity('City')
        ->setRegion('Region')
        ->setZip('12345')
        ->setStreet('Street 1')
        ->setCountry('DE')
        ->setSalutation(Salutation::SALUTATION_MR)
        ->setOrganizationName('Company');

    $urls = new UrlsEntity();
    $urls
        ->setSuccess('http:://local-site.dev/success?paymentId=--PAYMENT-ID--')
        ->setPending('http:://local-site.dev/pending?paymentId=--PAYMENT-ID--')
        ->setFailure('http:://local-site.dev/failure?paymentId=--PAYMENT-ID--')
        ->setCancel('http:://local-site.dev/cancel?paymentId=--PAYMENT-ID--')
        ->setNotification('http:://local-site.dev/notification?paymentId=--PAYMENT-ID--');

    $shippingOptionEntity = new ShippingOptionEntity();
    $shippingOptionEntity
        ->setName('Shipping Carrier')
        ->setCarrier('carrier-id')
        ->setPrice(100)
        ->setTaxAmount(19)
        ->setTaxRate(19);

    $requestEntity = new CreatePaymentV3Request();
    $requestEntity
        ->setChannel($channelEntity)
        ->setReference('reference-id')
        ->setPaymentMethod(PaymentMethod::METHOD_SANTANDER_DE_INSTALLMENT)
        ->setPaymentMethod(PaymentMethod::METHOD_STRIPE_CREDIT_CARD)
        ->setClientIp('192.168.1.1')
        ->setPurchase($purchaseEntity)
        ->setCustomer($customerEntity)
        ->setCart([$cartItem])
        ->setBillingAddress($addressEntity)
        ->setUrls($urls)
        ->setPaymentData(new PaymentDataEntity());

    /* Send create payment v3 request. */
    $createPaymentResponse = $paymentsApiClients->createPaymentV3Request($requestEntity);

    /** @var CreatePaymentResponse $createPaymentResult */
    $createPaymentResult = $createPaymentResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printText('Checkout link: ' . $createPaymentResult->getRedirectUrl());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
