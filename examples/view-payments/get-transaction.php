<?php

/**
 * Fetch details about a specific transaction.
 * See https://docs.payever.org/api/payments/v3/view-payments/retrieve-payment
 */

use Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';

    /* Retrieve the payment details. */
    $paymentDetailsResponse = $paymentsApiClient->getTransactionRequest($paymentId);

    /** @var GetTransactionResponse $paymentDetailsResponseEntity */
    $paymentDetailsResponseEntity = $paymentDetailsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentDetailsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
