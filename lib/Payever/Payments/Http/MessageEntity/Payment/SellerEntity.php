<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  MessageEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\MessageEntity\Payment;

use Payever\Sdk\Core\Base\MessageEntity;

/**
 * This class represents Seller entity
 *
 * @method string getId()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getEmail()
 * @method $this  setId(string $value)
 * @method $this  setFirstName(string $value)
 * @method $this  setLastName(string $value)
 * @method $this  setEmail(string $value)
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class SellerEntity extends MessageEntity
{
    /** @var string $id */
    protected $id;

    /** @var string $firstName */
    protected $firstName;

    /** @var string $lastName */
    protected $lastName;

    /** @var string $email */
    protected $email;
}
