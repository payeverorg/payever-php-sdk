<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Base
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Base;

use Payever\Sdk\Core\Base\CommonApiClientInterface;
use Payever\Sdk\Core\Base\ResponseInterface;
use Payever\Sdk\Payments\Http\RequestEntity\Action\PaymentItemEntity;
use Payever\Sdk\Payments\Http\RequestEntity\AuthorizePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV2Request;
use Payever\Sdk\Payments\Http\RequestEntity\CreatePaymentV3Request;
use Payever\Sdk\Payments\Http\RequestEntity\ListPaymentsRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ShippingGoodsPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SubmitPaymentV3Request;

/**
 * Interface represents payever Payments API Connector
 */
interface PaymentsApiClientInterface extends CommonApiClientInterface
{
    /**
     * Sends a request to create payment
     *
     * @link https://docs.payever.org/api/payments/create-payment/create-payments Documentation
     *
     * @param CreatePaymentRequest $createPaymentRequest
     *
     * @return ResponseInterface
     *
     * @deprecated
     */
    public function createPaymentRequest(CreatePaymentRequest $createPaymentRequest);

    /**
     * Sends a request to create payment for v2 version of api
     *
     * @link https://docs.payever.org/api/payments/v2/create-payment/create-payments Documentation
     *
     * @param CreatePaymentV2Request $createPaymentRequest
     *
     * @return ResponseInterface
     */
    public function createPaymentV2Request(CreatePaymentV2Request $createPaymentRequest);

    /**
     * Sends a request to create payment for v2 version of api
     *
     * @link https://docs.payever.org/api/payments/v3/create-payment/create-payments Documentation
     *
     * @param CreatePaymentV3Request $createPaymentRequest
     *
     * @return ResponseInterface
     */
    public function createPaymentV3Request(CreatePaymentV3Request $createPaymentRequest);

    /**
     * Sends a request to submit payment
     *
     * @link https://docs.payever.org/api/payments/create-payment/submit-payments Documentation
     *
     * @param SubmitPaymentRequest $submitPaymentRequest
     *
     * @return ResponseInterface
     *
     * @deprecated
     */
    public function submitPaymentRequest(SubmitPaymentRequest $submitPaymentRequest);

    /**
     * Sends a request to submit payment
     *
     * @link https://docs.payever.org/api/payments/v3/create-payment/submit-payments Documentation
     *
     * @param SubmitPaymentV3Request $submitPaymentRequest
     *
     * @return ResponseInterface
     */
    public function submitPaymentV3Request(SubmitPaymentV3Request $submitPaymentRequest);

    /**
     * Requests payment details
     *
     * @link https://docs.payever.org/api/payments/v3/view-payments/retrieve-payment Documentation
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     */
    public function retrievePaymentRequest($paymentId);

    /**
     * Requests payments details
     *
     * @link https://docs.payever.org/api/payments/v3/view-payments/list-payments Documentation
     *
     * @param ListPaymentsRequest $listPaymentsRequest
     *
     * @return ResponseInterface
     */
    public function listPaymentsRequest(ListPaymentsRequest $listPaymentsRequest);

    /**
     * Sends a request to refund payment
     *
     * @link https://docs.payever.org/api/payments/v3/order-management/refund Documentation
     *
     * @param string $paymentId Payment ID
     * @param float  $amount Specify the refund amount. If no amount is set, the whole amount will be refunded.
     * @param string $uniqueIdentifier Action Identifier
     *
     * @return ResponseInterface
     */
    public function refundPaymentRequest($paymentId, $amount, $uniqueIdentifier = null);

    /**
     * Sends a request to refund payment
     *
     * @link https://docs.payever.org/api/payments/v3/order-management/partial-refund Documentation
     *
     * @param string              $paymentId Payment ID
     * @param PaymentItemEntity[] $items Specify the refund items.
     * @param null|float          $deliveryFee Shipping total.
     * @param string              $uniqueIdentifier Action Identifier
     *
     * @return ResponseInterface
     */
    public function refundItemsPaymentRequest($paymentId, $items, $deliveryFee = null, $uniqueIdentifier = null);

    /**
     * Sends a request to edit payment
     *
     * @link https://docs.payever.org/api/payments/v3/order-management/edit Documentation
     *
     * @param string $paymentId Payment ID
     * @param float  $amount Specify the refund amount. If no amount is set, the whole amount will be edited.
     * @param string $uniqueIdentifier Action Identifier
     *
     * @return ResponseInterface
     */
    public function editPaymentRequest($paymentId, $amount = null, $uniqueIdentifier = null);

