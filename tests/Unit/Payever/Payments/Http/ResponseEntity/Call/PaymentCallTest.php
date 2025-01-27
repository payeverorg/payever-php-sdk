<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\PaymentCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class PaymentCallTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Call\PaymentCall;
 */
class PaymentCallTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'payment_id' => 'stub_id',
        'customer_id' => 'stub_customer_id',
        'invoice_id' => 'stub_invoice_id',
        'invoice_date' => self::DEFAULT_STUB_DATE,
        'type' => 'create',
        'message' => 'OK',
    );

    public function getEntity()
    {
        return new PaymentCall();
    }
}
