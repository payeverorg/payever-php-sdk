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
 * This class represents Purchase Entity
 *
 * @method float  getAmount()
 * @method string getCurrency()
 * @method string getCountry()
 * @method float  getDeliveryFee()
 * @method float  getDownPayment()
 * @method $this  setAmount(float $value)
 * @method $this  setCurrency(string $value)
 * @method $this  setCountry(string $value)
 * @method $this  setDeliveryFee(float $value)
 * @method $this  setDownPayment(float $value)
 */
class PurchaseEntity extends MessageEntity
{
    /** @var float $amount */
    protected $amount;

    /** @var string $currency */
    protected $currency;

    /** @var string $country */
    protected $country;

    /** @var float $deliveryFee */
    protected $deliveryFee;

    /** @var float $downPayment */
    protected $downPayment;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'amount',
            'currency'
        ];
    }
}
