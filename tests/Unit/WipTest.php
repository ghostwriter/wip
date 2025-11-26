<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Throwable;

use function is_a;

#[CoversClass(Wip::class)]
final class WipTest extends AbstractTestCase
{
    /** @throws Throwable */
    #[DataProvider('provideExampleCases')]
    public function testExample(bool $value): void
    {
        self::assertSame($value, $value);

        self::assertTrue(Wip::new()->test());
    }

    /** @throws Throwable */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Wip::class, WipInterface::class, true));
    }

    /** @return iterable<array{bool}> */
    public static function provideExampleCases(): iterable
    {
        yield from [
            'true' => [true],
            'false' => [false],
        ];
    }
}
