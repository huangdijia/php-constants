<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/constants.
 *
 * @link     https://github.com/huangdijia/php-constants
 * @document https://github.com/huangdijia/php-constants/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\Constants\Tests;

use Huangdijia\Constants\AbstractConstants;

/**
 * @method static string getMessage(string $code)
 * @method static string getMessageCn(string $code)
 * @method static string getMessageEn(string $code)
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("%s not found!")
     */
    public const NOT_FOUND = 404;

    /**
     * @Message("Server Error")
     */
    public const SERVER_ERROR = 500;

    /**
     * @MessageCn("成功")
     * @MessageEn("Success")
     */
    public const OK = 1;

    /**
     * @MessageCn("失败")
     * @MessageEn("Failure")
     */
    public const FAILURE = 0;
}
