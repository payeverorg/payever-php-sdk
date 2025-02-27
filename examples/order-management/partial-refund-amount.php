<?php

/**
 * Refund a transaction partially.
 * See https://docs.payever.org/api/payments/v3/order-management/partial-refund
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';
    $amount = 100;

    /* Send partial amount refund request. */
    $refundResponse = $paymentsApiClient->refundPaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $refundResponseEntity */
    $refundResponseEntity = $refundResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($refundResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
