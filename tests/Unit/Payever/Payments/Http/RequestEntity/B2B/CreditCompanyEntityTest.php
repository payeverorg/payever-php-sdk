<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity\B2B;

use Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CreditCompanyEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity
 */
class CreditCompanyEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'external_id' => '81981372',
    );

    public function getEntity()
    {
        return new CreditCompanyEntity();
    }
}
