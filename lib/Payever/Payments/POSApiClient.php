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
use Payever\Sdk\Payments\Base\POSApiClientInterface;
use Payever\Sdk\Payments\Http\RequestEntity\UpdateReferenceRequest;
use Payever\Sdk\Payments\Http\RequestEntity\VerifyPaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

/**
 * This class represents payever Point of Sale API Connector
 * This endpoint is available only for Point of Sale payments.
 */
class POSApiClient extends CommonApiClient implements POSApiClientInterface
{
    const SUB_URL_POS_VERIFY = 'api/payment/verify/%s';
    const SUB_URL_POS_UPDATE = 'api/payment/edit/%s';
    const SUB_URL_POS_DOWNLOAD_CONTRACT = '%s/download-contract/%s?token=%s';

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function verifyPaymentRequest($paymentId, VerifyPaymentRequest $paymentRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getVerifyPaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($paymentRequest)
            ->setResponseEntity(new PaymentResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function updateReferenceRequest($paymentId, $reference, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $updateRequest = new UpdateReferenceRequest(['reference' => $reference]);

        $request = RequestBuilder::post($this->getUpdatePaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($updateRequest)
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
    public function downloadContractRequest($paymentMethod, $paymentId, $savePath)
    {
        $this->configuration->assertLoaded();

        $token = $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAccessToken();
        $url = $this->getDownloadContractURL($paymentMethod, $paymentId, $token);

        return $this->getHttpClient()->download($url, $savePath);
    }

    /**
     * Returns URL for verify payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getVerifyPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_POS_VERIFY, $paymentId);
    }

    /**
     * Returns URL for update payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getUpdatePaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_POS_UPDATE, $paymentId);
    }

    /**
     * Returns URL for update payment path
     *
     * @param string $paymentMethod
     * @param string $paymentId
     * @param string $token
     *
     * @return string
     */
    protected function getDownloadContractURL($paymentMethod, $paymentId, $token)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_POS_DOWNLOAD_CONTRACT, $paymentMethod, $paymentId, $token);
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
