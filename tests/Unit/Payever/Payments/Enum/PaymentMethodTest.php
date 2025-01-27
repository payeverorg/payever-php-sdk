<?php

namespace Payever\Tests\Unit\Payever\Payments\Enum;

use Payever\Sdk\Payments\Enum\PaymentMethod;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentMethodTest
 *
 * @see \Payever\Sdk\Payments\Enum\PaymentMethod
 */
class PaymentMethodTest extends TestCase
{
    public function testShouldHideOnDifferentAddress()
    {
        $shouldHideMethods = PaymentMethod::getShouldHideOnDifferentAddressMethods();

        foreach ($shouldHideMethods as $method) {
            $this->assertTrue(PaymentMethod::shouldHideOnDifferentAddress($method));
        }

        $shouldNotHideMethods = array_diff(PaymentMethod::enum(), $shouldHideMethods);

        foreach ($shouldNotHideMethods as $method) {
            $this->assertFalse(PaymentMethod::shouldHideOnDifferentAddress($method));
        }
    }

    public function testShouldHideOnReject()
    {
        $shouldHideMethods = PaymentMethod::getShouldHideOnRejectMethods();

        foreach ($shouldHideMethods as $method) {
            $this->assertTrue(PaymentMethod::shouldHideOnReject($method));
        }

        $shouldNotHideMethods = array_diff(PaymentMethod::enum(), $shouldHideMethods);

        foreach ($shouldNotHideMethods as $method) {
            $this->assertFalse(PaymentMethod::shouldHideOnReject($method));
        }
    }
}
