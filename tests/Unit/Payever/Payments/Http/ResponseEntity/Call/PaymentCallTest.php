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
        'type' => 'create',
        'requires_2fa' => false,
    );

    public function getEntity()
    {
        return new PaymentCall();
    }
}
