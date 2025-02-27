<?php

/**
 * Adjust the amount of a transaction.
 * See https://docs.payever.org/api/payments/v3/order-management/edit
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';
    $amount = 600;

    /* Send edit request. */
    $editResponse = $paymentsApiClient->editPaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $editResponseEntity */
    $editResponseEntity = $editResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($editResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
