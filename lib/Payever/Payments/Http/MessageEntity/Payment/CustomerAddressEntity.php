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
 * This class represents Shipping Address Entity
 *
 * @method string getSalutation()
 * @method float  getFirstName()
 * @method float  getLastName()
 * @method float  getStreet()
 * @method float  getStreetNumber()
 * @method string getZip()
 * @method string getCountry()
 * @method string getCity()
 * @method string getRegion()
 * @method string getAddressLine2()
 * @method $this  setSalutation(string $salutation)
 * @method $this  setFirstName(string $firstName)
 * @method $this  setLastName(string $lastName)
 * @method $this  setStreet(string $street)
 * @method $this  setStreetNumber(string $streetNumber)
 * @method $this  setZip(string $zip)
 * @method $this  setCountry(string $country)
 * @method $this  setCity(string $city)
 * @method $this  setRegion(string $region)
 * @method $this  setAddressLine2(string $addressLine2)
 */
class CustomerAddressEntity extends MessageEntity
{
    /** @var string $salutation */
    protected $salutation;

    /** @var string $firstName */
    protected $firstName;

    /** @var string $lastName */
    protected $lastName;

    /** @var string $street */
    protected $street;

    /** @var string $streetNumber */
    protected $streetNumber;

    /** @var string $zip */
    protected $zip;

    /** @var string $country */
    protected $country;

    /** @var string $city */
    protected $city;

    /** @var string $region */
    protected $region;

    /** @var string $addressLine2 */
    protected $addressLine2;
}
