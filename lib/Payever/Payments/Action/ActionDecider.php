<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Action
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Action;

use Payever\Sdk\Payments\Base\PaymentsApiClientInterface;
use Payever\Sdk\Payments\Http\ResponseEntity\GetTransactionResponse;
use Payever\Sdk\Payments\Http\ResponseEntity\Result\GetTransactionResult;

/**
 * This class represents payment actions used in payever API
 * The ActionDecider class manages and checks the allowed actions
 *
 * @SuppressWarnings(PHPMD.MissingImport)
 */
class ActionDecider implements ActionDeciderInterface
{
    /** @var PaymentsApiClientInterface */
    protected $api;

    /**
     * ActionDecider constructor.
     *
     * @param PaymentsApiClientInterface $api
     */
    public function __construct(PaymentsApiClientInterface $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritDoc}
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isActionAllowed($paymentId, $transactionAction, $throwException = true)
    {
        $this->assertArguments($transactionAction, $paymentId);
        if (in_array($this->getPolyfillAction($transactionAction), $this->getEnabledActions($paymentId), true)) {
            return true;
        }

        return $this->assertFound($throwException, $transactionAction, $paymentId);
    }

    /**
     * Check if the cancel action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isCancelAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_CANCEL, $throwException);
    }

    /**
     * Check if the invoice action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isInvoiceAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_INVOICE, $throwException);
    }

    /**
     * Check if the refund action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isRefundAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_REFUND, $throwException);
    }

    /**
     * Check if the shipping goods action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isShippingAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_SHIPPING_GOODS, $throwException);
    }

    /**
     * {@inheritDoc}
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function isPartialActionAllowed(
        $paymentId,
        $transactionAction,
        $throwException = true
    ) {
        $response = $this->api->getTransactionRequest($paymentId);

        /** @var GetTransactionResponse $getTransactionEntity */
        $getTransactionEntity = $response->getResponseEntity();

        /** @var GetTransactionResult $getTransactionResult */
        $getTransactionResult = $getTransactionEntity->getResult();
        $actions = $getTransactionResult->getActions();

        foreach ($actions as $action) {
            if (!is_object($action) || !isset($action->action, $action->enabled) || !(bool) $action->enabled) {
                continue;
            }

            if (
                $transactionAction === $this->getPolyfillAction($action->action) &&
                property_exists($action, 'partialAllowed') &&
                $action->partialAllowed
            ) {
                return true;
            }
        }

        if ($throwException) {
            throw new ActionNotAllowedException(sprintf(
                'Partial action "%s" is not allowed for payment id "%s"',
                $transactionAction,
                $paymentId
            ));
        }

        return false;
    }

    /**
     * Check if the partial cancel action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isPartialCancelAllowed($paymentId, $throwException = true)
    {
        return $this->isPartialActionAllowed(
            $paymentId,
            static::ACTION_CANCEL,
            $throwException
        );
    }

    /**
     * Check if the partial invoice action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isPartialInvoiceAllowed($paymentId, $throwException = true)
    {
        return $this->isPartialActionAllowed(
            $paymentId,
            static::ACTION_INVOICE,
            $throwException
        );
    }

    /**
     * Check if the partial refund action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isPartialRefundAllowed($paymentId, $throwException = true)
    {
        return $this->isPartialActionAllowed(
            $paymentId,
            static::ACTION_REFUND,
            $throwException
        );
    }

    /**
     * Check if the partial shipping goods action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isPartialShippingAllowed($paymentId, $throwException = true)
    {
        return $this->isPartialActionAllowed(
            $paymentId,
            static::ACTION_SHIPPING_GOODS,
            $throwException
        );
    }

    /**
     * Check if the claim upload action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isClaimUploadAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_CLAIM_UPLOAD, $throwException);
    }

    /**
     * Check if the claim action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isClaimAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_CLAIM, $throwException);
    }

    /**
     * Check if the settle action for the transaction is allowed
     *
     * @param string $paymentId
     * @param bool   $throwException
     *
     * @return bool
     *
     * @throws \Exception when $throwException is true and target action is not allowed
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function isSettleAllowed($paymentId, $throwException = true)
    {
        return $this->isActionAllowed($paymentId, static::ACTION_SETTLE, $throwException);
    }

    /**
     * @param string $paymentId
     *
     * @return string[]
     */
    protected function getEnabledActions($paymentId)
    {
        $response = $this->api->getTransactionRequest($paymentId);
        /** @var GetTransactionResponse $getTransactionEntity */
        $getTransactionEntity = $response->getResponseEntity();
        /** @var GetTransactionResult $getTransactionResult */
        $getTransactionResult = $getTransactionEntity->getResult();

        $actions = $getTransactionResult->getActions();
        $enabledActions = [];
        foreach ($actions as $action) {
            if (!is_object($action) || !isset($action->action, $action->enabled) || !(bool) $action->enabled) {
                continue;
            }
            $enabledActions[] = $this->getPolyfillAction($action->action);
        }

        return $enabledActions;
    }

    /**
     * @param string $action
     *
     * @return string
     */
    protected function getPolyfillAction($action)
    {
        if ($action === ActionDeciderInterface::ACTION_RETURN) {
            $action = ActionDeciderInterface::ACTION_REFUND;
        }

        return $action;
    }

    /**
     * @param string|null $transactionAction
     * @param string|null $paymentId
     *
     * @throws \Exception
     */
    protected function assertArguments($transactionAction, $paymentId)
    {
        if (empty($transactionAction) || empty($paymentId)) {
            throw new \Exception('Wrong arguments.');
        }
    }

    /**
     * @param bool   $throwException
     * @param string $transactionAction
     * @param string $paymentId
     *
     * @return bool
     *
     * @throws ActionNotAllowedException
     */
    protected function assertFound($throwException, $transactionAction, $paymentId)
    {
        if ($throwException) {
            $message = sprintf(
                'Action "%s" is not allowed for payment id "%s"',
                $transactionAction,
                $paymentId
            );

            throw new ActionNotAllowedException($message);
        }

        return false;
    }
}
