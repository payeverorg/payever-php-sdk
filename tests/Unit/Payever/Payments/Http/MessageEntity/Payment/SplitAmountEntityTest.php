<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitAmountEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class SplitAmountEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitAmountEntity
 */
class SplitAmountEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'value' => 'value',
        'currency' => 'EUR',
    );

    public function getEntity()
    {
        return new SplitAmountEntity();
    }
}
