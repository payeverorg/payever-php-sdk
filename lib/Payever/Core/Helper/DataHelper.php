<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Helper
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Helper;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents helper functions for data
 * The DataHelper class provides a function to create an entity instance from a given data
 *
 * @SuppressWarnings(PHPMD.MissingImport)
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
class DataHelper
{
    /**
     * Make Entity Instance if possible.
     *
     * @param mixed  $data
     * @param string $className
     *
     * @return RequestEntity|object|null
     */
    public static function getEntityInstance($data, $className)
    {
        // Decode string as JSON
        if (is_string($data)) {
            try {
                $data = StringHelper::jsonDecode($data, true);
            } catch (\UnexpectedValueException $exception) {
                return null;
            }
        }

        if (!$data) {
            return null;
        }

        if (is_object($data) && is_a($data, $className)) {
            /** @var RequestEntity $data */
            return $data;
        }

        if (!is_object($data) && !is_array($data)) {
            return null;
        }

        /** @var RequestEntity $data */
        $data = new $className($data);

        return $data;
    }
}
