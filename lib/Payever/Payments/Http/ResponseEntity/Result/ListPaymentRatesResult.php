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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Http\MessageEntity\PaymentRatesSpecificDataEntity;

/**
 * This class represents List Payment Rates Result Entity
 *
 * @method float                           getAmount()
 * @method int                             getDuration()
 * @method float                           getMonthlyPayment()
 * @method float                           getLastMonthPayment()
 * @method float                           getTotalCreditCost()
 * @method float                           getInterest()
 * @method float                           getInterestRate()
 * @method float                           getAnnualPercentageRate()
 * @method PaymentRatesSpecificDataEntity  getSpecificData()
 * @method $this                           setAmount(float $amount)
 * @method $this                           setDuration(int $duration)
 * @method $this                           setMonthlyPayment(float $monthlyPayment)
 * @method $this                           setLastMonthPayment(float $lastMonthPayment)
 * @method $this                           setTotalCreditCost(float $totalCreditCost)
 * @method $this                           setInterest(float $interest)
 * @method $this                           setInterestRate(float $interestRate)
 * @method $this                           setAnnualPercentageRate(float $annualPercentageRate)
 */
class ListPaymentRatesResult extends ResultEntity
{
    /** @var float $amount */
    protected $amount;

    /** @var int $duration */
    protected $duration;

    /** @var float $monthlyPayment */
    protected $monthlyPayment;

    /** @var float $lastMonthPayment */
    protected $lastMonthPayment;

    /** @var float $totalCreditCost */
    protected $totalCreditCost;

    /** @var float $interest */
    protected $interest;

    /** @var float $interestRate */
    protected $interestRate;

    /** @var float $annualPercentageRate */
    protected $annualPercentageRate;

    /** @var PaymentRatesSpecificDataEntity $specificData */
    protected $specificData;

    /**
     * @param PaymentRatesSpecificDataEntity|array $specificData
     *
     * @return $this
     */
    public function setSpecificData($specificData)
    {
        if (!$specificData) {
            return $this;
        }

        if (is_string($specificData)) {
            $specificData = json_decode($specificData);
        }

        if (!is_array($specificData) && !is_object($specificData)) {
            return $this;
        }

        $this->specificData = new PaymentRatesSpecificDataEntity($specificData);

        return $this;
    }
}
