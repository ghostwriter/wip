#!/usr/bin/env php
<?php

declare(strict_types=1);

use Ghostwriter\Wip\Wip;

/** @var ?string $_composer_autoload_path */
(static function (string $autoloader): void {
    if (! \file_exists($autoloader)) {
        $message = '[ERROR]Cannot locate "' . $autoloader . '"\n please run "composer install"\n';
        \fwrite(\STDERR, $message);
        exit;
    }

    \set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
        throw new \ErrorException($message, 255, $severity, $file, $line);
    });

    require $autoloader;

    \restore_error_handler();

    /** #BlackLivesMatter. */
    exit(Wip::new()->run($_SERVER['argv'] ?? []));
})(
    $_composer_autoload_path ?? \implode(\DIRECTORY_SEPARATOR, [\dirname(__DIR__), 'vendor', 'autoload.php'])
);
