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

/**
 * This class represents helper functions for strings
 * StringHelper provides methods for string formatting
 *
 * @SuppressWarnings(PHPMD.MissingImport)
 */
class StringHelper
{
    /** @var string */
    protected static $fallbackKeyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Converts field names for setters and getters
     *
     * @param string $name
     *
     * @return string
     */
    public static function underscore($name)
    {
        return strtolower(preg_replace('/(.)([A-Z0-9])/', "$1_$2", $name));
    }

    /**
     * Will capitalize word's first letters and convert separators if needed
     *
     * @param string $name
     * @param bool   $firstLetter
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public static function camelize($name, $firstLetter = false)
    {
        $string = str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));

        if (!$firstLetter) {
            $string = lcfirst($string);
        }

        return $string;
    }

    /**
     * Returns decoded JSON
     *
     * @see json_decode()
     *
     * @param array|object|\stdClass|string $object
     * @param bool|null                     $associative
     * @param int                           $depth [optional]
     * @param int                           $flags [optional]
     *
     * @return bool|mixed
     *
     * @throws \UnexpectedValueException
     */
    public static function jsonDecode($object, $associative = null, $depth = 512, $flags = 0)
    {
        if (!is_string($object)) {
            return $object;
        }

        $result = json_decode($object, $associative, $depth, $flags);
        $lastError = json_last_error();
        if ($lastError !== JSON_ERROR_NONE) {
            $errorMessage = function_exists('json_last_error_msg') ? json_last_error_msg() : $lastError;

            throw new \UnexpectedValueException(
                'JSON Decode Error: ' . $errorMessage,
                $lastError
            );
        }

        return $result;
    }

    /**
     * Generates a random string, using a cryptographically secure pseudo-random number generator.
     * Falling back to non-CSPRNG generation when no source of random available.
     *
     * @param int $length
     *
     * @return string
     *
     * @throws \Exception when CSPRNG source failed to provide random bytes
     *
     * @SuppressWarnings(PHPMD.IfStatementAssignment)
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
    public static function generateRandom($length = 64)
    {
        if (function_exists('random_bytes')) {
            $binaryString = random_bytes($length);
        } elseif (function_exists('mcrypt_create_iv')) {
            $binaryString = /** @scrutinizer ignore-deprecated */ mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $binaryString = openssl_random_pseudo_bytes($length);
        } elseif (($stream = fopen('/dev/urandom', 'rb'))) {
            stream_set_read_buffer($stream, 0);
            $binaryString = fread($stream, $length);
            fclose($stream);
        } else {
            // well, we've tried
            $chain = '';
            $max = mb_strlen(static::$fallbackKeyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $chain .= static::$fallbackKeyspace[rand(0, $max)];
            }
            $binaryString = hex2bin($chain);
        }

        if ($binaryString === false) {
            throw new \RuntimeException('Unable to generate random string.');
        }

        return substr(bin2hex($binaryString), 0, $length);
    }
}
