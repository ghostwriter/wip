<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\EventDispatcher;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Override;
use Throwable;

use function assert;

/**
 * @see ListenerProviderExtensionTest
 *
 * @implements ExtensionInterface<ListenerProviderInterface>
 */
final readonly class ListenerProviderExtension implements ExtensionInterface
{
    /**
     * @param ListenerProviderInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        assert($service instanceof ListenerProviderInterface);

        $configuration = $container->get(WipConfiguration::class);

        assert($configuration instanceof WipConfiguration);
        /** @var list<class-string> $listeners */
        foreach ($configuration->get('ghostwriter.event-dispatcher', []) as $event => $listeners) {
            foreach ($listeners as $listener) {
                $service->listen($event, $listener);
            }
        }
    }
}
