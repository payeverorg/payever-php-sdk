<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\ListPaymentOptionsCallTest;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\ListPaymentOptionsResultTest;

/**
 * Class ListPaymentOptionsResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsResponse
 */
class ListPaymentOptionsResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'call' => ListPaymentOptionsCallTest::getScheme(),
            'result' => array(
                ListPaymentOptionsResultTest::getScheme(),
            ),
        );
    }

    public function getEntity()
    {
        return new ListPaymentOptionsResponse();
    }
}
