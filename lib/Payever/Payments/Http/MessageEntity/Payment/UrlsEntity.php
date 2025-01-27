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

namespace Payever\Sdk\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Urls entity
 *
 * @method string getRedirect()
 * @method string getSuccess()
 * @method string getPending()
 * @method string getFailure()
 * @method string getCancel()
 * @method string getNotification()
 * @method $this  setRedirect(string $value)
 * @method $this  setSuccess(string $value)
 * @method $this  setPending(string $value)
 * @method $this  setFailure(string $value)
 * @method $this  setCancel(string $value)
 * @method $this  setNotification(string $value)
 */
class UrlsEntity extends MessageEntity
{
    /** @var string $redirect */
    protected $redirect;

    /** @var string $success */
    protected $success;

    /** @var string $pending */
    protected $pending;

    /** @var string $failure */
    protected $failure;

    /** @var string $cancel */
    protected $cancel;

    /** @var string $notification */
    protected $notification;
}
