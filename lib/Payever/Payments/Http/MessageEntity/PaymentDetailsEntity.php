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
 * This class represents Payment Details Entity
 *
 * @method string                  getId()
 * @method float                   getDeliveryFee()
 * @method float                   getPaymentFee()
 * @method bool                    getPrefilled()
 * @method string                  getSpecificStatus()
 * @method string                  getEmail()
 * @method bool                    getStudent()
 * @method string                  getCreditType()
 * @method string                  getCampaignCode()
 * @method string                  getApplicationNumber()
 * @method float                   getMonthlyAmount()
 * @method int                     getCreditDurationInMonth()
 * @method CreditCalculationEntity getCreditCalculation()
 * @method string                  getDiscr()
 * @method bool                    getAcceptTermsCreditEurope()
 * @method string                  getApplicationNo()
 * @method string                  getApplicationStatus()
 * @method string                  getBankDetailsSelection()
 * @method bool                    getCreditAcceptsRequestsToCreditAgencies()
 * @method bool                    getCreditConfirmsSelfInitiative()
 * @method string                  getCreditDueDate()
 * @method int                     getCreditDurationInMonths()
 * @method bool                    getCreditProtectionInsurance()
 * @method bool                    getEmploymentLimited()
 * @method string                  getFinanceId()
 * @method bool                    getFreelancer()
 * @method float                   getInitialPayment()
 * @method \DateTime|false         getPersonalDateOfBirth()
 * @method bool                    getPrevAddress()
 * @method bool                    getPrevEmploymentDetails()
 * @method string                  getUniqueId()
 * @method string                  getUsageText()
 * @method \DateTime|false         getBirthday()
 * @method string                  getFrontendFinishUrl()
 * @method string                  getFrontendCancelUrl()
 * @method string                  getGetPaymentStatusUrl()
 * @method string                  getTransactionId()
 * @method string                  getRedirectUrl()
 * @method $this                   setId(string $id)
 * @method $this                   setDeliveryFee(float $deliveryFee)
 * @method $this                   setPaymentFee(float $paymentFee)
 * @method $this                   setPrefilled(bool $prefilled)
 * @method $this                   setSpecificStatus(string $specificStatus)
 * @method $this                   setEmail(string $email)
 * @method $this                   setStudent(bool $student)
 * @method $this                   setCreditType(string $creditType)
 * @method $this                   setCampaignCode(string $campaignCode)
 * @method $this                   setApplicationNumber(string $applicationNumber)
 * @method $this                   setMonthlyAmount(float $monthlyAmount)
 * @method $this                   setCreditDurationInMonth(int $creditDurationInMonth)
 * @method $this                   setDiscr(string $discr)
 * @method $this                   setAcceptTermsCreditEurope(bool $acceptTermsCreditEurope)
 * @method $this                   setApplicationNo(string $applicationNo)
 * @method $this                   setApplicationStatus(string $applicationStatus)
 * @method $this                   setBankDetailsSelection(string $bankDetailsSelection)
 * @method $this                   setCreditAcceptsRequestsToCreditAgencies(bool $creditAcceptsRequestsToCreditAgencies)
 * @method $this                   setCreditConfirmsSelfInitiative(bool $creditConfirmsSelfInitiative)
 * @method $this                   setCreditDueDate(string $creditDueDate)
 * @method $this                   setCreditDurationInMonths(int $creditDurationInMonths)
 * @method $this                   setCreditProtectionInsurance(bool $creditProtectionInsurance)
 * @method $this                   setEmploymentLimited(bool $employmentLimited)
 * @method $this                   setFinanceId(string $financeId)
 * @method $this                   setFreelancer(bool $freelancer)
 * @method $this                   setInitialPayment(float $initialPayment)
 * @method $this                   setPrevAddress(bool $prevAddress)
 * @method $this                   setPrevEmploymentDetails(bool $prevEmploymentDetails)
 * @method $this                   setUniqueId(string $uniqueId)
 * @method $this                   setUsageText(string $usageText)
 * @method $this                   setFrontendFinishUrl(string $frontendFinishUrl)
 * @method $this                   setFrontendCancelUrl(string $frontendCancelUrl)
 * @method $this                   setGetPaymentStatusUrl(string $getPaymentStatusUrl)
 * @method $this                   setTransactionId(string $transactionId)
 * @method $this                   setRedirectUrl(string $redirectUrl)
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class PaymentDetailsEntity extends MessageEntity
{
    /** @var string $id */
    protected $id;

    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var float $paymentFee */
    protected $paymentFee;

    /** @var bool $prefilled */
    protected $prefilled;

    /** @var string $specificStatus */
    protected $specificStatus;

    /** @var string $email */
    protected $email;

    /** @var bool $student */
    protected $student;

    /** @var string $creditType */
    protected $creditType;

    /** @var string $campaignCode */
    protected $campaignCode;

    /** @var string $applicationNumber */
    protected $applicationNumber;

    /** @var float $monthlyAmount */
    protected $monthlyAmount;

    /** @var int $creditDurationInMonth */
    protected $creditDurationInMonth;

    /** @var CreditCalculationEntity $creditCalculation */
    protected $creditCalculation;

    /** @var string $discr */
    protected $discr;

    /** @var bool $acceptTermsCreditEurope */
    protected $acceptTermsCreditEurope;

    /** @var string $applicationNo */
    protected $applicationNo;

    /** @var string $applicationStatus */
    protected $applicationStatus;

    /** @var string $bankDetailsSelection */
    protected $bankDetailsSelection;

    /** @var bool $creditAcceptsRequestsToCreditAgencies */
    protected $creditAcceptsRequestsToCreditAgencies;

    /** @var bool $creditConfirmsSelfInitiative */
    protected $creditConfirmsSelfInitiative;

    /** @var string $creditDueDate */
    protected $creditDueDate;

    /** @var int $creditDurationInMonths */
    protected $creditDurationInMonths;

    /** @var bool $creditProtectionInsurance */
    protected $creditProtectionInsurance;

    /** @var bool $employmentLimited */
    protected $employmentLimited;

    /** @var string $financeId */
    protected $financeId;

    /** @var bool $freelancer */
    protected $freelancer;

    /** @var float $initialPayment */
    protected $initialPayment;

    /** @var \DateTime|bool $personalDateOfBirth */
    protected $personalDateOfBirth;

    /** @var bool $prevAddress */
    protected $prevAddress;

    /** @var bool $prevEmploymentDetails */
    protected $prevEmploymentDetails;

    /** @var string $uniqueId */
    protected $uniqueId;

    /** @var string $usageText */
    protected $usageText;

    /** @var \DateTime|bool $birthday */
    protected $birthday;

    /** @var string $frontendFinishUrl */
    protected $frontendFinishUrl;

    /** @var string $frontendCancelUrl */
    protected $frontendCancelUrl;

    /** @var string $getPaymentStatusUrl */
    protected $getPaymentStatusUrl;

    /** @var string $transactionId */
    protected $transactionId;

    /** @var string $redirectUrl */
    protected $redirectUrl;

    /**
     * Sets Credit Calculation
     *
     * @param array $creditCalculation
     *
     * @return $this
     */
    public function setCreditCalculation($creditCalculation)
    {
        $this->creditCalculation = new CreditCalculationEntity($creditCalculation);

        return $this;
    }

    /**
     * Sets Personal Date of Birth
     *
     * @param string $personalDateOfBirth
     *
     * @return $this
     */
    public function setPersonalDateOfBirth($personalDateOfBirth)
    {
        if ($personalDateOfBirth) {
            $this->personalDateOfBirth = date_create($personalDateOfBirth);
        }

        return $this;
    }

    /**
     * Sets Birthday
     *
     * @param string $birthday
     *
     * @return $this
     */
    public function setBirthday($birthday)
    {
        if ($birthday) {
            $this->birthday = date_create($birthday);
        }

        return $this;
    }
}
