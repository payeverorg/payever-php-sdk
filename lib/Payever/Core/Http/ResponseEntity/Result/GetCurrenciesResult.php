<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;

/**
 * This class represents Get Currencies Result Entity
 *
 * @method string getId()
 * @method string getSymbol()
 * @method string getCode()
 * @method float  getRate()
 * @method $this  setId(string $id)
 * @method $this  setSymbol(string $symbol)
 * @method $this  setCode(string $code)
 * @method $this  setRate(float $rate)
 */
class GetCurrenciesResult extends ResultEntity
{
    /** @var string $id */
    protected $name;

    /** @var string $symbol */
    protected $symbol;

    /** @var string $code */
    protected $code;

    /** @var float $rate */
    protected $rate;
}
