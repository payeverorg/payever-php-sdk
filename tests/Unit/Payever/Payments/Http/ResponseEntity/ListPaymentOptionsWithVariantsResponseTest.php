<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsWithVariantsResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\ListPaymentOptionsCallTest;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\ListPaymentOptionsVariantsResultTest;

/**
 * Class ListPaymentOptionsWithVariantsResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsWithVariantsResponse
 */
class ListPaymentOptionsWithVariantsResponseTest extends AbstractMessageEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'call' => ListPaymentOptionsCallTest::getScheme(),
            'result' => array(
                ListPaymentOptionsVariantsResultTest::getScheme(),
            ),
        );
    }
    public function getEntity()
    {
        return new ListPaymentOptionsWithVariantsResponse();
    }
}
