<?php

/**
 * Refund a transaction partially.
 * See https://docs.payever.org/api/payments/v3/order-management/partial-refund
 */

use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $paymentId = 'c433798a-78c3-4778-92ae-bdc6322d4a54';
    $deliveryFee = 100;

    $paymentEntity = new PaymentItemEntity();
    $paymentEntity
        ->setIdentifier('product-1')
        ->setName('Product 1')
        ->setPrice(100)
        ->setQuantity(1);

    /* Send partial items refund request. */
    $refundResponse = $paymentsApiClients->refundItemsPaymentRequest($paymentId, [$paymentEntity], $deliveryFee);

    /** @var PaymentResponse $refundResponseEntity */
    $refundResponseEntity = $refundResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($refundResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
