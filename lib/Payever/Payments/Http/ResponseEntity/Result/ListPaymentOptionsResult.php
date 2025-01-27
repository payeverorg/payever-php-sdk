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

use Payever\Sdk\Payments\Http\MessageEntity\PaymentOptionOptionsEntity;

/**
 * This class represents List Payment Options Result Entity
 *
 * @method bool                             getAcceptFee()
 * @method bool                             getShippingAddressAllowed()
 * @method bool                             getShippingAddressEquality()
 * @method PaymentOptionOptionsEntity       getVariantOptions()
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class ListPaymentOptionsResult extends AbstractPaymentOptionResult
{
    /** @var bool $acceptFee */
    protected $acceptFee;

    /** @var bool $shippingAddressAllowed */
    protected $shippingAddressAllowed;

    /** @var bool $shippingAddressEquality */
    protected $shippingAddressEquality;

    /** @var PaymentOptionOptionsEntity */
    protected $variantOptions;

    /**
     * Sets Accept Fee
     *
     * @param bool $acceptFee
     */
    public function setAcceptFee($acceptFee)
    {
        $this->acceptFee = filter_var($acceptFee, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sets shipping address allowed
     *
     * @param bool $shippingAddressAllowed
     */
    public function setShippingAddressAllowed($shippingAddressAllowed)
    {
        $this->shippingAddressAllowed = filter_var($shippingAddressAllowed, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sets shipping address equality
     *
     * @param bool $shippingAddressEquality
     */
    public function setShippingAddressEquality($shippingAddressEquality)
    {
        $this->shippingAddressEquality = filter_var($shippingAddressEquality, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set Variant Options
     *
     * @param PaymentOptionOptionsEntity $options
     */
    public function setVariantOptions($options)
    {
        $this->variantOptions = $options;

        return $this;
    }
}
