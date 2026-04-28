<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\Console\ApplicationFactory;
use Ghostwriter\Wip\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;
use Override;
use Symfony\Component\Console\Application;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function assert;
use function dirname;
use function implode;
use function is_dir;

/**
 * @see WipProviderTest
 */
final class WipProvider extends AbstractProvider
{
    /**
     * alias => service.
     *
     * @var array<class-string,class-string>
     */
    public const array ALIAS = [
        WipInterface::class => Wip::class,
        ConfigurationInterface::class => WipConfiguration::class,
    ];

    /**
     * service => [extension, ...].
     *
     * @var array<class-string,list<class-string<ExtensionInterface>>>
     */
    public const array EXTEND = [
        ListenerProviderInterface::class => [ListenerProviderExtension::class],
    ];

    /**
     * service => factory.
     *
     * @var array<class-string,class-string<FactoryInterface>>
     */
    public const array FACTORY = [
        Application::class => ApplicationFactory::class,
    ];

    /** @throws Throwable */
    #[Override]
    public function register(BuilderInterface $builder): void
    {
        $builder->set(WipConfiguration::class, $wipConfiguration = WipConfiguration::new());

        $configDirectory = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 2), 'config']);
        assert(is_dir($configDirectory), 'Expected configuration directory to exist at path: ' . $configDirectory);

        $wipConfiguration->mergeDirectory($configDirectory);

        parent::register($builder);
    }
}
