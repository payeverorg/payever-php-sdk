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
 * This class represents Cart Item V3 Entity
 *
 * @method string                  getName()
 * @method float                   getUnitPrice()
 * @method float                   getTaxRate()
 * @method float                   getQuantity()
 * @method float                   getTotalAmount()
 * @method float                   getTotalTaxAmount()
 * @method string                  getDescription()
 * @method string                  getCategory()
 * @method string                  getImageUrl()
 * @method string                  getProductUrl()
 * @method string                  getSku()
 * @method string                  getIdentifier()
 * @method AttributesEntity        getAttributes()
 * @method string                  getBrand()
 * @method CartItemExtraDataEntity getExtraData()
 * @method $this                   setName(string $name)
 * @method $this                   setUnitPrice(float $price)
 * @method $this                   setTaxRate(float $taxRate)
 * @method $this                   setQuantity(float $quantity)
 * @method $this                   setTotalAmount(float $total)
 * @method $this                   setTotalTaxAmount(float $total)
 * @method $this                   setDescription(string $description)
 * @method $this                   setCategory(string $category)
 * @method $this                   setImageUrl(string $url)
 * @method $this                   setThumbnail(string $thumbnail)
 * @method $this                   setProductUrl(string $url)
 * @method $this                   setSku(string $sku)
 * @method $this                   setIdentifier(string $identifier)
 * @method $this                   setBrand(string $value)
 */
class CartItemV3Entity extends MessageEntity
{
    /** @var string $name */
    protected $name;

    /** @var float $unitPrice */
    protected $unitPrice;

    /** @var float $taxRate */
    protected $taxRate;

    /** @var float $quantity */
    protected $quantity;

    /** @var float $totalAmount */
    protected $totalAmount;

    /** @var float $totalTaxAmount */
    protected $totalTaxAmount;

    /** @var string $description */
    protected $description;

    /** @var string $category */
    protected $category;

    /** @var string $imageUrl */
    protected $imageUrl;

    /** @var string $productUrl */
    protected $productUrl;

    /** @var string $sku */
    protected $sku;

    /** @var string $identifier */
    protected $identifier;

    /** @var AttributesEntity $attributes */
    protected $attributes;

    /** @var string $brand */
    protected $brand;

    /** @var CartItemExtraDataEntity $extraData */
    protected $extraData;

    /**
     * Sets Attributes
     *
     * @param AttributesEntity|string $attributes
     *
     * @return $this
     */
    public function setAttributes($attributes)
    {
        if (!$attributes) {
            return $this;
        }

        if (is_string($attributes)) {
            $attributes = json_decode($attributes);
        }

        if (!is_array($attributes) && !is_object($attributes)) {
            return $this;
        }

        $this->attributes = new AttributesEntity($attributes);

        return $this;
    }

    /**
     * @param CartItemExtraDataEntity|string $extraData
     *
     * @return $this
     */
    public function setExtraData($extraData)
    {
        if (!$extraData) {
            return $this;
        }

        if (is_string($extraData)) {
            $extraData = json_decode($extraData);
        }

        if (!is_array($extraData) && !is_object($extraData)) {
            return $this;
        }

        $this->extraData = new CartItemExtraDataEntity($extraData);

        return $this;
    }
}
