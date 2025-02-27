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
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;

/**
 * This class represents Terms Payment Request
 *
 * @method ChannelEntity getChannel()
 * @method string        getLocal()
 * @method $this         setChannel(ChannelEntity $channel)
 * @method $this         setLocale(string $locale)
 */
class TermsPaymentRequest extends RequestEntity
{
    /** @var ChannelEntity $channel */
    protected $channel;

    /** @var string $locale */
    protected $locale;
}
