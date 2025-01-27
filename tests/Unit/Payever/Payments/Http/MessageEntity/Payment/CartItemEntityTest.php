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
        'price_netto' => 90,
        'price_net' => 90,
        'vat_rate' => 10.55,
    );

    public function getEntity()
    {
        return new CartItemEntity();
    }
}
