<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Http\ResponseEntity\GetCurrenciesResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;
use Payever\Tests\Unit\Payever\Core\Http\ResponseEntity\Result\GetCurrenciesResultTest;

/**
 * Class GetCurrenciesResponseTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\GetCurrenciesResponse
 */
class GetCurrenciesResponseTest extends AbstractResponseEntityTestCase
{
    public static function getScheme()
    {
        $childScheme = GetCurrenciesResultTest::getScheme();

        return array(
            'result' => array(
                $childScheme['symbol'] => $childScheme,
            ),
        );
    }

    public function getEntity()
    {
        return new GetCurrenciesResponse(static::getScheme());
    }
}
