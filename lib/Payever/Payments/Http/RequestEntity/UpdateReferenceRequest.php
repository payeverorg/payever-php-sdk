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

/**
 * This class represents Update Reference Payment Request Interface Entity
 *
 * @method string getReference()
 * @method $this  setReference(string $reference)
 */
class UpdateReferenceRequest extends RequestEntity
{
    /** @var string $reference */
    protected $reference;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() && $this->reference && is_string($this->reference);
    }
}
