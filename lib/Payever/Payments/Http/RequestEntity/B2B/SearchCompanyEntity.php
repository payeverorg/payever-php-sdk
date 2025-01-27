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

namespace Payever\Sdk\Payments\Http\RequestEntity\B2B;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Company Entity
 *
 * @method string getName()
 * @method $this  setName(string $name)
 */
class SearchCompanyEntity extends RequestEntity
{
    /** @var string $name */
    protected $name;

    /** @var SearchCustomEntity $custom */
    protected $custom;

    /**
     * Set Custom.
     *
     * @param SearchCustomEntity|array|string $custom
     *
     * @return $this
     */
    public function setCustom($custom)
    {
        if (!$custom) {
            return $this;
        }

        if (is_string($custom)) {
            $custom = json_decode($custom);
        }

        if (!is_array($custom) && !is_object($custom)) {
            return $this;
        }

        $this->custom = new SearchCustomEntity($custom);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'name'
        ];
    }
}
