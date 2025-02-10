<?php

/**
 * Refund a transaction entirely.
 * See https://docs.payever.org/api/payments/v3/order-management/refund
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $totalAmount = 500;

    /* Send refund request. */
    $refundResponse = $paymentsApiClients->refundPaymentRequest($paymentId, $totalAmount);

    /** @var PaymentResponse $refundResponseEntity */
    $refundResponseEntity = $refundResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($refundResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
