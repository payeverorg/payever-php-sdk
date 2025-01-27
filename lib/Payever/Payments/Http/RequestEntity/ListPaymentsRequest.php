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
use Payever\Sdk\Payments\Enum\Status;

/**
 * This class represents List Payments RequestInterface Entity
 *
 * @method string           getAccessToken()
 * @method string           getPaymentMethod()
 * @method \DateTime|false  getDate()
 * @method string           getCurrency()
 * @method string           getState()
 * @method int|string       getLimit()
 * @method $this            setAccessToken(string $token)
 * @method $this            setPaymentMethod(string $method)
 * @method $this            setCurrency(string $currency)
 * @method $this            setState(string $state)
 * @method $this            setLimit(int|string $limit)
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class ListPaymentsRequest extends RequestEntity
{
    /** @var string $accessToken */
    protected $accessToken;

    /** @var string $paymentMethod */
    protected $paymentMethod;

    /** @var \DateTime|bool $date */
    protected $date;

    /** @var string $currency */
    protected $currency;

    /** @var string $state */
    protected $state;

    /** @var int|string $limit */
    protected $limit;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() &&
            (!$this->date || $this->date instanceof \DateTime) &&
            (!$this->state || in_array($this->state, Status::enum())) &&
            (!$this->limit || is_integer($this->limit))
        ;
    }

    /**
     * Sets Date
     *
     * @param string $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        if ($date) {
            $this->date = date_create($date);
        }

        return $this;
    }
}
