<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class ClaimPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest
 */
class ClaimPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'is_non_inclusive' => false,
        'is_legal' => false,
        'is_disputed' => false,
        'is_guarantee_existing' => false,
        'policy_id' => '1234',
        'business_unit_code' => '1234',
        'extension_id' => '1234',
    );

    public function getEntity()
    {
        return new ClaimPaymentRequest();
    }
}
