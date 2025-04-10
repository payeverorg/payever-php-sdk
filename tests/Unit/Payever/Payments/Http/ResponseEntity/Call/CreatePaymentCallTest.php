<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\CreatePaymentCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment\CartItemEntityTest;

/**
 * Class CreatePaymentCallTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Call\CreatePaymentCall
 */
class CreatePaymentCallTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'channel' => 'shopware',
        'amount' => 100,
        'fee' => 10,
        'order_id' => 'stub_order_id',
        'currency' => 'EUR',
        'cart' => array(),
        'salutation' => 'MR',
        'first_name' => 'stub_name',
        'last_name' => 'stub_lastname',
        'street' => 'stub_street',
        'zip' => '10111',
        'city' => 'Berlin',
        'country' => 'DE',
        'phone' => '451231212',
        'email' => 'stub@domain.com',
        'success_url' => 'https://domain.com/success',
        'failure_url' => 'https://domain.com/fail',
        'cancel_url' => 'https://domain.com/cancel',
        'notice_url' => 'https://domain.com/notice',
        'pending_url' => 'https://domain.com/pending',
        'x_frame_host' => 'domain.com',
        'type' => 'stub_type',
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['cart'] = array(CartItemEntityTest::getScheme());

        return $scheme;
    }

    public function getEntity()
    {
        return new CreatePaymentCall();
    }
}
