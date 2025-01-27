<?php

/**
 * Inform the insurance provider about partial payments made by customers.
 * See https://docs.payever.org/api/payments/v3/b2b-services/partial-settle-invoice
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $amount = 100;

    /* Send invoice request. */
    $invoiceResponse = $b2bApiClient->invoicePaymentRequest($paymentId, $amount);

    /** @var PaymentResponse $invoiceResult */
    $invoiceResult = $invoiceResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($invoiceResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
