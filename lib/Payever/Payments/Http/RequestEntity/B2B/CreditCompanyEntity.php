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
 * This class represents Company Entity
 *
 * @method string getExternalId()
 * @method $this  setExternalId(string $id)
 */
class CreditCompanyEntity extends RequestEntity
{
    /** @var string $externalId */
    protected $externalId;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'external_id'
        ];
    }
}
