<?php

namespace Payever\Tests\Unit\Payever\Payments\Enum;

use Payever\Sdk\Payments\Enum\BusinessType;
use PHPUnit\Framework\TestCase;

/**
 * Class BusinessTypeTest
 *
 * @see \Payever\Sdk\Payments\Enum\BusinessType
 */
class BusinessTypeTest extends TestCase
{
    /**
     * @see \Payever\Sdk\Payments\Enum\BusinessType::getList()
     */
    public function testGetList()
    {
        $this->assertEquals(
            $this->collectConstants('Payever\Sdk\Payments\Enum\BusinessType'),
            BusinessType::enum()
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
