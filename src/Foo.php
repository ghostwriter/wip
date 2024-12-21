<?php

declare(strict_types=1);

namespace Ghostwriter\Wip;

use Ghostwriter\Wip\Interface\FooInterface;

/** @see FooTest */
final class Foo implements FooInterface
{
    public function __construct() {}

    public static function new(): self
    {
        return new self();
    }

    public function test(): bool
    {
        return true;
    }
}
