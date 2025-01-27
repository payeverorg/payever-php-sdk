<?php

use Payever\Sdk\Core\Base\MessageEntity;

class ResultPrinter
{
    public static function printText($text)
    {
        echo $text . self::getBreaker();
    }

    public static function printError($text)
    {
        echo "\033[31m" . $text . self::getBreaker() . "\033[0m";
    }

    public static function printResultEntity($result)
    {
        if (is_array($result)) {
            foreach ($result as $item) {
                self::printResultEntity($item);
                echo self::getBreaker();
            }
        }

        if ($result instanceof MessageEntity) {
            echo self::isCli() ? '' : '<pre>';
            echo json_encode($result->toArray(), JSON_PRETTY_PRINT) . self::getBreaker();
        }
    }

    private static function getBreaker()
    {
        return self::isCli() ? PHP_EOL : '<br />';
    }

    private static function isCli()
    {
        return php_sapi_name() === 'cli';
    }
}
