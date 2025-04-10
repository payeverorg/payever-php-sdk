<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Base
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Base;

use Payever\Sdk\Core\Exception\ConfigurationException;
use Psr\Log\LoggerInterface;

/**
 * Interface describes functions of ClientConfiguration
 */
interface ClientConfigurationInterface
{
    const API_MODE_LIVE = 'live';

    const API_MODE_SANDBOX = 'sandbox';

    const API_VERSION_DEFAULT = '';

    const API_VERSION_2 = '/v2';

    /**
     * Returns Client ID
     *
     * @return string
     */
    public function getClientId();

    /**
     * Returns Client Secret
     *
     * @return string
     */
    public function getClientSecret();

    /**
     * Returns Business UUID
     *
     * @return string
     */
    public function getBusinessUuid();

    /**
     * @return string
     */
    public function getApiMode();

    /**
     * @return string
     */
    public function getApiVersion();

    /**
     * @return string
     */
    public function getPluginVersion();

    /**
     * Returns Channel Set
     *
     * @return string
     */
    public function getChannelSet();

    /**
     * @internal
     *
     * Returns custom sandbox API URL
     *
     * @return string
     */
    public function getCustomSandboxUrl();

    /**
     * @internal
     *
     * Returns custom live API URL
     *
     * @return string
     */
    public function getCustomLiveUrl();

    /**
     * Returns Configuration Hash
     *
     * @return string
     */
    public function getHash();

    /**
     * @return LoggerInterface
     */
    public function getLogger();

    /**
     * Returns if Configuration is loaded successfully
     *
     * @return bool
     */
    public function isLoaded();

    /**
     * Throws exception when not loaded
     *
     * @throws ConfigurationException
     *
     * @return void
     */
    public function assertLoaded();
}
