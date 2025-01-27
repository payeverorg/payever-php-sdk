<?php

namespace Payever\Tests\Unit\Payever\Payments\Enum;

use Payever\Sdk\Payments\Enum\Salutation;
use PHPUnit\Framework\TestCase;

/**
 * Class SalutationTest
 *
 * @see \Payever\Sdk\Payments\Enum\Salutation
 */
class SalutationTest extends TestCase
{
    /**
     * @see \Payever\Sdk\Payments\Enum\Salutation::getList()
     */
    public function testGetList()
    {
        $this->assertEquals(
            $this->collectConstants('Payever\Sdk\Payments\Enum\Salutation'),
            Salutation::enum()
        );
    }

    /**
     * @return array
     *
     * @throws \ReflectionException
     */
    private function collectConstants($className)
    {
        $reflection = new \ReflectionClass($className);

        return $reflection->getConstants();
    }
}
