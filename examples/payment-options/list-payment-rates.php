<?php

/**
 * Provide rate calculations.
 * See https://docs.payever.org/api/payments/v3/payment-options/list-payment-rates
 */

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $variantId = 'payment-method-variant-id';
    $amount = 200;
    $downpayment = 100;

    /* Get the all payment rates. */
    $paymentRatesResponse = $paymentsApiClients->listPaymentRatesRequest($variantId, $amount, $downpayment);

    /** @var \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResponse $paymentRatesResult */
    $paymentRatesResult = $paymentRatesResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentRatesResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
