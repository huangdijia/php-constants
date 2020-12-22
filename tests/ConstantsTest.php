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

use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ConstantsTest extends TestCase
{
    public function testGetMessage()
    {
        $this->assertEquals('Server Error', ErrorCode::getMessage(ErrorCode::SERVER_ERROR));
        $this->assertEquals('成功', ErrorCode::getMessageCn(ErrorCode::OK));
        $this->assertEquals('Success', ErrorCode::getMessageEn(ErrorCode::OK));
    }

    public function testGetMessageWithArguments()
    {
        $path = '/api';

        $this->assertEquals(sprintf('%s not found!', $path), ErrorCode::getMessage(ErrorCode::NOT_FOUND, $path));
    }
}
