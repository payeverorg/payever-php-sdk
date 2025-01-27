<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Payments\Http\ResponseEntity\Result\PaymentResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment\AddressEntityTest;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment\CartItemEntityTest;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\PaymentDetailsEntityTest;

/**
 * Class PaymentResultTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Result\PaymentResult
 */
class PaymentResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'status' => 'success',
        'specific_status' => 'success',
        'merchant_name' => 'stub_merchant',
        'customer_name' => 'stub_customer',
        'customer_email' => 'test@example.com',
        'payment_type' => 'sofort',
        'created_at' => self::DEFAULT_STUB_DATE,
        'updated_at' => self::DEFAULT_STUB_DATE,
        'channel' => 'stub_channel',
        'channel_type' => 'stub_channel_type',
        'channel_source' => 'stub_channel_source',
        'reference' => 'stub_reference',
        'amount' => 100.5,
        'total' => 110.5,
        'currency' => 'EUR',
        'delivery_fee' => 10,
        'payment_fee' => 0,
        'down_payment' => 0,
        'payment_details' => array(),
        'payment_details_array' => array(),
        'address' => array(),
        'shipping_address' => array(),
        'items' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['address'] = AddressEntityTest::getScheme();
        $scheme['payment_details'] = PaymentDetailsEntityTest::getScheme();
        $scheme['items'] = [CartItemEntityTest::getScheme()];

        return $scheme;
    }

    public function getEntity()
    {
        return new PaymentResult();
    }
}
