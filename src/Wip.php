<?php

declare(strict_types=1);

namespace Ghostwriter\Wip;

use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use Ghostwriter\Wip\Interface\WipInterface;

/** @see WipTest */
final class Wip implements WipInterface
{
    public function __construct(
        private WipConfigurationInterface $configuration
    ) {}

    public static function new(?WipConfigurationInterface $configuration = null): self
    {
        return new self($configuration ?? WipConfiguration::new());
    }

    public function configuration(): WipConfigurationInterface
    {
        return $this->configuration;
    }
}
