<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Payments
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments;

use Payever\Sdk\Core\Base\OauthTokenInterface;
use Payever\Sdk\Core\CommonApiClient;
use Payever\Sdk\Core\Http\RequestBuilder;
use Payever\Sdk\Payments\Base\PaymentsApiClientInterface;
use Payever\Sdk\Payments\Enum\BusinessType;
use Payever\Sdk\Payments\Http\RequestEntity\AuthorizePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CancelItemsPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CancelPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\EditPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ListPaymentsRequest;
use Payever\Sdk\Payments\Http\RequestEntity\RefundItemsPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\RefundPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\TermsPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\CreatePaymentResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentOptionsWithVariantsResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentRatesResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\ListPaymentsResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentCallResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentSettingsResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\RetrieveApiCallResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\RetrievePaymentResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\RiskPaymentResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\SubmitPaymentResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\TermsPaymentResponse;

/**
 * This class represents payever Payments API Connector
 * The PaymentsApiClient class handles payever Payments API interactions, including payment creation and management.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class PaymentsApiClient extends CommonApiClient implements PaymentsApiClientInterface
{
    const SUB_URL_CREATE_PAYMENT = 'api/v3/payment';
    const SUB_URL_CREATE_PAYMENT_SUBMIT = 'api/v3/payment/submit';
    const SUB_URL_RISK_PAYMENT = 'api/v2/payment/risk/%s';
    const SUB_URL_TERMS_PAYMENT = 'api/payment/terms/%s';
    const SUB_URL_RETRIEVE_PAYMENT = 'api/payment/%s';
    const SUB_URL_LIST_PAYMENTS = 'api/payment';
    const SUB_URL_REFUND_PAYMENT = 'api/payment/refund/%s';
    const SUB_URL_AUTHORIZE_PAYMENT = 'api/payment/authorize/%s';
    const SUB_URL_REMIND_PAYMENT = 'api/payment/remind/%s';
    const SUB_URL_COLLECT_PAYMENTS = 'api/payment/collect/%s';
    const SUB_URL_LATE_PAYMENTS = 'api/payment/late-payment/%s';
    const SUB_URL_SHIPPING_GOODS_PAYMENT = 'api/payment/shipping-goods/%s';
    const SUB_URL_CANCEL_PAYMENT = 'api/payment/cancel/%s';
    const SUB_URL_EDIT_PAYMENT = 'api/payment/edit/%s';
    const SUB_URL_RETRIEVE_API_CALL = 'api/%s';
    const SUB_URL_LIST_PAYMENT_OPTIONS = 'api/shop/oauth/%s/payment-options/%s';
    const SUB_URL_LIST_PAYMENT_OPTIONS_VARIANTS = 'api/shop/oauth/%s/payment-options/variants/%s';
    const SUB_URL_LIST_PAYMENT_RATES = 'api/payment/%s/rates';
    const SUB_URL_SETTINGS = 'api/shop/%s/settings/%s';
    const SUB_URL_TRANSACTION = 'api/rest/v1/transactions/%s';

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function createPaymentRequest(CreatePaymentRequest $createPaymentRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getCreatePaymentURL())
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($createPaymentRequest)
            ->setResponseEntity(new CreatePaymentResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function submitPaymentRequest(SubmitPaymentRequest $submitPaymentRequest)
    {
        $this->configuration->assertLoaded();

        if (!$submitPaymentRequest->getChannel()) {
            $submitPaymentRequest->setChannel(
                $this->configuration->getChannelSet()
            );
        }

        $request = RequestBuilder::post($this->getSubmitPaymentURL())
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($submitPaymentRequest)
            ->setResponseEntity(new SubmitPaymentResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function riskPaymentRequest($paymentMethod)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getRiskPaymentURL($paymentMethod))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->setResponseEntity(new RiskPaymentResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function termsPaymentRequest($variantId, TermsPaymentRequest $paymentRequest = null)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getTermsPaymentURL($variantId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($paymentRequest ?: new TermsPaymentRequest())
            ->setResponseEntity(new TermsPaymentResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function retrievePaymentRequest($paymentId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrievePaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->setResponseEntity(new RetrievePaymentResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_PAYMENT_INFO);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function listPaymentsRequest(ListPaymentsRequest $listPaymentsRequest = null)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getListPaymentsURL())
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setRequestEntity($listPaymentsRequest ?: new ListPaymentsRequest())
            ->setResponseEntity(new ListPaymentsResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function refundPaymentRequest($paymentId, $amount, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();
        $refundPaymentRequest = new RefundPaymentRequest(['amount' => $amount]);

        $request = RequestBuilder::post($this->getRefundPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($refundPaymentRequest)
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function refundItemsPaymentRequest($paymentId, $items, $deliveryFee = null, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $refundPaymentRequest = new RefundItemsPaymentRequest();
        $refundPaymentRequest->setPaymentItems($items);

        if ($deliveryFee) {
            $refundPaymentRequest->setDeliveryFee($deliveryFee);
        }

        $request = RequestBuilder::post($this->getRefundPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($refundPaymentRequest)
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function editPaymentRequest($paymentId, $amount = null, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();
        $editPaymentRequest = new EditPaymentRequest(['amount' => $amount]);

        $request = RequestBuilder::post($this->getEditPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($editPaymentRequest)
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function authorizePaymentRequest($paymentId, AuthorizePaymentRequest $paymentRequest = null)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getAuthorizePaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setRequestEntity($paymentRequest ?: new AuthorizePaymentRequest())
            ->setResponseEntity(new PaymentCallResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function remindPaymentRequest($paymentId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getRemindPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setResponseEntity(new PaymentCallResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function collectPaymentsRequest($paymentId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getCollectPaymentsURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setResponseEntity(new PaymentCallResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function latePaymentsRequest($paymentId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getLatePaymentsURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setResponseEntity(new PaymentCallResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function shippingGoodsPaymentRequest(
        $paymentId,
        ShippingGoodsPaymentRequest $paymentRequest = null,
        $uniqueIdentifier = null
    ) {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getShippingGoodsPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($paymentRequest ?: new ShippingGoodsPaymentRequest())
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function cancelPaymentRequest($paymentId, $amount = null, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();
        $cancelRequest = new CancelPaymentRequest(['amount' => $amount]);

        $request = RequestBuilder::post($this->getCancelPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($cancelRequest)
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function cancelItemsPaymentRequest($paymentId, $items, $deliveryFee = null, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $cancelPaymentRequest = new CancelItemsPaymentRequest();
        $cancelPaymentRequest->setPaymentItems($items);

        if ($deliveryFee) {
            $cancelPaymentRequest->setDeliveryFee($deliveryFee);
        }

        $request = RequestBuilder::post($this->getCancelPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($cancelPaymentRequest)
            ->setResponseEntity(new PaymentResponse())
            ->addIdempotencyHeader($uniqueIdentifier)
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function retrieveApiCallRequest($callId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getRetrieveApiCallURL($callId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setResponseEntity(new RetrieveApiCallResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function listPaymentOptionsRequest($params = [], $businessUuid = '', $channel = '')
    {
        $businessUuid = $businessUuid ?: $this->getConfiguration()->getBusinessUuid();
        $channel = $channel ?: $this->getConfiguration()->getChannelSet();

        $request = RequestBuilder::get($this->getListPaymentOptionsURL($businessUuid, $channel, $params))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->setResponseEntity(new ListPaymentOptionsResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_PAYMENT_INFO);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function listPaymentOptionsWithVariantsRequest($params = [], $businessUuid = '', $channel = '')
    {
        $businessUuid = $businessUuid ?: $this->getConfiguration()->getBusinessUuid();
        $channel = $channel ?: $this->getConfiguration()->getChannelSet();

        $request = RequestBuilder::get($this->getListPaymentOptionsVariantsURL($businessUuid, $channel, $params))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->setResponseEntity(new ListPaymentOptionsWithVariantsResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_PAYMENT_INFO);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function listPaymentRatesRequest($variantId, $amount, $downpayment = null)
    {
        $request = RequestBuilder::get($this->getListPaymentRatesURL($variantId, $amount, $downpayment))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_INFO)->getAuthorizationString()
            )
            ->setResponseEntity(new ListPaymentRatesResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_PAYMENT_INFO);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function paymentSettingsRequest($businessUuid = '', $channel = '')
    {
        $businessUuid = $businessUuid ?: $this->getConfiguration()->getBusinessUuid();
        $channel = $channel ?: $this->getConfiguration()->getChannelSet();

        $request = RequestBuilder::get($this->getPaymentSettingsURL($businessUuid, $channel))
            ->setResponseEntity(new PaymentSettingsResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * Returns if B2b Search is Active
     *
     * @param string $businessUuid
     * @param string $channel
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function isB2bSearchActive($businessUuid = '', $channel = '')
    {
        $b2bTypes = [BusinessType::B2B, BusinessType::MIXED];
        $response = $this->paymentSettingsRequest($businessUuid, $channel)->getResponseEntity();

        return in_array($response->getType(), $b2bTypes, true) && $response->getB2bSearch();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function getTransactionRequest($paymentId)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::get($this->getTransactionURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->setResponseEntity(new GetTransactionResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * Returns URL for Create Payment path
     *
     * @return string
     */
    protected function getCreatePaymentURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_CREATE_PAYMENT;
    }

    /**
     * Returns URL for Submit Payment path
     *
     * @return string
     */
    protected function getSubmitPaymentURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_CREATE_PAYMENT_SUBMIT;
    }

    /**
     * Returns URL for Risk Payment path
     *
     * @return string
     */
    protected function getRiskPaymentURL($paymentMethod)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_RISK_PAYMENT, $paymentMethod);
    }

    /**
     * Returns URL for Terms Payment path
     *
     * @param string $variantId
     *
     * @return string
     */
    protected function getTermsPaymentURL($variantId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_TERMS_PAYMENT, $variantId);
    }

    /**
     * Returns URL for Retrieve Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getRetrievePaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_RETRIEVE_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for List Payments path
     *
     * @return string
     */
    protected function getListPaymentsURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_LIST_PAYMENTS;
    }

    /**
     * Returns URL for Refund Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getRefundPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_REFUND_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Edit Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getEditPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_EDIT_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Authorize Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getAuthorizePaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_AUTHORIZE_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Remind Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getRemindPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_REMIND_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Collect Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getCollectPaymentsURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_COLLECT_PAYMENTS, $paymentId);
    }

    /**
     * Returns URL for Late Payments path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getLatePaymentsURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_LATE_PAYMENTS, $paymentId);
    }

    /**
     * Returns URL for Shipping Goods Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getShippingGoodsPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_SHIPPING_GOODS_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Cancel Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getCancelPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_CANCEL_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Retrieve API Call path
     *
     * @param string $callId
     *
     * @return string
     */
    protected function getRetrieveApiCallURL($callId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_RETRIEVE_API_CALL, $callId);
    }

    /**
     * Returns URL for Available Payment Options path
     *
     * @param string $businessUuid
     * @param string $channel
     * @param array  $params
     *
     * @return string
     */
    protected function getListPaymentOptionsURL($businessUuid, $channel, $params = [])
    {
        return $this->getBaseUrl()
            . sprintf(self::SUB_URL_LIST_PAYMENT_OPTIONS, $businessUuid, $channel)
            . (empty($params) ? '' : '?' . http_build_query($params));
    }

    /**
     * Returns URL for Available Payment Options request
     *
     * @param string $businessUuid
     * @param string $channel
     * @param array  $params
     *
     * @return string
     */
    protected function getListPaymentOptionsVariantsURL($businessUuid, $channel, $params = [])
    {
        return $this->getBaseUrl()
            . sprintf(self::SUB_URL_LIST_PAYMENT_OPTIONS_VARIANTS, $businessUuid, $channel)
            . (empty($params) ? '' : '?' . http_build_query($params));
    }

    /**
     * Returns URL for Available Payment Rates request
     *
     * @param string $variantId
     * @param float  $amount
     * @param float  $downpayment
     *
     * @return string
     */
    protected function getListPaymentRatesURL($variantId, $amount, $downpayment)
    {
        $params = array_filter(['amount' => $amount, 'downpayment' => $downpayment]);

        return $this->getBaseUrl()
            . sprintf(self::SUB_URL_LIST_PAYMENT_RATES, $variantId)
            . (empty($params) ? '' : '?' . http_build_query($params));
    }

    /**
     * Returns payment settings
     *
     * @param string $businessUuid
     * @param string $channel
     *
     * @return string
     */
    protected function getPaymentSettingsURL($businessUuid, $channel)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_SETTINGS, $businessUuid, $channel);
    }

    /**
     * Returns URL to Transaction path
     *
     * @param int $paymentId
     *
     * @return string
     */
    protected function getTransactionURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_TRANSACTION, $paymentId);
    }

    /**
     * Returns Base URL to payever Payments API
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->getBaseEntrypoint();
    }
}
