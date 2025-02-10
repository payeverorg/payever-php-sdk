<?php

/**
 * Provides information about the credit limits for a specific company.
 * See https://docs.payever.org/api/payments/v3/b2b-services/check-credit-line
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\CompanyCreditResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $externalId = 'external-id';

    $company = new CreditCompanyEntity();
    $company->setExternalId($externalId);

    $companyCreditRequest = new CompanyCreditRequest();
    $companyCreditRequest->setCompany($company);

    /* Send company credit line request. */
    $companyCreditResponse = $b2bApiClient->companyCreditRequest($companyCreditRequest);

    /** @var CompanyCreditResponse $companyCreditResponseEntity */
    $companyCreditResponseEntity = $companyCreditResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($companyCreditResponseEntity->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
