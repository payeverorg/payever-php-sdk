<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  ResponseEntity
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Http\ResponseEntity;

use Payever\Sdk\Core\Http\MessageEntity\ResponseEntity;
use Payever\Sdk\Core\Http\ResponseEntity\Result\ListChannelSetsResult;

/**
 * This class represents List Channel Sets ResponseInterface Entity
 */
class ListChannelSetsResponse extends ResponseEntity
{
    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
            'call',
            'result',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function setResult($result)
    {
        $this->result = [];
        foreach ($result as $item) {
            $this->result[] = new ListChannelSetsResult($item);
        }
    }
}
