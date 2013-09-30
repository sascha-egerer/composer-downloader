<?php

namespace Dkd;

use Composer\Cache;
use Composer\Script\Event;
use Composer\Script\PackageEvent;

class RegisterDownloader
{
    /**
     * Register dkd downloader
     *
     * @param Event $event
     * @return void
     */
    public static function register(Event $event)
    {
        $config = $event->getComposer()->getConfig();
        $io = $event->getIO();
        $cache = null;
        if ($config->get('cache-files-ttl') > 0) {
            $cache = new Cache($io, $config->get('cache-files-dir'), 'a-z0-9_./');
        }
        $event->getComposer()->getDownloadManager()->setDownloader(
            't3x',
            new Downloader\T3xDownloader($io, $config, $event->getComposer()->getEventDispatcher(), $cache)
        );
    }

    /**
     * Register dkd downloader
     *
     * @param PackageEvent $event
     * @return void
     */
    public static function registerAfterInstall(PackageEvent $event)    {
        if ($event->getOperation()->getPackage()->getName() == 'dkd/downloaders') {
            self::register($event);
        }
    }
}