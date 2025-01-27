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

/**
 * This class represents Refund Payment items RequestInterface Entity
 *
 * @method float getDeliveryFee()
 * @method float getPaymentItems()
 * @method $this setPaymentItems(array $paymentItems)
 */
class RefundItemsPaymentRequest extends RequestEntity
{
    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var PaymentItemEntity[] $paymentItems */
    protected $paymentItems;

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

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() && (!$this->paymentItems || is_array($this->paymentItems));
    }
}
