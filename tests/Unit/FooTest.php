<?php

declare(strict_types=1);

namespace Ghostwriter\wip\Tests\Unit;

use Ghostwriter\wip\Foo;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Ghostwriter\wip\Foo
 *
 * @internal
 *
 * @small
 */
final class FooTest extends TestCase
{
    /** @covers \Ghostwriter\wip\Foo::test */
    public function test(): void
    {
        self::assertTrue((new Foo())->test());
    }
}
