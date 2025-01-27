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
 * This class represents Company Search Address Entity
 *
 * @method string  getStreetNumber()
 * @method string  getStreetName()
 * @method string  getPostCode()
 * @method string  getCity()
 * @method string  getStateCode()
 * @method string  getCountryCode()
 * @method string  getType()
 * @method $this   setStreetNumber(string $value)
 * @method $this   setStreetName(string $value)
 * @method $this   setPostCode(string $value)
 * @method $this   setCity(string $value)
 * @method $this   setStateCode(string $value)
 * @method $this   setCountryCode(string $value)
 * @method $this   setType(string $value)
 */
class CompanySearchAddressEntity extends MessageEntity
{
    /** @var string $streetNumber */
    protected $streetNumber;

    /** @var string $streetName */
    protected $streetName;

    /** @var string $postCode */
    protected $postCode;

    /** @var string $city */
    protected $city;

    /** @var string $stateCode */
    protected $stateCode;

    /** @var string $countryCode */
    protected $countryCode;

    /** @var string $type */
    protected $type;
}
