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
use Payever\Sdk\Payments\Http\RequestEntity\B2B\CreditCompanyEntity;

/**
 * This class represents Company Search Credit Entity
 *
 * @method CreditCompanyEntity getCompany()
 */
class CompanyCreditRequest extends RequestEntity
{
    /**
     * @var CreditCompanyEntity
     */
    protected $company;

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
     * @param CreditCompanyEntity|array|string $company
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

        if (is_array($company)) {
            $this->company = new CreditCompanyEntity($company);

            return $this;
        }

        if ($company instanceof CreditCompanyEntity) {
            $this->company = $company;

            return $this;
        }

        return $this;
    }
}
