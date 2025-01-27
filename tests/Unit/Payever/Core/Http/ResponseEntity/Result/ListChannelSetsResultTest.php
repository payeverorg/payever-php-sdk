<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\ResponseEntity\Result\ListChannelSetsResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Core\Http\MessageEntity\ChannelSetEntityTest;

/**
 * Class ListChannelSetsResultEntityTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\Result\ListChannelSetsResult
 */
class ListChannelSetsResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'channel_type' => 'shopware',
        'channel_sets' => array(),
        'enabled' => true,
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['channel_sets'] = array(ChannelSetEntityTest::getScheme());

        return $scheme;
    }

    public function getEntity()
    {
        return new ListChannelSetsResult();
    }
}
