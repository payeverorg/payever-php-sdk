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
 * @method string                          getCampaignCode()
 * @method float                           getCreditPurchase()
 * @method string                          getDescription()
 * @method float                           getEffectiveRate()
 * @method bool                            getIsFixedAmount()
 * @method bool                            getIsInterestFree()
 * @method float                           getMonthlyAmount()
 * @method string                          getTitle()
 * @method $this                           setAmount(float $amount)
 * @method $this                           setDuration(int $duration)
 * @method $this                           setMonthlyPayment(float $monthlyPayment)
 * @method $this                           setLastMonthPayment(float $lastMonthPayment)
 * @method $this                           setTotalCreditCost(float $totalCreditCost)
 * @method $this                           setInterest(float $interest)
 * @method $this                           setInterestRate(float $interestRate)
 * @method $this                           setAnnualPercentageRate(float $annualPercentageRate)
 * @method $this                           setCampaignCode(string $campaignCode)
 * @method $this                           setCreditPurchase(float $creditPurchase)
 * @method $this                           setDescription(string $description)
 * @method $this                           setEffectiveRate(float $effectiveRate)
 * @method $this                           setIsFixedAmount(bool $isFixedAmount)
 * @method $this                           setIsInterestFree(bool $isInterestFree)
 * @method $this                           setMonthlyAmount(float $monthlyAmount)
 * @method $this                           setTitle(string $title)
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

    /** @var string $campaignCode */
    protected $campaignCode;

    /** @var float $creditPurchase */
    protected $creditPurchase;

    /** @var string $description */
    protected $description;

    /** @var float $effectiveRate */
    protected $effectiveRate;

    /** @var bool $isFixedAmount */
    protected $isFixedAmount;

    /** @var bool $isFixedAmount */
    protected $isInterestFree;

    /** @var float $effectiveRate */
    protected $monthlyAmount;

    /** @var string $description */
    protected $title;

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
