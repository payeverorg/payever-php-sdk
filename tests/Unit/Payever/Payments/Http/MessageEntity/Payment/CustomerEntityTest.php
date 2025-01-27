<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CustomerEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity
 */
class CustomerEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'type' => 'personal',
        'gender' => 'male',
        'birthdate' => self::DEFAULT_STUB_DATE,
        'phone' => '1234567890',
        'email' => 'test@example.com',
        'social_security_number' => '1234567890',
    );

    public function getEntity()
    {
        return new CustomerEntity();
    }
}
