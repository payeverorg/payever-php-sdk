<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Http\ResponseEntity\ListChannelSetsResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Core\Http\MessageEntity\CallEntityTest;
use Payever\Tests\Unit\Payever\Core\Http\ResponseEntity\Result\ListChannelSetsResultTest;

/**
 * Class ListChannelSetsResponseTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\ListChannelSetsResponse
 */
class ListChannelSetsResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'call' => CallEntityTest::getScheme(),
            'result' => array(
                ListChannelSetsResultTest::getScheme(),
            ),
        );
    }

    public function getEntity()
    {
        return new ListChannelSetsResponse();
    }
}
