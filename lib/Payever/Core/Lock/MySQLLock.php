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
 * This class represents MySQLLock
 *
 * @SuppressWarnings(PHPMD.MissingImport)
 */
class MySQLLock implements LockInterface
{
    /** @var \PDO $pdo */
    private $pdo;

    /** @var string|null $currentDatabase */
    private $currentDatabase;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @inheritdoc
     *
     * @throws \RuntimeException
     */
    public function acquireLock($lockName, $timeout)
    {
        $statement = $this->pdo->prepare("SELECT GET_LOCK(?,?)");

        $statement->execute([
            $this->prepareLockName($lockName),
            $timeout,
        ]);

        $result = $statement->fetch(\PDO::FETCH_NUM);

        if ($result[0] != 1) {
            throw new \RuntimeException(sprintf('Unable to acquire lock with name %s', $lockName));
        }
    }

    /**
     * @inheritdoc
     */
    public function releaseLock($lockName)
    {
        $statement = "SELECT RELEASE_LOCK({$this->prepareLockName($lockName)})";

        $this->pdo->exec($statement);
    }

    /**
     * @param string $lockName
     *
     * @return string
     */
    private function prepareLockName($lockName)
    {
        return $this->pdo->quote("{$this->getCurrentDatabase()}.{$lockName}");
    }

    /**
     * @return string|null
     */
    private function getCurrentDatabase()
    {
        if (null === $this->currentDatabase) {
            $this->currentDatabase = $this->pdo->query('SELECT DATABASE()')->fetchColumn();
        }

        return $this->currentDatabase;
    }
}
