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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Http\MessageEntity\TermsPaymentFormFieldEntity;

/**
 * This class represents Terms Payment Result
 *
 * @method string                        getLegalText()
 * @method TermsPaymentFormFieldEntity[] getForm()
 * @method $this                         setLegalText(string $riskOrgId)
 */
class TermsPaymentResult extends ResultEntity
{
    /** @var string $legalText */
    protected $legalText;

    /** @var TermsPaymentFormFieldEntity[] $form */
    protected $form;

    /**
     * Set Form.
     *
     * @param array $form
     *
     * @return $this
     */
    public function setForm($form)
    {
        foreach ($form as $field) {
            $this->form[] = new TermsPaymentFormFieldEntity($field);
        }

        return $this;
    }
}
