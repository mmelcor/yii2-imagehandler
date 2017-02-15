# yii2-imagehandler

Yii2 Multi-language Image Handler
=================================
An extension designed to retrive images from an online Repository based on the currently selected application language.

Installation
------------

The preferred method of installation is via [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist mmelcor/yii2-imagehandler "*"
```
or add
```
"mmelcor\yii2-imagehander": "*"
```
to the require section of your `composer.json` file.

Usage
-----

Once installed, use it in your application by adding the following to your components section in `common\config\main.php` (advanced) or `config\web.php` (basic template) :

```php
'components' => [
	'[other components]',
	'imageHandler' => [
		'class' => 'mmelcor\imagehandler',
		'hostUrl' => '[your image repo base url]',
		'siteFolder' => '[base folder]',
		'defaultLang' => '[Language that will have all images]',
	],
],
```
In your controller pass a new instance of the ImageHandler
```
$iHandler = new imageHandler();
```

to call the specific image place the following in your view.
```
<img src="<?= $iHandler->getImage('[path to image]') ?>" class="[classes]" alt="[image description]" />
```

This component works best with [oorrwullie\yii2-babelfishfood](https://github.com/oorrwullie/yii2-babelfishfood).