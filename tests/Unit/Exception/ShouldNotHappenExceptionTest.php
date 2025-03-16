<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Wip\Exception\ShouldNotHappenException;
use Ghostwriter\Wip\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testImplementsExceptionInterface(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, ExceptionInterface::class, true));

        self::assertTrue(is_a(ShouldNotHappenException::class, Throwable::class, true));
    }
}
