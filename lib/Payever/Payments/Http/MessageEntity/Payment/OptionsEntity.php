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
 * This class represents Options entity
 *
 * @method string getAllowSeparateShippingAddress()
 * @method array  getAllowCustomerTypes()
 * @method array  getAllowPaymentMethods()
 * @method bool   getAllowCartStep()
 * @method bool   getAllowBillingStep()
 * @method bool   getAllowShippingStep()
 * @method bool   getUseDefaultVariant()
 * @method bool   getUseInventory()
 * @method bool   getUseStyles()
 * @method bool   getUseIframe()
 * @method bool   getSalutationMandatory()
 * @method bool   getPhoneMandatory()
 * @method bool   getBirthdateMandatory()
 * @method bool   getTestMode()
 * @method $this  setAllowSeparateShippingAddress(string $value)
 * @method $this  setAllowCustomerTypes(array $value)
 * @method $this  setAllowPaymentMethods(array $value)
 * @method $this  setAllowCartStep(bool $value)
 * @method $this  setAllowBillingStep(bool $value)
 * @method $this  setAllowShippingStep(bool $value)
 * @method $this  setUseDefaultVariant(bool $value)
 * @method $this  setUseInventory(bool $value)
 * @method $this  setUseStyles(bool $value)
 * @method $this  setUseIframe(bool $value)
 * @method $this  setSalutationMandatory(bool $value)
 * @method $this  setPhoneMandatory(bool $value)
 * @method $this  setBirthdateMandatory(bool $value)
 * @method $this  setTestMode(bool $value)
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class OptionsEntity extends MessageEntity
{
    /** @var string $allowSeparateShippingAddress */
    protected $allowSeparateShippingAddress;

    /** @var array $allowCustomerTypes */
    protected $allowCustomerTypes;

    /** @var array $allowPaymentMethods */
    protected $allowPaymentMethods;

    /** @var bool $allowCartStep */
    protected $allowCartStep;

    /** @var bool $allowBillingStep */
    protected $allowBillingStep;

    /** @var bool $allowShippingStep */
    protected $allowShippingStep;

    /** @var bool $useDefaultVariant */
    protected $useDefaultVariant;

    /** @var bool $useInventory */
    protected $useInventory;

    /** @var bool $useStyles */
    protected $useStyles;

    /** @var bool $useIframe */
    protected $useIframe;

    /** @var bool $salutationMandatory */
    protected $salutationMandatory;

    /** @var bool $phoneMandatory */
    protected $phoneMandatory;

    /** @var bool $birthdateMandatory */
    protected $birthdateMandatory;

    /** @var bool $testMode */
    protected $testMode;
}
