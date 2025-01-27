<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class VerifyEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity
 */
class VerifyEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'type' => 'type',
        'twoFactor' => 'twoFactor',
    );

    public function getEntity()
    {
        return new VerifyEntity();
    }
}
