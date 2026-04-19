<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Container\Ghostwriter\Config\WipConfigurationExtension;
use Ghostwriter\Wip\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Wip\Container\WipProvider;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(WipProvider::class)]
final class WipProviderTest extends AbstractTestCase
{
    public function testExtendsAbstractProvider(): void
    {
        self::assertTrue(is_a(WipProvider::class, AbstractProvider::class, true));
    }

    public function testWipProviderRegister(): void
    {
        $builder = $this->createMock(BuilderInterface::class);

        $builder->expects(self::exactly(2))
            ->method('alias')
            ->withParameterSetsInOrder(
                [WipInterface::class, Wip::class],
                [WipConfigurationInterface::class, WipConfiguration::class],
            );

        $builder->expects(self::once())
            ->method('bind')
            ->withParameterSetsInOrder([
                Wip::class,
                ConfigurationInterface::class,
                WipConfigurationInterface::class,
            ]);

        $builder->expects(self::exactly(2))
            ->method('extend')
            ->withParameterSetsInOrder(
                [ListenerProviderInterface::class, ListenerProviderExtension::class],
                [WipConfigurationInterface::class, WipConfigurationExtension::class],
            )
            ->seal();

        (new WipProvider())->register($builder);
    }
}
