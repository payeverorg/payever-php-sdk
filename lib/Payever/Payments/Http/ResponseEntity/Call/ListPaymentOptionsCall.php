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
 * This class represents List Payment Options Call Entity
 *
 * @method string     getAction()
 * @method string     getChannel()
 * @method $this      setAction(string $action)
 * @method $this      setChannel(string $channel)
 */
class ListPaymentOptionsCall extends CallEntity
{
    /** @var string $action */
    protected $action;

    /** @var string $channel */
    protected $channel;
}
