<?php

/**
 * Provides a list of available payment options in your payever account.
 * See https://docs.payever.org/api/payments/v3/payment-options/list-payment-options
 */

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    /* Get the all payment options. */
    $paymentOptionsResponse = $paymentsApiClients->listPaymentOptionsWithVariantsRequest();

    /** @var ListPaymentOptionsResponse $paymentOptionsResponseEntity */
    $paymentOptionsResponseEntity = $paymentOptionsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentOptionsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}