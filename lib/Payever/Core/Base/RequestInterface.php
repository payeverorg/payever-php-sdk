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
 * Interface describes functions of RequestInterface
 */
interface RequestInterface
{
    /**
     * Adds Header to Headers array
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return $this
     */
    public function addHeader($name, $value = null);

    /**
     * Replaces Headers with given array
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers);

    /**
     * Returns Header value from Headers array with given name
     *
     * @param string $name
     *
     * @return bool|string
     */
    public function getHeader($name);

    /**
     * Returns Headers array
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Cleans Headers array
     *
     * @return $this
     */
    public function cleanHeaders();

    /**
     * Returns if the Header with given name is set
     *
     * @param string $name
     *
     * @return bool
     */
    public function containsHeader($name);

    /**
     * Removes Header with given name from Headers array
     *
     * @param string $name
     *
     * @return $this
     */
    public function removeHeader($name);

    /**
     * Adds Param to Params array
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return $this
     */
    public function addParam($name, $value = null);

    /**
     * Replaces Params with given array
     *
     * @param array $params
     *
     * @return $this
     */
    public function setParams(array $params);

    /**
     * Returns Param value from Params array with given name
     *
     * @param string $name
     *
     * @return bool|string
     */
    public function getParam($name);

    /**
     * Returns Params array
     *
     * @return array
     */
    public function getParams();

    /**
     * Cleans Params array
     *
     * @return $this
     */
    public function cleanParams();

    /**
     * Returns if the Param with given name is set
     *
     * @param string $name
     *
     * @return bool
     */
    public function containsParam($name);

    /**
     * Removes Param with given name from Params array
     *
     * @param string $name
     *
     * @return $this
     */
    public function removeParam($name);

    /**
     * Sets URL
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url);

    /**
     * Returns URL
     *
     * @return string
     */
    public function getUrl();

    /**
     * Sets Http Method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method);

    /**
     * Returns Http method used
     *
     * @return string
     */
    public function getMethod();

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

    /**
     * Get Protocol version
     *
     * @return string
     */
    public function getProtocolVersion();

    /**
     * Set Protocol Version
     *
     * @param string $protocolVersion
     *
     * @return $this
     */
    public function setProtocolVersion($protocolVersion);

    /**
     * Returns available Http Methods
     *
     * @return array
     */
    public static function getMethods();

    /**
     * Validates instance
     *
     * @return bool
     */
    public function validate();

    /**
     * Returns params array
     *
     * @return array
     */
    public function toArray();
}
