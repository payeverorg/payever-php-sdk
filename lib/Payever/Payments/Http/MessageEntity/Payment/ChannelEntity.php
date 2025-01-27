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

namespace Payever\Sdk\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Channel Entity
 *
 * @method string  getName()
 * @method string  getType()
 * @method string  getSource()
 * @method string  getChannelSetId()
 * @method $this   setName(string $name)
 * @method $this   setType(string $type)
 * @method $this   setSource(string $source)
 * @method $this   setChannelSetId(string $channelSetId)
 */
class ChannelEntity extends MessageEntity
{
    /** @var string $name */
    protected $name;

    /** @var string $type */
    protected $type;

    /** @var string $source */
    protected $source;

    /**
     * @deprecated
     * @var int $channelSetId
     */
    protected $channelSetId;

    /**
     * {@inheritdoc}
     */
    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }
}
