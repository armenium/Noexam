<?php

return [
	'adminEmail' => 'admin@noexam.com',
	'adminPassword' => 'Fg5lT8kQ_b!oE',
	'senderEmail' => 'noreply@noexam.com',
	'senderName' => 'Noexam mailer',
	'user.passwordResetTokenExpire' => 3600,
	'supportEmail' => 'robot@noexam.com',
	'adminAllowedIPs' => [
		'45.26.156.154',  # Jonathan's IP
		'31.192.152.162', # Armen's IP
		null, # Armen's IP
	],

	'dsr_key' => 'test',
	'geoip2path' =>  '@web/maxmind/',
	'cdnUrl' => '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com',
	'avatar_sizes' => [
		'thumb' => 150,
		'big' => 250,
	],
	'image_exts' => 'gif, png, jpg, jpeg',
	#'bsDependencyEnabled' => false, // this will not load Bootstrap CSS and JS for all Krajee extensions
	'bsVersion' => '3.x',
];
