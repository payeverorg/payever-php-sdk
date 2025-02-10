<?php

/**
 * Adjust the amount of a transaction.
 * See https://docs.payever.org/api/payments/v3/order-management/edit
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $amount = 600;

    /* Send edit request. */
    $editResponse = $paymentsApiClients->editPaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $editResponseEntity */
    $editResponseEntity = $editResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($editResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
