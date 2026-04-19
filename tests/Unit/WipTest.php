<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(Wip::class)]
final class WipTest extends AbstractTestCase
{
    public function testConstructorStoresInjectedConfiguration(): void
    {
        $configuration = $this->createMock(WipConfigurationInterface::class);

        $configuration->expects(self::never())->method('get')->seal();

        $wip = new Wip($configuration);

        self::assertSame($configuration, $wip->configuration());
    }

    public function testDefaultConfiguration(): void
    {
        $defaultConfiguration = [
            'default' => 'configuration',
        ];

        $configuration = $this->createMock(WipConfigurationInterface::class);

        $configuration->expects(self::once())
            ->method('toArray')
            ->willReturn($defaultConfiguration)
            ->seal();

        $wip = Wip::new($configuration);

        self::assertInstanceOf(WipConfigurationInterface::class, $wip->configuration());
        self::assertSame($defaultConfiguration, $wip->configuration()->toArray());
    }

    /** @throws Throwable */
    public function testImplementsWipInterface(): void
    {
        self::assertTrue(is_a(Wip::class, WipInterface::class, true));
    }

    public function testNewCreatesDefaultConfigurationWhenNoneIsProvided(): void
    {
        $wip = Wip::new();

        self::assertInstanceOf(WipConfigurationInterface::class, $wip->configuration());
        self::assertInstanceOf(WipConfiguration::class, $wip->configuration());
        self::assertSame([], $wip->configuration()->toArray());
    }

    public function testNewUsesProvidedConfiguration(): void
    {
        $configuration = $this->createMock(WipConfigurationInterface::class);
        $configuration->expects(self::never())->method('get')->seal();

        $wip = Wip::new($configuration);

        self::assertSame($configuration, $wip->configuration());
    }
}
