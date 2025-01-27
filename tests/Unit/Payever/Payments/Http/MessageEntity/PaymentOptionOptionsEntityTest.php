<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionOptionsEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class PaymentOptionOptionsEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionOptionsEntity
 */
class PaymentOptionOptionsEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'currencies' => array('EUR', 'USD'),
        'countries' => array('DE', 'US'),
        'actions' => array('purchase'),
    );

    public function getEntity()
    {
        return new PaymentOptionOptionsEntity();
    }
}
