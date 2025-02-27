<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  Enum
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Enum;

use Payever\Sdk\Core\Base\EnumerableConstants;

/**
 * List of available for external integration payever payment methods
 */
class PaymentMethod extends EnumerableConstants
{
    const METHOD_APPLE_PAY                     = 'apple_pay';
    const METHOD_CASH                          = 'cash';
    const METHOD_ECOCHEQUE                     = 'ecocheque';
    const METHOD_GOOGLE_PAY                    = 'google_pay';
    const METHOD_HSBC                          = 'hsbc';
    const METHOD_IDEAL                         = 'ideal';
    const METHOD_INSTANT_PAYMENT               = 'instant_payment';
    const METHOD_IVY                           = 'ivy';
    const METHOD_MOBILE_PAY                    = 'mobile_pay';
    const METHOD_OPENBANK                      = 'zinia_bnpl';
    const METHOD_PAYEX_CREDIT_CARD             = 'payex_creditcard';
    const METHOD_PAYEX_FAKTURA                 = 'payex_faktura';
    const METHOD_PAYMILL_CREDIT_CARD           = 'paymill_creditcard';
    const METHOD_PAYMILL_DIRECT_DEBIT          = 'paymill_directdebit';
    const METHOD_PAYPAL                        = 'paypal';
    const METHOD_PAY_BY_BANK                   = 'pay_by_bank';
    const METHOD_SANTANDER_DE_CCP_INSTALLMENT  = 'santander_ccp_installment';
    const METHOD_SANTANDER_DE_FACTORING        = 'santander_factoring_de';
    const METHOD_SANTANDER_DE_INSTALLMENT      = 'santander_installment';
    const METHOD_SANTANDER_DE_INVOICE          = 'santander_invoice_de';
    const METHOD_SANTANDER_DK_INSTALLMENT      = 'santander_installment_dk';
    const METHOD_SANTANDER_FI_INSTALLMENT      = 'santander_installment_fi';
    const METHOD_SANTANDER_INSTALLMENT_AT      = 'santander_installment_at';
    const METHOD_SANTANDER_INSTALLMENT_BE      = 'santander_installment_be';
    const METHOD_SANTANDER_INSTALLMENT_UK      = 'santander_installment_uk';
    const METHOD_SANTANDER_INSTANT_AT          = 'santander_instant_at';
    const METHOD_SANTANDER_NL_INSTALLMENT      = 'santander_installment_nl';
    const METHOD_SANTANDER_NO_INSTALLMENT      = 'santander_installment_no';
    const METHOD_SANTANDER_NO_INVOICE          = 'santander_invoice_no';
    const METHOD_SANTANDER_SE_INSTALLMENT      = 'santander_installment_se';
    const METHOD_SOFORT                        = 'sofort';
    const METHOD_STRIPE_CREDIT_CARD            = 'stripe';
    const METHOD_STRIPE_DIRECT_DEBIT           = 'stripe_directdebit';
    const METHOD_SWEDBANK_CREDIT_CARD          = 'swedbank_creditcard';
    const METHOD_SWEDBANK_INVOICE              = 'swedbank_invoice';
    const METHOD_SWISH                         = 'swish';
    const METHOD_TRUSTLY                       = 'trustly';
    const METHOD_VERIFONE_CREDIT_CARD          = 'verifone_creditcard';
    const METHOD_ZINIA_BNPL                    = 'zinia_bnpl';
    const METHOD_ZINIA_BNPL_DE                 = 'zinia_bnpl_de';
    const METHOD_ZINIA_INSTALLMENT             = 'zinia_installment';
    const METHOD_ZINIA_INSTALLMENT_DE          = 'zinia_installment_de';
    const METHOD_ZINIA_LENDING_DE              = 'zinia_lending_de';
    const METHOD_ZINIA_SLICE_THREE             = 'zinia_slice_three';
    const METHOD_ZINIA_SLICE_THREE_DE          = 'zinia_slice_three_de';

    const METHOD_ALLIANZ_TRADE_B2B_BNPL = 'allianz_trade_b2b_bnpl';
    const METHOD_BFS_B2B_BNPL           = 'bfs_b2b_bnpl';
    const METHOD_PSA_B2B_BNPL           = 'psa_b2b_bnpl';

    const MOBILE_REGEXP = '/Mobile|iP(hone|od|ad)|Android|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/i'; //phpcs:ignore
    const IOS_REGEXP =  '/(((iPhone([\d\W]+)|iPhone|iPad)(;|\s\d+;|\s\w+;|\s\d+\w+;)?(\s+)?(U;)?)(\s+)?(CPU|iOS)([^\);]+)?)/i'; //phpcs:ignore
    const SAFARI_REGEXP = '/safari/i';
    const ANDROID_REGEXP = '/android/i';
    const CHROME_REGEXP = '/chrome/i';

    /**
     * Whether payment method must be hidden when shipping address differs from billing one
     *
     * @param string $method
     *
     * @return bool
     */
    public static function shouldHideOnDifferentAddress($method)
    {
        return in_array($method, static::getShouldHideOnDifferentAddressMethods());
    }

