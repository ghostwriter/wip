<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Wip\Console\ApplicationFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(ApplicationFactory::class)]
final class ApplicationFactoryTest extends AbstractTestCase
{
    public function testImplementsFactoryInterface(): void
    {
        self::assertTrue(is_a(ApplicationFactory::class, FactoryInterface::class, true));
    }
}
