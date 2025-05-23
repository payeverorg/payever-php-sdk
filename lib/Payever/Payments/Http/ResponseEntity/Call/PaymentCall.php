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
 * @method string          getRequires2fa()
 * @method $this           setPaymentId(string $paymentId)
 * @method $this           setRequires2fa(bool $requires2fa)
 */
class PaymentCall extends CallEntity
{
    /** @var string $paymentId */
    protected $paymentId;

    protected $requires2fa;
}
