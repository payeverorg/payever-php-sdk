<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class PaymentDataEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity
 */
class PaymentDataEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'birthdate' => self::DEFAULT_STUB_DATE,
        'conditionsAccepted' => true,
        'riskSessionId' => 'stub-session-id',
        'frontendFinishUrl' => 'https://example.com',
        'frontendCancelUrl' => 'https://example.com',
        'force_redirect' => true,
        'organization_name' => 'Organization Name',
        'street_type' => 'Street',
        'floor' => '1',
        'door' => '1',
        'block' => '1',
    );

    public function getEntity()
    {
        return new PaymentDataEntity();
    }
}
