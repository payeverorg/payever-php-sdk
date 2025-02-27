<?php

/**
 * Capture a transaction partially.
 * See https://docs.payever.org/api/payments/v3/capture-payments/partial-capture
 */

use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\RequestEntity\Action\ShippingDetailsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';

    $paymentEntity = new PaymentItemEntity();
    $paymentEntity
        ->setIdentifier('product-1')
        ->setName('Product 1')
        ->setPrice(100)
        ->setQuantity(1);

    $shippingDetails = new ShippingDetailsEntity();
    $shippingDetails
        ->setReturnCarrier('Carrier Name')
        ->setReturnTrackingNumber('return-tracking-number')
        ->setReturnTrackingUrl('return-tracking-url')
        ->setShippingCarrier('Carrier Name')
        ->setShippingDate(date('Y-m-d'))
        ->setShippingMethod('Shipping Method')
        ->setTrackingNumber('tracking-number')
        ->setTrackingUrl('tracking-url');

    $shippingGoodsRequest = new ShippingGoodsPaymentRequest();
    $shippingGoodsRequest
        ->setPaymentItems([$paymentEntity])
        ->setDeliveryFee(100)
        ->setShippingDetails($shippingDetails);

    /* Send partial shipping goods request. */
    $shippingGoodsResponse = $paymentsApiClient->shippingGoodsPaymentRequest($paymentId, $shippingGoodsRequest);

    /** @var PaymentResponse $shippingGoodsResponseEntity */
    $shippingGoodsResponseEntity = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
