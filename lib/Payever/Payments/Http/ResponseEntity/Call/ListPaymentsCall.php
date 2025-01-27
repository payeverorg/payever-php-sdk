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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Core\Http\MessageEntity\CallEntity;

/**
 * This class represents List Payments Call Entity
 *
 * @method string     getCurrency()
 * @method string     getState()
 * @method string|int getLimit()
 * @method $this      setCurrency(string $currency)
 * @method $this      setState(string $state)
 * @method $this      setLimit(string $limit)
 */
class ListPaymentsCall extends CallEntity
{
    /** @var string $currency */
    protected $currency;

    /** @var string $state */
    protected $state;

    /** @var string|int $limit */
    protected $limit;
}
