<?php

/**
 * Creation of a new transaction without redirecting.
 * See https://docs.payever.org/api/payments/v3/create-payment/submit-payments
 */

use Payever\Sdk\Core\Enum\ChannelSet;
use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\Enum\Salutation;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CompanyEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\DimensionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\submitPaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $channelEntity = new ChannelEntity();
    $channelEntity->setName(ChannelSet::CHANNEL_API);

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

    $cartItem = new CartItemEntity();
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

    $addressEntity = new CustomerAddressEntity();
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
        ->setSuccess('http:://your.domain/success')
        ->setPending('http:://your.domain/pending')
        ->setFailure('http:://your.domain/failure')
        ->setCancel('http:://your.domain/cancel')
        ->setNotification('http:://your.domain/notification');

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

    $requestEntity = new SubmitPaymentRequest();
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

    /* Send submit payment request. */
    $submitPaymentResponse = $paymentsApiClient->submitPaymentRequest($requestEntity);

    /** @var SubmitPaymentResponse $submitPaymentResponseEntity */
    $submitPaymentResponseEntity = $submitPaymentResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printText('Payment id: ' . $submitPaymentResponseEntity->getResult()->getId());
    ResultPrinter::printText('Payment status: ' . $submitPaymentResponseEntity->getResult()->getStatus());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
