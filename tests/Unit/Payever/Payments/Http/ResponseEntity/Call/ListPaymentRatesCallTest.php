<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentRatesCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class ListPaymentRatesCallTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentRatesCall
 */
class ListPaymentRatesCallTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'status' => 'success',
        'type' => 'rates',
        'id' => 'id',
        'created_at' => self::DEFAULT_STUB_DATE,
    );

    public function getEntity()
    {
        return new ListPaymentRatesCall();
    }
}
