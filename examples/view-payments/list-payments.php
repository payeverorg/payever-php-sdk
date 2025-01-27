<?php

/**
 * Retrieves information about multiple transactions.
 * See https://docs.payever.org/api/payments/v3/view-payments/list-payments
 */

use Payever\Sdk\Payments\Enum\Status;
use Payever\Sdk\Payments\Http\RequestEntity\ListPaymentsRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\RetrievePaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $listPaymentsRequest = new ListPaymentsRequest();
    $listPaymentsRequest->setState(Status::STATUS_IN_PROCESS);
    $listPaymentsRequest->setLimit(10);
    $listPaymentsRequest->setCurrency('EUR');
    $listPaymentsRequest->setDate(date('Y-m-d'));

    /* Get the all payments list. */
    $listPaymentsResponse = $paymentsApiClients->listPaymentsRequest($listPaymentsRequest);

    /** @var RetrievePaymentResponse $listPaymentsResult */
    $listPaymentsResult = $listPaymentsResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($listPaymentsResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
