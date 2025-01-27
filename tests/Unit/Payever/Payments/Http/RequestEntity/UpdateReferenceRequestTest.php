<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\RequestEntity\UpdateReferenceRequest;
use Payever\Tests\Unit\Payever\Core\Http\AbstractRequestEntityTestCase;

/**
 * Class UpdateReferenceRequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\UpdateReferenceRequest
 */
class UpdateReferenceRequestTest extends AbstractRequestEntityTestCase
{
    protected static $scheme = array(
        'reference' => 'test',
    );

    public function getEntity()
    {
        return new UpdateReferenceRequest();
    }
}
