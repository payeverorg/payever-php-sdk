<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class AttributesEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity
 */
class AttributesEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'weight' => 100,
        'dimensions' => array(),
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['dimensions'] = DimensionsEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new AttributesEntity();
    }
}
