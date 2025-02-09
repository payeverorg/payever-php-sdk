<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentsResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment\AddressEntityTest;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\PaymentDetailsEntityTest;

/**
 * Class ListPaymentsResultTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentsResult
 */
class ListPaymentsResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'status' => 'active',
        'color_state' => 'yellow',
        'merchant_name' => 'stub_merchant',
        'customer_name' => 'stub_customer',
        'payment_type' => 'sofort',
        'created_at' => self::DEFAULT_STUB_DATE,
        'updated_at' => self::DEFAULT_STUB_DATE,
        'channel' => 'jtl',
        'reference' => 'stub_reference',
        'amount' => 200,
        'fee' => 20.5,
        'total' =>  220.5,
        'address' => array(),
        'payment_details' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['address'] = AddressEntityTest::getScheme();
        $scheme['payment_details'] = PaymentDetailsEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new ListPaymentsResult();
    }
}
