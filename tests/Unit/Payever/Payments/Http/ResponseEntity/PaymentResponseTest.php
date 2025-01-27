<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\PaymentCallTest;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\PaymentResultTest;

/**
 * Class PaymentResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse
 */
class PaymentResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'call' => PaymentCallTest::getScheme(),
            'result' => PaymentResultTest::getScheme(),
        );
    }

    public function getEntity()
    {
        return new PaymentResponse();
    }
}
