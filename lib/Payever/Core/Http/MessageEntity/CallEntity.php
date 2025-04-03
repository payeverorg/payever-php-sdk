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
 * This class represents Call Entity
 *
 * @method string          getId()
 * @method string          getStatus()
 * @method string          getType()
 * @method string          getBusinessId()
 * @method \DateTime|false getCreatedAt()
 * @method $this           setId(string $id)
 * @method $this           setStatus(string $status)
 * @method $this           setType(string $type)
 * @method $this           setBusinessId(string $businessId)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class CallEntity extends MessageEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $status */
    protected $status;

    /** @var string $type */
    protected $type;

    /** @var string $businessId */
    protected $businessId;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

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
}
