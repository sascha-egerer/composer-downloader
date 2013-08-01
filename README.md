composer-downloader
===================

Adds a t3x Downloader for TYPO3 CMS Extensions.

This Package is used by the TYPO3 CMS installer.
https://github.com/dkd/installers/tree/typo3-cms-installer

Howto get started: Add the pre-update and pre-install script to your root package

<pre>
    "scripts": {
        "pre-install-cmd": [
            "Dkd\\RegisterDownloader::register"
        ],
        "post-package-install": [
            "Dkd\\RegisterDownloader::registerAfterInstall"
        ],
        "pre-update-cmd": [
            "Dkd\\RegisterDownloader::register"
        ],
        "pre-status-cmd": [
            "Dkd\\RegisterDownloader::register"
        ]
    }
</pre>

