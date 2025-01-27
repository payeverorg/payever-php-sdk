<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Lock
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Lock;

/**
 * Lock for synchronous execution of critical code in concurrent environment
 */
interface LockInterface
{
    /**
     * Locking operation with $lockName until timeout reached or releaseLock called
     *
     * @param string $lockName
     * @param int    $timeout - maximum seconds to wait
     *
     * @return void
     */
    public function acquireLock($lockName, $timeout);

    /**
     * Releases lock with given $name
     *
     * @param string $lockName
     *
     * @return void
     */
    public function releaseLock($lockName);
}
