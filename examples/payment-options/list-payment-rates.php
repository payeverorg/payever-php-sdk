<?php

/**
 * Provide rate calculations.
 * See https://docs.payever.org/api/payments/v3/payment-options/list-payment-rates
 */

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $variantId = 'payment-method-variant-id';
    $amount = 1000;
    $downpayment = 100;

    /* Get the all payment rates. */
    $paymentRatesResponse = $paymentsApiClient->listPaymentRatesRequest($variantId, $amount, $downpayment);

    /** @var ListPaymentRatesResponse $paymentRatesResponseEntity */
    $paymentRatesResponseEntity = $paymentRatesResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($paymentRatesResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
