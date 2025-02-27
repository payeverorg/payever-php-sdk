<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  API
 * @package   Payever\Core
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Core\Enum;

use Payever\Sdk\Core\Base\EnumerableConstants;

/**
 * This class represents payever API Channel Sets
 */
class ChannelSet extends EnumerableConstants
{
    const CHANNEL_ADVERTISING      = 'advertising';
    const CHANNEL_API              = 'api';
    const CHANNEL_CHECKOUT         = 'checkout';
    const CHANNEL_DANDOMAIN        = 'dandomain';
    const CHANNEL_ECONOMIC         = 'e-conomic';
    const CHANNEL_FACEBOOK         = 'facebook';
    const CHANNEL_FINANCE_EXPRESS  = 'finance_express';
    const CHANNEL_JTL              = 'jtl';
    const CHANNEL_MAGENTO          = 'magento';
    const CHANNEL_MARKETING        = 'marketing';
    const CHANNEL_OFFER            = 'offer';
    const CHANNEL_OPENCART         = 'opencart';
    const CHANNEL_OROCOMMERCE      = 'oro_commerce';
    const CHANNEL_OTHER_SHOPSYSTEM = 'other_shopsystem';
    const CHANNEL_OVERLAY          = 'overlay';
    const CHANNEL_OVERLAY_BANNER   = 'overlay_banner';
    const CHANNEL_OXID             = 'oxid';
    const CHANNEL_PLENTYMARKETS    = 'plentymarkets';
    const CHANNEL_PRESTA           = 'presta';
    const CHANNEL_SHOPIFY          = 'shopify';
    const CHANNEL_SHOPWARE         = 'shopware';
    const CHANNEL_STORE            = 'store';
    const CHANNEL_WEEBLY           = 'weebly';
    const CHANNEL_WOOCOMMERCE      = 'woo_commerce';
    const CHANNEL_XT_COMMERCE      = 'xt_commerce';
}
