<?php

namespace Payever\Tests\Unit\Payever\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Authorization\OauthToken;
use Payever\Sdk\Core\Http\ResponseEntity\AuthenticationResponse;
use Payever\Tests\Unit\Payever\Core\Http\AbstractResponseEntityTestCase;

/**
 * Class AuthenticationResponseTest
 *
 * @see \Payever\Sdk\Core\Http\ResponseEntity\AuthenticationResponse
 */
class AuthenticationResponseTest extends AbstractResponseEntityTestCase
{
    protected static $scheme = array(
        'access_token' => 'stub_access_token',
        'refresh_token' => 'stub_refresh_token',
        'scope' => OauthToken::SCOPE_PAYMENT_ACTIONS,
        'expires_in' => 3600,
    );

    public function getEntity()
    {
        return new AuthenticationResponse();
    }
}
