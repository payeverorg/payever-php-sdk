<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Authorization
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Authorization;

/**
 * Default storage of Oauth tokens if none explicitly provided.
 * Tokens are retrieved & stored in memory for each request.
 *
 * NOTE: It is strongly recommended to implement your own persistent tokens storage.
 */
class DummyOauthTokenList extends OauthTokenList
{
    /**
     * @inheritdoc
     */
    public function load()
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        return $this;
    }
}
