<?php

/**
 * Cancel a transaction partially.
 * See https://docs.payever.org/api/payments/v3/order-management/partial-cancel
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

    /* Send partial items cancel request. */
    $cancelResponse = $paymentsApiClients->cancelItemsPaymentRequest($paymentId, [$paymentEntity], $deliveryFee);

    /** @var PaymentResponse $cancelResponseEntity */
    $cancelResponseEntity = $cancelResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($cancelResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
