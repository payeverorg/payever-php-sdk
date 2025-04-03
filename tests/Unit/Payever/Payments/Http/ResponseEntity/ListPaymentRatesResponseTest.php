<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\ListPaymentRatesResultTest;

/**
 * Class ListPaymentRatesResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResultEntity
 */
class ListPaymentRatesResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'result' => [
                ListPaymentRatesResultTest::getScheme(),
            ],
        );
    }

    public function getEntity()
    {
        return new ListPaymentRatesResponse();
    }
}
