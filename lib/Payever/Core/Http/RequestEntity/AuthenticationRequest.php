<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\RequestEntity;

use Payever\Sdk\Core\Authorization\OauthToken;
use Payever\Sdk\Core\Base\OauthTokenInterface;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Authentication RequestInterface Entity
 *
 * @method string getScope()
 * @method string getClientId()
 * @method string getClientSecret()
 * @method string getGrantType()
 * @method string getRefreshToken()
 * @method $this  setScope(string $scope)
 * @method $this  setClientId(string $id)
 * @method $this  setClientSecret(string $secret)
 * @method $this  setGrantType(string $type)
 * @method $this  setRefreshToken(string $scope)
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class AuthenticationRequest extends RequestEntity
{
    /** @var string $scope */
    protected $scope = OauthTokenInterface::SCOPE_PAYMENT_ACTIONS;

    /** @var string $clientId */
    protected $clientId;

    /** @var string $clientSecret */
    protected $clientSecret;

    /** @var string $grantType */
    protected $grantType = OauthTokenInterface::GRAND_TYPE_OBTAIN_TOKEN;

    /** @var string $refreshToken */
    protected $refreshToken;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        $required = [
            'scope',
            'client_id',
            'client_secret',
            'grant_type',
        ];

        if ($this->grantType == OauthTokenInterface::GRAND_TYPE_REFRESH_TOKEN) {
            $required[] = 'refresh_token';
        }

        return $required;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() &&
            in_array($this->scope, OauthToken::getScopes()) &&
            in_array($this->grantType, OauthToken::getGrandTypes())
        ;
    }
}
