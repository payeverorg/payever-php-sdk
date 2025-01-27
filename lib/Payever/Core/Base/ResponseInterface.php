<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Base
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Base;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;

/**
 * Interface describes functions of ResponseInterface
 */
interface ResponseInterface
{
    /**
     * Loads response object
     *
     * @param array|string|object $data
     *
     * @return $this
     */
    public function load($data);

    /**
     * Sets RequestInterface Entity
     *
     * @param RequestEntity $requestEntity
     *
     * @return $this
     */
    public function setRequestEntity(RequestEntity $requestEntity);

    /**
     * Sets ResponseInterface Entity
     *
     * @param ResponseEntity $responseEntity
     *
     * @return $this
     */
    public function setResponseEntity(ResponseEntity $responseEntity);

    /**
     * Returns RequestInterface Entity used
     *
     * @return RequestEntity
     */
    public function getRequestEntity();

    /**
     * Returns ResponseInterface Entity used
     *
     * @return ResponseEntity
     */
    public function getResponseEntity();
}
