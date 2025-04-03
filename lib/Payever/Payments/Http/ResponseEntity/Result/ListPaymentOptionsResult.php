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
use Payever\Sdk\Payments\Enum\BusinessType;
use Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionOptionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionTranslationEntity;

/**
 * This class represents List Payment Options Result Entity
 *
 * @method string                           getId()
 * @method string                           getName()
 * @method float                            getFixedFee()
 * @method float                            getVariableFee()
 * @method bool                             getAcceptFee()
 * @method string                           getPaymentIssuer()
 * @method string                           getPaymentMethod()
 * @method bool                             getGroupByIssuer()
 * @method string                           getDescriptionOffer()
 * @method string                           getDescriptionFee()
 * @method bool                             getStatus()
 * @method bool                             getIsRedirectMethod()
 * @method bool                             getIsSubmitMethod()
 * @method bool                             getIsB2bMethod()
 * @method bool                             getIsEcoMethod()
 * @method string                           getBusinessType()
 * @method array                            getMerchantAllowedCountries()
 * @method string                           getInstructionText()
 * @method string                           getRelatedCountry()
 * @method string                           getRelatedCountryName()
 * @method string                           getThumbnail1()
 * @method string                           getThumbnail2()
 * @method string                           getThumbnail3()
 * @method PaymentOptionOptionsEntity       getOptions()
 * @method PaymentOptionTranslationEntity[] getTranslations()
 * @method bool                             getShippingAddressAllowed()
 * @method bool                             getShippingAddressEquality()
 * @method bool                             getRates()
 * @method bool                             getShareBagEnabled()
 * @method bool                             getOrganizationAllowed()
 * @method float                            getMax()
 * @method float                            getMin()
 * @method $this                            setId(string $id)
 * @method $this                            setName(string $name)
 * @method $this                            setFixedFee(float $fixedFee)
 * @method $this                            setVariableFee(float $variableFee)
 * @method $this                            setPaymentIssuer(string $paymentIssuer)
 * @method $this                            setPaymentMethod(string $paymentMethod)
 * @method void                             setGroupByIssuer(bool $groupByIssuer)
 * @method $this                            setDescriptionOffer(string $descriptionOffer)
 * @method $this                            setDescriptionFee(string $descriptionFee)
 * @method void                             setIsRedirectMethod(bool $isRedirectMethod)
 * @method $this                            setIsSubmitMethod(bool $value)
 * @method $this                            setIsB2bMethod(bool $value)
 * @method void                             setIsEcoMethod(bool $isEcoMethod)
 * @method $this                            setBusinessType(string $businessType)
 * @method void                             setMerchantAllowedCountries(array $merchantAllowedCountries)
 * @method void                             setInstructionText(string $instructionText)
 * @method $this                            setRelatedCountry(string $relatedCountry)
 * @method $this                            setRelatedCountryName(string $relatedCountryName)
 * @method $this                            setThumbnail1(string $thumbnail1)
 * @method $this                            setThumbnail2(string $thumbnail2)
 * @method $this                            setThumbnail3(string $thumbnail3)
 * @method void                             setRates(bool $rates)
 * @method void                             setShareBagEnabled(bool $shareBagEnabled)
 * @method void                             setOrganizationAllowed(bool $organizationAllowed)
 * @method $this                            setMax(float $max)
 * @method $this                            setMin(float $min)
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class ListPaymentOptionsResult extends ResultEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var float $fixedFee */
    protected $fixedFee;

    /** @var float $variableFee */
    protected $variableFee;

    /** @var bool $acceptFee */
    protected $acceptFee;

    /** @var string $paymentIssuer */
    protected $paymentIssuer;

    /** @var string $paymentMethod */
    protected $paymentMethod;

    /** @var bool $groupByIssuer */
    protected $groupByIssuer;

    /** @var string $descriptionOffer */
    protected $descriptionOffer;

    /** @var string $descriptionFee */
    protected $descriptionFee;

    /** @var string $status */
    protected $status;

    /** @var bool $isRedirectMethod */
    protected $isRedirectMethod;

    /** @var bool $isSubmitMethod */
    protected $isSubmitMethod;

    /** @var bool $isB2bMethod */
    protected $isB2bMethod;

    /** @var bool $isEcoMethod */
    protected $isEcoMethod;

    /** @var string $businessType */
    protected $businessType;

    /** @var array $merchantAllowedCountries */
    protected $merchantAllowedCountries;

    /** @var string $instructionText */
    protected $instructionText;

    /** @var string $relatedCountry */
    protected $relatedCountry;

    /** @var string $relatedCountryName */
    protected $relatedCountryName;

    /** @var string $thumbnail1 */
    protected $thumbnail1;

    /** @var string $thumbnail2 */
    protected $thumbnail2;

    /** @var string $thumbnail3 */
    protected $thumbnail3;

    /** @var PaymentOptionOptionsEntity $options */
    protected $options;

    /** @var PaymentOptionTranslationEntity[] $translations */
    protected $translations;

    /** @var bool $shippingAddressAllowed */
    protected $shippingAddressAllowed;

    /** @var bool $shippingAddressEquality */
    protected $shippingAddressEquality;

    /** @var bool $rates */
    protected $rates;

    /** @var bool $shareBagEnabled */
    protected $shareBagEnabled;

    /** @var bool $organizationAllowed */
    protected $organizationAllowed;

    /** @var float $max */
    protected $max;

    /** @var float $min */
    protected $min;

    /**
     * Sets Accept Fee
     *
     * @param bool $acceptFee
     */
    public function setAcceptFee($acceptFee)
    {
        $this->acceptFee = filter_var($acceptFee, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sets Status
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status == 'active';

        return $this;
    }

    /**
     * Sets shipping address allowed
     *
     * @param bool $shippingAddressAllowed
     */
    public function setShippingAddressAllowed($shippingAddressAllowed)
    {
        $this->shippingAddressAllowed = filter_var($shippingAddressAllowed, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sets shipping address equality
     *
     * @param bool $shippingAddressEquality
     */
    public function setShippingAddressEquality($shippingAddressEquality)
    {
        $this->shippingAddressEquality = filter_var($shippingAddressEquality, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sets Options
     *
     * @param array $options
     *
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = new PaymentOptionOptionsEntity($options);

        return $this;
    }

    /**
     * Sets Translations
     *
     * @param array $translations
     *
     * @return $this
     */
    public function setTranslations($translations)
    {
        $this->translations = [];

        foreach ($translations as $item) {
            $this->translations[] = new PaymentOptionTranslationEntity($item);
        }

        return $this;
    }

    /**
     * Is redirect method
     *
     * @return bool
     */
    public function isRedirectMethod()
    {
        return (bool) $this->isRedirectMethod;
    }

    /**
     * Is submit method
     *
     * @return bool
     */
    public function isSubmitMethod()
    {
        return (bool) $this->isSubmitMethod;
    }

    /**
     * Is B2B method
     *
     * @return bool
     */
    public function isB2BMethod()
    {
        return (bool) $this->isB2bMethod;
    }

    /**
     * Is mixed business type
     *
     * @return bool
     */
    public function isMixedBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::MIXED);
    }

    /**
     * Is B2B business type
     *
     * @return bool
     */
    public function isB2BBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::B2B);
    }

    /**
     * Is B2C business type
     *
     * @return bool
     */
    public function isB2CBusinessType()
    {
        return (bool) ($this->getBusinessType() === BusinessType::B2C);
    }
}
