<?php

declare(strict_types=1);

namespace Ghostwriter\Wip;

use Ghostwriter\Wip\Interface\WipInterface;

/** @see FooTest */
final class Wip implements WipInterface
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