    /**
     * Sends a request to authorize previously made payment
     *
     * @link https://getpayever.com/developer/api-documentation/#authorize-payment Documentation
     *
     * @param string                  $paymentId Payment ID
     * @param AuthorizePaymentRequest $paymentRequest
     *
     * @return ResponseInterface
     */
    public function authorizePaymentRequest($paymentId, AuthorizePaymentRequest $paymentRequest);

    /**
     * Requests to remind customer to pay the bill
     *
     * @link https://getpayever.com/developer/api-documentation/#remind-payment Documentation
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     *
     * @deprecated This request is only available for Santander DE Invoice and not used anywhere
     */
    public function remindPaymentRequest($paymentId);

    /**
     * Requests to collect payment
     *
     * @link https://getpayever.com/developer/api-documentation/#collect-payments Documentation
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     *
     * @deprecated This request is only available for Santander DE Invoice and not used anywhere
     */
    public function collectPaymentsRequest($paymentId);

    /**
     * Requests to notify late payment
     *
     * @link https://getpayever.com/developer/api-documentation/#late-payments Documentation
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     *
     * @deprecated This request is only available for Santander DE Invoice and not used anywhere
     */
    public function latePaymentsRequest($paymentId);

    /**
     * Sends a request about completing shipping
     *
     * @link https://docs.payever.org/api/payments/v3/capture-payments/shipping-goods Documentation
     *
     * @param string                      $paymentId Payment ID
     * @param ShippingGoodsPaymentRequest $paymentRequest
     *
     * @return ResponseInterface
     */
    public function shippingGoodsPaymentRequest($paymentId, ShippingGoodsPaymentRequest $paymentRequest);

    /**
     * Sends a request to cancel non-completed payment
     *
     * @link https://docs.payever.org/api/payments/v3/order-management/cancel Documentation
     *
     * @param string $paymentId Payment ID
     * @param float  $amount Specify the partial cancel amount. If no amount is set, the whole amount will be cancelled.
     * @param string $uniqueIdentifier Action Identifier
     *
     * @return ResponseInterface
     */
    public function cancelPaymentRequest($paymentId, $amount, $uniqueIdentifier = null);

    /**
     * Sends a request to refund payment
     *
     * @link https://docs.payever.org/api/payments/v3/order-management/partial-cancel Documentation
     *
     * @param string              $paymentId Payment ID
     * @param PaymentItemEntity[] $items Specify the refund items.
     * @param null|float          $deliveryFee Shipping total.
     * @param string              $uniqueIdentifier Action Identifier
     *
     * @return ResponseInterface
     */
    public function cancelItemsPaymentRequest($paymentId, $items, $deliveryFee = null, $uniqueIdentifier = null);

    /**
     * Requests serialized API Call record
     *
     * @link https://getpayever.com/developer/api-documentation/#retrieve-api-call Documentation
     *
     * @param string $callId API Call ID
     *
     * @return ResponseInterface
     */
    public function retrieveApiCallRequest($callId);

    /**
     * Returns payment options
     *
     * @link https://docs.payever.org/api/payments/v2/payment-options/list-variant-options
     *
     * @param array  $params Query part of , available params: _locale, _currency
     * @param string $businessUuid Business UUID
     * @param string $channel Shopsystem channel
     *
     * @return ResponseInterface
     */
    public function listPaymentOptionsRequest($params = [], $businessUuid = '', $channel = '');

    /**
     * Same as listPaymentOptionsRequest, additionally contains list of payment option variants
     *
     * @link https://docs.payever.org/api/payments/v2/payment-options/list-variant-options
     *
     * @param array  $params Query part of , available params: _locale, _currency
     * @param string $businessUuid Business UUID
     * @param string $channel Shopsystem channel
     *
     * @return ResponseInterface
     */
    public function listPaymentOptionsWithVariantsRequest($params = [], $businessUuid = '', $channel = '');

    /**
     * Provide payment rates calculations
     *
     * @link https://docs.payever.org/api/payments/v3/payment-options/list-payment-options
     *
     * @param string $variantId Payment Option Variant Id
     * @param float  $amount Payment Amount
     * @param float  $downpayment Payment Downpayment
     *
     * @return ResponseInterface
     */
    public function listPaymentRatesRequest($variantId, $amount, $downpayment = null);

    /**
     * Returns account settings
     *
     * @param string $businessUuid Business UUID
     * @param string $channel Shopsystem channel
     *
     * @return ResponseInterface
     */
    public function paymentSettingsRequest($businessUuid = '', $channel = '');

    /**
     * Returns transaction
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     */
    public function getTransactionRequest($paymentId);
}
