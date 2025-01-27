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
 * This class represents Attributes Entity of Cart Item
 *
 * @method float                  getWeight()
 * @method DimensionsEntity|array getDimensions()
 * @method $this                  setWeight(float $value)
 */
class AttributesEntity extends MessageEntity
{
    /** @var string $weight */
    protected $weight;

    /** @var DimensionsEntity $dimensions */
    protected $dimensions;

    /**
     * Sets Dimensions.
     *
     * @param DimensionsEntity|array $dimensions
     *
     * @return $this
     */
    public function setDimensions($dimensions)
    {
        if (!$dimensions) {
            return $this;
        }

        if (is_string($dimensions)) {
            $dimensions = json_decode($dimensions);
        }

        if (!is_array($dimensions) && !is_object($dimensions)) {
            return $this;
        }

        $this->dimensions = new DimensionsEntity($dimensions);

        return $this;
    }
}
