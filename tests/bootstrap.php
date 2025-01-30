<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    throw new \RuntimeException('Class loader not found');
}

$fixturePath = __DIR__ . \DIRECTORY_SEPARATOR . 'fixture';

/**
 * when test fixtures have a single namespace (e.g. Tests\Fixture).
 *
 * @psalm-suppress UncaughtThrowInGlobalScope
 */
$classLoader->addPsr4('Tests\\Fixture\\', $fixturePath);

/**
 * when test fixtures have multiple namespaces.
 *
 * @psalm-suppress UncaughtThrowInGlobalScope
 */
$classLoader->addPsr4('', $fixturePath);

return $classLoader;
