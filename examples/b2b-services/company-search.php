<?php

/**
 * Provides a comprehensive dataset for the identified business.
 * See https://docs.payever.org/api/payments/v3/b2b-services/company-search
 */

use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\SearchAddressEntity;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\SearchCompanyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CompanySearchRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\CompanySearchResponse;

try {
    /* Initialize the payever API library. */
    require_once '../bootstrap.php';

    $b2bApiClient = new B2BApiClient($clientConfiguration);

    $companySearch = 'test search text';

    $companySearchRequest = new CompanySearchRequest();

    $companySearchEntity = new SearchCompanyEntity();
    $companySearchEntity->setName($companySearch);
    $companySearchRequest->setCompany($companySearchEntity);

    $companyAddressEntity = new SearchAddressEntity();
    $companyAddressEntity->setCountry('DE');
    $companySearchRequest->setAddress($companyAddressEntity);

    /* Send company search request. */
    $companySearchResponse = $b2bApiClient->searchCompany($companySearchRequest);

    /** @var CompanySearchResponse $companySearchResult */
    $companySearchResult = $companySearchResponse->getResponseEntity();

    ResultPrinter::printText('API call result:');
    ResultPrinter::printResultEntity($companySearchResult->getResult());
} catch (\Exception $e) {
    ResultPrinter::printError('API call failed: ' . $e->getMessage());
}
