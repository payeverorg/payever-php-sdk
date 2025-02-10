<?php

/**
 * Capture a transaction entirely.
 * See https://docs.payever.org/api/payments/v3/capture-payments/shipping-goods
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    /* Send shipping goods request. */
    $shippingGoodsResponse = $paymentsApiClients->shippingGoodsPaymentRequest($paymentId);

    /** @var PaymentResponse $shippingGoodsResponseEntity */
    $shippingGoodsResponseEntity = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
