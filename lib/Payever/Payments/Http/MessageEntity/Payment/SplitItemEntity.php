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
 * This class represents Split Item Entity
 *
 * @method string            getType()
 * @method string            getIdentifier()
 * @method float             getReference()
 * @method string            getDescription()
 * @method SplitAmountEntity getAmount()
 * @method $this             setType(string $value)
 * @method $this             setIdentifier(float $id)
 * @method $this             setReference(string $reference)
 * @method $this             setDescription(string $description)
 */
class SplitItemEntity extends MessageEntity
{
    /** @var string $type */
    protected $type;

    /** @var string $identifier */
    protected $identifier;

    /** @var string $reference */
    protected $reference;

    /** @var string $description */
    protected $description;

    /** @var SplitAmountEntity $amount */
    protected $amount;

    /**
     * @param SplitAmountEntity|array $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        if (!$amount) {
            return $this;
        }

        if (is_string($amount)) {
            $amount = json_decode($amount);
        }

        if (!is_array($amount) && !is_object($amount)) {
            return $this;
        }

        $this->amount = new SplitAmountEntity($amount);

        return $this;
    }
}