    /**
     * Whether payment method must be hidden after first unsuccessful payment attempt
     *
     * @param string $method
     *
     * @return bool
     */
    public static function shouldHideOnReject($method)
    {
        return in_array($method, static::getShouldHideOnRejectMethods());
    }

    /**
     * Checks if payment method should be hidden for current device
     *
     * @param string      $method
     * @param null|string $userAgent
     *
     * @return bool
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public static function shouldHideOnCurrentDevice($method, $userAgent = null)
    {
        if (!in_array($method, static::getShouldHideOnCurrentDeviceMethods())) {
            return false;
        }

        if (!$userAgent) {
            $userAgent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '';
        }

        if ($method === static::METHOD_APPLE_PAY) {
            return static::isApplePayHidden($userAgent);
        }

        if ($method === static::METHOD_GOOGLE_PAY) {
            return static::isGooglePayHidden($userAgent);
        }

        return false;
    }

    /**
     * Apple Pay should be hidden for desktop and visible only for ios mobile (safari)
     *
     * @param string $userAgent
     *
     * @return bool
     */
    public static function isApplePayHidden($userAgent)
    {
        // desktop
        if (!static::isMobile($userAgent)) {
            return true;
        }

        // mobile
        if (!static::isIOS($userAgent) || !static::isSafariBrowser($userAgent)) {
            return true;
        }

        return false;
    }

    /**
     * Google Pay should be visible only for android mobile (chrome) and desktop chrome.
     *
     * @param string $userAgent
     *
     * @return bool
     */
    public static function isGooglePayHidden($userAgent)
    {
        // desktop
        if (!static::isMobile($userAgent)) {
            return true;
        }

        // mobile
        if (!static::isAndroidOS($userAgent) || !static::isChromeBrowser($userAgent)) {
            return true;
        }

        return false;
    }

    /**
     * Returns the payment methods what should be hidden if billing and shipping addresses are different
     *
     * @return array
     */
    public static function getShouldHideOnDifferentAddressMethods()
    {
        return [
            static::METHOD_SANTANDER_DE_CCP_INSTALLMENT,
            static::METHOD_SANTANDER_DE_INSTALLMENT,
            static::METHOD_SANTANDER_DE_FACTORING,
            static::METHOD_SANTANDER_DE_INVOICE,
            static::METHOD_PAYEX_FAKTURA,
            static::METHOD_ZINIA_BNPL,
            static::METHOD_ZINIA_BNPL_DE,
            static::METHOD_ZINIA_SLICE_THREE
        ];
    }

    /**
     * Returns payment methods what should be hidden after rejected payment
     *
     * @return array
     */
    public static function getShouldHideOnRejectMethods()
    {
        return [
            static::METHOD_SANTANDER_DE_FACTORING,
            static::METHOD_SANTANDER_DE_INVOICE,
            static::METHOD_ALLIANZ_TRADE_B2B_BNPL,
        ];
    }

    /**
     * Returns B2B payment methods
     *
     * @return array
     */
    public static function getB2bMethods()
    {
        return [
            static::METHOD_ALLIANZ_TRADE_B2B_BNPL,
            static::METHOD_PSA_B2B_BNPL,
            static::METHOD_BFS_B2B_BNPL,
        ];
    }

    /**
     * Returns (mixed) payment methods which can be used for B2B and B2C customers
     *
     * @return array
     */
    public static function getMixedMethods()
    {
        return [
            static::METHOD_APPLE_PAY,
            static::METHOD_GOOGLE_PAY,
            static::METHOD_PAYPAL,
            static::METHOD_STRIPE_CREDIT_CARD,
            static::METHOD_STRIPE_DIRECT_DEBIT,
        ];
    }

    /**
     * Returns payment methods which should be checked whether it is necessary to hide them for current device
     *
     * @return array
     */
    private static function getShouldHideOnCurrentDeviceMethods()
    {
        return [
            static::METHOD_APPLE_PAY,
            static::METHOD_GOOGLE_PAY,
        ];
    }

    /**
     * Checks if mobile device is used by user agent
     *
     * @param string $userAgent
     *
     * @return bool
     */
    private static function isMobile($userAgent)
    {
        return preg_match(static::MOBILE_REGEXP, $userAgent);
    }

    /**
     * Checks if iOS is used by user agent
     *
     * @param string $userAgent
     *
     * @return bool
     */
    private static function isIOS($userAgent)
    {
        return preg_match(static::IOS_REGEXP, $userAgent);
    }

    /**
     * Checks if Android OS is used by user agent
     *
     * @param string $userAgent
     *
     * @return bool
     */
    private static function isAndroidOS($userAgent)
    {
        return preg_match(static::ANDROID_REGEXP, $userAgent);
    }

    /**
     * Checks if Safari Browser is used by user agent
     *
     * @param string $userAgent
     *
     * @return bool
     */
    private static function isSafariBrowser($userAgent)
    {
        return preg_match(static::SAFARI_REGEXP, $userAgent);
    }

    /**
     * Checks if Chrome Browser is used by user agent
     *
     * @param string $userAgent
     *
     * @return bool
     */
    private static function isChromeBrowser($userAgent)
    {
        return preg_match(static::CHROME_REGEXP, $userAgent);
    }
}
