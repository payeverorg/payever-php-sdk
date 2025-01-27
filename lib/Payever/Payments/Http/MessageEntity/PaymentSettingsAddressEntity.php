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
 * This class represents Payment Settings Address Entity
 *
 * @method string getCity()
 * @method string getCountry()
 * @method string getStreet()
 * @method string getZipCode()
 * @method $this  setCity(string $city)
 * @method $this  setCountry(string $country)
 * @method $this  setStreet(string $street)
 * @method $this  setZipCode(string $zipCode)
 */
class PaymentSettingsAddressEntity extends MessageEntity
{
    /** @var string $city */
    protected $city;

    /** @var string $country */
    protected $country;

    /** @var string $street */
    protected $street;

    /** @var string $zipCode */
    protected $zipCode;
}
