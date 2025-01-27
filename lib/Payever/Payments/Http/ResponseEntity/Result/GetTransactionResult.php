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
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;

/**
 * This class represents Get Transaction Result Entity
 *
 * @method string        getMerchantReference()
 * @method string        getId()
 * @method string        getStatus()
 * @method string        getSpecificStatus()
 * @method string        getColorState()
 * @method string        getMerchantName()
 * @method string        getCustomerName()
 * @method string        getPaymentType()
 * @method string        getLastAction()
 * @method string        getCustomerEmail()
 * @method \DateTime|false getCreatedAt()
 * @method \DateTime|false getUpdatedAt()
 * @method string        getChannel()
 * @method string        getReference()
 * @method float         getAmount()
 * @method string        getCurrency()
 * @method float         getFee()
 * @method float         getTotal()
 * @method AddressEntity getAddress()
 * @method AddressEntity getShippingAddress()
 * @method array         getPaymentDetailsArray()
 * @method int           getBusinessShippingOptionId()
 * @method string        getShippingType()
 * @method string        getShippingOptionName()
 * @method string        getShippingCategory()
 * @method string        getShippingMethodCode()
 * @method string        getShippingMethodName()
 * @method string        getDetailsSearchKey()
 * @method string        getCallbackTrigger()
 * @method string        getPlace()
 * @method float         getDeliveryFee()
 * @method float         getPaymentFee()
 * @method float         getDownPayment()
 * @method bool          getPaymentFeeAcceptedByMerchant()
 * @method bool          getPrefilled()
 * @method \stdClass[]   getActions()
 * @method float         getAmountCanceled()
 * @method float         getAmountCancelRest()
 * @method float         getAmountCaptured()
 * @method float         getAmountCaptureRest()
 * @method float         getAmountInvoiced()
 * @method float         getAmountInvoiceRest()
 * @method float         getAmountRefunded()
 * @method float         getAmountRefundRest()
 * @method $this         setMerchantReference(string $merchantReference)
 * @method $this         setId(string $id)
 * @method $this         setStatus(string $status)
 * @method $this         setSpecificStatus(string $specificStatus)
 * @method $this         setColorState(string $colorState)
 * @method $this         setMerchantName(string $merchantName)
 * @method $this         setCustomerName(string $customerName)
 * @method $this         setPaymentType(string $paymentType)
 * @method $this         setLastAction(string $lastAction)
 * @method $this         setCustomerEmail(string $customerEmail)
 * @method $this         setChannel(string $channel)
 * @method $this         setReference(string $reference)
 * @method $this         setAmount(float $amount)
 * @method $this         setCurrency(string $currency)
 * @method $this         setFee(float $fee)
 * @method $this         setTotal(float $total)
 * @method $this         setPaymentDetailsArray(array $paymentDetailsArray)
 * @method $this         setBusinessShippingOptionId(int $businessShippingOptionId)
 * @method $this         setShippingType(string $shippingType)
 * @method $this         setShippingOptionName(string $shippingOptionName)
 * @method $this         setShippingCategory(string $shippingCategory)
 * @method $this         setShippingMethodCode(string $shippingMethodCode)
 * @method $this         setShippingMethodName(string $shippingMethodName)
 * @method $this         setDetailsSearchKey(string $detailsSearchKey)
 * @method $this         setCallbackTrigger(string $callbackTrigger)
 * @method $this         setPlace(string $place)
 * @method $this         setDeliveryFee(float $deliveryFee)
 * @method $this         setPaymentFee(float $paymentFee)
 * @method $this         setDownPayment(float $downPayment)
 * @method $this         setActions(array $actions)
 * @method $this         setAmountCanceled(float $amountCanceled)
 * @method $this         setAmountCancelRest(float $amountCancelRest)
 * @method $this         setAmountCaptured(float $amountCaptured)
 * @method $this         setAmountCaptureRest(float $amountCaptureRest)
 * @method $this         setAmountInvoiced(float $amountInvoiced)
 * @method $this         setAmountInvoiceRest(float $amountInvoiceRest)
 * @method $this         setAmountRefunded(float $amountRefunded)
 * @method $this         setAmountRefundRest(float $amountRefundRest)
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class GetTransactionResult extends ResultEntity
{
    /** @var string $merchantReference */
    protected $merchantReference;

    /** @var string $id */
    protected $id;

    /** @var string $status*/
    protected $status;

    /** @var string $specificStatus */
    protected $specificStatus;

    /** @var string $colorState */
    protected $colorState;

    /** @var string $merchantName */
    protected $merchantName;

    /** @var string $customerName */
    protected $customerName;

    /** @var string $paymentType */
    protected $paymentType;

    /** @var string $lastAction */
    protected $lastAction;

    /** @var string $customerEmail */
    protected $customerEmail;

    /** @var \DateTime|bool $createdAt */
    protected $createdAt;

    /** @var \DateTime|bool $updatedAt */
    protected $updatedAt;

    /** @var string $channel */
    protected $channel;

    /** @var string $reference */
    protected $reference;

    /** @var float $amount */
    protected $amount;

    /** @var string $currency */
    protected $currency;

    /** @var float $fee */
    protected $fee;

    /** @var float $total */
    protected $total;

    /** @var AddressEntity $address */
    protected $address;

    /** @var AddressEntity $shippingAddress */
    protected $shippingAddress;

    /** @var array $paymentDetailsArray */
    protected $paymentDetailsArray;

    /** @var int $businessShippingOptionId */
    protected $businessShippingOptionId;

    /** @var string $shippingType */
    protected $shippingType;

    /** @var string $shippingOptionName */
    protected $shippingOptionName;

    /** @var string $shippingCategory */
    protected $shippingCategory;

    /** @var string $shippingMethodCode */
    protected $shippingMethodCode;

    /** @var string $shippingMethodName */
    protected $shippingMethodName;

    /** @var string $detailsSearchKey */
    protected $detailsSearchKey;

    /** @var string $callbackTrigger */
    protected $callbackTrigger;

    /** @var string $place */
    protected $place;

    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var float $paymentFee */
    protected $paymentFee;

    /** @var float $downPayment */
    protected $downPayment;

    /** @var bool $paymentFeeAcceptedByMerchant */
    protected $paymentFeeAcceptedByMerchant;

    /** @var bool $prefilled */
    protected $prefilled;

    /** @var \stdClass[]|array $actions */
    protected $actions;

    /** @var float $amountCanceled */
    protected $amountCanceled;

    /** @var float $amountCancelRest */
    protected $amountCancelRest;

    /** @var float $amountCaptured */
    protected $amountCaptured;

    /** @var float $amountCaptureRest */
    protected $amountCaptureRest;

    /** @var float $amountInvoiced */
    protected $amountInvoiced;

    /** @var float $amountInvoiceRest */
    protected $amountInvoiceRest;

    /** @var float $amountRefunded */
    protected $amountRefunded;

    /** @var float $amountRefundRest */
    protected $amountRefundRest;

    /**
     * Sets Created At
     *
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        if ($createdAt) {
            $this->createdAt = date_create($createdAt);
        }

        return $this;
    }

    /**
     * Sets Updated At
     *
     * @param string $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        if ($updatedAt) {
            $this->updatedAt = date_create($updatedAt);
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
     * Sets Payment Fee Accepted By Merchant
     *
     * @param bool $paymentFeeAcceptedByMerchant
     *
     * @return $this
     */
    public function setPaymentFeeAcceptedByMerchant($paymentFeeAcceptedByMerchant)
    {
        $this->paymentFeeAcceptedByMerchant = filter_var($paymentFeeAcceptedByMerchant, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }

    /**
     * Sets Prefilled
     *
     * @param bool $prefilled
     *
     * @return $this
     */
    public function setPrefilled($prefilled)
    {
        $this->prefilled = filter_var($prefilled, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }
}
