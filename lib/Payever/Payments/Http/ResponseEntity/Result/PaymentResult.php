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

use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Http\MessageEntity\PaymentDetailsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemRetrieveEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;

/**
 * This class represents Payment Result Entity
 *
 * @method string                    getId()
 * @method string                    getStatus()
 * @method string                    getSpecificStatus()
 * @method string                    getMerchantName()
 * @method string                    getCustomerName()
 * @method string                    getCustomerEmail()
 * @method string                    getPaymentType()
 * @method \DateTime|false           getCreatedAt()
 * @method \DateTime|false           getUpdatedAt()
 * @method string                    getChannel()
 * @method string                    getChannelType()
 * @method string                    getChannelSource()
 * @method string                    getReference()
 * @method float                     getAmount()
 * @method float                     getTotal()
 * @method string                    getCurrency()
 * @method float                     getDeliveryFee()
 * @method float                     getPaymentFee()
 * @method float                     getDownPayment()
 * @method AddressEntity             getAddress()
 * @method AddressEntity             getShippingAddress()
 * @method PaymentDetailsEntity      getPaymentDetails()
 * @method array                     getPaymentDetailsArray()
 * @method ShippingOptionEntity      getShippingOption()
 * @method CartItemRetrieveEntity[]  getItems()
 * @method \stdClass[]               getHistory()
 * @method $this                     setId(string $id)
 * @method $this                     setStatus(string $status)
 * @method $this                     setSpecificStatus(string $specificStatus)
 * @method $this                     setMerchantName(string $merchantName)
 * @method $this                     setCustomerName(string $customerName)
 * @method $this                     setCustomerEmail(string $customerEmail)
 * @method $this                     setPaymentType(string $paymentType)
 * @method $this                     setChannel(string $channel)
 * @method $this                     setChannelType(string $channelType)
 * @method $this                     setChannelSource(string $channelSource)
 * @method $this                     setReference(string $reference)
 * @method $this                     setAmount(float $amount)
 * @method $this                     setTotal(float $total)
 * @method $this                     setCurrency(string $currency)
 * @method $this                     setDeliveryFee(float $deliveryFee)
 * @method $this                     setPaymentFee(float $paymentFee)
 * @method $this                     setDownPayment(float $downPayment)
 * @method $this                     setHistory(array $history)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class PaymentResult extends ResultEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $status */
    protected $status;

    /** @var string $specificStatus */
    protected $specificStatus;

    /** @var string $merchantName */
    protected $merchantName;

    /** @var string $customerName */
    protected $customerName;

    /** @var string $customerName */
    protected $customerEmail;

    /** @var string $paymentType */
    protected $paymentType;

    /** @var string $paymentIssuer */
    protected $paymentIssuer;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

    /** @var \DateTime|bool $updatedAt */
    protected $updatedAt;

    /** @var string $channel */
    protected $channel;

    /** @var string $channelType */
    protected $channelType;

    /** @var string $channelSource */
    protected $channelSource;

    /** @var string $reference */
    protected $reference;

    /** @var float $amount */
    protected $amount;

    /** @var float $total */
    protected $total;

    /** @var float $initialTotal */
    protected $initialTotal;

    /** @var float $remainingTotal */
    protected $remainingTotal;

    /** @var string $currency */
    protected $currency;

    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var float $paymentFee */
    protected $paymentFee;

    /** @var float $downPayment */
    protected $downPayment;

    /** @var PaymentDetailsEntity $paymentDetails */
    protected $paymentDetails;

    /** @var array $paymentDetailsArray */
    protected $paymentDetailsArray;

    /** @var AddressEntity $address */
    protected $address;

    /** @var AddressEntity $shippingAddress */
    protected $shippingAddress;

    /** @var ShippingOptionEntity $shippingOption */
    protected $shippingOption;

    /** @var CartItemRetrieveEntity[] */
    protected $items;

    /** @var \stdClass[]|array $history */
    protected $history;

    /**
     * Sets Created At
     *
     * @param string|\DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        if (!$createdAt) {
            return $this;
        }

        if ($createdAt instanceof \DateTime) {
            $this->createdAt = $createdAt;

            return $this;
        }

        if (is_string($createdAt)) {
            $this->createdAt = date_create($createdAt);
        }

        return $this;
    }

    /**
     * Sets Updated At
     *
     * @param string|\DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        if (!$updatedAt) {
            return $this;
        }

        if ($updatedAt instanceof \DateTime) {
            $this->updatedAt = $updatedAt;

            return $this;
        }

        if (is_string($updatedAt)) {
            $this->updatedAt = date_create($updatedAt);
        }

        return $this;
    }

    /**
     * Sets Payment Details
     *
     * @param array $paymentDetails
     *
     * @return $this
     */
    public function setPaymentDetails($paymentDetails)
    {
        $this->paymentDetails = new PaymentDetailsEntity($paymentDetails);

        return $this;
    }

    /**
     * Sets Payment Details Array
     *
     * @param \stdClass|array $details
     *
     * @return $this
     */
    public function setPaymentDetailsArray($details)
    {
        if ($details instanceof \stdClass) {
            $details = (array) $details;
        }

        $this->paymentDetailsArray = $details;

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
     * Sets Shipping Option
     *
     * @param array $shippingOption
     *
     * @return $this
     */
    public function setShippingOption($shippingOption)
    {
        $this->shippingOption = new ShippingOptionEntity($shippingOption);

        return $this;
    }

    /**
     * Sets Items
     *
     * @param array|string $items
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setItems($items)
    {
        if (is_string($items)) {
            $items = StringHelper::jsonDecode($items);
        }

        if ($items && is_array($items)) {
            foreach ($items as $item) {
                $this->items[] = new CartItemRetrieveEntity($item);
            }
        }

        return $this;
    }
}
