<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Config;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Wip\Container\Ghostwriter\Config\WipConfigurationExtension;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use const DIRECTORY_SEPARATOR;

use function dirname;
use function is_a;

#[CoversClass(WipConfigurationExtension::class)]
final class WipConfigurationExtensionTest extends AbstractTestCase
{
    public function testImplementsExtensionInterface(): void
    {
        self::assertTrue(is_a(WipConfigurationExtension::class, ExtensionInterface::class, true));
    }

    public function testInvokeMergesConfigurationFromProjectRoot(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::never())->method('get')->seal();

        $configuration = $this->createMock(WipConfigurationInterface::class);
        $configuration->expects(self::once())
            ->method('mergeDirectory')
            ->with(dirname(__DIR__, 5) . DIRECTORY_SEPARATOR . 'config')
            ->seal();

        (new WipConfigurationExtension())($container, $configuration);
    }
}
