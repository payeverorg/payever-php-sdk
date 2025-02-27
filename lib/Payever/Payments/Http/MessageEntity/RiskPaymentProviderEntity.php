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
 * This class represents Risk Payment Provider Entity
 *
 * @method float  getName()
 * @method float  getScript()
 * @method $this  setName(string $name)
 * @method $this  setScript(string $script)
 */
class RiskPaymentProviderEntity extends MessageEntity
{
    /** @var string $name */
    protected $name;

    /** @var string $script */
    protected $script;
}
