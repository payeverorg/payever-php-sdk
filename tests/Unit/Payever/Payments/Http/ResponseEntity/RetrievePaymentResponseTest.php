<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\RetrievePaymentResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\PaymentResultTest;

/**
 * Class RetrievePaymentResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\RetrievePaymentResponse
 */
class RetrievePaymentResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'result' => PaymentResultTest::getScheme(),
        );
    }

    public function getEntity()
    {
        return new RetrievePaymentResponse();
    }
}
