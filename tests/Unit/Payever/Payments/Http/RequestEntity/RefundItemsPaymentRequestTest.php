<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\RefundItemsPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class RefundItemsPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\RefundItemsPaymentRequest
 */
class RefundItemsPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'deliveryFee' => 100.1,
        'paymentItems' => [
            [
                'name' => 'Item 1',
                'identifier' => 'product1',
                'price' => 123.1,
                'quantity' => 1,
            ],
        ],
    );

    public function getEntity()
    {
        return new RefundItemsPaymentRequest();
    }
}
