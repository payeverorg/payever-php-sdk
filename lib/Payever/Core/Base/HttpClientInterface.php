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
 * Interface describes functions of HttpClientInterface
 */
interface HttpClientInterface
{
    public function execute(RequestInterface $request);
}
