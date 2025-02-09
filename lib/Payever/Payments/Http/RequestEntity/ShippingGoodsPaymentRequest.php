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
use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\RequestEntity\Action\ShippingDetailsEntity;

/**
 * This class represents Shipping Goods Payment RequestInterface Entity
 *
 * @method float                 getAmount()
 * @method $this                 setAmount(float $amount)
 * @method float                 getDeliveryFee()
 * @method string                getReason()
 * @method $this                 setReason(string $reason)
 * @method array                 getPaymentItems()
 * @method ShippingDetailsEntity getShippingDetails()
 * @method string                getInvoiceId()
 * @method $this                 setInvoiceId(string $invoiceId)
 * @method string                getInvoiceUrl()
 * @method $this                 setInvoiceUrl(string $invoiceUrl)
 * @method string                getPoNumber()
 * @method $this                 setPoNumber(string $poNumber)
 */
class ShippingGoodsPaymentRequest extends RequestEntity
{
    /** @var string $reason */
    protected $reason;

    /** @var float $amount */
    protected $amount;

    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var PaymentItemEntity[] $paymentItems */
    protected $paymentItems;

    /** @var ShippingDetailsEntity $shippingDetails */
    protected $shippingDetails;

    /** @var string $invoiceId */
    protected $invoiceId;

    /** @var string $invoiceUrl */
    protected $invoiceUrl;

    /** @var string $poNumber */
    protected $poNumber;

    /**
     * Sets Payment Items
     *
     * @param array|string $paymentItems
     *
     * @return $this
     */
    public function setPaymentItems($paymentItems)
    {
        if (!$paymentItems) {
            return $this;
        }

        if (is_string($paymentItems)) {
            $paymentItems = json_decode($paymentItems);
        }

        if (!is_array($paymentItems)) {
            return $this;
        }

        $this->paymentItems = [];

        foreach ($paymentItems as $item) {
            $this->paymentItems[] = new PaymentItemEntity($item);
        }

        return $this;
    }

    /**
     * Sets shipping details
     *
     * @param ShippingDetailsEntity|string $shippingDetails
     *
     * @return $this
     */
    public function setShippingDetails($shippingDetails)
    {
        if (!$shippingDetails) {
            return $this;
        }

        if (is_string($shippingDetails)) {
            $shippingDetails = json_decode($shippingDetails);
        }

        if (!is_array($shippingDetails) && !is_object($shippingDetails)) {
            return $this;
        }

        $this->shippingDetails = new ShippingDetailsEntity($shippingDetails);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        if (is_array($this->paymentItems)) {
            foreach ($this->paymentItems as $item) {
                if (!$item instanceof PaymentItemEntity || !$item->isValid()) {
                    return false;
                }
            }
        }

        return parent::isValid() && (!$this->paymentItems || is_array($this->paymentItems));
    }

    /**
     * @param mixed $deliveryFee
     *
     * @return $this
     */
    public function setDeliveryFee($deliveryFee)
    {
        $this->deliveryFee = (float)$deliveryFee;

        return $this;
    }
}
