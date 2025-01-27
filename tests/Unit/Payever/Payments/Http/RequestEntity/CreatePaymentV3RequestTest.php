<?php

namespace Payever\Tests\Unit\Payever\Payments\Http\RequestEntity;

use PHPUnit\Framework\TestCase;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\AttributesEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ChannelEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CompanyEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerAddressV3Entity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CustomerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\OptionsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PurchaseEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SellerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\ShippingOptionEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SplitItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\UrlsEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV3Request;

/**
 * Class CreatePaymentV3RequestTest
 *
 * @see \Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV3Request
 */
class CreatePaymentV3RequestTest extends TestCase
{
    public function testMethods()
    {
        $request = new CreatePaymentV3Request();

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setChannel(new ChannelEntity())
        );
        $this->assertInstanceOf(
            ChannelEntity::class,
            $request->getChannel()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setPurchase(new PurchaseEntity())
        );
        $this->assertInstanceOf(PurchaseEntity::class, $request->getPurchase());

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setCustomer(new CustomerEntity())
        );
        $this->assertInstanceOf(
            CustomerEntity::class,
            $request->getCustomer()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setCompany(new CompanyEntity())
        );
        $this->assertInstanceOf(
            CompanyEntity::class,
            $request->getCompany()
        );
        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setShippingOption(new ShippingOptionEntity())
        );
        $this->assertInstanceOf(
            ShippingOptionEntity::class,
            $request->getShippingOption()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setShippingAddress(new CustomerAddressV3Entity())
        );
        $this->assertInstanceOf(
            CustomerAddressV3Entity::class,
            $request->getShippingAddress()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setBillingAddress(new CustomerAddressV3Entity())
        );
        $this->assertInstanceOf(
            CustomerAddressV3Entity::class,
            $request->getBillingAddress()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setAttributes(new AttributesEntity())
        );
        $this->assertInstanceOf(
            AttributesEntity::class,
            $request->getAttributes()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setUrls(new UrlsEntity())
        );
        $this->assertInstanceOf(
            UrlsEntity::class,
            $request->getUrls()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setSeller(new SellerEntity())
        );
        $this->assertInstanceOf(
            SellerEntity::class,
            $request->getSeller()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setOptions(new OptionsEntity())
        );
        $this->assertInstanceOf(
            OptionsEntity::class,
            $request->getOptions()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setPaymentData(new PaymentDataEntity())
        );
        $this->assertInstanceOf(
            PaymentDataEntity::class,
            $request->getPaymentData()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setExpiresAt('now')
        );
        $this->assertInstanceOf(
            \DateTime::class,
            $request->getExpiresAt()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setVerify(new VerifyEntity())
        );
        $this->assertInstanceOf(
            VerifyEntity::class,
            $request->getVerify()
        );

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setSplits([new SplitItemEntity()])
        );
        $this->assertIsArray($request->getSplits());

        $this->assertInstanceOf(
            CreatePaymentV3Request::class,
            $request->setCart([new CartItemV3Entity()])
        );
        $this->assertIsArray($request->getCart());
    }
}
