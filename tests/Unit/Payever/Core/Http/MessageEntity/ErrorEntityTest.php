<?php

namespace Payever\Tests\Unit\Payever\Core\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\ErrorEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class ErrorEntityTest
 *
 * @see \Payever\Sdk\Core\Http\MessageEntity\ErrorEntity
 */
class ErrorEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'message' => 'Error occured'
    );

    public function testEntity()
    {
        $this->assertEntityScheme($this->getEntity(), false);
    }

    public function getEntity()
    {
        return new ErrorEntity(static::getScheme());
    }

    public function testStringPayload()
    {
        $message = 'error_message';
        $entity = new ErrorEntity($message);

        $this->assertEquals($message, $entity->getMessage());
    }
}
