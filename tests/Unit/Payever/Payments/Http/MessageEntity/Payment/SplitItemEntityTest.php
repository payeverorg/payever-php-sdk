<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitItemEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class SplitItemEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitItemEntity
 */
class SplitItemEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'type' => 'type',
        'identifier' => 'identifier',
        'reference' => 'reference',
        'description' => 'description',
        'amount' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['amount'] = SplitAmountEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new SplitItemEntity();
    }
}
