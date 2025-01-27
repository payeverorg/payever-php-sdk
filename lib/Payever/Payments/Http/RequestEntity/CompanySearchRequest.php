<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\SearchCompanyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\B2B\SearchAddressEntity;

/**
 * This class represents Company Search Entity
 *
 * @method SearchCompanyEntity getCompany()
 * @method SearchAddressEntity getAddress()
 */
class CompanySearchRequest extends RequestEntity
{
    /** @var SearchCompanyEntity $company */
    protected $company;

    /** @var SearchAddressEntity $address */
    protected $address;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'company'
        ];
    }

    /**
     * Set Company.
     *
     * @param SearchCompanyEntity|array|string $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        if (!$company) {
            return $this;
        }

        if (is_string($company)) {
            $company = json_decode($company);
        }

        if (!is_array($company) && !is_object($company)) {
            return $this;
        }

        $this->company = new SearchCompanyEntity($company);

        return $this;
    }

    /**
     * Set Address.
     *
     * @param SearchAddressEntity|array|string $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        if (!$address) {
            return $this;
        }

        if (is_string($address)) {
            $address = json_decode($address);
        }

        if (!is_array($address) && !is_object($address)) {
            return $this;
        }

        $this->address = new SearchAddressEntity($address);

        return $this;
    }
}
