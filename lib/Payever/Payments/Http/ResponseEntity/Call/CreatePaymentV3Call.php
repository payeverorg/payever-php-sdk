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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Call;

use DateTime;
use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\CallEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;

/**
 * This class represents Create Payment Call Entity
 *
 * @method string           getStatus()
 * @method string           getId()
 * @method \DateTime|false  getCreatedAt()
 * @method string           getChannel()
 * @method float            getAmount()
 * @method float            getPaymentFee()
 * @method float            getDeliveryFee()
 * @method string           getReference()
 * @method string           getCurrency()
 * @method CartItemEntity[] getCart()
 * @method AddressEntity    getAddress()
 * @method AddressEntity    getShippingAddress()
 * @method string           getCustomerEmail()
 * @method float            getTotal()
 * @method float            getDownPayment()
 * @method string           getSuccessUrl()
 * @method string           getFailureUrl()
 * @method string           getCancelUrl()
 * @method string           getNoticeUrl()
 * @method string           getPendingUrl()
 * @method string           getCustomerRedirectUrl()
 * @method string           getPaymentType()
 * @method $this            setStatus(string $status)
 * @method $this            setId(string $id)
 * @method $this            setChannel(string $name)
 * @method $this            setAmount(float $amount)
 * @method $this            setPaymentFee(float $paymentFee)
 * @method $this            setDeliveryFee(float $deliveryFee)
 * @method $this            setReference(string $reference)
 * @method $this            setCurrency(string $currency)
 * @method $this            setCustomerEmail(string $email)
 * @method $this            setTotal(float $total)
 * @method $this            setDownPayment(float $downPayment)
 * @method $this            setSuccessUrl(string $successUrl)
 * @method $this            setFailureUrl(string $failureUrl)
 * @method $this            setCancelUrl(string $cancelUrl)
 * @method $this            setNoticeUrl(string $noticeUrl)
 * @method $this            setPendingUrl(string $pendingUrl)
 * @method $this            setCustomerRedirectUrl(string $url)
 * @method $this            setPaymentType(string $paymentType)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreatePaymentV3Call extends CallEntity
{
    /** @var string $status */
    protected $status;

    /** @var string $id */
    protected $id;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

    /** @var string $channel */
    protected $channel;

    /** @var float $amount */
    protected $amount;

    /** @var float $paymentFee */
    protected $paymentFee;

    /** @var float $fee */
    protected $deliveryFee;

    /** @var string $reference */
    protected $reference;

    /** @var string $currency */
    protected $currency;

    /** @var CartItemEntity[] $cart */
    protected $cart;

    /** @var AddressEntity $address */
    protected $address;

    /** @var AddressEntity $shippingAddress */
    protected $shippingAddress;

    /** @var string $customerEmail */
    protected $customerEmail;

    /** @var float $total */
    protected $total;

    /** @var float $downPayment */
    protected $downPayment;

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

    /** @var string $paymentType */
    protected $paymentType;

    /**
     * Sets Cart
     *
     * @param array|string $cart
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setCart($cart)
    {
        if (is_string($cart)) {
            $cart = StringHelper::jsonDecode($cart);
        }

        if ($cart && is_array($cart)) {
            foreach ($cart as $item) {
                $this->cart[] = new CartItemEntity($item);
            }
        }

        return $this;
    }

    /**
     * Sets Address
     *
     * @param array $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = new AddressEntity($address);

        return $this;
    }

    /**
     * Sets Shipping Address
     *
     * @param array $shippingAddress
     *
     * @return $this
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = new AddressEntity($shippingAddress);

        return $this;
    }

    /**
     * Sets Created At
     *
     * @param DateTime|string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        if (!$createdAt) {
            return $this;
        }

        if ($createdAt instanceof DateTime) {
            $this->createdAt = $createdAt;

            return $this;
        }

        if (is_string($createdAt)) {
            $this->createdAt = date_create($createdAt);
        }

        return $this;
    }
}
