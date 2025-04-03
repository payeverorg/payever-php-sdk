<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\ResponseEntity\Result\ListChannelSetsResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

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
        'enabled' => true,
    );

    public function getEntity()
    {
        return new ListChannelSetsResult();
    }
}
