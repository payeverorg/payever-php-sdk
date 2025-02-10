<?php

/**
 * Send verify request to inform payever that the merchant has verified.
 * See https://docs.payever.org/api/payments/v3/pos-services/verify
 */

use Payever\Sdk\Payments\Http\MessageEntity\Payment\SellerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\VerifyPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\POSApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $posApiClients = new POSApiClient($clientConfiguration);

    $paymentId = 'some-pos-payment-id';

    $sellerEntity = new SellerEntity();
    $sellerEntity->setId('some-seller-id');
    $sellerEntity->setEmail('email@email.com');
    $sellerEntity->setFirstName('Test');
    $sellerEntity->setLastName('Test');

    $verifyEntity = new VerifyEntity();
    $verifyEntity->setType('id');
    $verifyEntity->setTwoFactor('sms');

    $verifyPaymentRequest = new VerifyPaymentRequest();
    $verifyPaymentRequest->setCode(12345);
    $verifyPaymentRequest->setVerified(false);
    $verifyPaymentRequest->setSeller($sellerEntity);
    $verifyPaymentRequest->setVerify($verifyEntity);

    /* Send verify request. */
    $verifyResponse = $posApiClients->verifyPaymentRequest($paymentId, $verifyPaymentRequest);

    /** @var PaymentResponse $verifyResponseEntity */
    $verifyResponseEntity = $verifyResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($verifyResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
