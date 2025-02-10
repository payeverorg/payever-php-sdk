<?php

/**
 * Send modify reference request of POS transaction.
 * See https://docs.payever.org/api/payments/v3/pos-services/update-reference
 */

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\POSApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $posApiClients = new POSApiClient($clientConfiguration);

    $paymentId = 'some-pos-payment-id';
    $reference = 'some-reference';

    /* Send update reference request. */
    $updateReferenceResponse = $posApiClients->updateReferenceRequest($paymentId, $reference);

    /** @var PaymentResponse $updateReferenceResponseEntity */
    $updateReferenceResponseEntity = $updateReferenceResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($updateReferenceResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
