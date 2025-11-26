<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Ghostwriter\Wip\Container\WipDefinition;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

use function is_a;

#[CoversClass(WipDefinition::class)]
final class WipDefinitionTest extends AbstractTestCase
{
    public function testImplementsDefinitionInterface(): void
    {
        self::assertTrue(is_a(WipDefinition::class, DefinitionInterface::class, true));
    }
}
