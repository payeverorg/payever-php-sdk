<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CartItemEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity
 */
class CartItemEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'name' => 'stub_name',
        'price' => 100.55,
        'quantity' => 2,
        'description' => 'stub_description',
        'thumbnail' => 'stub',
        'sku' => 'stub_sku',
        'priceNetto' => 90,
        'priceNet' => 90,
        'vatRate' => 10.55,
    );

    public function getEntity()
    {
        return new CartItemEntity();
    }
}
