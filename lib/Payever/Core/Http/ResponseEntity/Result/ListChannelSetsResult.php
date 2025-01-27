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

namespace Payever\Sdk\Core\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ChannelSetEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;

/**
 * This class represents List Channel Sets Result Entity
 *
 * @method int                getId()
 * @method string             getChannelType()
 * @method ChannelSetEntity[] getChannelSets()
 * @method bool               getEnabled()
 * @method $this              setId(string $id)
 * @method $this              setChannelType(string $channelType)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ListChannelSetsResult extends ResultEntity
{
    /** @var int $id */
    protected $id;

    /** @var string $channelType */
    protected $channelType;

    /** @var ChannelSetEntity[] $channelSets */
    protected $channelSets;

    /** @var bool $enabled */
    protected $enabled;

    /**
     * Sets Channel Sets
     *
     * @param array $channelSets
     */
    public function setChannelSets($channelSets)
    {
        $this->channelSets = [];

        foreach ($channelSets as $channelSet) {
            $this->channelSets[] = new ChannelSetEntity($channelSet);
        }
    }

    /**
     * Sets Enabled
     *
     * @param string $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = filter_var($enabled, FILTER_VALIDATE_BOOLEAN);
    }
}
