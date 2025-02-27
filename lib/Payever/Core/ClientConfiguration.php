<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Core
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core;

use Exception;
use Payever\Sdk\Core\Base\ClientConfigurationInterface;
use Payever\Sdk\Core\Enum\ChannelSet;
use Payever\Sdk\Core\Exception\ConfigurationException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * This class represents ClientConfiguration
 * The ClientConfiguration class manages API connection settings
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class ClientConfiguration implements ClientConfigurationInterface
{
    /** @var string */
    protected $apiMode = self::API_MODE_LIVE;

    /** @var string */
    protected $clientId;

    /** @var string */
    protected $clientSecret;

    /** @var string */
    protected $customSandboxUrl;

    /** @var string */
    protected $customLiveUrl;

    /** @var string */
    protected $businessUuid;

    /** @var string */
    protected $channelSet = ChannelSet::CHANNEL_OTHER_SHOPSYSTEM;

    /** @var LoggerInterface */
    protected $logger;

    /** @var string */
    protected $apiVersion = self::API_VERSION_DEFAULT;

    /** @var string */
    protected $pluginVersion = '';

    /**
     * @param string|null $clientId
     * @param string|null $clientSecret
     * @param string|null $businessUuid
     */
    public function __construct(
        $clientId = null,
        $clientSecret = null,
        $businessUuid = null
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->businessUuid = $businessUuid;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * {@inheritdoc}
     */
    public function getBusinessUuid()
    {
        return $this->businessUuid;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiMode()
    {
        return $this->apiMode;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function getPluginVersion()
    {
        return $this->pluginVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannelSet()
    {
        return $this->channelSet;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomSandboxUrl()
    {
        return $this->customSandboxUrl;
    }

    /**
     * @inheritdoc
     */
    public function getCustomLiveUrl()
    {
        return $this->customLiveUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getHash()
    {
        return md5($this->getClientId() . $this->getClientSecret());
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        if (is_null($this->logger)) {
            $this->logger = new NullLogger();
        }

        return $this->logger;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return $this
     *
     * @SuppressWarnings(PHPMD.MissingImport)
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Sets Client ID
     *
     * @param mixed $clientId
     *
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Sets Client Secret
     *
     * @param mixed $clientSecret
     *
     * @return $this
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Sets Business UUID
     *
     * @param mixed $businessUuid
     *
     * @return $this
     */
    public function setBusinessUuid($businessUuid)
    {
        $this->businessUuid = $businessUuid;

        return $this;
    }

    /**
     * @param string $apiMode
     *
     * @return $this
     */
    public function setApiMode($apiMode)
    {
        $this->apiMode = $apiMode;

        return $this;
    }

    /**
     * @param string $apiVersion
     *
     * @return $this
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * @param string $pluginVersion
     *
     * @return $this
     */
    public function setPluginVersion($pluginVersion)
    {
        $this->pluginVersion = $pluginVersion;

        return $this;
    }

    /**
     * Sets Channel set
     *
     * @param mixed $channelSet
     *
     * @return $this
     *
     * @throws Exception
     */
    public function setChannelSet($channelSet = null)
    {
        if (!in_array($channelSet, ChannelSet::enum())) {
            throw new ConfigurationException(sprintf('Channel Set `%s` is not valid', $channelSet));
        }
        $this->channelSet = $channelSet;

        return $this;
    }

    /**
     * @internal
     *
     * Sets Custom sandbox API URL for all packages at once
     *
     * @param string $customSandboxUrl
     *
     * @return $this
     */
    public function setCustomSandboxUrl($customSandboxUrl)
    {
        $this->customSandboxUrl = $customSandboxUrl;

        return $this;
    }

    /**
     * @internal
     *
     * Sets Custom live API URL for all packages at once
     *
     * @param string $customLiveUrl
     *
     * @return $this
     */
    public function setCustomLiveUrl($customLiveUrl)
    {
        $this->customLiveUrl = $customLiveUrl;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isLoaded()
    {
        return
            $this->getClientId() &&
            $this->getClientSecret() &&
            $this->getBusinessUuid()
        ;
    }

    /**
     * @inheritdoc
     */
    public function assertLoaded()
    {
        if (!$this->isLoaded()) {
            throw new ConfigurationException(
                'Payever API client credentials (client_id, client_secret, business_uuid) are not set.'
            );
        }
    }
}
