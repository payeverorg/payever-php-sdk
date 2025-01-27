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
use Payever\Sdk\Payments\Base\B2BApiClientInterface;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanySearchRequest;
use Payever\Sdk\Payments\Http\RequestEntity\InvoicePaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\SettlePaymentRequest;
use Payever\Sdk\Payments\Http\ResponseEntity\CompanyCreditResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\CompanySearchResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\PaymentResponse;

/**
 * This class represents payever B2B Payments API Connector
 * The B2BApiClient class interacts with the payever API to perform B2B payment actions
 * This endpoint is available for Allianz Trade pay and BFS B2B BNPL
 */
class B2BApiClient extends CommonApiClient implements B2BApiClientInterface
{
    const SUB_URL_COMPANY_SEARCH = 'api/b2b/search';
    const SUB_URL_COMPANY_SEARCH_CREDIT = 'api/b2b/search/credit';
    const SUB_URL_SETTLE_PAYMENT = 'api/payment/settle/%s';
    const SUB_URL_INVOICE_PAYMENT = 'api/payment/invoice/%s';
    const SUB_URL_CLAIM_PAYMENT = 'api/payment/claim/%s';
    const SUB_URL_CLAIM_UPLOAD_PAYMENT = 'api/payment/claim-upload/%s';

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function searchCompany(CompanySearchRequest $companySearchRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getCompanySearchURL())
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($companySearchRequest)
            ->setResponseEntity(new CompanySearchResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function companyCredit(CompanyCreditRequest $companyCreditRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getCompanySearchCreditURL())
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_CREATE_PAYMENT)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($companyCreditRequest)
            ->setResponseEntity(new CompanyCreditResponse())
            ->build();

        return $this->executeRequest($request, OauthTokenInterface::SCOPE_CREATE_PAYMENT);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function settlePaymentRequest($paymentId, SettlePaymentRequest $paymentRequest = null)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getSettlePaymentURL($paymentId))
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity($paymentRequest ?: new SettlePaymentRequest())
            ->setResponseEntity(new PaymentResponse())
            ->build();

        return $this->executeRequest($request);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function invoicePaymentRequest($paymentId, $amount = null, $uniqueIdentifier = null)
    {
        $this->configuration->assertLoaded();

        $params = ['amount' => $amount];
        $request = RequestBuilder::post($this->getInvoicePaymentURL($paymentId))
            ->setParams($params)
            ->addRawHeader(
                $this->getToken(OauthTokenInterface::SCOPE_PAYMENT_ACTIONS)->getAuthorizationString()
            )
            ->contentTypeIsJson()
            ->setRequestEntity(new InvoicePaymentRequest())
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
    public function claimPaymentRequest($paymentId, ClaimPaymentRequest $paymentRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getClaimPaymentURL($paymentId))
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
    public function claimUploadPaymentRequest($paymentId, ClaimUploadPaymentRequest $paymentRequest)
    {
        $this->configuration->assertLoaded();

        $request = RequestBuilder::post($this->getClaimUploadPaymentURL($paymentId))
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
     * Returns URL for B2B Company Search
     *
     * @return string
     */
    protected function getCompanySearchURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_COMPANY_SEARCH;
    }

    /**
     * Returns URL for B2B Company Search Credit
     *
     * @return string
     */
    protected function getCompanySearchCreditURL()
    {
        return $this->getBaseUrl() . self::SUB_URL_COMPANY_SEARCH_CREDIT;
    }

    /**
     * Returns URL for Settle Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getSettlePaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_SETTLE_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Invoice Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getInvoicePaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_INVOICE_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Claim Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getClaimPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_CLAIM_PAYMENT, $paymentId);
    }

    /**
     * Returns URL for Claim Upload Payment path
     *
     * @param string $paymentId
     *
     * @return string
     */
    protected function getClaimUploadPaymentURL($paymentId)
    {
        return $this->getBaseUrl() . sprintf(self::SUB_URL_CLAIM_UPLOAD_PAYMENT, $paymentId);
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
