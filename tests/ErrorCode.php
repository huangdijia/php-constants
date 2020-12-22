<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/constants.
 *
 * @link     https://code.addcn.com/huangdijia/php-constants
 * @document https://code.addcn.com/huangdijia/php-constants/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\Constants\Tests;

use Huangdijia\Constants\AbstractConstants;

class ErrorCode extends AbstractConstants
{
    /**
     * @Message("%s not found!")
     */
    const NOT_FOUND = 404;

    /**
     * @Message("Server Error")
     */
    const SERVER_ERROR = 500;

    /**
     * @MessageCn("成功")
     * @MessageEn("Success")
     */
    const OK = 1;

    /**
     * @MessageCn("失败")
     * @MessageEn("Failure")
     */
    const FAILURE = 0;
}
