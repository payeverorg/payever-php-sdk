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
 * This class represents Split Amount Entity of SplitItemEntity
 *
 * @method float  getValue()
 * @method string getCurrency()
 * @method $this  setValue(float $value)
 * @method $this  setCurrency(string $value)
 */
class SplitAmountEntity extends MessageEntity
{
    /** @var float $value */
    protected $value;

    /** @var string $currency */
    protected $currency;
}
