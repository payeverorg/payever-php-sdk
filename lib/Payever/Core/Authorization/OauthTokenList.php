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

use Payever\Sdk\Core\Base\NamedList;
use Payever\Sdk\Core\Base\OauthTokenInterface;

/**
 * This class represents payever OauthToken List
 */
abstract class OauthTokenList extends NamedList
{
    /**
     * Loads Tokens into List from external source
     *
     * @return $this
     */
    abstract public function load();

    /**
     * Saves Tokens from List to external source
     *
     * @return $this
     */
    abstract public function save();

    /**
     * Returns empty OauthToken instance
     *
     * @return OauthTokenInterface
     *
     * @throws \Exception
     */
    public function create()
    {
        return new OauthToken();
    }
}
