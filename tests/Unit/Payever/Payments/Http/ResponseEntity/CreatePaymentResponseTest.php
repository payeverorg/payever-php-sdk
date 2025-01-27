<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\CreatePaymentResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\CreatePaymentCallTest;

/**
 * Class CreatePaymentResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\CreatePaymentResponse
 */
class CreatePaymentResponseTest extends AbstractResponseEntityTestCase
{
    protected static $scheme = array(
        'redirect_url' => 'https://sandbox.payver.de/pay/id',
        'call' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['call'] = CreatePaymentCallTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new CreatePaymentResponse();
    }
}
