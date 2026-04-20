<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Container\Ghostwriter\Config;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use Override;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function assert;
use function dirname;
use function implode;
use function is_dir;

/**
 * @see WipConfigurationExtensionTest
 *
 * @implements ExtensionInterface<WipConfigurationInterface>
 */
final readonly class WipConfigurationExtension implements ExtensionInterface
{
    /**
     * @param WipConfigurationInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        assert($service instanceof WipConfigurationInterface);

        $configDirectory = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 4), 'config']);

        assert(is_dir($configDirectory), 'Expected configuration directory to exist at path: ' . $configDirectory);

        $service->mergeDirectory($configDirectory);
    }
}
