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

namespace Payever\Sdk\Payments\Http\RequestEntity\B2B;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Address Entity
 *
 * @method string getCountry()
 * @method $this  setCountry(string $country)
 */
class SearchAddressEntity extends RequestEntity
{
    /** @var string $country */
    protected $country;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'country'
        ];
    }
}
