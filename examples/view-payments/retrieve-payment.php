<?php

/**
 * Fetch details about a specific transaction.
 * See https://docs.payever.org/api/payments/v3/view-payments/retrieve-payment
 */

use Payever\Sdk\Payments\Http\ResponseEntity\RetrievePaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    /* Retrieve the payment details. */
    $paymentDetailsResponse = $paymentsApiClients->retrievePaymentRequest($paymentId);

    /** @var RetrievePaymentResponse $paymentDetailsResponseEntity */
    $paymentDetailsResponseEntity = $paymentDetailsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentDetailsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
