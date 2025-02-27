<?php

/**
 * Send modify reference request of POS transaction.
 * See https://docs.payever.org/api/payments/v3/pos-services/update-reference
 */

use Payever\Sdk\Payments\Enum\PaymentMethod;
use Payever\Sdk\Payments\POSApiClient;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $posApiClients = new POSApiClient($clientConfiguration);

    $paymentMethod = PaymentMethod::METHOD_SANTANDER_DE_INSTALLMENT;
    $paymentId = '--PAYMENT-ID--';
    $filePath = __DIR__ . '/contract.pdf';

    /* Send update reference request. */
    $posApiClients->downloadContractRequest($paymentMethod, $paymentId, $filePath);

    ResultPrinter::printText('API call success');
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
