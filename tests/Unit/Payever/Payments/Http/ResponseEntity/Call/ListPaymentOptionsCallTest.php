<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentOptionsCall;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;
use Payever\Tests\Unit\Payever\Core\Http\MessageEntity\ChannelSetEntityTest;

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
        'channel_set' => array(),
        'type' => 'stub',
    );

    public static function getScheme()
    {
        $scheme = static::$scheme;

        $scheme['channel_set'] = ChannelSetEntityTest::getScheme();

        return $scheme;
    }

    public function getEntity()
    {
        return new ListPaymentOptionsCall();
    }
}
