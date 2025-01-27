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
 * This class represents Shipping Option entity
 *
 * @method string                            getName()
 * @method string                            getCarrier()
 * @method string                            getCategory()
 * @method float                             getPrice()
 * @method float                             getTaxRate()
 * @method float                             getTaxAmount()
 * @method ShippingOptionDetailsEntity|array getDetails()
 * @method $this                             setName(string $value)
 * @method $this                             setCarrier(string $value)
 * @method $this                             setCategory(string $value)
 * @method $this                             setPrice(float $value)
 * @method $this                             setTaxRate(float $value)
 * @method $this                             setTaxAmount(float $value)
 */
class ShippingOptionEntity extends MessageEntity
{
    /** @var string $name */
    protected $name;

    /** @var string $carrier */
    protected $carrier;

    /** @var string $category */
    protected $category;

    /** @var float $price */
    protected $price;

    /** @var float $taxRate */
    protected $taxRate;

    /** @var float $taxAmount */
    protected $taxAmount;

    /** @var string $details */
    protected $details;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'name',
            'price',
            'tax_rate',
            'tax_amount',
            'details'
        ];
    }

    /**
     * Sets Details.
     *
     * @param ShippingOptionDetailsEntity|array $details
     *
     * @return $this
     */
    public function setDetails($details)
    {
        if (!$details) {
            return $this;
        }

        if (is_string($details)) {
            $details = json_decode($details);
        }

        if (!is_array($details) && !is_object($details)) {
            return $this;
        }

        $this->details = new ShippingOptionDetailsEntity($details);

        return $this;
    }
}
