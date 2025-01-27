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

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity;

/**
 * This class represents Create Payment RequestInterface Entity
 *
 * @method string                 getChannel()
 * @method integer                getChannelSetId()
 * @method float                  getAmount()
 * @method float                  getFee()
 * @method string                 getOrderId()
 * @method string                 getCurrency()
 * @method CartItemEntity[]       getCart()
 * @method string                 getSalutation()
 * @method string                 getPaymentMethod()
 * @method string|null            getVariantId()
 * @method string                 getFirstName()
 * @method string                 getLastName()
 * @method string                 getStreet()
 * @method string                 getStreetNumber()
 * @method string                 getZip()
 * @method string                 getCity()
 * @method string                 getRegion()
 * @method string                 getCountry()
 * @method string                 getSocialSecurityNumber()
 * @method \DateTime|false        getBirthdate()
 * @method string                 getPhone()
 * @method string                 getEmail()
 * @method string                 getLocale()
 * @method string                 getShippingAddress()
 * @method string                 getSuccessUrl()
 * @method string                 getFailureUrl()
 * @method string                 getCancelUrl()
 * @method string                 getNoticeUrl()
 * @method string                 getPendingUrl()
 * @method string                 getCustomerRedirectUrl()
 * @method string                 getXFrameHost()
 * @method string                 getPluginVersion()
 * @method $this                  setChannel(string $channel)
 * @method $this                  setChannelSetId(int $id)
 * @method $this                  setAmount(float $amount)
 * @method $this                  setFee(float $fee)
 * @method $this                  setOrderId(string $id)
 * @method $this                  setPaymentMethod(string $method)
 * @method $this                  setVariantId(string|null $variantId)
 * @method $this                  setCurrency(string $currency)
 * @method $this                  setSalutation(string $salutation)
 * @method $this                  setFirstName(string $name)
 * @method $this                  setLastName(string $name)
 * @method $this                  setStreet(string $street)
 * @method $this                  setStreetNumber(string $streetNumber)
 * @method $this                  setZip(string $zip)
 * @method $this                  setCity(string $city)
 * @method $this                  setRegion(string $region)
 * @method $this                  setCountry(string $country)
 * @method $this                  setSocialSecurityNumber(string $ssn)
 * @method $this                  setPhone(string $phone)
 * @method $this                  setEmail(string $email)
 * @method $this                  setLocale(string $locale)
 * @method $this                  setSuccessUrl(string $url)
 * @method $this                  setFailureUrl(string $url)
 * @method $this                  setCancelUrl(string $url)
 * @method $this                  setNoticeUrl(string $url)
 * @method $this                  setPendingUrl(string $url)
 * @method $this                  setCustomerRedirectUrl(string $url)
 * @method $this                  setXFrameHost(string $host)
 * @method $this                  setPluginVersion(string $version)
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreatePaymentRequest extends RequestEntity
{
    /** @var string $channel */
    protected $channel;

    /** @var integer $channelSetId */
    protected $channelSetId;

    /** @var string $paymentMethod */
    protected $paymentMethod;

    /** @var string|null */
    protected $variantId;

    /** @var float $amount */
    protected $amount;

    /** @var float $fee */
    protected $fee;

    /** @var string $orderId */
    protected $orderId;

    /** @var string $currency */
    protected $currency;

    /** @var CartItemEntity[] $cart */
    protected $cart;

    /** @var string $salutation */
    protected $salutation;

    /** @var string $firstName */
    protected $firstName;

    /** @var string $lastName */
    protected $lastName;

    /** @var string $street */
    protected $street;

    /** @var string $streetNumber */
    protected $streetNumber;

    /** @var string $zip */
    protected $zip;

    /** @var string $city */
    protected $city;

    /** @var string $region */
    protected $region;

    /** @var string $country */
    protected $country;

    /** @var string $socialSecurityNumber */
    protected $socialSecurityNumber;

    /** @var \DateTime|bool $birthdate */
    protected $birthdate;

    /** @var string $phone */
    protected $phone;

    /** @var string $email */
    protected $email;

    /** @var string $successUrl */
    protected $successUrl;

    /** @var string $failureUrl */
    protected $failureUrl;

    /** @var string $cancelUrl */
    protected $cancelUrl;

    /** @var string $noticeUrl */
    protected $noticeUrl;

    /** @var string $pendingUrl */
    protected $pendingUrl;

    /** @var string $customerRedirectUrl */
    protected $customerRedirectUrl;

    /** @var string $xFrameHost */
    protected $xFrameHost;

    /** @var string $pluginVersion */
    protected $pluginVersion;

    /** @var CustomerAddressEntity $shippingAddress */
    protected $shippingAddress;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'channel',
            'amount',
            'order_id',
            'currency',
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
            is_numeric($this->amount) &&
            is_array($this->cart) &&
            !empty($this->cart) &&
            (!$this->channelSetId || is_integer($this->channelSetId)) &&
            (!$this->fee || is_numeric($this->fee)) &&
            (!$this->birthdate || $this->birthdate instanceof \DateTime);
    }

    /**
     * Sets Cart
     *
     * @param array|string $cart
     *
     * @return $this
     */
    public function setCart($cart)
    {
        if (!$cart) {
            return $this;
        }

        if (is_string($cart)) {
            $cart = json_decode($cart);
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
     * Sets shipping address
     *
     * @param CustomerAddressEntity|string $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        if (!$shippingAddress) {
            return $this;
        }

        if (is_string($shippingAddress)) {
            $shippingAddress = json_decode($shippingAddress);
        }

        if (!is_array($shippingAddress) && !is_object($shippingAddress)) {
            return $this;
        }

        $this->shippingAddress = new CustomerAddressEntity($shippingAddress);

        return $this;
    }

    /**
     * Sets Birthdate
     *
     * @param string $birthdate
     *
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        if ($birthdate) {
            $this->birthdate = date_create($birthdate);
        }

        return $this;
    }
}
