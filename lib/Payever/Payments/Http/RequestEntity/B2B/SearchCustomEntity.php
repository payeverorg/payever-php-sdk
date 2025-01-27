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
 * This class represents Company Custom Entity
 *
 * @method string getType()
 * @method $this  setType(string $type)
 * @method string getValue()
 * @method $this  setValue(string $value)
 */
class SearchCustomEntity extends RequestEntity
{
    /** @var string $type */
    protected $type = 'CREF';

    /** @var string $value */
    protected $value;

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'type',
            'value'
        ];
    }
}
