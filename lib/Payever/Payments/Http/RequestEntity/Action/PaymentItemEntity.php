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

namespace Payever\Sdk\Payments\Http\RequestEntity\Action;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Payment Item RequestInterface Entity
 *
 * @method string    getName()
 * @method string    getIdentifier()
 * @method float     getPrice()
 * @method integer   getQuantity()
 * @method $this     setName(string $name)
 * @method $this     setIdentifier(string $identifier)
 * @method $this     setPrice(float $price)
 * @method $this     setQuantity(integer $quantity)
 */
class PaymentItemEntity extends RequestEntity
{
    /** @var string $name */
    protected $name;

    /** @var string $identifier */
    protected $identifier;

    /** @var float $price */
    protected $price;

    /** @var integer $quantity */
    protected $quantity;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() &&
            (!$this->identifier || is_string($this->identifier)) &&
            (!$this->price || is_numeric($this->price)) &&
            (!$this->quantity || is_numeric($this->quantity));
    }
}
