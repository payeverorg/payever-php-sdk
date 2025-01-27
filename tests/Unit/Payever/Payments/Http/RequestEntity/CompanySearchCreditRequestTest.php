<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\RequestEntity\B2B\CreditCompanyEntityTest;

/**
 * Class CompanySearchCreditRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest
 */
class CompanySearchCreditRequestTest extends AbstractRequestEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'company' => CreditCompanyEntityTest::getScheme(),
        );
    }

    public function getEntity()
    {
        return new CompanyCreditRequest();
    }
}
