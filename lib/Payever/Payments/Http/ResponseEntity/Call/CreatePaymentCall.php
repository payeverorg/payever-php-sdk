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

use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\CallEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\CartItemEntity;

/**
 * This class represents Create Payment Call Entity
 *
 * @method string           getChannel()
 * @method float            getAmount()
 * @method float            getFee()
 * @method string           getOrderId()
 * @method string           getCurrency()
 * @method CartItemEntity[] getCart()
 * @method string           getSalutation()
 * @method string           getFirstName()
 * @method string           getLastName()
 * @method string           getStreet()
 * @method string           getZip()
 * @method string           getCity()
 * @method string           getRegion()
 * @method string           getCountry()
 * @method string           getPhone()
 * @method string           getEmail()
 * @method string           getSuccessUrl()
 * @method string           getFailureUrl()
 * @method string           getCancelUrl()
 * @method string           getNoticeUrl()
 * @method string           getPendingUrl()
 * @method string           getCustomerRedirectUrl()
 * @method string           getXFrameHost()
 * @method array            getPayments()
 * @method string           getType()
 * @method $this            setChannel(string $name)
 * @method $this            setAmount(float $amount)
 * @method $this            setFee(float $fee)
 * @method $this            setOrderId(string $orderId)
 * @method $this            setCurrency(string $currency)
 * @method $this            setSalutation(string $salutation)
 * @method $this            setFirstName(string $firstName)
 * @method $this            setLastName(string $lastName)
 * @method $this            setStreet(string $street)
 * @method $this            setZip(string $zip)
 * @method $this            setCity(string $city)
 * @method $this            setRegion(string $region)
 * @method $this            setCountry(string $country)
 * @method $this            setPhone(string $phone)
 * @method $this            setEmail(string $email)
 * @method $this            setSuccessUrl(string $successUrl)
 * @method $this            setFailureUrl(string $failureUrl)
 * @method $this            setCancelUrl(string $cancelUrl)
 * @method $this            setNoticeUrl(string $noticeUrl)
 * @method $this            setPendingUrl(string $pendingUrl)
 * @method $this            setCustomerRedirectUrl(string $url)
 * @method $this            setXFrameHost(string $xFrameHost)
 * @method $this            setPayments(array $payments)
 * @method $this            setType(string $type)
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class CreatePaymentCall extends CallEntity
{
    /** @var string $channel */
    protected $channel;

    /** @var float $amount */
    protected $amount;

    /** @var float $fee */
    protected $fee;

    /** @var string $orderId */
    protected $orderId;

    /** @var string $currency */
    protected $currency;

    /** @var CartItemEntity[] $cart */
    protected $cart;

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

    /** @var array $payments */
    protected $payments;

    /** @var string $type */
    protected $type;

    /**
     * Sets Cart
     *
     * @param array|string $cart
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
    }
}
