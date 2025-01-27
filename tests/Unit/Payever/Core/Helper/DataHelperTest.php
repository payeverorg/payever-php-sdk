<?php

namespace Payever\Tests\Unit\Payever\Core\Helper;

use Payever\Sdk\Core\Helper\DataHelper;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use PHPUnit\Framework\TestCase;

/**
 * Class DataHelperTest
 *
 * This class is designed to test the DataHelper class and especially the getEntityInstance method.
 *
 * @see \Payever\Sdk\Core\Helper\DataHelper
 */
class DataHelperTest extends TestCase
{
    public function testItReturnsNullWhenDataIsEmpty()
    {
        $this->assertNull(DataHelper::getEntityInstance(null, RequestEntity::class));
    }

    public function testItReturnsSameInstanceWhenDataIsAnInstanceOfClass()
    {
        $instance = new RequestEntity([]);
        $this->assertSame($instance, DataHelper::getEntityInstance($instance, RequestEntity::class));
    }

    public function testItReturnsNullWhenDataIsNeitherObjectNorArray()
    {
        $this->assertNull(DataHelper::getEntityInstance('not an array or object', RequestEntity::class));
    }

    public function testItCreatesClassInstanceWhenDataIsAnArray()
    {
        $this->assertInstanceOf(RequestEntity::class, DataHelper::getEntityInstance(['some data'], RequestEntity::class));
    }

    public function testItCreatesClassInstanceWhenDataIsAJsonString()
    {
        $this->assertInstanceOf(RequestEntity::class, DataHelper::getEntityInstance('{"some":"data"}', RequestEntity::class));
    }
}
