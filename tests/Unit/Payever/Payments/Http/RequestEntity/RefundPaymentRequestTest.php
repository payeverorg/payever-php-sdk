<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\RefundPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class RefundPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\RefundPaymentRequest
 */
class RefundPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'amount' => 100,
    );

    public function getEntity()
    {
        return new RefundPaymentRequest();
    }
}
