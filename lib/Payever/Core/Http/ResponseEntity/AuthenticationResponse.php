<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  ResponseEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Base\OauthTokenInterface;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;

/**
 * This class represents List Payments RequestInterface Entity
 *
 * @method string getAccessToken()
 * @method string getRefreshToken()
 * @method int    getExpiresIn()
 * @method string getScope()
 * @method string getTokenType()
 * @method $this  setAccessToken(string $token)
 * @method $this  setRefreshToken(string $token)
 * @method $this  setExpiresIn(int $seconds)
 * @method $this  setScope(string $scope)
 * @method $this  setTokenType(string $type)
 */
class AuthenticationResponse extends ResponseEntity
{
    /** @var string $accessToken */
    protected $accessToken;

    /** @var string $refreshToken */
    protected $refreshToken;

    /** @var int $expiresIn */
    protected $expiresIn = 0;

    /** @var string $scope */
    protected $scope = OauthTokenInterface::SCOPE_PAYMENT_ACTIONS;

    /** @var string $tokenType */
    protected $tokenType = 'Bearer';

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'access_token',
            'refresh_token',
            'scope',
        ];
    }
}
