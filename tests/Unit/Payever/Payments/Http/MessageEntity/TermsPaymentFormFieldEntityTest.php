<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity;

use Payever\Sdk\Payments\Http\MessageEntity\TermsPaymentFormFieldEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class TermsPaymentFormFieldEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\TermsPaymentFormFieldEntity
 */
class TermsPaymentFormFieldEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'field_name' => 'name',
        'field_text' => 'text',
        'required' => true,
        'type' => 'checkbox',
    );

    public function getEntity()
    {
        return new TermsPaymentFormFieldEntity();
    }
}
