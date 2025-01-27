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

/**
 * Interface describes functions of Message Entity
 */
interface MessageEntityInterface
{
    /**
     * IMessageEntity constructor
     *
     * @param array|object $data
     */
    public function __construct($data = null);

    /**
     * Loads data into
     *
     * @param array|object $data
     *
     * @return $this
     */
    public function load($data);

    /**
     * Returns array representation
     *
     * @return array
     */
    public function toArray();

    /**
     * Returns if Entity is valid
     *
     * @return bool
     */
    public function isValid();

    /**
     * Returns Required properties
     *
     * @return array
     */
    public function getRequired();

    /**
     * Returns string representation
     *
     * @return string
     */
    public function toString();
}
