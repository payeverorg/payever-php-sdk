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
use Payever\Sdk\Payments\Http\MessageEntity\Payment\PaymentDataEntity;

/**
 * This class represents Create Payment RequestInterface Entity
 *
 * @method string                 getChannel()
 * @method integer                getChannelSetId()
 * @method float                  getAmount()
 * @method float                  getFee()
 * @method string                 getOrderId()
 * @method string                 getCurrency()
 * @method CartItemEntity[]       getCart()
 * @method PaymentDataEntity|null getPaymentData()
 * @method string                 getSalutation()
 * @method string                 getPaymentMethod()
 * @method string|null            getVariantId()
 * @method string                 getFirstName()
 * @method string                 getLastName()
 * @method string                 getStreet()
 * @method string                 getStreetNumber()
 * @method string                 getZip()
 * @method string                 getCity()
 * @method string                 getRegion()
 * @method string                 getCountry()
 * @method string                 getSocialSecurityNumber()
 * @method \DateTime|false        getBirthdate()
 * @method string                 getPhone()
 * @method string                 getEmail()
 * @method string                 getSuccessUrl()
 * @method string                 getFailureUrl()
 * @method string                 getCancelUrl()
 * @method string                 getNoticeUrl()
 * @method string                 getPendingUrl()
 * @method string                 getCustomerRedirectUrl()
 * @method string                 getXFrameHost()
 * @method string                 getPluginVersion()
 * @method $this                  setChannel(string $channel)
 * @method $this                  setChannelSetId(int $id)
 * @method $this                  setAmount(float $amount)
 * @method $this                  setFee(float $fee)
 * @method $this                  setOrderId(string $id)
 * @method $this                  setPaymentMethod(string $method)
 * @method $this                  setVariantId(string|null $variantId)
 * @method $this                  setCurrency(string $currency)
 * @method $this                  setSalutation(string $salutation)
 * @method $this                  setFirstName(string $name)
 * @method $this                  setLastName(string $name)
 * @method $this                  setStreet(string $street)
 * @method $this                  setStreetNumber(string $streetNumber)
 * @method $this                  setZip(string $zip)
 * @method $this                  setCity(string $city)
 * @method $this                  setRegion(string $region)
 * @method $this                  setCountry(string $country)
 * @method $this                  setSocialSecurityNumber(string $ssn)
 * @method $this                  setPhone(string $phone)
 * @method $this                  setEmail(string $email)
 * @method $this                  setSuccessUrl(string $url)
 * @method $this                  setFailureUrl(string $url)
 * @method $this                  setCancelUrl(string $url)
 * @method $this                  setNoticeUrl(string $url)
 * @method $this                  setPendingUrl(string $url)
 * @method $this                  setCustomerRedirectUrl(string $url)
 * @method $this                  setXFrameHost(string $host)
 * @method $this                  setPluginVersion(string $version)
 */
class SubmitPaymentRequest extends CreatePaymentRequest
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
