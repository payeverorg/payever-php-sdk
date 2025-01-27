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
        'file_name' => 'file',
        'mime_type' => 'application/pdf',
        'document_type' => 'I01',
        'base64_content' => 'file',
    );

    public function getEntity()
    {
        return new ClaimUploadPaymentRequest();
    }
}
