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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Http\MessageEntity\CompanySearchAddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\CompanySearchIdentifierEntity;

/**
 * This class represents CompanySearch Entity
 *
 * @method string                           getId()
 * @method string                           getName()
 * @method string                           getPhoneNumber()
 * @method string                           getLegalFormCode()
 * @method CompanySearchAddressEntity       getAddress()
 * @method CompanySearchIdentifierEntity    getCompanyIdentifier()
 * @method $this                            setId(string $value)
 * @method $this                            setName(string $value)
 * @method $this                            setPhoneNumber(string $value)
 * @method $this                            setLegalFormCode(string $value)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class CompanySearchResult extends ResultEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $name */
    protected $name;

    /** @var string $phoneNumber */
    protected $phoneNumber;

    /** @var string $legalFormCode */
    protected $legalFormCode;

    /** @var string $companyStatus */
    protected $companyStatus;

    /** @var CompanySearchAddressEntity $address */
    protected $address;

    /** @var CompanySearchIdentifierEntity $companyIdentifier */
    protected $companyIdentifier;

    /** @var string $vatId */
    protected $vatId;

    /**
     * Set Address.
     *
     * @param array $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = new CompanySearchAddressEntity($address);

        return $this;
    }

    /**
     * Set Company Identifier.
     *
     * @param $identifier
     *
     * @return $this
     */
    public function setCompanyIdentifier($identifier)
    {
        $this->companyIdentifier = new CompanySearchIdentifierEntity($identifier);

        return $this;
    }
}
