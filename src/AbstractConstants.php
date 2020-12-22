<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/constants.
 *
 * @link     https://code.addcn.com/huangdijia/php-constants
 * @document https://code.addcn.com/huangdijia/php-constants/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\Constants;

use Huangdijia\Constants\Exceptions\ConstantsException;
use ReflectionClass;
use ReflectionClassConstant;

abstract class AbstractConstants
{
    protected static $annotations = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    final public static function __callStatic($name, $arguments)
    {
        if (! substr($name, 0, 3) == 'get') {
            throw new ConstantsException(sprintf('The function %s is not defined!', $name));
        }

        if (! isset($arguments) || count($arguments) === 0) {
            throw new ConstantsException('The Code is required');
        }

        $code = $arguments[0];
        $name = strtolower(substr($name, 3));
        $class = get_called_class();
        $message = static::getValue($class, $code, $name);

        array_shift($arguments);

        if (count($arguments) > 0) {
            return sprintf($message, ...$arguments);
        }

        return $message;
    }

    /**
     * Get Value.
     * @param object|string $class
     * @param int|string $code
     * @param string $name
     * @return string
     */
    final protected static function getValue($class, $code, $name)
    {
        if (is_null(self::$annotations)) {
            self::$annotations = self::getAnnotations($class);
        }

        return self::$annotations[$code][$name] ?? null;
    }

    /**
     * Get Annotations.
     * @param string $class
     * @return array
     */
    final protected static function getAnnotations($class)
    {
        $rc = new ReflectionClass($class);
        $constants = $rc->getConstants();
        $annotations = [];

        foreach ($constants as $name => $code) {
            $rcc = new ReflectionClassConstant($class, $name);
            $doc = $rcc->getDocComment();
            $annotations[$code] = self::parse($doc);
        }

        return $annotations;
    }

    /**
     * Parse docComment.
     * @return null|array
     */
    final protected static function parse(string $doc)
    {
        $pattern = '/\\@(\\w+)\\(\\"(.+)\\"\\)/U';
        $annotations = [];

        if (preg_match_all($pattern, $doc, $matches)) {
            foreach ($matches[1] as $i => $name) {
                $annotations[strtolower($name)] = $matches[2][$i];
            }

            return $annotations;
        }

        return null;
    }
}
