<?php

/**
 * Retrieves information about multiple transactions.
 * See https://docs.payever.org/api/payments/v3/view-payments/list-payments
 */

use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\Enum\Status;
use Payever\Sdk\Payments\Http\RequestEntity\ListPaymentsRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentsResponse;
use Payever\Sdk\Payments\PaymentsApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentsApiClient = new PaymentsApiClient($clientConfiguration);

    $listPaymentsRequest = new ListPaymentsRequest();
    $listPaymentsRequest->setState(Status::STATUS_IN_PROCESS);
    $listPaymentsRequest->setPaymentMethod(PaymentMethod::METHOD_SANTANDER_DK_INSTALLMENT);
    $listPaymentsRequest->setLimit(10);
    $listPaymentsRequest->setCurrency('EUR');
    $listPaymentsRequest->setDate(date('Y-m-d'));

    /* Get the all payments list. */
    $listPaymentsResponse = $paymentsApiClient->listPaymentsRequest($listPaymentsRequest);

    /** @var ListPaymentsResponse $listPaymentsResponseEntity */
    $listPaymentsResponseEntity = $listPaymentsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($listPaymentsResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
