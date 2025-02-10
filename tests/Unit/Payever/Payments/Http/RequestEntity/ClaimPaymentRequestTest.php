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
        'isNonInclusive' => false,
        'isLegal' => false,
        'isDisputed' => false,
        'isGuaranteeExisting' => false,
        'policyId' => '1234',
        'businessUnitCode' => '1234',
        'extensionId' => '1234',
    );

    public function getEntity()
    {
        return new ClaimPaymentRequest();
    }
}
