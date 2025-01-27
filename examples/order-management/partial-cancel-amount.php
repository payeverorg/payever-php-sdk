<?php

/**
 * Cancel a transaction partially.
 * See https://docs.payever.org/api/payments/v3/order-management/partial-cancel
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $amount = 100;

    /* Send partial amount cancel request. */
    $cancelResponse = $paymentsApiClients->cancelPaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $cancelResult */
    $cancelResult = $cancelResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($cancelResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
