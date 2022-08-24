<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/constants.
 *
 * @link     https://github.com/huangdijia/php-constants
 * @document https://github.com/huangdijia/php-constants/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\Constants;

use Huangdijia\Constants\Exceptions\ConstantsException;
use ReflectionClass;

abstract class AbstractConstants
{
    private static $annotations;

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }

    final public static function __callStatic($name, $arguments)
    {
        $class = get_called_class();

        if (strtolower(substr($name, 0, 3)) != 'get') {
            throw new ConstantsException(sprintf('Call to undefined method %s::%s()', $class, $name));
        }

        if (! isset($arguments) || count($arguments) === 0) {
            throw new ConstantsException('The code is required');
        }

        $code = $arguments[0];
        $name = strtolower(substr($name, 3));
        $message = static::__getValue($class, $code, $name);

        array_shift($arguments);

        if (count($arguments) > 0) {
            return sprintf($message, ...$arguments);
        }

        return $message;
    }

    /**
     * Get Value.
     * @param int|string $code
     * @param string $name
     * @return string
     */
    final private static function __getValue(string $class, $code, $name)
    {
        if (is_null(self::$annotations)) {
            self::$annotations = self::__getAnnotations($class);
        }

        return self::$annotations[$code][$name] ?? null;
    }

    /**
     * Get Annotations.
     * @return array
     */
    final private static function __getAnnotations(string $class)
    {
        $reflect = new ReflectionClass($class);
        $constants = $reflect->getReflectionConstants();
        $annotations = [];

        foreach ($constants as $constant) {
            $code = $constant->getValue();
            $doc = $constant->getDocComment();

            if ($doc) {
                $annotations[$code] = self::__parseDocComment($doc);
            }
        }

        return $annotations;
    }

    /**
     * Parse docComment.
     * @return null|string[]
     */
    final private static function __parseDocComment(string $doc)
    {
        $pattern = '/\\@(\\w+)\\(\\"(.+)\\"\\)/U';
        $annotations = [];

        if (! preg_match_all($pattern, $doc, $matches)) {
            return null;
        }

        foreach ($matches[1] as $i => $name) {
            $annotations[strtolower($name)] = $matches[2][$i];
        }

        return $annotations;
    }
}
