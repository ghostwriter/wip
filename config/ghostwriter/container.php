<?php

declare(strict_types=1);

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Container\Ghostwriter\Config\WipConfigurationExtension;
use Ghostwriter\Wip\Container\Ghostwriter\EventDispatcher\ListenerProviderExtension;
use Ghostwriter\Wip\Interface\WipInterface;
use Ghostwriter\Wip\Wip;

/**
 * @return array{
 *     'alias': array<class-string,class-string>,
 *     'extend': array<class-string,list<class-string<ExtensionInterface>>>,
 *     'factory': array<class-string,class-string<FactoryInterface>>
 * }
 */
return [
    'alias' => [
        WipInterface::class => Wip::class,
    ],
    'extend' => [
        ConfigurationInterface::class => [WipConfigurationExtension::class],
        ListenerProviderInterface::class => [ListenerProviderExtension::class],
    ],
    'factory' => [],
];
