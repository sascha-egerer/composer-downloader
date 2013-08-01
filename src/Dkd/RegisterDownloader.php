<?php

namespace Dkd;

use Composer\Script\Event;

class RegisterDownloader
{

    public static function register(Event $event)
    {
        $event->getComposer()->getDownloadManager()->setDownloader(
            't3x',
            new Downloader\T3xDownloader(
                $event->getIO(),
                $event->getComposer()->getConfig()
            )
        );
    }

    public static function registerAfterInstall(Event $event)
    {
        if ($event->getOperation()->getPackage()->getName() == 'dkd/downloaders') {
            self::register($event);
        }
    }
}