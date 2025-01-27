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

namespace Payever\Sdk\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Payment Data Entity
 *
 * @method \DateTime|false  getBirthdate()
 * @method bool             getConditionsAccepted()
 * @method string           getRiskSessionId()
 * @method string           getFrontendFinishUrl()
 * @method string           getFrontendCancelUrl()
 * @method bool             getForceRedirect()
 * @method string           getFloor()
 * @method string           getDoor()
 * @method string           getBlock()
 * @method $this            setConditionsAccepted(bool $conditionsAccepted)
 * @method $this            setRiskSessionId(string $riskSessionId)
 * @method $this            setFrontendFinishUrl(string $frontendFinishUrl)
 * @method $this            setFrontendCancelUrl(string $frontendCancelUrl)
 * @method $this            setFloor(string $floor)
 * @method $this            setDoor(string $door)
 * @method $this            setBlock(string $block)
 */
class PaymentDataEntity extends MessageEntity
{
    /** @var \DateTime|bool $birthdate */
    protected $birthdate;

    /** @var bool $conditionsAccepted */
    protected $conditionsAccepted;

    /** @var string $riskSessionId */
    protected $riskSessionId;

    /** @var string $frontendFinishUrl */
    protected $frontendFinishUrl;

    /** @var string frontendCancelUrl */
    protected $frontendCancelUrl;

    /** @var boolean $forceRedirect */
    protected $forceRedirect;

    /** @var string $organizationName */
    protected $organizationName;

    /** @var string $streetType */
    protected $streetType;

    /** @var string $floor */
    protected $floor;

    /** @var string $door */
    protected $door;

    /** @var string $block */
    protected $block;

    /**
     * Sets Birthdate
     *
     * @param string $birthdate
     *
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        if ($birthdate) {
            $this->birthdate = date_create($birthdate);
        }

        return $this;
    }

    /**
     * Sets force redirect value
     *
     * @param string $forceRedirect
     *
     * @return $this
     */
    public function setForceRedirect($forceRedirect)
    {
        $this->forceRedirect = $forceRedirect;

        return $this;
    }

    /**
     * Gets Organization name value
     *
     * @return string
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * Sets Organization name value
     *
     * @param string $organizationName
     *
     * @return $this
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;

        return $this;
    }

    /**
     * Gets Street Type value
     *
     * @return string
     */
    public function getStreetType()
    {
        return $this->streetType;
    }

    /**
     * Sets Street Type value
     *
     * @param string $streetType
     *
     * @return $this
     */
    public function setStreetType($streetType)
    {
        $this->streetType = $streetType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }
}
