<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\CancelPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class CancelPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\CancelPaymentRequest
 */
class CancelPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'amount' => 100,
    );

    public function getEntity()
    {
        return new CancelPaymentRequest();
    }
}
