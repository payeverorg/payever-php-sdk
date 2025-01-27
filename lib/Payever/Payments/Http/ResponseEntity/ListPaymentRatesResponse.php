<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  ResponseEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\ResponseEntity;

use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;
use Payever\Sdk\Payments\Http\ResponseEntity\Call\ListPaymentRatesCall;
use Payever\Sdk\Payments\Http\ResponseEntity\Result\ListPaymentRatesResult;

/**
 * This class represents List Payment Rates ResponseInterface Entity
 *
 * @method ListPaymentRatesCall           getCall()
 * @method array|ListPaymentRatesResult[] getResult()
 */
class ListPaymentRatesResponse extends ResponseEntity
{
    /**
     * {@inheritdoc}
     */
    public function setCall($call)
    {
        $this->call = new ListPaymentRatesCall($call);
    }

    /**
     * {@inheritdoc}
     */
    public function setResult($result)
    {
        $this->result = [];

        foreach ($result as $item) {
            $this->result[] = new ListPaymentRatesResult($item);
        }
    }
}
