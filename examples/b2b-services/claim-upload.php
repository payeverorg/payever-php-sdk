<?php

/**
 * Submit evidence to the insurance regarding an unpaid invoice.
 * See https://docs.payever.org/api/payments/v3/b2b-services/upload-claim
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';

    $uploadPaymentRequest = new ClaimUploadPaymentRequest();
    $uploadPaymentRequest->setFileName('filename');
    $uploadPaymentRequest->setBase64Content(base64_encode('file-content'));
    $uploadPaymentRequest->setMimeType('application/pdf');
    $uploadPaymentRequest->setDocumentType(ClaimUploadPaymentRequest::DOCUMENT_TYPE_INVOICE);

    /* Send claim upload request. */
    $claimUploadResponse = $b2bApiClient->claimUploadPaymentRequest($paymentId, $uploadPaymentRequest);

    /** @var PaymentResponse $claimUploadResponseEntity */
    $claimUploadResponseEntity = $claimUploadResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($claimUploadResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
