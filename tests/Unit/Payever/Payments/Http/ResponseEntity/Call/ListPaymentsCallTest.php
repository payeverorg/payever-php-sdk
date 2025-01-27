<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentsCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class ListPaymentsCallTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentsCall
 */
class ListPaymentsCallTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'currency' => 'EUR',
        'state' => 'active',
        'limit' => 100,
    );

    public function getEntity()
    {
        return new ListPaymentsCall();
    }
}
