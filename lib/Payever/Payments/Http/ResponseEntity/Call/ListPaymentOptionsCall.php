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
use Payever\Sdk\Core\Http\MessageEntity\ChannelSetEntity;

/**
 * This class represents List Payment Options Call Entity
 *
 * @method string           getAction()
 * @method string           getChannel()
 * @method ChannelSetEntity getChannelSet()
 * @method string           getType()
 * @method $this            setAction(string $action)
 * @method $this            setChannel(string $channel)
 * @method $this            setType(string $type)
 */
class ListPaymentOptionsCall extends CallEntity
{
    /** @var string $action */
    protected $action;

    /** @var string $channel */
    protected $channel;

    /** @var ChannelSetEntity $channelSet */
    protected $channelSet;

    /** @var string $type */
    protected $type;

    /**
     * Sets Channel Set
     *
     * @param array $channelSet
     */
    public function setChannelSet($channelSet)
    {
        $this->channelSet = new ChannelSetEntity($channelSet);
    }
}
