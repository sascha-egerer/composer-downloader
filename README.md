composer-downloader
===================

Adds a t3x Downloader for TYPO3 CMS Extensions

Howto get started: Add the pre-update and pre-install script to your root package

<pre>
"scripts": {
	"pre-install-cmd": [
		"Dkd\\RegisterDownloader::register"
	],
	"pre-update-cmd": [
		"Dkd\\RegisterDownloader::register"
	]
}
<pre>

