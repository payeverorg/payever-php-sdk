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

namespace Payever\Sdk\Payments\Http\RequestEntity\Action;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Shipping Details RequestInterface Entity
 *
 * @method string    getShippingCarrier()
 * @method string    getShippingMethod()
 * @method string    getTrackingNumber()
 * @method string    getTrackingUrl()
 * @method string    getShippingDate()
 * @method string    getReturnCarrier()
 * @method string    getReturnTrackingNumber()
 * @method string    getReturnTrackingUrl()
 * @method $this     setShippingCarrier(string $shippingCarrier)
 * @method $this     setShippingMethod(string $shippingMethod)
 * @method $this     setTrackingNumber(string $trackingNumber)
 * @method $this     setTrackingUrl(string $trackingUrl)
 * @method $this     setShippingDate(string $shippingDate)
 * @method $this     setReturnCarrier(string $returnCarrier)
 * @method $this     setReturnTrackingNumber(string $returnTrackingNumber)
 * @method $this     setReturnTrackingUrl(string $returnTrackingUrl)
 */
class ShippingDetailsEntity extends RequestEntity
{
    const UNDERSCORE_ON_SERIALIZATION = false;

    /** @var string $name */
    protected $shippingCarrier;

    /** @var string $shippingMethod */
    protected $shippingMethod;

    /** @var string $trackingNumber */
    protected $trackingNumber;

    /** @var string $trackingUrl */
    protected $trackingUrl;

    /** @var string $shippingDate */
    protected $shippingDate;

    /** @var string $returnCarrier */
    protected $returnCarrier;

    /** @var string $returnTrackingNumber */
    protected $returnTrackingNumber;

    /** @var string $returnTrackingUrl */
    protected $returnTrackingUrl;
}
