<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentOptionsResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\PaymentOptionOptionsEntityTest;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\PaymentOptionTranslationEntityTest;

/**
 * Class ListPaymentOptionsResultTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentOptionsResult
 */
class ListPaymentOptionsResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'name' => 'stub_name',
        'status' => false, // will be converted to ($status == 'active')
        'variable_fee' => 1.5,
        'fixed_fee' => 10,
        'accept_fee' => false,
        'description_offer' => 'stub_offer_description',
        'description_fee' => 'stub_fee_description',
        'min' => 100,
        'max' => 10000,
        'payment_method' => 'stripe',
        'thumbnail_1' => 'some_image',
        'thumbnail_2' => null,
        'thumbnail_3' => null,
        'options' => array(),
        'translations' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['options'] = PaymentOptionOptionsEntityTest::getScheme();
        $scheme['translations'] = array(PaymentOptionTranslationEntityTest::getScheme());

        return $scheme;
    }

    public function getEntity()
    {
        return new ListPaymentOptionsResult();
    }
}
