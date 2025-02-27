<?php

/**
 * Notify the insurance company that they have not received payment from the business customer.
 * See https://docs.payever.org/api/payments/v3/b2b-services/claim-invoice
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $paymentId = '--PAYMENT-ID--';

    $claimPaymentRequest = new ClaimPaymentRequest();
    $claimPaymentRequest->setIsDisputed(false);
    $claimPaymentRequest->setIsLegal(false);

    /* Send claim request. */
    $claimResponse = $b2bApiClient->claimPaymentRequest($paymentId, $claimPaymentRequest);

    /** @var PaymentResponse $claimResponseEntity */
    $claimResponseEntity = $claimResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($claimResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
