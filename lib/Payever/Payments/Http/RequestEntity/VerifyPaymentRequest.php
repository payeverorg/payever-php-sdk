<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\SellerEntity;
use Payever\Sdk\Payments\Http\MessageEntity\Payment\VerifyEntity;

/**
 * This class represents Verify Payment Request Interface Entity
 *
 * @method integer       getCode()
 * @method bool          getVerified()
 * @method SellerEntity  getSeller()
 * @method VerifyEntity  getVerify()
 * @method array         getCustom()
 * @method $this         setCode(string $code)
 * @method $this         setVerified(bool $verified)
 * @method $this         setCustom(array $custom)
 */
class VerifyPaymentRequest extends RequestEntity
{
    /** @var integer $code */
    protected $code;

    /** @var bool $verified */
    protected $verified;

    /** @var SellerEntity $seller */
    protected $seller;

    /** @var VerifyEntity $verify */
    protected $verify;

    /** @var array $custom */
    protected $custom;

    /**
     * Set Seller.
     *
     * @param SellerEntity|array|string $seller
     *
     * @return $this
     */
    public function setSeller($seller)
    {
        if (!$seller) {
            return $this;
        }

        if (is_string($seller)) {
            $seller = json_decode($seller);
        }

        if (!is_array($seller) && !is_object($seller)) {
            return $this;
        }

        $this->seller = new SellerEntity($seller);

        return $this;
    }

    /**
     * Set Verify.
     *
     * @param VerifyEntity|array|string $verify
     *
     * @return $this
     */
    public function setVerify($verify)
    {
        if (!$verify) {
            return $this;
        }

        if (is_string($verify)) {
            $verify = json_decode($verify);
        }

        if (!is_array($verify) && !is_object($verify)) {
            return $this;
        }

        $this->verify = new VerifyEntity($verify);

        return $this;
    }
}
