<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentRatesResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\PaymentRatesSpecificDataEntityTest;

/**
 * Class ListPaymentRatesResultTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentRatesResult
 */
class ListPaymentRatesResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'amount' => 2000,
        'duration' => 6,
        'monthlyPayment' => 344.4,
        'lastMonthPayment' => 344.4,
        'totalCreditCost' => 2066.4,
        'interest' => 66.4,
        'interestRate' => 11.9,
        'annualPercentageRate' => 11.9,
        'specificData' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['specificData'] = PaymentRatesSpecificDataEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new ListPaymentRatesResult();
    }
}
