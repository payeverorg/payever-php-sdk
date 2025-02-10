<?php

/**
 * Inform the insurance provider that the business customer has fully settled the amount.
 * See https://docs.payever.org/api/payments/v3/b2b-services/settle-invoice
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    /* Send settle request. */
    $settleResponse = $b2bApiClient->settlePaymentRequest($paymentId);

    /** @var PaymentResponse $settleResponseEntity */
    $settleResponseEntity = $settleResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($settleResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
