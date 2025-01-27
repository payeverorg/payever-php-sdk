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
 * This class represents PickupLocation Entity
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class PickupLocationEntity extends MessageEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var string $address */
    protected $address;
}
