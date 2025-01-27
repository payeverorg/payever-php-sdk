<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Core\Http\MessageEntity\CallEntity;

/**
 * This class represents List Payment Rates Call Entity
 *
 * @method string           getId()
 * @method string           getStatus()
 * @method string           getType()
 * @method \DateTime|false  getCreatedAt()
 * @method $this            setId(string $id)
 * @method $this            setStatus(string $status)
 * @method $this            setType(string $type)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ListPaymentRatesCall extends CallEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $status */
    protected $status;

    /** @var string $type */
    protected $type;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

    /**
     * Sets Created At
     *
     * @param string|\DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        if (!$createdAt) {
            return $this;
        }

        if ($createdAt instanceof \DateTime) {
            $this->createdAt = $createdAt;

            return $this;
        }

        if (is_string($createdAt)) {
            $this->createdAt = date_create($createdAt);
        }

        return $this;
    }
}
