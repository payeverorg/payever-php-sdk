<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CustomerAddressV3EntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity
 */
class CustomerAddressV3EntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'salutation' => 'mr',
        'first_name' => 'stub_name',
        'last_name' => 'stub_lastname',
        'organization_name' => '',
        'street' => 'stub_street',
        'street_number' => 'stub_number',
        'zip' => '12345',
        'country' => 'stub_country',
        'city' => 'stub_city',
        'street_line2' => '',
        'street_name' => '',
        'house_extension' => '',
    );

    public function getEntity()
    {
        return new CustomerAddressV3Entity();
    }
}
