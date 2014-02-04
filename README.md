composer-downloader
===================

Adds a t3x Downloader for TYPO3 CMS Extensions.

IMPORTANT: There is currently no way to register a downloader with a simple composer package. 
You have to add some scripts that hook into the composer process.
This will give you a *warning* if you run composer install for *the first time*, because the script
does not exist at this point. You can *ignore* this Warning!
You have to add the dkd/downloaders Package before an package in t3x format!

*Fake requirements*:
If an extension requires a packages that is not installed by composer (e.g. extbase) you will maybe get an error because the packages is not in the TER.
To tell composer that your package provides a package you can use _provide_. For more details look at the composer documentation. https://getcomposer.org/doc/04-schema.md#provide

Example:
<pre>
{
    ...
	"provide": {
		"typo3-cms-extension/extbase" : "~1.3.4",
		"typo3-cms-extension/fluid" : "~1.3.1"
	},
    ...
}
</pre>

Example composer.json package
<pre>
{
    "name" : "dkd/standard-classic",
    "description" : "dkd standard classic package",
    "homepage" : "http://www.dkd.de",
    "license" : "GPL-2.0+",
    "version" : "2.1.1",
    "authors" : [
        {
            "name" : "Timo Webler",
            "email" : "timo.webler@dkd.de",
            "role" : "Developer" 
        },
        {
            "name" : "Sascha Egerer",
            "email" : "sascha.egerer@dkd.de",
            "role" : "Developer" 
        }
    ],
    "repositories" : [
        {
            "type" : "composer",
            "url" : "http://composer-typo3.dkd.de/" 
        }
    ],
    "require" : {
        "dkd/downloaders" : "dev-master",
        "composer/installers" : "dev-master",
        "typo3-cms-extension/additional_reports" : "2.5.3",
        "typo3-cms-extension/automaketemplate" : "0.1.3",
        "typo3-cms-extension/be_secure_pw" : "3.0.1",
        "typo3-cms-extension/css_filelinks" : "0.2.19",
        "typo3-cms-extension/linkhandler" : "0.3.1",
        "typo3-cms-extension/phpunit" : "3.5.14",
        "typo3-cms-extension/realurl" : "1.12.1",
        "typo3-cms-extension/rlmp_tmplselector" : "1.2.3",
        "typo3-cms-extension/static_info_tables" : "2.2.0",
        "typo3-cms-extension/tt_news" : "3.2.0" 
    },
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

