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
use Payever\Sdk\Core\Http\ResponseEntity\Result\GetCurrenciesResult;

/**
 * This class represents Get Currencies ResponseInterface Entity
 */
class GetCurrenciesResponse extends ResponseEntity
{
    /**
     * {@inheritdoc}
     */
    public function load($data)
    {
        if (!is_array($data) || !isset($data['result'])) {
            $data = ['result' => $data];
        }

        return parent::load($data);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return [
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
            $entity = new GetCurrenciesResult($item);
            $this->result[$entity->getCode()] = $entity;
        }
    }
}
