<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class ClaimUploadPaymentRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest
 */
class ClaimUploadPaymentRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'fileName' => 'file',
        'mimeType' => 'application/pdf',
        'documentType' => 'I01',
        'base64Content' => 'file',
    );

    public function getEntity()
    {
        return new ClaimUploadPaymentRequest();
    }
}
