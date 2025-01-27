<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class UrlsEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
 */
class UrlsEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'redirect' => 'https://example.com',
        'success' => 'https://example.com',
        'pending' => 'https://example.com',
        'failure' => 'https://example.com',
        'cancel' => 'https://example.com',
        'notification' => 'https://example.com',
    );

    public function getEntity()
    {
        return new UrlsEntity();
    }
}
