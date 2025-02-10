<?php

namespace Payever\Tests\Unit\Payever\Payments;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Payever\Sdk\Core\Authorization\OauthTokenList;
use Payever\Sdk\Core\Base\OauthTokenInterface;
use Payever\Sdk\Core\ClientConfiguration;
use Payever\Sdk\Core\Http\Client\CurlClient;
use Payever\Sdk\Core\Http\Response;
use Payever\Sdk\Payments\B2BApiClient;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanySearchRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SettlePaymentRequest;
use Psr\Log\NullLogger;

/**
 * Class B2BApiClientTest
 *
 * @see \Payever\Sdk\Payments\B2BApiClient
 */
class B2BApiClientTest extends TestCase
{
    /**
     * @var (ClientConfiguration&MockObject)|\PHPUnit_Framework_MockObject_MockObject
     */
    private $clientConfiguration;

    /**
     * @var (CurlClient&MockObject)|\PHPUnit_Framework_MockObject_MockObject
     */
    private $httpClientMock;

    /**
     * @var B2BApiClient
     */
    private $b2bApiClient;

    protected function setUp(): void
    {
        $this->clientConfiguration = $this->getMockBuilder(ClientConfiguration::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->clientConfiguration->expects($this->any())
            ->method('getLogger')
            ->willReturn(new NullLogger());

        $this->clientConfiguration->expects($this->once())
            ->method('assertLoaded');

        $this->httpClientMock = $this->getMockBuilder(CurlClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->httpClientMock->expects($this->once())
            ->method('execute')
            ->willReturn(
                $this->getMockBuilder(Response::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        $oauthTokenList = $this->getMockBuilder(OauthTokenList::class)
            ->disableOriginalConstructor()
            ->getMock();

        $oauthTokenList->expects($this->once())
            ->method('load')
            ->willReturn(
                $tokenList = $this->getMockBuilder(OauthTokenList::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        $tokenList->expects($this->once())
            ->method('get')
            ->willReturn(
                $token = $this->getMockBuilder(OauthTokenInterface::class)
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        $token->expects($this->once())
            ->method('getParams')
            ->willReturn(['some-params']);

        $token->expects($this->once())
            ->method('getAuthorizationString')
            ->willReturn('some-authorization-string');

        $this->b2bApiClient = new B2BApiClient(
            $this->clientConfiguration,
            $oauthTokenList,
            $this->httpClientMock
        );
    }

    public function testSearchCompany()
    {
        $request = new CompanySearchRequest();
        $result = $this->b2bApiClient->companySearchRequest($request);
        $this->assertNotEmpty($result);
    }

    public function testCompanyCredit()
    {
        $request = new CompanyCreditRequest();
        $result = $this->b2bApiClient->companyCreditRequest($request);
        $this->assertNotEmpty($result);
    }

    public function testSettlePaymentRequest()
    {
        $request = new SettlePaymentRequest();
        $result = $this->b2bApiClient->settlePaymentRequest('transaction-id', $request);
        $this->assertNotEmpty($result);
    }

    public function testInvoicePaymentRequest()
    {
        $result = $this->b2bApiClient->invoicePaymentRequest('transaction-id', 100);
        $this->assertNotEmpty($result);
    }

    public function testClaimPaymentRequest()
    {
        $request = new ClaimPaymentRequest();
        $result = $this->b2bApiClient->claimPaymentRequest('transaction-id', $request);
        $this->assertNotEmpty($result);
    }

    public function testClaimUploadPaymentRequest()
    {
        $request = new ClaimUploadPaymentRequest();
        $result = $this->b2bApiClient->claimUploadPaymentRequest('transaction-id', $request);
        $this->assertNotEmpty($result);
    }
}
