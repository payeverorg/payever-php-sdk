<?php

/**
 * Capture a transaction partially.
 * See https://docs.payever.org/api/payments/v3/capture-payments/partial-capture
 */

use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $amount = 100;

    $shippingGoodsRequest = new ShippingGoodsPaymentRequest();
    $shippingGoodsRequest->setAmount($amount);

    /* Send partial shipping goods request. */
    $shippingGoodsResponse = $paymentsApiClients->shippingGoodsPaymentRequest($paymentId, $shippingGoodsRequest);

    /** @var PaymentResponse $shippingGoodsResult */
    $shippingGoodsResult = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
