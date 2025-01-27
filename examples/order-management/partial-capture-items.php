<?php

/**
 * Capture a transaction partially.
 * See https://docs.payever.org/api/payments/v3/capture-payments/partial-capture
 */

use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\RequestEntity\Action\ShippingDetailsEntity;
use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    $paymentEntity = new PaymentItemEntity();
    $paymentEntity
        ->setIdentifier('28')
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
    $shippingGoodsResponse = $paymentsApiClients->shippingGoodsPaymentRequest($paymentId, $shippingGoodsRequest);

    /** @var PaymentResponse $shippingGoodsResult */
    $shippingGoodsResult = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
