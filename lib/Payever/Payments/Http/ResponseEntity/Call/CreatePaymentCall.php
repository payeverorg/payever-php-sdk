<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\ResponseEntity\Call;

use Payever\Sdk\Core\Helper\DataHelper;
use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\CallEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;

/**
 * This class represents Create Payment Call Entity
 *
 * @method string|null       getPaymentMethod()
 * @method string            getPaymentIssuer()
 * @method string            getChannel()
 * @method float             getAmount()
 * @method float             getFee()
 * @method float             getDownPayment()
 * @method CartItemEntity[]  getCart()
 * @method string            getOrderId()
 * @method string            getCurrency()
 * @method string            getSalutation()
 * @method string            getFirstName()
 * @method string            getLastName()
 * @method string            getStreet()
 * @method string            getZip()
 * @method string            getCity()
 * @method string            getRegion()
 * @method string            getCountry()
 * @method string            getPhone()
 * @method string            getEmail()
 * @method string            getSuccessUrl()
 * @method string            getFailureUrl()
 * @method string            getCancelUrl()
 * @method string            getNoticeUrl()
 * @method string            getPendingUrl()
 * @method string            getXFrameHost()
 * @method PaymentDataEntity getPaymentData()
 * @method string            getClientIp()
 * @method string            getCustomerType()
 * @method string            getOrganizationName()
 * @method string            getApiVersion()
 * @method $this             setPaymentMethod(?string $paymentMethod)
 * @method $this             setPaymentIssuer(string $paymentIssuer)
 * @method $this             setChannel(string $channel)
 * @method $this             setAmount(float $amount)
 * @method $this             setFee(float $fee)
 * @method $this             setDownPayment(float $downPayment)
 * @method $this             setOrderId(string $orderId)
 * @method $this             setCurrency(string $currency)
 * @method $this             setSalutation(string $salutation)
 * @method $this             setFirstName(string $firstName)
 * @method $this             setLastName(string $lastName)
 * @method $this             setStreet(string $street)
 * @method $this             setZip(string $zip)
 * @method $this             setCity(string $city)
 * @method $this             setRegion(string $region)
 * @method $this             setCountry(string $country)
 * @method $this             setPhone(string $phone)
 * @method $this             setEmail(string $email)
 * @method $this             setSuccessUrl(string $successUrl)
 * @method $this             setFailureUrl(string $failureUrl)
 * @method $this             setCancelUrl(string $cancelUrl)
 * @method $this             setNoticeUrl(string $noticeUrl)
 * @method $this             setPendingUrl(string $pendingUrl)
 * @method $this             setXFrameHost(string $xFrameHost)
 * @method $this             setClientIp(string $clientIp)
 * @method $this             setCustomerType(string $customerType)
 * @method $this             setOrganizationName(string $organizationName)
 * @method $this             setApiVersion(string $apiVersion)
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreatePaymentCall extends CallEntity
{
    /** @var string|null $paymentMethod */
    protected $paymentMethod;

    /** @var string $paymentIssuer */
    protected $paymentIssuer;

    /** @var string $channel */
    protected $channel;

    /** @var float $amount */
    protected $amount;

    /** @var float $fee */
    protected $fee;

    /** @var float $downPayment */
    protected $downPayment;

    /** @var CartItemEntity[] $cart */
    protected $cart;

    /** @var string $orderId */
    protected $orderId;

    /** @var string $currency */
    protected $currency;

    /** @var string $salutation */
    protected $salutation;

    /** @var string $firstName */
    protected $firstName;

    /** @var string $lastName */
    protected $lastName;

    /** @var string $street */
    protected $street;

    /** @var string $zip */
    protected $zip;

    /** @var string $city */
    protected $city;

    /** @var string $region */
    protected $region;

    /** @var string $country */
    protected $country;

    /** @var string $phone */
    protected $phone;

    /** @var string $email */
    protected $email;

    /** @var string $successUrl */
    protected $successUrl;

    /** @var string $failureUrl */
    protected $failureUrl;

    /** @var string $cancelUrl */
    protected $cancelUrl;

    /** @var string $noticeUrl */
    protected $noticeUrl;

    /** @var string $pendingUrl */
    protected $pendingUrl;

    /** @var string $xFrameHost */
    protected $xFrameHost;

    /** @var PaymentDataEntity $paymentData */
    protected $paymentData;

    /** @var string $clientIp */
    protected $clientIp;

    /** @var string $customerType */
    protected $customerType;

    /** @var string $organizationName */
    protected $organizationName;

    /** @var string $apiVersion */
    protected $apiVersion;

    /**
     * Sets Cart
     *
     * @param array|string $cart
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function setCart($cart)
    {
        if (is_string($cart)) {
            $cart = StringHelper::jsonDecode($cart);
        }

        if ($cart && is_array($cart)) {
            foreach ($cart as $item) {
                $this->cart[] = new CartItemEntity($item);
            }
        }

        return $this;
    }

    /**
     * Sets payment data
     *
     * @param PaymentDataEntity|array $paymentData
     *
     * @return $this
     */
    public function setPaymentData($paymentData)
    {
        $paymentData = DataHelper::getEntityInstance($paymentData, PaymentDataEntity::class);
        if ($paymentData) {
            $this->paymentData = $paymentData;
        }

        return $this;
    }
}
