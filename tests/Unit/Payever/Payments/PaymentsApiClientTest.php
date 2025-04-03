<?php

namespace Payever\Tests\Unit\Payever\Payments;

use Payever\Sdk\Payments\Enum\PaymentMethod;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Payever\Sdk\Core\Authorization\OauthTokenList;
use Payever\Sdk\Core\Base\OauthTokenInterface;
use Payever\Sdk\Core\ClientConfiguration;
use Payever\Sdk\Core\Enum\ChannelSet;
use Payever\Sdk\Core\Http\Client\CurlClient;
use Payever\Sdk\Core\Http\Response;
use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\RequestEntity\AuthorizePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ListPaymentsRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentRequest;
use Payever\Sdk\Payments\PaymentsApiClient;
use Psr\Log\NullLogger;

/**
 * Class PaymentsApiClientTest
 *
 * @see \Payever\Sdk\Payments\PaymentsApiClient
 */
class PaymentsApiClientTest extends TestCase
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
     * @var PaymentsApiClient
     */
    private $paymentsApiClient;

    protected function setUp(): void
    {
        $this->clientConfiguration = $this->getMockBuilder(ClientConfiguration::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->clientConfiguration->expects($this->any())
            ->method('getLogger')
            ->willReturn(new NullLogger());

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

        $this->paymentsApiClient = new PaymentsApiClient(
            $this->clientConfiguration,
            $oauthTokenList,
            $this->httpClientMock
        );
    }

    public function testCreatePaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $request = new CreatePaymentRequest();
        $result = $this->paymentsApiClient->createPaymentRequest($request);
        $this->assertNotEmpty($result);
    }

    public function testSubmitPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $request = new SubmitPaymentRequest();
        $result = $this->paymentsApiClient->submitPaymentRequest($request);
        $this->assertNotEmpty($result);
    }

    public function testRiskPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $paymentMethod = PaymentMethod::METHOD_STRIPE_CREDIT_CARD;
        $result = $this->paymentsApiClient->riskPaymentRequest($paymentMethod);
        $this->assertNotEmpty($result);
    }

    public function testTermsPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $variantId = 'test-variant-id';
        $result = $this->paymentsApiClient->termsPaymentRequest($variantId);
        $this->assertNotEmpty($result);
    }

    public function testRetrievePaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->retrievePaymentRequest('transaction-id');
        $this->assertNotEmpty($result);
    }

    public function testListPaymentsRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $request = new ListPaymentsRequest();
        $result = $this->paymentsApiClient->listPaymentsRequest($request);
        $this->assertNotEmpty($result);
    }

    public function testRefundPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->refundPaymentRequest(
            'transaction-id',
            100,
            '123'
        );
        $this->assertNotEmpty($result);
    }

    public function testRefundItemsPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $paymentEntity = new PaymentItemEntity();
        $paymentEntity
            ->setIdentifier('item-id')
            ->setName('item-name')
            ->setPrice(100)
            ->setQuantity(1);

        $paymentItems = [
            $paymentEntity,
        ];

        $result = $this->paymentsApiClient->refundItemsPaymentRequest(
            'transaction-id',
            $paymentItems,
            10,
            '123'
        );
        $this->assertNotEmpty($result);
    }

    public function testEditPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->editPaymentRequest('transaction-id', 100);
        $this->assertNotEmpty($result);
    }

    public function testAuthorizePaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $request = new AuthorizePaymentRequest();
        $result = $this->paymentsApiClient->authorizePaymentRequest('transaction-id', $request);
        $this->assertNotEmpty($result);
    }

    public function testShippingGoodsPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $paymentEntity = new PaymentItemEntity();
        $paymentEntity
            ->setIdentifier('item-id')
            ->setName('item-name')
            ->setPrice(100)
            ->setQuantity(1);

        $request = new ShippingGoodsPaymentRequest();
        $request->setPaymentItems([$paymentEntity]);

        $result = $this->paymentsApiClient->shippingGoodsPaymentRequest('transaction-id', $request);
        $this->assertNotEmpty($result);
    }

    public function testCancelPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->cancelPaymentRequest('transaction-id', 100);
        $this->assertNotEmpty($result);
    }

    public function testCancelItemsPaymentRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $paymentEntity = new PaymentItemEntity();
        $paymentEntity
            ->setIdentifier('item-id')
            ->setName('item-name')
            ->setPrice(100)
            ->setQuantity(1);

        $paymentItems = [
            $paymentEntity,
        ];

        $result = $this->paymentsApiClient->cancelItemsPaymentRequest(
            'transaction-id',
            $paymentItems,
            100,
            '123'
        );
        $this->assertNotEmpty($result);
    }

    public function testRetrieveApiCallRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->retrieveApiCallRequest('call-id');
        $this->assertNotEmpty($result);
    }

    public function testListPaymentOptionsRequest()
    {
        $result = $this->paymentsApiClient->listPaymentOptionsRequest(
            [],
            'business-id',
            ChannelSet::CHANNEL_SHOPWARE
        );
        $this->assertNotEmpty($result);
    }

    public function testListPaymentOptionsWithVariantsRequest()
    {
        $result = $this->paymentsApiClient->listPaymentOptionsWithVariantsRequest(
            [],
            'business-id',
            ChannelSet::CHANNEL_SHOPWARE
        );
        $this->assertNotEmpty($result);
    }

    public function testListPaymentRatesRequest()
    {
        $result = $this->paymentsApiClient->listPaymentRatesRequest('variant-id', 100);
        $this->assertNotEmpty($result);
    }

    public function testGetTransactionRequest()
    {
        $this->clientConfiguration->expects($this->once())->method('assertLoaded');

        $result = $this->paymentsApiClient->getTransactionRequest('transaction-id');
        $this->assertNotEmpty($result);
    }
}
