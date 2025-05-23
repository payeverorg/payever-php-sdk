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
use Payever\Sdk\Payments\Http\ResponseEntity\Result\TermsPaymentResult;

/**
 * This class represents Terms Payment Response Entity
 *
 * @method TermsPaymentResult getResult()
 */
class TermsPaymentResponse extends ResponseEntity
{
    /**
     * {@inheritdoc}
     */
    public function setResult($result)
    {
        $this->result = new TermsPaymentResult($result);
    }
}
