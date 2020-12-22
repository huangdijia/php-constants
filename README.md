# PHP Constants

[![Latest Test](https://github.com/huangdijia/php-constants/workflows/tests/badge.svg)](https://github.com/huangdijia/php-constants/actions)
[![Latest Stable Version](https://poser.pugx.org/huangdijia/constants/version.png)](https://packagist.org/packages/huangdijia/constants)
[![Total Downloads](https://poser.pugx.org/huangdijia/constants/d/total.png)](https://packagist.org/packages/huangdijia/constants)
[![GitHub license](https://img.shields.io/github/license/huangdijia/php-constants)](https://github.com/huangdijia/php-constants)

A constants component for php

## Installation

~~~base
composer require huangdijia/constants
~~~

## Usage

~~~php
namespace App\Constants;

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

var_dump(ErrorCode::getMessage(ErrorCode::SERVER_ERROR)); // Server Error
var_dump(ErrorCode::getMessage(ErrorCode::NOT_FOUND, '/api')); // /api not found!
var_dump(ErrorCode::getMessageCn(ErrorCode::OK)); // 成功
var_dump(ErrorCode::getMessageEn(ErrorCode::OK)); // Success
~~~
