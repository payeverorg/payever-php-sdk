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
 * This class represents Address Entity
 *
 * @method string getId()
 * @method string getUuid()
 * @method string getCountry()
 * @method string getCountryName()
 * @method string getCity()
 * @method string getRegion()
 * @method string getZipCode()
 * @method string getFullStreet()
 * @method string getStreet()
 * @method string getStreetNumber()
 * @method string getSalutation()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getPhone()
 * @method string getEmail()
 * @method string getType()
 * @method $this  setId(string $id)
 * @method $this  setUuid(string $uuid)
 * @method $this  setCountry(string $country)
 * @method $this  setCountryName(string $countryName)
 * @method $this  setCity(string $city)
 * @method $this  setRegion(string $region)
 * @method $this  setZipCode(string $zipCode)
 * @method $this  setFullStreet(string $fullStreet)
 * @method $this  setStreet(string $street)
 * @method $this  setStreetNumber(string $streetNumber)
 * @method $this  setSalutation(string $salutation)
 * @method $this  setFirstName(string $firstName)
 * @method $this  setLastName(string $lastName)
 * @method $this  setPhone(string $phone)
 * @method $this  setEmail(string $email)
 * @method $this  setType(string $type)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class AddressEntity extends MessageEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $uuid */
    protected $uuid;

    /** @var string $country */
    protected $country;

    /** @var string $countryName */
    protected $countryName;

    /** @var string $city */
    protected $city;

    /** @var string $region */
    protected $region;

    /** @var string $zipCode */
    protected $zipCode;

    /** @var string $fullStreet */
    protected $fullStreet;

    /** @var string $street */
    protected $street;

    /** @var string $streetNumber */
    protected $streetNumber;

    /** @var string $salutation */
    protected $salutation;

    /** @var string $firstName */
    protected $firstName;

    /** @var string $lastName */
    protected $lastName;

    /** @var string $phone */
    protected $phone;

    /** @var string $email */
    protected $email;

    /** @var string $type */
    protected $type;
}
