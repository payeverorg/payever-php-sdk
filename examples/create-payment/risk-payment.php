<?php

/**
 * Retrieve Session Risk ID
 * See https://docs.payever.org/api/payments/v3/create-payment/submit-payments
 */

use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\Http\ResponseEntity\RiskPaymentResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $paymentMethod = PaymentMethod::METHOD_ZINIA_SLICE_THREE;

    /* Send risk payment request. */
    $riskPaymentResponse = $paymentsApiClient->riskPaymentRequest($paymentMethod);

    /** @var RiskPaymentResponse $riskPaymentResponseEntity */
    $riskPaymentResponseEntity = $riskPaymentResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printText('Risk org id: ' . $riskPaymentResponseEntity->getResult()->getRiskOrgId());
    ResultPrinter::printText('Risk session id: ' . $riskPaymentResponseEntity->getResult()->getRiskSessionId());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
