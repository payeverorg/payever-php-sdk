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

/**
 * This class represents Cart Item Retrieve Entity
 *
 * @method float       getPrice()
 * @method float       getPriceNet()
 * @method float       getVatRate()
 * @method self        setPrice(float $price)
 * @method self        setPriceNet(float $priceNet)
 * @method self        setVatRate(float $vatRate)
 */
class CartItemRetrieveEntity extends CartItemEntity
{
    /** @var float $name */
    protected $price;

    /** @var float $priceNet */
    protected $priceNet;

    /** @var float $vatRate */
    protected $vatRate;
}
