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

namespace Payever\Sdk\Payments\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Payment Option Translation Entity
 *
 * @method string getLocale()
 * @method string getField()
 * @method string getContent()
 * @method $this  setLocale(string $locale)
 * @method $this  setField(string $field)
 * @method $this  setContent(string $content)
 */
class PaymentOptionTranslationEntity extends MessageEntity
{
    /** @var string $locale */
    protected $locale;

    /** @var string $field */
    protected $field;

    /** @var string $content */
    protected $content;
}
