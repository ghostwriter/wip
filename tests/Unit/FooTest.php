<?php

declare(strict_types=1);

namespace Tests\Unit;

use Generator;
use Ghostwriter\Wip\Foo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Foo::class)]
final class FooTest extends TestCase
{
    #[DataProvider('dataProvider')]
    public function test(bool $value): void
    {
        self::assertSame($value, $value);

        self::assertTrue((new Foo())->test());
    }

    /**
     * @return Generator<array{bool}>
     */
    public static function dataProvider(): Generator
    {
        yield from [
            'true' => [true],
            'false' => [false],
        ];
    }
}
