<?php

/**
 * Provide rate calculations.
 * See https://docs.payever.org/api/payments/v3/payment-options/list-payment-rates
 */

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $variantId = 'payment-method-variant-id';
    $amount = 200;
    $downpayment = 100;

    /* Get the all payment rates. */
    $paymentRatesResponse = $paymentsApiClients->listPaymentRatesRequest($variantId, $amount, $downpayment);

    /** @var ListPaymentRatesResponse $paymentRatesResponseEntity */
    $paymentRatesResponseEntity = $paymentRatesResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentRatesResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
