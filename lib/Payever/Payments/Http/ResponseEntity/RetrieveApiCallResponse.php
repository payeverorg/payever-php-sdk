<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  ResponseEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\ResponseEntity;

use Payever\Sdk\Core\Http\MessageEntity\DynamicEntity;
use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;

/**
 * This class represents Retrieve Api Call Entity
 *
 * @method DynamicEntity getCall()
 */
class RetrieveApiCallResponse extends ResponseEntity
{
    /**
     * {@inheritdoc}
     */
    public function load($data)
    {
        if (!is_array($data) || !isset($data['call'])) {
            $data = ['call' => $data];
        }

        return parent::load($data);
    }

    /**
     * {@inheritdoc}
     */
    public function setCall($call)
    {
        $this->call = new DynamicEntity($call);
    }
}
