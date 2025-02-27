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

use Payever\Sdk\Engine;
use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;

/**
 * This class represents Request Builder
 * RequestBuilder helps create HTTP requests by configuring the URL, method, headers, and parameters
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class RequestBuilder
{
    const IDEMPOTENCY_HEADER = 'idempotency-key';
    const FORCE_RETRY_HEADER = 'x-payever-force-retry';

    /** @var null|string $url */
    protected $url;

    /** @var string $method */
    protected $method = Request::METHOD_GET;

    /** @var array $headers */
    protected $headers = [];

    /** @var array $params */
    protected $params = [];

    /** @var string $protocolVersion */
    protected $protocolVersion = CURL_HTTP_VERSION_1_1;

    /** @var RequestEntity $requestEntity */
    protected $requestEntity;

    /** @var ResponseEntity $responseEntity */
    protected $responseEntity;

    /**
     * @param string $url
     * @param string $method
     */
    public function __construct($url = null, $method = Request::METHOD_GET)
    {
        $this->method = $method;
        $this->url = $url;
        $this->requestEntity = new RequestEntity();
        $this->responseEntity = new ResponseEntity();
        $this->headers = $this->getDefaultHeaders();
    }

    /**
     * Instantiates RequestBuilder with GET method set
     *
     * @param string|null $url
     *
     * @return self
     */
    public static function get($url = null)
    {
        return new static($url, Request::METHOD_GET);
    }

    /**
     * Instantiates RequestBuilder with POST method set
     *
     * @param string|null $url
     *
     * @return self
     */
    public static function post($url = null)
    {
        return new static($url, Request::METHOD_POST);
    }

    /**
     * Instantiates RequestBuilder with PUT method set
     *
     * @param string|null $url
     *
     * @return self
     */
    public static function put($url = null)
    {
        return new static($url, Request::METHOD_PUT);
    }

    /**
     * Instantiates RequestBuilder with PATCH method set
     *
     * @param string|null $url
     *
     * @return self
     */
    public static function patch($url = null)
    {
        return new static($url, Request::METHOD_PATCH);
    }

    /**
     * Instantiates RequestBuilder with DELETE method set
     *
     * @param string|null $url
     *
     * @return self
     */
    public static function delete($url = null)
    {
        return new static($url, Request::METHOD_DELETE);
    }

    /**
     * Builds Request object
     *
     * @return Request
     */
    public function build()
    {
        $request = new Request();

        $request
            ->setUrl($this->getUrl())
            ->setMethod($this->getMethod())
            ->setHeaders($this->getHeaders())
            ->setParams($this->getParams())
            ->setProtocolVersion($this->getProtocolVersion())
            ->setRequestEntity($this->getRequestEntity())
            ->setResponseEntity($this->getResponseEntity())
            ;

        $request->getRequestEntity()->load($request->getParams());

        return $request;
    }

    /**
     * Adds Header to Headers array
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return $this
     */
    public function addHeader($name, $value = null)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * Adds Header from a string
     *
     * @param string $string
     *
     * @return $this
     */
    public function addRawHeader($string)
    {
        $pieces = explode(':', $string, 2);

        $this->addHeader($pieces[0], $pieces[1]);

        return $this;
    }

    /**
     * Replaces Headers with given array
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Returns Header value from Headers array with given name
     *
     * @param string $name
     *
     * @return bool|string
     */
    public function getHeader($name)
    {
        if ($this->containsHeader($name)) {
            return $this->headers[$name];
        }

        return false;
    }

    /**
     * Returns Headers array
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Cleans Headers array
     *
     * @return $this
     */
    public function cleanHeaders()
    {
        $this->headers = [];

        return $this;
    }

    /**
     * Returns if the Header with given name is set
     *
     * @param string $name
     *
     * @return bool
     */
    public function containsHeader($name)
    {
        return isset($this->headers[$name]);
    }

    /**
     * Removes Header with given name from Headers array
     *
     * @param string $name
     *
     * @return $this
     */
    public function removeHeader($name)
    {
        unset($this->headers[$name]);

        return $this;
    }

    /**
     * Adds Param to Params array
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return $this
     */
    public function addParam($name, $value = null)
    {
        $this->params[$name] = $value;

        return $this;
    }

    /**
     * Replaces Params with given array
     *
     * @param array $params
     *
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Returns Param value from Params array with given name
     *
     * @param string $name
     *
     * @return bool|string
     */
    public function getParam($name)
    {
        if ($this->containsParam($name)) {
            return $this->params[$name];
        }

        return false;
    }

    /**
     * Returns Params array
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Cleans Params array
     *
     * @return $this
     */
    public function cleanParams()
    {
        $this->params = [];

        return $this;
    }

    /**
     * Returns if the Param with given name is set
     *
     * @param string $name
     *
     * @return bool
     */
    public function containsParam($name)
    {
        return isset($this->params[$name]);
    }

    /**
     * Removes Param with given name from Params array
     *
     * @param string $name
     *
     * @return $this
     */
    public function removeParam($name)
    {
        unset($this->params[$name]);

        return $this;
    }

    /**
     * Sets URL
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Returns URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets Http Method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method = Request::METHOD_GET)
    {
        if (in_array($method, self::getMethods())) {
            $this->method = $method;
        }

        return $this;
    }

    /**
     * Send payload as application/x-www-form-urlencoded
     *
     * @return $this
     */
    public function setFormUrlencoded()
    {
        $this->addHeader('Content-Type', 'application/x-www-form-urlencoded');

        return $this;
    }

    /**
     * Send payload as JSON string
     */
    public function contentTypeIsJson()
    {
        $this->addHeader('Content-Type', 'application/json');

        return $this;
    }

    /**
     * Returns Http method used
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Returns available Http Methods
     *
     * @return array
     */
    public static function getMethods()
    {
        return Request::getMethods();
    }

    /**
     * Sets Request Entity
     *
     * @param RequestEntity $requestEntity
     *
     * @return $this
     */
    public function setRequestEntity($requestEntity)
    {
        $this->requestEntity = $requestEntity;

        return $this;
    }

    /**
     * Sets ResponseInterface Entity
     *
     * @param ResponseEntity $responseEntity
     *
     * @return $this
     */
    public function setResponseEntity($responseEntity)
    {
        $this->responseEntity = $responseEntity;

        return $this;
    }

    /**
     * Returns Request Entity used
     *
     * @return RequestEntity
     */
    public function getRequestEntity()
    {
        return $this->requestEntity;
    }

    /**
     * Returns ResponseInterface Entity used
     *
     * @return ResponseEntity
     */
    public function getResponseEntity()
    {
        return $this->responseEntity;
    }

    /**
     * Get Protocol version
     *
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    /**
     * Set Protocol Version
     *
     * @param string $protocolVersion
     *
     * @return $this
     */
    public function setProtocolVersion($protocolVersion)
    {
        $this->protocolVersion = $protocolVersion;

        return $this;
    }

    /**
     * @return array
     */
    public function getDefaultHeaders()
    {
        return [
            'User-agent' => sprintf('payever PHP SDK v%s / cURL client', Engine::SDK_VERSION),
        ];
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function addIdempotencyHeader($value)
    {
        if (!empty($value)) {
            $this->addHeader(self::IDEMPOTENCY_HEADER, $value);
        }

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function addForceRetryHeader($value)
    {
        if (!empty($value)) {
            $this->addHeader(self::FORCE_RETRY_HEADER, $value);
        }

        return $this;
    }
}
