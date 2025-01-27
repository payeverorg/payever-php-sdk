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
 * This class represents Credit Calculation Entity
 *
 * @method string getProductType()
 * @method string getCampaignCode()
 * @method int    getCreditDuration()
 * @method string getKid()
 * @method string getStatusCode()
 * @method string getStatusDescription()
 * @method bool   getApproved()
 * @method bool   getDecisionMade()
 * @method bool   getFinal()
 * @method bool   getPaid()
 * @method string getFlowStatusCode()
 * @method float  getBankInterest()
 * @method float  getCpiAmount()
 * @method int    getDuration()
 * @method float  getInterestRate()
 * @method float  getMonthlyRate()
 * @method float  getPrice()
 * @method float  getRatePa()
 * @method float  getTotalAmount()
 * @method $this  setProductType(string $productType)
 * @method $this  setCampaignCode(string $campaignCode)
 * @method $this  setCreditDuration(int $creditDuration)
 * @method $this  setKid(string $kid)
 * @method $this  setStatusCode(string $statusCode)
 * @method $this  setStatusDescription(string $statusDescription)
 * @method $this  setApproved(bool $approved)
 * @method $this  setDecisionMade(bool $decisionMade)
 * @method $this  setFinal(bool $final)
 * @method $this  setPaid(bool $paid)
 * @method $this  setFlowStatusCode(string $flowStatusCode)
 * @method $this  setBankInterest(float $bankInterest)
 * @method $this  setCpiAmount(float $cpiAmount)
 * @method $this  setDuration(int $duration)
 * @method $this  setInterestRate(float $interestRate)
 * @method $this  setMonthlyRate(float $monthlyRate)
 * @method $this  setPrice(float $price)
 * @method $this  setRatePa(float $ratePa)
 * @method $this  setTotalAmount(float $totalAmount)
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreditCalculationEntity extends MessageEntity
{
    /** @var string $productType */
    protected $productType;

    /** @var string $campaignCode */
    protected $campaignCode;

    /** @var int $creditDuration */
    protected $creditDuration;

    /** @var string $kid */
    protected $kid;

    /** @var string $statusCode */
    protected $statusCode;

    /** @var string $statusDescription */
    protected $statusDescription;

    /** @var bool $approved */
    protected $approved;

    /** @var bool $decisionMade */
    protected $decisionMade;

    /** @var bool $final */
    protected $final;

    /** @var bool $paid */
    protected $paid;

    /** @var string $flowStatusCode */
    protected $flowStatusCode;

    /** @var float $bankInterest */
    protected $bankInterest;

    /** @var float $cpiAmount */
    protected $cpiAmount;

    /** @var int $duration */
    protected $duration;

    /** @var float $interestRate */
    protected $interestRate;

    /** @var float $monthlyRate */
    protected $monthlyRate;

    /** @var float $price */
    protected $price;

    /** @var float $ratePa */
    protected $ratePa;

    /** @var float $totalAmount */
    protected $totalAmount;
}
