<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    throw new \RuntimeException('Class loader not found');
}

$FixturePath = __DIR__ . \DIRECTORY_SEPARATOR . 'Fixture';

if (\is_dir($FixturePath)) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    $classLoader->addPsr4('Tests\Fixture\', $FixturePath);
}

return $classLoader;