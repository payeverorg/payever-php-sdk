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
use Payever\Sdk\Payments\Http\RequestEntity\VerifyPaymentRequest;

/**
 * Interface represents payever Point of Sale API Connector
 */
interface POSApiClientInterface extends CommonApiClientInterface
{
    /**
     * Sends a request to verify payment
     *
     * @link https://docs.payever.org/api/payments/v3/pos-services/verify Documentation
     *
     * @param string $paymentId Payment ID
     *
     * @return ResponseInterface
     */
    public function verifyPaymentRequest($paymentId, VerifyPaymentRequest $paymentRequest);

    /**
     * Sends a request to update reference payment
     *
     * @link https://docs.payever.org/api/payments/v3/pos-services/update-reference Documentation
     *
     * @param string $paymentId Payment ID
     * @param string $reference Reference Number
     *
     * @return ResponseInterface
     */
    public function updateReferenceRequest($paymentId, $reference);
}
