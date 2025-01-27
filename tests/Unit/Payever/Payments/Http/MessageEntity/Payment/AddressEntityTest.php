<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;
use Payever\Tests\Unit\Payever\Core\Http\AbstractMessageEntityTestCase;

/**
 * Class AddressEntityTest
 *
 * @see \Payever\Sdk\Payments\Http\MessageEntity\Payment\AddressEntity;
 */
class AddressEntityTest extends AbstractMessageEntityTestCase
{
    protected static $scheme = array(
        'id' => 'stub',
        'uuid' => 'stub',
        'country' => 'DE',
        'country_name' => 'Germany',
        'city' => 'Berlin',
        'zip_code' => '10111',
        'full_street' => 'Some Strasse 32',
        'street' => 'Some Strasse',
        'street_number' => '32',
        'salutation' => 'MR',
        'first_name' => 'Name',
        'last_name' => 'Lastname',
        'type' => 'none',
    );

    public function getEntity()
    {
        return new AddressEntity();
    }
}
