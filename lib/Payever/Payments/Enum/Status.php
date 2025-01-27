<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Enum
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Enum;

use Payever\Sdk\Core\Base\EnumerableConstants;

/**
 * List of Statuses
 */
class Status extends EnumerableConstants
{
    const STATUS_NEW        = 'STATUS_NEW';
    const STATUS_IN_PROCESS = 'STATUS_IN_PROCESS';
    const STATUS_ACCEPTED   = 'STATUS_ACCEPTED';
    const STATUS_PAID       = 'STATUS_PAID';
    const STATUS_DECLINED   = 'STATUS_DECLINED';
    const STATUS_REFUNDED   = 'STATUS_REFUNDED';
    const STATUS_FAILED     = 'STATUS_FAILED';
    const STATUS_CANCELLED  = 'STATUS_CANCELLED';
}
