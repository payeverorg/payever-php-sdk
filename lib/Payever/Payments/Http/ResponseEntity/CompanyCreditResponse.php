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

/**
 * This class represents CompanySearch Credit ResponseEntity
 * @method string getBuyerId()
 * @method string getMaximum()
 * @method string getMaxInvoiceAmount()
 * @method string getCurrency()
 * @method $this  setBuyerId(string $value)
 * @method $this  setMaximum(string $value)
 * @method $this  setMaxInvoiceAmount(string $value)
 * @method $this  setCurrency(string $value)
 */
class CompanyCreditResponse extends ResponseEntity
{
    /** @var string $buyerId */
    protected $buyerId;

    /** @var string $maximum */
    protected $maximum;

    /** @var string $maxInvoiceAmount */
    protected $maxInvoiceAmount;

    /** @var string $currency */
    protected $currency;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'buyerId',
            'maximum',
            'maxInvoiceAmount',
            'currency',
        ];
    }
}
