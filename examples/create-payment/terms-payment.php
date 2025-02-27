<?php

/**
 * Retrieve Session Risk ID
 * See https://docs.payever.org/api/payments/v3/create-payment/submit-payments
 */

use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\RequestEntity\TermsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\TermsPaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentMethodId = 'some-payment-method-variant-id';

    $channelEntity = new ChannelEntity();
    $channelEntity->setName('pos');
    $channelEntity->setType('self_checkout');

    $termsPaymentRequest = new TermsPaymentRequest();
    $termsPaymentRequest->setChannel($channelEntity);

    /* Send terms payment request. */
    $termsPaymentResponse = $paymentsApiClient->termsPaymentRequest($paymentMethodId, $termsPaymentRequest);

    /** @var TermsPaymentResponse $termsPaymentResponseEntity */
    $termsPaymentResponseEntity = $termsPaymentResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printText('Legal text: ' . $termsPaymentResponseEntity->getResult()->getLegalText());
    ResultPrinter::printResultEntity($termsPaymentResponseEntity->getResult()->getForm());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
