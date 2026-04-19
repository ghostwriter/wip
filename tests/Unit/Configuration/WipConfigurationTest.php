<?php

declare(strict_types=1);

namespace Tests\Unit\Configuration;

use Ghostwriter\Config\AbstractConfiguration;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
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

    public function testImplementsWipConfigurationInterface(): void
    {
        self::assertTrue(is_a(WipConfiguration::class, WipConfigurationInterface::class, true));
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
