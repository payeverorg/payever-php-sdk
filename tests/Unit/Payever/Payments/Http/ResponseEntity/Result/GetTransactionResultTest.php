<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Payments\Http\ResponseEntity\Result\GetTransactionResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment\AddressEntityTest;

/**
 * Class GetTransactionResultTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Result\GetTransactionResult
 */
class GetTransactionResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub_id',
        'status' => 'success',
        'specific_status' => 'pending',
        'merchant_name' => 'stub_name',
        'customer_name' => 'stub_customer',
        'payment_type' => 'stripe',
        'customer_email' => 'test@domain.com',
        'created_at' => self::DEFAULT_STUB_DATE,
        'updated_at' => self::DEFAULT_STUB_DATE,
        'channel' => 'shopware',
        'reference' => 'stub_reference',
        'amount' => 200,
        'currency' => 'EUR',
        'fee' => 0,
        'total' => 200,
        'address' => array(),
        'shipping_address' => array(),
        'payment_details_array' => array(),
        'delivery_fee' => 10,
        'payment_fee' => 0,
        'down_payment' => 0,
        'actions' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['address'] = AddressEntityTest::getScheme();
        $scheme['shipping_address'] = AddressEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new GetTransactionResult();
    }
}
