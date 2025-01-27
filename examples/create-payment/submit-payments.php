<?php

/**
 * Creation of a new transaction without redirecting.
 * See https://docs.payever.org/api/payments/v3/create-payment/submit-payments
 */

use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\Enum\Salutation;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CompanyEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\DimensionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentV3Request;
use Payever\Sdk\Payments\Http\ResponseEntity\submitPaymentResponse;

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
        ->setBirthdate(date('c'));

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
        ->setFirstName('Stub')
        ->setLastName('Accepted')
        ->setCity('City')
        ->setRegion('Region')
        ->setZip('12345')
        ->setStreet('Street 1')
        ->setCountry('DE')
        ->setSalutation(Salutation::SALUTATION_MR)
        ->setOrganizationName('Company');

    $urls = new UrlsEntity();
    $urls
        ->setSuccess('http:://127.0.0.1/success')
        ->setPending('http:://127.0.0.1/pending')
        ->setFailure('http:://127.0.0.1/failure')
        ->setCancel('http:://127.0.0.1/cancel')
        ->setNotification('http:://127.0.0.1/notification');

    $shippingOptionEntity = new ShippingOptionEntity();
    $shippingOptionEntity
        ->setName('Shipping Carrier')
        ->setCarrier('carrier-id')
        ->setPrice(100)
        ->setTaxAmount(19)
        ->setTaxRate(19);

    $companyEntity = new CompanyEntity();
    $companyEntity->setName('Company');
    $companyEntity->setExternalId('external-id');

    $requestEntity = new SubmitPaymentV3Request();
    $requestEntity
        ->setChannel($channelEntity)
        ->setReference('reference-id')
        ->setPaymentMethod(PaymentMethod::METHOD_ALLIANZ_TRADE_B2B_BNPL)
        ->setClientIp('192.168.1.1')
        ->setPurchase($purchaseEntity)
        ->setCustomer($customerEntity)
        ->setCompany($companyEntity)
        ->setCart([$cartItem])
        ->setBillingAddress($addressEntity)
        ->setUrls($urls)
        ->setPaymentData(new PaymentDataEntity());

    /* Send submit payment v3 request. */
    $submitPaymentResponse = $paymentsApiClients->submitPaymentRequestV3($requestEntity);

    /** @var SubmitPaymentResponse $submitPaymentResult */
    $submitPaymentResult = $submitPaymentResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printText('Payment id: ' . $submitPaymentResult->getResult()->getId());
    ResultPrinter::printText('Payment status: ' . $submitPaymentResult->getResult()->getStatus());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
