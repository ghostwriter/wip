<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Configuration;

use Ghostwriter\Config\AbstractConfiguration;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;

/**
 * @template T of (array<non-empty-string,T>|bool|float|int|null|string)
 *
 * @extends AbstractConfiguration<T>
 *
 * @see WipConfigurationTest
 */
final class WipConfiguration extends AbstractConfiguration implements WipConfigurationInterface {}
