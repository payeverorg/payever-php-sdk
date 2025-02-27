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

namespace Payever\Sdk\Payments\Http\ResponseEntity\Result;

use Payever\Sdk\Core\Http\MessageEntity\ResultEntity;
use Payever\Sdk\Payments\Http\MessageEntity\RiskPaymentProviderEntity;

/**
 * This class represents Risk Payment Result Entity
 *
 * @method string                    getRiskOrgId()
 * @method string                    getRiskSessionId()
 * @method RiskPaymentProviderEntity getProvider()
 * @method $this                     setRiskOrgId(string $riskOrgId)
 * @method $this                     setRiskSessionId(string $riskSessionId)
 * @method $this                     setProvider(RiskPaymentProviderEntity $provider)
 */
class RiskPaymentResult extends ResultEntity
{
    /** @var string $riskOrgId */
    protected $riskOrgId;

    /** @var string $riskSessionId */
    protected $riskSessionId;

    /** @var RiskPaymentProviderEntity $provider */
    protected $provider;
}
