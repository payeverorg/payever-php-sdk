<?php
namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\PaymentCallResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\PaymentCallTest;

/**
 * Class PaymentCallResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\PaymentCallResponse
 */
class PaymentCallResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'call' => PaymentCallTest::getScheme(),
        );
    }

    public function getEntity()
    {
        return new PaymentCallResponse();
    }
}
