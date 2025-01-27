<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentsResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call\ListPaymentsCallTest;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\ListPaymentsResultTest;

/**
 * Class ListPaymentsResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentsResponse
 */
class ListPaymentsResponseTest extends AbstractResponseEntityTestCase
{
    protected static $scheme = array(
        'redirect_url' => 'https://sandbox.payever.de/some/path',
        'call' => array(),
        'result' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['call'] = ListPaymentsCallTest::getScheme();
        $scheme['result'] = array(
            ListPaymentsResultTest::getScheme(),
        );

        return $scheme;
    }

    public function getEntity()
    {
        return new ListPaymentsResponse();
    }
}
