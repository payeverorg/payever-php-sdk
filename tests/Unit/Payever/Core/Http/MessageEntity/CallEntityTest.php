<?php

namespace Payever\Tests\Unit\Payever\Core\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\CallEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CallEntityTest
 *
 * @see \Payever\Sdk\Core\Http\MessageEntity\CallEntity
 */
class CallEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'status' => 'failed',
        'business_id' => 'stub_business',
        'created_at' => self::DEFAULT_STUB_DATE,
    );

    public function getEntity()
    {
        return new CallEntity();
    }
}
