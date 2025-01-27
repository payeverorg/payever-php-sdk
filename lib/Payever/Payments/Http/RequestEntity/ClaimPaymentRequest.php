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

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Claim Payment RequestInterface Entity
 *
 * @method bool   getIsNonInclusive()
 * @method bool   getIsLegal()
 * @method bool   getIsDisputed()
 * @method bool   getIsGuaranteeExisting()
 * @method int    getPolicyId()
 * @method string getBusinessUnitCode()
 * @method string getExtensionId()
 * @method $this  setIsNonInclusive(bool $isNonInclusive)
 * @method $this  setIsLegal(bool $isLegal)
 * @method $this  setIsDisputed(bool $isDisputed)
 * @method $this  setIsGuaranteeExisting(bool $isGuaranteeExisting)
 * @method $this  setPolicyId(string $policyId)
 * @method $this  setBusinessUnitCode(string $businessUnitCode)
 * @method $this  setExtensionId(string $extensionId)
 */
class ClaimPaymentRequest extends RequestEntity
{
    /** @var bool $isNonInclusive */
    protected $isNonInclusive;

    /** @var bool $isLegal */
    protected $isLegal;

    /** @var bool $isDisputed */
    protected $isDisputed;

    /** @var bool $isGuaranteeExisting */
    protected $isGuaranteeExisting;

    /** @var string $policyId */
    protected $policyId;

    /** @var string $businessUnitCode */
    protected $businessUnitCode;

    /** @var string $extensionId */
    protected $extensionId;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() && $this->isOptionalBooleansValid() && $this->isOptionalStringsValid();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }

    /**
     * Checks if values are either null or booleans.
     */
    private function isOptionalBooleansValid()
    {
        return (!$this->isNonInclusive || is_bool($this->isNonInclusive))
            && (!$this->isLegal || is_bool($this->isLegal))
            && (!$this->isDisputed || is_bool($this->isDisputed))
            && (!$this->isGuaranteeExisting || is_bool($this->isGuaranteeExisting));
    }

    /**
     * Checks if values are either null or strings.
     */
    private function isOptionalStringsValid()
    {
        return (!$this->policyId || is_string($this->policyId))
            && (!$this->businessUnitCode || is_string($this->businessUnitCode))
            && (!$this->extensionId || is_string($this->extensionId));
    }
}
