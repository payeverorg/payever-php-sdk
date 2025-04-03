<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class CustomerAddressV3EntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity
 */
class CustomerAddressEntityTest extends AbstractMessageEntityTestCase
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
        return new CustomerAddressEntity();
    }
}
