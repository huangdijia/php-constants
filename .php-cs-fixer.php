<?php

declare(strict_types=1);
/**
 * This file is part of huangdijia/constants.
 *
 * @link     https://github.com/huangdijia/php-constants
 * @document https://github.com/huangdijia/php-constants/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
use Huangdijia\PhpCsFixer\Config;

require __DIR__ . '/vendor/autoload.php';

return (new Config())
    ->setHeaderComment(
        projectName: 'huangdijia/constants',
        projectLink: 'https://github.com/huangdijia/php-constants',
        projectDocument: 'https://github.com/huangdijia/php-constants/blob/main/README.md',
        contacts: [
            'huangdijia@gmail.com',
        ],
    )
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('public')
            ->exclude('runtime')
            ->exclude('vendor')
            ->in(__DIR__)
            ->append([
                __FILE__,
            ])
    )
    ->setUsingCache(false);
