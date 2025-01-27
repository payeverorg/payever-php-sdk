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
 * This class represents Company entity
 *
 * @method string getType()
 * @method string getName()
 * @method string getRegistrationNumber()
 * @method string getRegistrationLocation()
 * @method string getTaxId()
 * @method string getHomepage()
 * @method string getExternalId()
 * @method $this  setType(string $value)
 * @method $this  setName(string $value)
 * @method $this  setRegistrationNumber(string $value)
 * @method $this  setRegistrationLocation(string $value)
 * @method $this  setTaxId(string $value)
 * @method $this  setHomepage(string $value)
 * @method $this  setExternalId(string $value)
 */
class CompanyEntity extends MessageEntity
{
    /** @var string $type */
    protected $type;

    /** @var string $name */
    protected $name;

    /** @var string $registrationNumber */
    protected $registrationNumber;

    /** @var string $registrationLocation */
    protected $registrationLocation;

    /** @var string $taxId */
    protected $taxId;

    /** @var string $homepage */
    protected $homepage;

    /** @var string $externalId */
    protected $externalId;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'name'
        ];
    }
}
