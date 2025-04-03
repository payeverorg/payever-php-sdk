<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use PHPUnit\Framework\TestCase;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CompanyEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\OptionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SellerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest;

/**
 * Class CreatePaymentV3RequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest
 */
class CreatePaymentRequestTest extends TestCase
{
    public function testMethods()
    {
        $request = new CreatePaymentRequest();

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setChannel(new ChannelEntity())
        );
        $this->assertInstanceOf(
            ChannelEntity::class,
            $request->getChannel()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setPurchase(new PurchaseEntity())
        );
        $this->assertInstanceOf(PurchaseEntity::class, $request->getPurchase());

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setCustomer(new CustomerEntity())
        );
        $this->assertInstanceOf(
            CustomerEntity::class,
            $request->getCustomer()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setCompany(new CompanyEntity())
        );
        $this->assertInstanceOf(
            CompanyEntity::class,
            $request->getCompany()
        );
        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setShippingOption(new ShippingOptionEntity())
        );
        $this->assertInstanceOf(
            ShippingOptionEntity::class,
            $request->getShippingOption()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setShippingAddress(new CustomerAddressEntity())
        );
        $this->assertInstanceOf(
            CustomerAddressEntity::class,
            $request->getShippingAddress()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setBillingAddress(new CustomerAddressEntity())
        );
        $this->assertInstanceOf(
            CustomerAddressEntity::class,
            $request->getBillingAddress()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setAttributes(new AttributesEntity())
        );
        $this->assertInstanceOf(
            AttributesEntity::class,
            $request->getAttributes()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setUrls(new UrlsEntity())
        );
        $this->assertInstanceOf(
            UrlsEntity::class,
            $request->getUrls()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setSeller(new SellerEntity())
        );
        $this->assertInstanceOf(
            SellerEntity::class,
            $request->getSeller()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setOptions(new OptionsEntity())
        );
        $this->assertInstanceOf(
            OptionsEntity::class,
            $request->getOptions()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setPaymentData(new PaymentDataEntity())
        );
        $this->assertInstanceOf(
            PaymentDataEntity::class,
            $request->getPaymentData()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setExpiresAt('now')
        );
        $this->assertInstanceOf(
            \DateTime::class,
            $request->getExpiresAt()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setVerify(new VerifyEntity())
        );
        $this->assertInstanceOf(
            VerifyEntity::class,
            $request->getVerify()
        );

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setSplits([new SplitItemEntity()])
        );
        $this->assertIsArray($request->getSplits());

        $this->assertInstanceOf(
            CreatePaymentRequest::class,
            $request->setCart([new CartItemEntity()])
        );
        $this->assertIsArray($request->getCart());
    }
}
