<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Container\Ghostwriter\Config\WipConfigurationExtension;
use Ghostwriter\Wip\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Wip\Interface\WipConfigurationInterface;
use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use Override;
use Throwable;

/**
 * @see WipProviderTest
 */
final class WipProvider extends AbstractProvider
{
    /** @throws Throwable */
    #[Override]
    public function register(BuilderInterface $builder): void
    {
        $builder->alias(WipInterface::class, Wip::class);
        $builder->alias(WipConfigurationInterface::class, WipConfiguration::class);

        $builder->bind(Wip::class, ConfigurationInterface::class, WipConfigurationInterface::class);

        $builder->extend(ListenerProviderInterface::class, ListenerProviderExtension::class);
        $builder->extend(WipConfigurationInterface::class, WipConfigurationExtension::class);
    }
}
