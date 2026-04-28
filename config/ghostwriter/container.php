<?php

declare(strict_types=1);

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\EventDispatcher\Interface\ListenerProviderInterface;
use Ghostwriter\Wip\Configuration\WipConfiguration;
use Ghostwriter\Wip\EventDispatcher\ListenerProviderExtension;
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
        ConfigurationInterface::class => WipConfiguration::class,
    ],
    'extend' => [
        ListenerProviderInterface::class => [ListenerProviderExtension::class],
    ],
    'factory' => [],
];
