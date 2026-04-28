<?php

declare(strict_types=1);

namespace Ghostwriter\Wip;

use Ghostwriter\Container\Container;
use Ghostwriter\Wip\Interface\WipInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Throwable;

/** @see WipTest */
final readonly class Wip implements WipInterface
{
    public function __construct(
        private Application $application,
    ) {}

    public static function new(): self
    {
        return Container::getInstance()->get(self::class);
    }

    /** @throws Throwable */
    public function run(array $arguments = []): int
    {
        return $this->application->run(new ArgvInput($arguments));
    }
}
