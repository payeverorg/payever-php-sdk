<?php

namespace Payever\Tests\Unit\Payever\Core;

use Payever\Sdk\Core\ClientConfiguration;
use PHPUnit\Framework\TestCase;

/**
 * Class FileLockTest
 *
 * @see \Payever\Sdk\Core\ClientConfiguration
 */
class ClientConfigurationTest extends TestCase
{
    /**
     * @var ClientConfiguration
     */
    private $clientConfiguration;

    protected function setUp(): void
    {
        $this->clientConfiguration = new ClientConfiguration();
    }

    public function testSetClientId()
    {
        $clientId = '1234567890';
        $return = $this->clientConfiguration->setClientId($clientId);
        $this->assertInstanceOf(
            ClientConfiguration::class,
            $return,
            'Asserting that the returned value of calling setClientId() is an instance of ClientConfiguration class for validity'
        );
        $this->assertEquals(
            $clientId,
            $this->clientConfiguration->getClientId(),
            'Asserting that the getClientId() method returns the value that we just set using setClientId()'
        );
    }
}
