<?php

namespace Payever\Tests\Unit\Payever\Core\Http;

use PHPUnit\Framework\TestCase;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;
use Payever\Sdk\Core\Http\Response;

/**
 * Class ResponseTest
 *
 * @see \Payever\Sdk\Core\Http\Response
 */
class ResponseTest extends TestCase
{
    /**
     * @return array
     */
    public static function jsonDataProvider()
    {
        return array(
            'successful' => array('{"call": {}, "result": {}}', true),
            'contains error' => array('{"call": {}, "result": {}, "error": "ERROR"}', false),
        );
    }

    /**
     * @param string $json
     *
     * @see \Payever\Sdk\Core\Http\Response::__construct()
     * @see \Payever\Sdk\Core\Http\Response::load()
     * @see \Payever\Sdk\Core\Http\Response::getData()
     *
     * @dataProvider jsonDataProvider
     *
     * @return Response
     */
    public function testLoad($json)
    {
        $response = new Response();
        $response->load($json);

        $this->assertEquals($json, $response->getData());

        return $response;
    }

    /**
     * @param string $json
     * @param bool $positive
     *
     * @see \Payever\Sdk\Core\Http\Response::isSuccessful()
     *
     * @dataProvider jsonDataProvider
     */
    public function testIsSuccessful($json, $positive = true)
    {
        $response = new Response();
        $response->load($json);

        if ($positive) {
            $this->assertTrue($response->isSuccessful());
        } else {
            $this->assertFalse($response->isSuccessful());
        }
    }

    /**
     * @param string $json
     * @param bool $positive
     *
     * @see \Payever\Sdk\Core\Http\Response::isFailed()
     *
     * @dataProvider jsonDataProvider
     */
    public function testIsFailed($json, $positive = true)
    {
        $response = new Response();
        $response->load($json);

        if (!$positive) {
            $this->assertTrue($response->isFailed());
        } else {
            $this->assertFalse($response->isFailed());
        }
    }

    /**
     * @see \Payever\Sdk\Core\Http\Response::getRequestEntity()
     * @see \Payever\Sdk\Core\Http\Response::setRequestEntity()
     */
    public function testRequestEntityConnection()
    {
        $response = new Response();

        $reqEntity = $this->getMockBuilder(RequestEntity::class)->getMock();
        $reqEntity->expects($this->any())->method('isValid')->willReturn(true);

        $this->assertNull($response->getRequestEntity());

        $response->setRequestEntity($reqEntity);

        $this->assertEquals($reqEntity, $response->getRequestEntity());
    }

    /**
     * @see \Payever\Sdk\Core\Http\Response::getResponseEntity()
     * @see \Payever\Sdk\Core\Http\Response::setResponseEntity()
     */
    public function testResponseEntityConnection()
    {
        $response = new Response();

        $respEntity = $this->getMockBuilder(ResponseEntity::class)->getMock();
        $respEntity->expects($this->any())->method('isValid')->willReturn(true);

        $this->assertNotNull($response->getResponseEntity());

        $response->setResponseEntity($respEntity);

        $this->assertEquals($respEntity, $response->getResponseEntity());
    }
}
