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
use Payever\Sdk\Payments\Http\MessageEntity\PaymentDetailsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;

/**
 * This class represents List Payments Result Entity
 *
 * @method string               getId()
 * @method string               getStatus()
 * @method string               getColorState()
 * @method string               getMerchantName()
 * @method string               getCustomerName()
 * @method string               getPaymentType()
 * @method \DateTime|false      getCreatedAt()
 * @method \DateTime|false      getUpdatedAt()
 * @method string               getChannel()
 * @method string               getReference()
 * @method float                getAmount()
 * @method string               getCurrency()
 * @method float                getFee()
 * @method float                getTotal()
 * @method AddressEntity        getAddress()
 * @method PaymentDetailsEntity getPaymentDetails()
 * @method $this                setId(string $id)
 * @method $this                setStatus(string $status)
 * @method $this                setColorState(string $colorState)
 * @method $this                setMerchantName(string $merchantName)
 * @method $this                setCustomerName(string $customerName)
 * @method $this                setPaymentType(string $paymentType)
 * @method $this                setChannel(string $channel)
 * @method $this                setReference(string $reference)
 * @method $this                setAmount(float $amount)
 * @method $this                setCurrency(string $currency)
 * @method $this                setFee(float $fee)
 * @method $this                setTotal(float $total)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class ListPaymentsResult extends ResultEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $status */
    protected $status;

    /** @var string $colorState */
    protected $colorState;

    /** @var string $merchantName */
    protected $merchantName;

    /** @var string $customerName */
    protected $customerName;

    /** @var string $paymentType */
    protected $paymentType;

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

    /** @var PaymentDetailsEntity $paymentDetails */
    protected $paymentDetails;

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
}
