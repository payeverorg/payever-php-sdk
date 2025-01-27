<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\PaymentDetailsEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class PaymentDetailsEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\PaymentDetailsEntity
 */
class PaymentDetailsEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'delivery_fee' => 10,
        'payment_fee' => 20,
        'prefilled' => false,
        'specific_status' => 'DECLINED',
        'email' => 'some@domain.com',
        'student' => false,
        'credit_type' => 'type',
        'campaign_code' => 'CODE',
        'application_number' => 'NUMBER',
        'monthly_amount' => 145.32,
        'credit_duration_in_month' => 12,
        'credit_calculation' => array(),
        'discr' => 'stub_description',
        'accept_terms_credit_europe' => true,
        'application_no' => 'application_num',
        'application_status' => 'OK',
        'finance_id' => 'finance_id',
        'freelancer' => false,
        'personal_date_of_birth' => self::DEFAULT_STUB_DATE,
    );

    public function getEntity()
    {
        return new PaymentDetailsEntity();
    }
}
