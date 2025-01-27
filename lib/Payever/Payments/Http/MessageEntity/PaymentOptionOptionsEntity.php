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
 * This class represents Payment Option Options Entity
 *
 * @method array getCurrencies()
 * @method array getCountries()
 * @method array getActions()
 * @method $this setCurrencies(array $currencies)
 * @method $this setCountries(array $countries)
 * @method $this setActions(array $actions)
 */
class PaymentOptionOptionsEntity extends MessageEntity
{
    /** @var array $currencies */
    protected $currencies;

    /** @var array $countries */
    protected $countries;

    /** @var array $actions */
    protected $actions;
}
