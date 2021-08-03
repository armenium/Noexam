<?php
return [
	'class' => '\yii2cdn\Cdn',
	'baseUrl' => YII2CDN_OFFLINE ? '/' : '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com',
	'basePath' => dirname(__DIR__, 2) . '/web',
	'components' => [
		'style' => [
			'css' => [
				[
					// local version
					'stile.css',
					// cdn version
					'@cdn' => '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com/css/style.css',
				]
			]
		],
		'fontello' => [
			'css' => [
				[
					// local version
					'css/fontello.css',
					// cdn version
					'@cdn' => '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com/web/css/fontello.css',
				]
			]
		],
	],
];