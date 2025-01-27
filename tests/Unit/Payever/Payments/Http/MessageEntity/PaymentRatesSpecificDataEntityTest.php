<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\PaymentRatesSpecificDataEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class PaymentRatesSpecificDataEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\PaymentRatesSpecificDataEntity
 */
class PaymentRatesSpecificDataEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'downPayment' => 0,
        'flatRate' => 6.64,
        'firstMonthPayment' => 344.4,
    );

    public function getEntity()
    {
        return new PaymentRatesSpecificDataEntity();
    }
}
