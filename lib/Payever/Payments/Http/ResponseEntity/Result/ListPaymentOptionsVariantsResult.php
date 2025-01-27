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

use Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionVariantEntity;

/**
 * @method PaymentOptionVariantEntity[] getVariants()
 */
class ListPaymentOptionsVariantsResult extends AbstractPaymentOptionResult
{
    /** @var array|PaymentOptionVariantEntity[] */
    protected $variants = [];

    /**
     * @param array $rawVariants
     *
     * @return $this
     */
    public function setVariants(array $rawVariants)
    {
        foreach ($rawVariants as $rawVariant) {
            $this->variants[] = new PaymentOptionVariantEntity($rawVariant);
        }

        return $this;
    }
}
