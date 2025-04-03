<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Core\Helper\DataHelper;
use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CompanyEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\OptionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SellerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;

/**
 * This class represents Create Payment RequestInterface Entity
 *
 * @method ChannelEntity           getChannel()
 * @method PurchaseEntity          getPurchase()
 * @method CustomerEntity          getCustomer()
 * @method CompanyEntity           getCompany()
 * @method CustomerAddressEntity   getBillingAddress()
 * @method CustomerAddressEntity   getShippingAddress()
 * @method ShippingOptionEntity    getShippingOption()
 * @method CartItemEntity[]        getCart()
 * @method SplitItemEntity[]       getSplits()
 * @method UrlsEntity              getUrls()
 * @method OptionsEntity           getOptions()
 * @method VerifyEntity            getVerify()
 * @method SellerEntity            getSeller()
 * @method AttributesEntity        getAttributes()
 * @method string                  getReference()
 * @method string                  getReferenceExtra()
 * @method string|null             getPaymentVariantId()
 * @method string|null             getPaymentMethod()
 * @method array                   getPaymentMethods()
 * @method string|null             getPaymentIssuer()
 * @method string                  getLocale()
 * @method string                  getXFrameHost()
 * @method string                  getPluginVersion()
 * @method string                  getClientIp()
 * @method \DateTime|null          getExpiresAt()
 * @method PaymentDataEntity|null  getPaymentData()
 * @method $this                   setReference(string $id)
 * @method $this                   setReferenceExtra(string $id)
 * @method $this                   setPaymentVariantId(string|null $variantId)
 * @method $this                   setPaymentMethod(string $paymentMethod)
 * @method $this                   setPaymentMethods(array $paymentMethods)
 * @method $this                   setPaymentIssuer(string $paymentIssuer)
 * @method $this                   setLocale(string $locale)
 * @method $this                   setXFrameHost(string $host)
 * @method $this                   setPluginVersion(string $version)
 * @method $this                   setClientIp(string $ip)
 *
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class CreatePaymentRequest extends RequestEntity
{
    /** @var ChannelEntity $channel */
    protected $channel;

    /** @var string $locale */
    protected $locale;

    /** @var PurchaseEntity $purchase */
    protected $purchase;

    /** @var CustomerEntity $customer */
    protected $customer;

    /** @var CompanyEntity $company */
    protected $company;

    /** @var ShippingOptionEntity $shippingOption */
    protected $shippingOption;

    /** @var CustomerAddressEntity $shippingAddress */
    protected $shippingAddress;

    /** @var CustomerAddressEntity $billingAddress */
    protected $billingAddress;

    /** @var AttributesEntity $attributes */
    protected $attributes;

    /** @var UrlsEntity $urls */
    protected $urls;

    /** @var VerifyEntity $verify */
    protected $verify;

    /** @var SellerEntity $seller */
    protected $seller;

    /** @var OptionsEntity $options */
    protected $options;

    /** @var string $xFrameHost */
    protected $xFrameHost;

    /** @var string $pluginVersion */
    protected $pluginVersion;

    /** @var string $clientIp */
    protected $clientIp;

    /** @var \DateTime|null $expiresAt */
    protected $expiresAt;

    /** @var string $reference */
    protected $reference;

    /** @var string $referenceExtra */
    protected $referenceExtra;

    /** @var CartItemEntity[] $cart */
    protected $cart;

    /** @var SplitItemEntity[] $splits */
    protected $splits;

    /** @var PaymentDataEntity $paymentData */
    protected $paymentData;

    /** @var string|null $paymentMethod */
    protected $paymentMethod;

    /** @var string $paymentIssuer */
    protected $paymentIssuer;

    /** @var array $paymentMethods */
    protected $paymentMethods;

    /** @var string $paymentVariantId */
    protected $paymentVariantId;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'channel',
            'reference',
            'purchase',
            'customer',
            'billing_address',
            'urls',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function isValid()
    {
        if (is_array($this->cart)) {
            foreach ($this->cart as $item) {
                if (!$item instanceof CartItemEntity || !$item->isValid()) {
                    return false;
                }
            }
        }

        return parent::isValid() &&
            is_array($this->cart) &&
            !empty($this->cart) &&
            (!$this->expiresAt || $this->expiresAt instanceof \DateTime);
    }

    /**
     * Sets Purchase
     *
     * @param PurchaseEntity|array $purchase
     *
     * @return $this
     */
    public function setPurchase($purchase)
    {
        $purchase = DataHelper::getEntityInstance($purchase, PurchaseEntity::class);
        if ($purchase) {
            $this->purchase = $purchase;
        }

        return $this;
    }

    /**
     * Sets Customer
     *
     * @param CustomerEntity|array $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $customer = DataHelper::getEntityInstance($customer, CustomerEntity::class);
        if ($customer) {
            $this->customer = $customer;
        }

        return $this;
    }

    /**
     * Sets Company
     *
     * @param CompanyEntity|array $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $company = DataHelper::getEntityInstance($company, CompanyEntity::class);
        if ($company) {
            $this->company = $company;
        }

        return $this;
    }

    /**
     * Sets Shipping option
     *
     * @param ShippingOptionEntity|array $shippingOption
     *
     * @return $this
     */
    public function setShippingOption($shippingOption)
    {
        $shippingOption = DataHelper::getEntityInstance($shippingOption, ShippingOptionEntity::class);
        if ($shippingOption) {
            $this->shippingOption = $shippingOption;
        }

        return $this;
    }

    /**
     * Sets Cart
     *
     * @param CartItemEntity[]|array|string $cart
     *
     * @return $this
     */
    public function setCart($cart)
    {
        if (!$cart) {
            return $this;
        }

        if (is_string($cart)) {
            try {
                $cart = StringHelper::jsonDecode($cart, true);
            } catch (\UnexpectedValueException $exception) {
                return $this;
            }
        }

        if (!is_array($cart)) {
            return $this;
        }

        $this->cart = [];
        foreach ($cart as $item) {
            $this->cart[] = new CartItemEntity($item);
        }

        return $this;
    }

    /**
     * Sets Splits
     * Routing of accounts and amount to split payment.
     *
     * @param SplitItemEntity[]|array $splits
     *
     * @return $this
     */
    public function setSplits($splits)
    {
        if (!$splits) {
            return $this;
        }

        if (is_string($splits)) {
            try {
                $splits = StringHelper::jsonDecode($splits, true);
            } catch (\UnexpectedValueException $exception) {
                return $this;
            }
        }

        if (!is_array($splits)) {
            return $this;
        }

        $this->splits = [];
        foreach ($splits as $split) {
            $this->splits[] = new SplitItemEntity($split);
        }

        return $this;
    }

    /**
     * Sets shipping address
     *
     * @param CustomerAddressEntity|array $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        $shippingAddress = DataHelper::getEntityInstance($shippingAddress, CustomerAddressEntity::class);
        if ($shippingAddress) {
            $this->shippingAddress = $shippingAddress;
        }

        return $this;
    }

    /**
     * Sets billing address
     *
     * @param CustomerAddressEntity|array $billingAddress
     *
     * @return $this
     */
    public function setBillingAddress($billingAddress)
    {
        $billingAddress = DataHelper::getEntityInstance($billingAddress, CustomerAddressEntity::class);
        if ($billingAddress) {
            $this->billingAddress = $billingAddress;
        }

        return $this;
    }

    /**
     * Sets Attributes
     *
     * @param AttributesEntity|array $attributes
     *
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $attributes = DataHelper::getEntityInstance($attributes, AttributesEntity::class);
        if ($attributes) {
            $this->attributes = $attributes;
        }

        return $this;
    }

    /**
     * Sets Urls
     *
     * @param UrlsEntity|array $urls
     *
     * @return $this
     */
    public function setUrls($urls)
    {
        $urls = DataHelper::getEntityInstance($urls, UrlsEntity::class);
        if ($urls) {
            $this->urls = $urls;
        }

        return $this;
    }

    /**
     * Sets Verify
     *
     * @param VerifyEntity|array $verify
     *
     * @return $this
     */
    public function setVerify($verify)
    {
        $verify = DataHelper::getEntityInstance($verify, VerifyEntity::class);
        if ($verify) {
            $this->verify = $verify;
        }

        return $this;
    }

    /**
     * Sets Seller
     *
     * @param SellerEntity|array $seller
     *
     * @return $this
     */
    public function setSeller($seller)
    {
        $seller = DataHelper::getEntityInstance($seller, SellerEntity::class);
        if ($seller) {
            $this->seller = $seller;
        }

        return $this;
    }

    /**
     * Sets Options
     *
     * @param OptionsEntity|array $options
     *
     * @return $this
     */
    public function setOptions($options)
    {
        $options = DataHelper::getEntityInstance($options, OptionsEntity::class);
        if ($options) {
            $this->options = $options;
        }

        return $this;
    }

    /**
     * Sets payment data
     *
     * @param PaymentDataEntity|array $paymentData
     *
     * @return $this
     */
    public function setPaymentData($paymentData)
    {
        $paymentData = DataHelper::getEntityInstance($paymentData, PaymentDataEntity::class);
        if ($paymentData) {
            $this->paymentData = $paymentData;
        }

        return $this;
    }

    /**
     * Sets Channel
     *
     * @param ChannelEntity|mixed $channel
     *
     * @return $this
     */
    public function setChannel($channel)
    {
        $channel = DataHelper::getEntityInstance($channel, ChannelEntity::class);
        if ($channel) {
            $this->channel = $channel;
        }

        return $this;
    }

    /**
     * Define specific expire time for a payment, default has no expiration.
     *
     * @param \DateTime|string $expiresAt
     *
     * @return $this
     */
    public function setExpiresAt($expiresAt)
    {
        if (!$expiresAt) {
            return $this;
        }

        if ($expiresAt instanceof \DateTime) {
            $this->expiresAt = $expiresAt;

            return $this;
        }

        if (is_string($expiresAt)) {
            $this->expiresAt = date_create($expiresAt);
        }

        return $this;
    }
}
