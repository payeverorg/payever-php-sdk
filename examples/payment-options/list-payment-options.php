<?php

/**
 * Provides a list of available payment options in your payever account.
 * See https://docs.payever.org/api/payments/v3/payment-options/list-payment-options
 */

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    /* Get the all payment options. */
    $paymentOptionsResponse = $paymentsApiClients->listPaymentOptionsWithVariantsRequest();

    /** @var \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsResponse $paymentOptionsResult */
    $paymentOptionsResult = $paymentOptionsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentOptionsResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}