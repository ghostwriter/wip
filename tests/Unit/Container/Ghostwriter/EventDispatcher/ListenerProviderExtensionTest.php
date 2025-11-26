<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\EventDispatcher;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Wip\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(ListenerProviderExtension::class)]
final class ListenerProviderExtensionTest extends AbstractTestCase
{
    public function testImplementsExtensionInterface(): void
    {
        self::assertTrue(is_a(ListenerProviderExtension::class, ExtensionInterface::class, true));
    }
}
