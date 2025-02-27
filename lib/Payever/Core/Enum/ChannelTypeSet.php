<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  API
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Enum;

use Payever\Sdk\Core\Base\EnumerableConstants;

/**
 * This class represents payever API Channel Type Sets
 */
class ChannelTypeSet extends EnumerableConstants
{
    const CLICK_COLLECT   = 'click_collect';
    const ECOMMERCE       = 'ecommerce';
    const EMAIL           = 'email';
    const EXTERNAL        = 'external';
    const FINANCE_EXPRESS = 'finance_express';
    const MESSENGER       = 'messenger';
    const QR              = 'qr';
    const SELF_CHECKOUT   = 'self_checkout';
    const SMS             = 'sms';
    const SOCIAL          = 'social';
    const TERMINAL        = 'terminal';
}
