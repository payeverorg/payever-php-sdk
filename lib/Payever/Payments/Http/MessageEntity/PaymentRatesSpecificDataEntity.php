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

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Specific Data Entity
 *
 * @method float  getDownPayment()
 * @method float  getFlatRate()
 * @method float  getFirstMonthPayment()
 * @method $this  setDownPayment(float $downPayment)
 * @method $this  setFlatRate(float $flatRate)
 * @method $this  setFirstMonthPayment(float $firstMonthPayment)
 */
class PaymentRatesSpecificDataEntity extends MessageEntity
{
    /** @var float $downPayment */
    protected $downPayment;

    /** @var float $flatRate */
    protected $flatRate;

    /** @var float $firstMonthPayment */
    protected $firstMonthPayment;
}
