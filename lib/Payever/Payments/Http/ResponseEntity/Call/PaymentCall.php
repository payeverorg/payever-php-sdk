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

use Payever\Sdk\Core\Http\MessageEntity\CallEntity;

/**
 * This class represents Payment Call Entity
 *
 * @method string          getPaymentId()
 * @method string          getCustomerId()
 * @method string          getInvoiceId()
 * @method \DateTime|false getInvoiceDate()
 * @method string          getType()
 * @method string          getMessage()
 * @method $this           setPaymentId(string $paymentId)
 * @method $this           setCustomerId(string $customerId)
 * @method $this           setInvoiceId(string $invoiceId)
 * @method $this           setType(string $type)
 * @method $this           setMessage(string $message)
 */
class PaymentCall extends CallEntity
{
    /** @var string $paymentId */
    protected $paymentId;

    /** @var string $customerId */
    protected $customerId;

    /** @var string $invoiceId */
    protected $invoiceId;

    /** @var \DateTime|bool $invoiceDate */
    protected $invoiceDate;

    /** @var string $type */
    protected $type;

    /** @var string $message */
    protected $message;

    /**
     * Sets Invoice Date
     *
     * @param string $invoiceDate
     *
     * @return $this
     */
    public function setInvoiceDate($invoiceDate)
    {
        if ($invoiceDate) {
            $this->invoiceDate = date_create($invoiceDate);
        }

        return $this;
    }
}
