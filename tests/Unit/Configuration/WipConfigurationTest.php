<?php

declare(strict_types=1);

namespace Tests\Unit\Configuration;

use Ghostwriter\Config\AbstractConfiguration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(WipConfiguration::class)]
final class WipConfigurationTest extends AbstractTestCase
{
    public function testExtendsAbstractConfiguration(): void
    {
        self::assertTrue(is_a(WipConfiguration::class, AbstractConfiguration::class, true));
    }

    public function testImplementsConfigurationInterface(): void
    {
        self::assertTrue(is_a(WipConfiguration::class, ConfigurationInterface::class, true));
    }

    public function testSetStoresNestedConfigurationValues(): void
    {
        $configuration = WipConfiguration::new();

        $configuration->set('ghostwriter.wip.enabled', true);

        self::assertTrue($configuration->has('ghostwriter.wip.enabled'));
        self::assertTrue($configuration->get('ghostwriter.wip.enabled'));
        self::assertSame([
            'ghostwriter' => [
                'wip' => [
                    'enabled' => true,
                ],
            ],
        ], $configuration->toArray());
    }
}
