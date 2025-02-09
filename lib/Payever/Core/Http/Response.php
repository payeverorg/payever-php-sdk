<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Http
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http;

use Payever\Sdk\Core\Base\ResponseInterface;
use Payever\Sdk\Core\Helper\StringHelper;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;

/**
 * This class represents ResponseInterface
 * The Response class handles HTTP responses, loading data, and interacting with RequestEntity and ResponseEntity
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class Response implements ResponseInterface
{
    /** @var RequestEntity $requestEntity */
    protected $requestEntity;

    /** @var ResponseEntity $responseEntity */
    protected $responseEntity;

    /** @var array|string|object $data */
    protected $data;

    /**
     * ResponseInterface constructor
     */
    public function __construct()
    {
        $this->responseEntity = new ResponseEntity();
    }

    /**
     * {@inheritdoc}
     */
    public function load($data)
    {
        $this->data = $data;

        $this
            ->getResponseEntity()
            ->load($data ? StringHelper::jsonDecode($this->data) : [])
        ;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestEntity(RequestEntity $requestEntity)
    {
        $this->requestEntity = $requestEntity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setResponseEntity(ResponseEntity $responseEntity)
    {
        $this->responseEntity = $responseEntity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestEntity()
    {
        return $this->requestEntity;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseEntity()
    {
        return $this->responseEntity;
    }

    /**
     * Returns if ResponseInterface is successful
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getResponseEntity()->isSuccessful();
    }

    /**
     * Returns if ResponseInterface is failed
     *
     * @return bool
     */
    public function isFailed()
    {
        return $this->getResponseEntity()->isFailed();
    }

    /**
     * Returns data from ResponseInterface
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
}
