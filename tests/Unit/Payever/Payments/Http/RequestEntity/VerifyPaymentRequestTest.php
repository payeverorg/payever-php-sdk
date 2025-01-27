<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\VerifyPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class VerifyPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\VerifyPaymentRequest
 */
class VerifyPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'code' => 123456,
        'verified' => true,
        'seller' => [
            'id' => 'id',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
        ],
        'verify' => [
            'type' => 'type',
            'twoFactor' => 'email',
        ]
    );

    public function getEntity()
    {
        return new VerifyPaymentRequest();
    }
}
