<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use PHPUnit\Framework\Attributes\CoversClass;
use Throwable;

use function is_a;

#[CoversClass(Wip::class)]
final class WipTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsWipInterface(): void
    {
        self::assertTrue(is_a(Wip::class, WipInterface::class, true));
    }
}
