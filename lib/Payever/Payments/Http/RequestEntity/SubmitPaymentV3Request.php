<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
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

/**
 * This class represents Create Payment RequestInterface Entity
 *
 * @method ChannelEntity             getChannel()
 * @method PurchaseEntity            getPurchase()
 * @method CustomerEntity            getCustomer()
 * @method CompanyEntity             getCompany()
 * @method CustomerAddressV3Entity   getBillingAddress()
 * @method CustomerAddressV3Entity   getShippingAddress()
 * @method ShippingOptionEntity      getShippingOption()
 * @method CartItemEntity[]          getCart()
 * @method SplitItemEntity[]         getSplits()
 * @method UrlsEntity                getUrls()
 * @method OptionsEntity             getOptions()
 * @method VerifyEntity              getVerify()
 * @method SellerEntity              getSeller()
 * @method string                    getReference()
 * @method string                    getReferenceExtra()
 * @method string|null               getPaymentVariantId()
 * @method string|null               getPaymentMethod()
 * @method array                     getPaymentMethods()
 * @method string                    getLocale()
 * @method string                    getXFrameHost()
 * @method string                    getPluginVersion()
 * @method string                    getClientIp()
 * @method \DateTime|null            getExpiresAt()
 * @method PaymentDataEntity|null    getPaymentData()
 * @method $this                     setReference(string $id)
 * @method $this                     setReferenceExtra(string $id)
 * @method $this                     setPaymentVariantId(string|null $variantId)
 * @method $this                     setPaymentMethod(string $paymentMethod)
 * @method $this                     setPaymentMethods(array $paymentMethods)
 * @method $this                     setLocale(string $locale)
 * @method $this                     setXFrameHost(string $host)
 * @method $this                     setPluginVersion(string $version)
 * @method $this                     setClientIp(string $ip)
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class SubmitPaymentV3Request extends CreatePaymentV3Request
{
    /** @var PaymentDataEntity $paymentData */
    protected $paymentData;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        if (!$this->paymentData instanceof PaymentDataEntity) {
            return false;
        }

        return parent::isValid();
    }

    /**
     * Sets payment data
     *
     * @param PaymentDataEntity|array|string $paymentData
     *
     * @return $this
     */
    public function setPaymentData($paymentData)
    {
        if (!$paymentData) {
            return $this;
        }

        if ($paymentData instanceof PaymentDataEntity) {
            $this->paymentData = $paymentData;

            return $this;
        }

        if (is_string($paymentData)) {
            $paymentData = json_decode($paymentData, true);
        }

        if (!is_array($paymentData)) {
            return $this;
        }

        $this->paymentData = new PaymentDataEntity($paymentData);

        return $this;
    }
}
