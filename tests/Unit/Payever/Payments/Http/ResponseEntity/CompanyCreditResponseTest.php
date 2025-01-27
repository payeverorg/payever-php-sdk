<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\CompanyCreditResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;

/**
 * Class CompanyCreditResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\CompanyCreditResponse
 */
class CompanyCreditResponseTest extends AbstractResponseEntityTestCase
{
    protected static $scheme = array(
        'buyerId' => '81981372',
        'maximum' => 100000,
        'maxInvoiceAmount' => 30000,
        'currency' => 'EUR',
    );

    public static function getScheme()
    {
        return static::$scheme;
    }

    public function getEntity()
    {
        return new CompanyCreditResponse();
    }
}
