<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Channel Set Entity
 *
 * @method int             getId()
 * @method string          getName()
 * @method string          getSlug()
 * @method bool            getConfigured()
 * @method \DateTime|false getCreatedAt()
 * @method \DateTime|false getUpdatedAt()
 * @method string          getDiscr()
 * @method $this           setId(string $id)
 * @method $this           setName(string $name)
 * @method $this           setSlug(string $slug)
 * @method $this           setDiscr(string $discr)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ChannelSetEntity extends MessageEntity
{
    /** @var int $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var string $slug */
    protected $slug;

    /** @var bool $configured */
    protected $configured;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

    /** @var \DateTime|bool $updatedAt */
    protected $updatedAt;

    /** @var string $discr */
    protected $discr;

    /**
     * Sets Configured
     *
     * @param string $configured
     *
     * @return $this
     */
    public function setConfigured($configured)
    {
        $this->configured = filter_var($configured, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }

    /**
     * Sets Created At
     *
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        if ($createdAt) {
            $this->createdAt = date_create($createdAt);
        }

        return $this;
    }

    /**
     * Sets Updated At
     *
     * @param string $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        if ($updatedAt) {
            $this->updatedAt = date_create($updatedAt);
        }

        return $this;
    }
}
