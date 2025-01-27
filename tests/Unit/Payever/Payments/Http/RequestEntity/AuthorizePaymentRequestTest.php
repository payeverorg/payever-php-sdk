<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\AuthorizePaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class AuthorizePaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\AuthorizePaymentRequest
 */
class AuthorizePaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'customer_id' => 'stub_customer_id',
        'invoice_id' => 'stub_invoice_id',
        'invoice_date' => self::DEFAULT_STUB_DATE,
    );

    public function getEntity()
    {
        return new AuthorizePaymentRequest();
    }
}
