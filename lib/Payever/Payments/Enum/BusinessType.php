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
 * List of business types
 */
class BusinessType extends EnumerableConstants
{
    const B2B = 'b2b';
    const B2C = 'b2c';
    const MIXED = 'mixed';
}
