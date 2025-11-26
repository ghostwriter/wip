<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Container\Ghostwriter\Config;

use Ghostwriter\Config\Configuration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Override;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function assert;
use function dirname;
use function implode;

/**
 * @see ConfigurationExtensionTest
 *
 * @implements ExtensionInterface<Configuration>
 */
final readonly class ConfigurationExtension implements ExtensionInterface
{
    /**
     * @param ConfigurationInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        assert($service instanceof ConfigurationInterface);

        $service->mergeDirectory(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 4), 'config']));
    }
}
