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

use DateTime;
use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Customer Entity
 *
 * @method string         getType()
 * @method string         getGender()
 * @method string         getCountry()
 * @method DateTime|null  getBirthdate()
 * @method string         getPhone()
 * @method string         getEmail()
 * @method string         getSocialSecurityNumber()
 * @method $this          setType(string $value)
 * @method $this          setGender(string $value)
 * @method $this          setCountry(string $value)
 * @method $this          setPhone(string $value)
 * @method $this          setEmail(string $value)
 * @method $this          setSocialSecurityNumber(string $value)
 */
class CustomerEntity extends MessageEntity
{
    /** @var string $type */
    protected $type;

    /** @var string $gender */
    protected $gender;

    /** @var DateTime|null $birthdate */
    protected $birthdate;

    /** @var string $phone */
    protected $phone;

    /** @var string $email */
    protected $email;

    /** @var string $socialSecurityNumber */
    protected $socialSecurityNumber;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'type',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() && ($this->email || $this->phone) &&
            (!$this->birthdate || $this->birthdate instanceof DateTime);
    }

    /**
     * Sets Birthdate
     *
     * @param DateTime|string $birthdate
     *
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        if (!$birthdate) {
            return $this;
        }

        if ($birthdate instanceof DateTime) {
            $this->birthdate = $birthdate;

            return $this;
        }

        if (is_string($birthdate)) {
            $this->birthdate = date_create($birthdate);
        }

        return $this;
    }
}
