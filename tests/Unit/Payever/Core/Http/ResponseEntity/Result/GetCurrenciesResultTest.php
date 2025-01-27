<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\ResponseEntity\Result\GetCurrenciesResult;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class GetCurrenciesResultEntityTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\Result\GetCurrenciesResult
 */
class GetCurrenciesResultTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'name' => 'US Dollar',
        'symbol' => 'USD',
        'code' => 'USD',
        'rate' => 1.3,
    );

    public function getEntity()
    {
        return new GetCurrenciesResult();
    }
}
