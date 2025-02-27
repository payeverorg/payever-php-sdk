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
use Payever\Sdk\Payments\Http\RequestEntity\ClaimPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\ClaimUploadPaymentRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanyCreditRequest;
use Payever\Sdk\Payments\Http\RequestEntity\CompanySearchRequest;

/**
 * Interface represents payever Payments API Connector
 */
interface B2BApiClientInterface extends CommonApiClientInterface
{
    /**
     * Search company
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/company-search Documentation
     *
     * @param CompanySearchRequest $companySearchRequest
     *
     * @return ResponseInterface
     */
    public function companySearchRequest(CompanySearchRequest $companySearchRequest);

    /**
     * Get company credit
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/check-credit-line Documentation
     *
     * @param CompanyCreditRequest $companyCreditRequest
     *
     * @return ResponseInterface
     */
    public function companyCreditRequest(CompanyCreditRequest $companyCreditRequest);

    /**
     * Sends a request to settle payment
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/settle-invoice Documentation
     *
     * @param string $paymentId Payment ID
     * @param null|string $uniqueIdentifier
     *
     * @return ResponseInterface
     */
    public function settlePaymentRequest($paymentId, $uniqueIdentifier = null);

    /**
     * Sends a request to invoice payment
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/partial-settle-invoice Documentation
     *
     * @param string      $paymentId Payment ID
     * @param float       $amount
     * @param null|string $uniqueIdentifier
     *
     * @return ResponseInterface
     */
    public function invoicePaymentRequest($paymentId, $amount, $uniqueIdentifier = null);

    /**
     * Sends a request to claim payment
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/claim-invoice Documentation
     *
     * @param string              $paymentId Payment ID
     * @param ClaimPaymentRequest $paymentRequest Specify the claim payment request.
     *
     * @return ResponseInterface
     */
    public function claimPaymentRequest($paymentId, ClaimPaymentRequest $paymentRequest);

    /**
     * Sends a request to claim upload payment
     *
     * @link https://docs.payever.org/api/payments/v3/b2b-services/upload-claim Documentation
     *
     * @param string                    $paymentId Payment ID
     * @param ClaimUploadPaymentRequest $paymentRequest Specify the claim payment request.
     *
     * @return ResponseInterface
     */
    public function claimUploadPaymentRequest($paymentId, ClaimUploadPaymentRequest $paymentRequest);
}
