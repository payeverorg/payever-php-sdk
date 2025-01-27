<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity;

use Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Result\GetTransactionResultTest;

/**
 * Class GetTransactionResponseTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse
 */
class GetTransactionResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        return array(
            'result' => GetTransactionResultTest::getScheme(),
        );
    }

    public function getEntity()
    {
        return new GetTransactionResponse();
    }
}
