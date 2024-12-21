<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Wip\Container\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;

#[CoversClass(ServiceProvider::class)]
final class ServiceProviderTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testImplementsServiceProviderInterface(): void
    {
        self::assertTrue(is_a(ServiceProvider::class, ServiceProviderInterface::class, true));
    }
}
