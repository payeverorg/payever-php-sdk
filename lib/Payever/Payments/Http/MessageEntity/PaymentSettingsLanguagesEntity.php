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
 * This class represents Payment Settings Languages Entity
 *
 * @method boolean getActive()
 * @method boolean getIsDefault()
 * @method string  getCode()
 * @method string  getName()
 * @method boolean getIsToggleButton()
 * @method boolean getIsHovered()
 * @method $this   setActive(boolean $active)
 * @method $this   setIsDefault(boolean $isDefault)
 * @method $this   setCode(string $code)
 * @method $this   setName(string $name)
 * @method $this   setIsToggleButton(boolean $isToggleButton)
 * @method $this   setIsHovered(boolean $isHovered)
 */
class PaymentSettingsLanguagesEntity extends MessageEntity
{
    /** @var boolean $active */
    protected $active;

    /** @var boolean $isDefault */
    protected $isDefault;

    /** @var string $code */
    protected $code;

    /** @var string $name */
    protected $name;

    /** @var boolean $isToggleButton */
    protected $isToggleButton;

    /** @var boolean $isHovered */
    protected $isHovered;
}
