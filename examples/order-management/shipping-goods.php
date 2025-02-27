<?php

/**
 * Capture a transaction entirely.
 * See https://docs.payever.org/api/payments/v3/capture-payments/shipping-goods
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';

    /* Send shipping goods request. */
    $shippingGoodsResponse = $paymentsApiClient->shippingGoodsPaymentRequest($paymentId);

    /** @var PaymentResponse $shippingGoodsResponseEntity */
    $shippingGoodsResponseEntity = $shippingGoodsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($shippingGoodsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
