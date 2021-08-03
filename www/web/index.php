<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);
//defined('YII2CDN_OFFLINE') or define('YII2CDN_OFFLINE', false);

//define('YII_ENABLE_ERROR_HANDLER', false);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
error_reporting(E_ALL ^ E_NOTICE);

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
