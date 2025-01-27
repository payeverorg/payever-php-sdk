<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\MessageEntity;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Response Entity
 *
 * @method CallEntity   getCall()
 * @method string       getError()
 * @method string       getErrorDescription()
 * @method ResultEntity getResult()
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class ResponseEntity extends MessageEntity
{
    /** @var CallEntity $call */
    protected $call;

    /** @var ResultEntity|array $result */
    protected $result;

    /** @var string $error */
    protected $error;

    /** @var string $errorDescription */
    protected $errorDescription;

    /**
     * Sets Call Entity
     *
     * @param array $call
     */
    public function setCall($call)
    {
        $this->call = new CallEntity($call);
    }

    /**
     * Sets Result Entity
     *
     * @param array $result
     */
    public function setResult($result)
    {
        $this->result = new ResultEntity($result);
    }

    /**
     * Sets Error Property
     *
     * @param array|string $error
     */
    public function setError($error)
    {
        if (is_array($error)) {
            $error = json_encode($error);
        }

        $this->error = $error;
    }

    /**
     * Sets ErrorDescription Property
     *
     * @param array|string $errorDescription
     */
    public function setErrorDescription($errorDescription)
    {
        if (is_array($errorDescription)) {
            $errorDescription = json_encode($errorDescription);
        }

        $this->errorDescription = $errorDescription;
    }

    /**
     * Returns if Entity is successful
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return empty($this->error);
    }

    /**
     * Returns if Entity is failed
     *
     * @return bool
     */
    public function isFailed()
    {
        return !$this->isSuccessful();
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid() &&
            (!$this->call || ($this->call instanceof CallEntity && $this->call->isValid())) &&
            (
                !$this->result || ($this->result instanceof ResultEntity && $this->result->isValid())
                || is_array($this->result)
            );
    }
}
