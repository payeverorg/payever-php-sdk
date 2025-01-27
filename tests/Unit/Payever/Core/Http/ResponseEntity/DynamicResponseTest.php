<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Http\ResponseEntity\DynamicResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Core\Http\MessageEntity\DynamicEntityTest;

/**
 * Class DynamicResponseTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\DynamicResponse
 */
class DynamicResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return DynamicEntityTest::getScheme();
    }

    public function getEntity()
    {
        return new DynamicResponse();
    }
}
