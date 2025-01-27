<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\DimensionsEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class DimensionsEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\DimensionsEntity
 */
class DimensionsEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'height' => 100.1,
        'width' => 100.1,
        'length' => 100.1,
    );

    public function getEntity()
    {
        return new DimensionsEntity();
    }
}
