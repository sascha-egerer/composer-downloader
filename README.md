composer-downloader
===================

Adds a t3x Downloader for TYPO3 CMS Extensions.

This Package is used by the TYPO3 CMS installer.
https://github.com/dkd/installers/tree/typo3-cms-installer

You have to add these configurations in your main composer.json:

<pre>
{
...
  "repositories" : [
    {
			"type" : "git",
			"url" : "https://github.com/dkd/installers.git"
		},
		{
			"type" : "git",
			"url" : "https://github.com/sascha-egerer/composer-downloader.git"
		},
  	{
			"type" : "composer",
			"url" : "http://composer-typo3.dkd.de/"
		}
  ],
  "require" : {
		"dkd/downloaders" : "dev-master",
		"composer/installers" : "dev-typo3-cms-installer",
    ... your extensions ...
  	"typo3-cms-extension/additional_reports" : "2.5.12",
    ... your extensions ...
  }
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
}
</pre>

