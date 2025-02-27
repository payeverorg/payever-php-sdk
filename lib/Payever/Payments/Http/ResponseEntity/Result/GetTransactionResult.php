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

/**
 * This class represents Get Transaction Result Entity
 *
 * @method bool          getActionRunning()
 * @method string        getChannelSetId()
 * @method string        getPaymentFlowId()
 * @method array         getSantanderApplications()
 * @method string        getType()
 * @method \stdClass[]   getActions()
 * @method float         getAmountCanceled()
 * @method float         getAmountCancelRest()
 * @method float         getAmountCaptured()
 * @method float         getAmountCaptureRest()
 * @method float         getAmountInvoiced()
 * @method float         getAmountInvoiceRest()
 * @method float         getAmountRefunded()
 * @method float         getAmountRefundRest()
 * @method $this         setActionRunning(bool $actionRunning)
 * @method $this         setChannelSetId(string $channelSetId)
 * @method $this         setPaymentFlowId(string $paymentFlowId)
 * @method $this         setSantanderApplications(array $santanderApplications)
 * @method $this         setType(string $type)
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
class GetTransactionResult extends PaymentResult
{
    /** @var bool $actionRunning */
    protected $actionRunning;

    /** @var string $channelSetId */
    protected $channelSetId;

    /** @var string $paymentFlowId */
    protected $paymentFlowId;

    /** @var array $santanderApplications */
    protected $santanderApplications;

    /** @var string $type */
    protected $type;

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
}
