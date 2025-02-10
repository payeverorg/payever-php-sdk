<?php

/**
 * Cancel a transaction entirely.
 * See https://docs.payever.org/api/payments/v3/order-management/cancel
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    /* Send cancel request. */
    $cancelResponse = $paymentsApiClients->cancelPaymentRequest($paymentId);

    /** @var PaymentResponse $cancelResponseEntity */
    $cancelResponseEntity = $cancelResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($cancelResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
