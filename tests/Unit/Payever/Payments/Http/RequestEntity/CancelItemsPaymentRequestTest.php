<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\CancelItemsPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class CancelItemsPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\CancelItemsPaymentRequest
 */
class CancelItemsPaymentRequestTest extends AbstractRequestEntityTestCase
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
        return new CancelItemsPaymentRequest();
    }
}
