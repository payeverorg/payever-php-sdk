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
 * This class represents Dimensions Entity of Attributes
 *
 * @method float getHeight()
 * @method float getWidth()
 * @method float getLength()
 * @method $this setHeight(float $value)
 * @method $this setWidth(float $value)
 * @method $this setLength(float $value)
 */
class DimensionsEntity extends MessageEntity
{
    /** @var float $height */
    protected $height;

    /** @var float $width */
    protected $width;

    /** @var float $length */
    protected $length;
}
