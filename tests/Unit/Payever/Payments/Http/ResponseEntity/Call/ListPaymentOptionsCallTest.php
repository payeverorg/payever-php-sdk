<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentOptionsCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class ListPaymentOptionsCallTest
 *
 * @see \Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentOptionsCall
 */
class ListPaymentOptionsCallTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'action' => 'get',
        'channel' => 'shopware',
        'type' => 'stub',
    );

    public function getEntity()
    {
        return new ListPaymentOptionsCall();
    }
}
