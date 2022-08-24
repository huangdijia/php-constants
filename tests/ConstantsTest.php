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

use Huangdijia\Constants\Exceptions\ConstantsException;
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

    public function testCallUndefinedMethod()
    {
        $this->expectException(ConstantsException::class);
        ErrorCode::abc(ErrorCode::OK);
    }
}
