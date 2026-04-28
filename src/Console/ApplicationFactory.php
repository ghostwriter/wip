<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Console;

use Composer\InstalledVersions;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Override;
use Psr\Container\ContainerInterface as PsrContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Throwable;

/**
 * @see ApplicationFactoryTest
 *
 * @implements FactoryInterface<Application>
 */
final readonly class ApplicationFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): Application
    {
        $consoleConfiguration = $container->get(WipConfiguration::class)->wrap('ghostwriter.console');

        $application = new Application(
            $consoleConfiguration->get('name', 'Wip Console'),
            InstalledVersions::getPrettyVersion($consoleConfiguration->get('package', 'ghostwriter/wip'))
        );

        $application->setAutoExit($consoleConfiguration->get('auto_exit', false));

        $application->setCatchErrors($consoleConfiguration->get('catch_errors', false));

        $application->setCatchExceptions($consoleConfiguration->get('catch_exceptions', false));

        $application->setCommandLoader(new ContainerCommandLoader(
            $container->get(PsrContainerInterface::class),
            $consoleConfiguration->get('commands', [])
        ));

        $application->setDefaultCommand(
            $consoleConfiguration->get('default_command', false),
            true === $consoleConfiguration->get('single_command', false)
        );

        return $application;
    }
}
