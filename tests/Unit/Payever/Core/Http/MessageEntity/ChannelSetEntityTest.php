<?php

namespace Payever\Tests\Unit\Payever\Core\Http\MessageEntity;

use Payever\Sdk\Core\Http\MessageEntity\ChannelSetEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class ChannelSetEntityTest
 *
 * @see \Payever\Sdk\Core\Http\MessageEntity\ChannelSetEntity
 */
class ChannelSetEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'name' => 'stub_name',
        'slug' => 'stub_slug',
        'configured' => true,
        'created_at' => self::DEFAULT_STUB_DATE,
        'updated_at' => self::DEFAULT_STUB_DATE,
        'discr' => 'stub_description',
    );

    public function getEntity()
    {
        return new ChannelSetEntity();
    }
}
