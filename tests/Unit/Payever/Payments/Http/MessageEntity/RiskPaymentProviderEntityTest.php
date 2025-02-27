<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\RiskPaymentProviderEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class RiskPaymentProviderEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\RiskPaymentProviderEntity
 */
class RiskPaymentProviderEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'name' => 'stub',
        'script' => 'string',
    );

    public function getEntity()
    {
        return new RiskPaymentProviderEntity();
    }
}
