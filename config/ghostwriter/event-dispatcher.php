<?php

declare(strict_types=1);

use Composer\Plugin\CommandEvent;
use Composer\Plugin\PostFileDownloadEvent;
use Composer\Plugin\PreCommandRunEvent;
use Composer\Plugin\PreFileDownloadEvent;
use Composer\Plugin\PrePoolCreateEvent;
use Composer\Script\Event as ComposerScriptEvent;

/**
 * @return array<'object'|class-string,list<class-string>>
 */
return [
    // Event::class => [Listener::class],
    'object' => [],
    CommandEvent::class => [
        // Composer Plugin events
    ],
    PostFileDownloadEvent::class => [
        // Composer Plugin events
    ],
    PreCommandRunEvent::class => [
        // Composer Plugin events
    ],
    PreFileDownloadEvent::class => [
        // Composer Plugin events
    ],
    PrePoolCreateEvent::class => [
        // Composer Plugin events
    ],
    ComposerScriptEvent::class => [
        // Composer Plugin events
    ],
];
