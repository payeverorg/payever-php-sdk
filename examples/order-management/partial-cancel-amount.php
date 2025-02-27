<?php

/**
 * Cancel a transaction partially.
 * See https://docs.payever.org/api/payments/v3/order-management/partial-cancel
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';
    $amount = 100;

    /* Send partial amount cancel request. */
    $cancelResponse = $paymentsApiClient->cancelPaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $cancelResponseEntity */
    $cancelResponseEntity = $cancelResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($cancelResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
