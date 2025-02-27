<?php

/**
 * Capture a transaction partially.
 * See https://docs.payever.org/api/payments/v3/capture-payments/partial-capture
 */

use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';
    $amount = 100;

    $shippingGoodsRequest = new ShippingGoodsPaymentRequest();
    $shippingGoodsRequest->setAmount($amount);

    /* Send partial shipping goods request. */
    $shippingGoodsResponse = $paymentsApiClient->shippingGoodsPaymentRequest($paymentId, $shippingGoodsRequest);

    /** @var PaymentResponse $shippingGoodsResponseEntity */
    $shippingGoodsResponseEntity = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
