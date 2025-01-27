<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\InvoicePaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class InvoicePaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\InvoicePaymentRequest
 */
class InvoicePaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'amount' => 100,
    );

    public function getEntity()
    {
        return new InvoicePaymentRequest();
    }
}
