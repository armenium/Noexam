<?php

$params = require(__DIR__ . '/params.php');
$params['tinymce'] = require(__DIR__ . '/tinymce.php');
$params['nav'] = require(__DIR__ . '/nav.php');
//$cdn = require(__DIR__ . '/cdn.php');
$assetsAutoCompress = require(__DIR__ . '/assetsAutoCompress.php');


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'devicedetect', 'assetsAutoCompress'],
    'defaultRoute' => 'home',
    'modules' => [
	    'admin' => [
		    'class' => 'app\modules\admin\Module',
		    'layout' => 'main',
	    ],
    ],
    'aliases' => [
	    '@uploads' => '@app/web/uploads'
    ],
    'components' => [
	    //'cdn' => $cdn,
	    'assetsAutoCompress' => $assetsAutoCompress,
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '?DnF=S_GFEAWZcS$-ch8vFwK?bF85ygk',
        ],
        'cache' => [
            //'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\DummyCache', // no cache
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'main/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'trace'],
                    'logVars' => ['_GET', '_POST'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'info', 'error', 'warning', 'trace'],
                    'logVars' => ['_GET', '_POST'],
                    'categories' => ['noexam'],
                    'logFile' => '@app/runtime/logs/noexam/noexam.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 50,
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [ 'info', 'error', 'warning', 'trace'],
                    'logVars' => [],
                    'categories' => ['cron'],
                    'logFile' => '@app/runtime/logs/cron/cron.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 50,
                ],
            ],
        ],
        'db' => require(__DIR__.'/db.php'),
        'assetManager' => [
	        'appendTimestamp' => true, #https://www.yiiframework.com/doc/guide/2.0/ru/structure-assets#cache-busting
	        'bundles' => [
		        'yii\web\JqueryAsset' => [
			        'sourcePath' => null,
			        'js' => ['https://code.jquery.com/jquery-3.6.0.min.js'],
			        'jsOptions' => [
				        'integrity' => 'sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=',
				        'crossorigin' => 'anonymous'
			        ],
		        ],
		        'yii\bootstrap\BootstrapPluginAsset' => [
			        'sourcePath' => '@app/web/v2/bootstrap-5.1.1',
			        'js'=>[
				        #'js/bootstrap.min.js',
				        'js/bootstrap.bundle.min.js',
			        ]
		        ],
		        'yii\bootstrap\BootstrapAsset' => [
			        'sourcePath' => '@app/web/v2/bootstrap-5.1.1',
			        'css' => [
			        	'css/bootstrap.min.css'
			        ]
		        ]
	        ]
        ],
        'urlManager' => [
	        'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '/',
            'rules' => [

	            //'site/login' => 'site/login',
	            //'add-admin' => 'site/add-admin',

	            'admin/<controller:\w+>/<action:[\w-]+>' => 'admin/<controller>/<action>',
	            'admin' => 'admin/default/index',

	            '<controller:(resources)>/<id:\d+>/<action:(create|update|delete)>' => 'admin/<controller>/<action>',
	            '<controller:(resources)>' => 'admin/<controller>/index',

	            '<controller:(resource-grid)>/<action:(create)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-grid)>/<action:(view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-grid)>/<action:(upload)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-grid)>/<id:\d+>/<action:(update|delete|view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-grid)>' => 'admin/<controller>/index',

	            '<controller:(resource-cats)>/<action:(create)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-cats)>/<action:(post)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-cats)>/<action:(upload)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-cats)>/<id:\d+>/<action:(update|delete|view|import|export|compare)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-cats)>/<action:[\w-]+>' => 'admin/<controller>/<action>',
	            '<controller:(resource-cats)>' => 'admin/<controller>/index',

	            '<controller:(faqs)>/<action:(create)>' => 'admin/<controller>/<action>',
	            '<controller:(faqs)>/<action:(view)>' => 'admin/<controller>/<action>',
	            '<controller:(faqs)>/<action:(upload)>' => 'admin/<controller>/<action>',
	            '<controller:(faqs)>/<id:\d+>/<action:(update|delete|view)>' => 'admin/<controller>/<action>',
	            '<controller:(faqs)>' => 'admin/<controller>/index',

	            '<controller:(resource-companies)>/<action:(create)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-companies)>/<action:(view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-companies)>/<action:(upload)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-companies)>/<id:\d+>/<action:(update|delete|view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-companies)>' => 'admin/<controller>/index',

	            '<controller:(resource-compare)>/<action:(create)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-compare)>/<action:(view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-compare)>/<action:(upload)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-compare)>/<id:\d+>/<action:(update|delete|view)>' => 'admin/<controller>/<action>',
	            '<controller:(resource-compare)>' => 'admin/<controller>/index',

	            '<controller:(crontasks)>' => '<controller>/index',
	            '<controller:(crontasks)>/<action:.*?>' => '<controller>/<action>',

	            //'health/importance-hobbies' => 'main/lifeinsurance',
	            //'apply-now' => 'main/applynow',
	            
	            'start-quote' => 'myquote/start-quote',
	            'overall-health' => 'myquote/overall-health',
	            'date-of-birth' => 'myquote/date-of-birth',
	            'myquote/post' => 'myquote/post',

	            'apply-now/quote-result' => 'main/quoteresult',
	            'apply-now2/quote-result' => 'main/quoteresult2',
	            'faq' => 'faqs/posts',
	            'faq/<slug:.*?>' => 'faqs/single',

	            '<controller:(companies-filter)>/<action:[\w-]+>' => '<controller>/<action>',
	            '<controller:(companies-filter)>/<action:[\w-]+>/<slug:.*?>' => '<controller>/<action>',

	            '<action:[\w-]+>/<slug:.*?>' => 'main/<action>',
                '<action:[\w-]+>' => 'main/<action>',

	            /*
	            '<controller:(main)>/<action:[\w-]+>/<slug:.*?>' => 'main/<action>',
	            '<controller:(main)>/<action:[\w-]+>' => 'main/<action>',
				*/

	            // '<action:[\w-]+>' => 'main/>', //
                // '<controller:[\w-]+>' => '<controller>', //
                // '<controller:site' => 'main/', //
                // '<controller:site>/<action>' => 'main/', //
	            //'feed/' => '@web/feed.dat',
            ],
        ],
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect'
        ],
        'IEIClient' => [
	        'class'        => 'app\components\IEIClient',
            'url'          => [
                'ping' => 'https://insurance-test.mediaalpha.com/ping.json',
                'post' => 'https://insurance-test.mediaalpha.com/post.json',
            ],
            "api_token"    => "wmqyyrgichattvm3Dk4IiP",
            "placement_id" => "SyCDCAg3oAsgpS1KeQXRwagnQ7bZ5A",
            "version"      => 18,
        ],
        'SFClient' => [
            'class'        => 'app\components\SFClient',
            'grant_type' => 'password',
            'client_id' => '3MVG9i1HRpGLXp.ovgxqNSLiTd9MMOrMQ2G.31s9.Qp9T9enzJaefy5E3ntuMkoxKfAa64lNuQg==',
            'client_secret' => '3622204999932944481',
            'username' => 'jfritz@noexam.com',
            'password' => '*DSHb6gdw_12',
            //'password' => '33tS4jUg@B@6HSF',
            //'password' => '!jPEr7bE8B#UaJg',
            //'password' => 'Ezg9NNjFmT+Hn=>',
            //'password' => 'xx3ku*PENYBbC3G',
            //'password' => '$3GbYWRh54mEL-4',
            //'password' => 'FkE4J5LNbTanG6n',
            //'password' => '12JF34JT44',
            //'password' => 'zwD3ERanDxVAuXS',
            //'password' => 'rQtsz58qHBdCxma',
            //'password' => 'DAH(*&79gad91222',
        ],
        'NQClient' => [
            'class'        => 'app\components\NQClient',
            'cache_time' => 2592000, // 30 days
            'api_endpoint' => 'https://wq.ninjaquoter.com',
            'api_key' => 'Ghj9yLHncn4ibntTiKQ2wnme',
        ],
        'ETClient' => [
            'class'        => 'app\components\ETClient',
            'cache_time' => 604800, // 7 days
            'api_endpoint' => 'https://app.getethos.com',
            'api_key' => '',
            'premium_annual_percent' => 3,
        ],
        'HLClient' => [
            'class'        => 'app\components\HLClient',
            'cache_time' => 604800, // 7 days
            'api_endpoint' => 'https://quotes-v3.havenlife.com',
            'source' => 'NOEXAM_WIDGET_CLIENT', // Provided by Haven Life, when you register your public key.
	        // My token
            //'api_key' => 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE1NTg5OTM3Mzl9.m0m0Fx2bhVaG2wXo7KN4H_hNW5BRIcAum7rZ2jw7shAZwjnkmxE_vH4fcwSQF7JfnSWqRa3G1oW-NQGuZg5D0E8Dqy2-rPwsK7H9z5ZDmsvxEBq3eQdLDDbbUEEMQruFsHxFxL1TGIeum_90IySJlKHkEOlFrTSWvxWCBH9qtxE_DtY5JQQlgNkNuK6D6N2ayGYEC3_0YxPWpUt97MFEE8rbz4HsKVfQDGvuDUXX1MgJAWL0K8-VLyIpizT2hA6atYbLGgrO50dFB9WYbFIFqWt4cNddq36mSTbpGyaKLUpaPYzyXIwthhYWnFuh44CdV4cTk9exh_kDeWvxZwSUtQ',
	        // Haven Life token
            'api_key' => 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE1Mzc3OTc0MzR9.Wgk7Ty_zaZRnWyYbhDIeAuiciZTzUq9Tnd74qFUNQhzBsY0jBrGl853-OlnI18WkWDNLh-D3EK93KSrnzhYq3CW_G7YBNfV7kPZKIWivCOQ9MGp7928b96ixsSwFZzjJ4Hse3Wu3wsss2S2s_S2SV68EOwK0S_HsW64xzasAdsi2GRlL76fw9dKX0IJcSB2M5tVLm0phgWSgL9PLI56XeJ6ykChW8loC_ta3xblLH-hm892WcQr5SpgfDlTkquBfSoBdimtHhX9-JnwMWxu7D5pIahf4eqvLGY9EY6s2-VYmqP5N0GOqHOgBzwCs_df6U_1a5ejrG0doe9rpo45vcA',
	        'premium_annual_percent' => 3,
        ],
        'LPClient' => [
	        'class'        => 'app\components\LPClient',
	        'cache_time' => 604800, // 7 days
	        'api_endpoint' => 'https://www.ladderlife.com/api/v1',
	        'api_key' => 'UTfjGzjUA2e_JRtkXmkwGy',
	        'api_key_dev' => 'PN6ey9WGVblFiBDtLzvxi-',
	        'premium_annual_percent' => 3,
        ],
	    'TSClient' => [
		    'class'      => 'app\components\TSClient',
		    'cache_time' => 604800,  # 7 days
		    'max_coverage' => 300000, # 0 = ignore
		    'env'        => 'demo',  # demo | prod
		    'channel'    => 'phone', # web | phone
		    'demo'       => [
			    'userName'      => 'SA-PrtnrApiNoExam-M',
			    'password'      => '7ncxFLNpnCCGP',
			    'clientId'      => [
				    'quote_api'      => '9b00320058166ad18d994543353fccfd',
				    'quote_link_api' => 'ea7432f0-ce34-4df1-b261-e85ec4e0f136',
			    ],
			    'api_endpoints' => [
				    'get_token'      => 'https://gw-demo.developer-nonprod.cunamutual.com/cmfg/demo/openid-connect-authorization/v10/token',
				    'get_quote'      => 'https://gw-demo.developer-nonprod.cunamutual.com/cmfg/demo/partnerapi/v1/quotes',
				    #'get_quote'      => 'https://gw-demo.developer-nonprod.cunamutual.com/cmfg/demo/e01/partnerapi/v1/quotes',
				    'get_quote_link' => 'https://gw-demo.developer-nonprod.cunamutual.com/cmfg/demo/partnerapi/v1/links/crm',
				    'get_quote_link2' => 'https://apigatewaydemo.cunamutual.com/cmfg/demo-int/quote-link/api/v2/QuoteLink',
			    ],
		    ],
		    'prod'       => [
			    'userName'      => 'SA-PrtnrApiNoExam-P',
			    'password'      => 'mejwF9V9erJRC',
			    'clientId'      => [
				    'quote_api'      => '8f0e711c8033fc2a89a3c5933e3a542e',
				    'quote_link_api' => '87ee4657-6c0b-4c9e-8b62-959c24274a4c',
			    ],
			    'api_endpoints' => [
				    'get_token'      => 'https://gw.developer.cunamutual.com/cmfg/prod/openid-connect-authorization/v10/token',
				    'get_quote'      => 'https://gw.developer.cunamutual.com/cmfg/prod/partnerapi/v1/quotes',
				    'get_quote_link' => 'https://gw.developer.cunamutual.com/cmfg/prod/partnerapi/v1/links/crm',
				    #'get_quote_link' => 'https://apigateway.cunamutual.com/cmfg/prod-int/quote-link/api/v2/QuoteLink',
			    ],
		    ],
	    ],
        'Velocify' => [
            'class' => 'app\components\VelocifyClient',
            'url'   => 'https://secure.velocify.com/Import.aspx?Provider=LeadExec&Client=32294&CampaignId=107&AgentId=32',
        ],
        'DigitalBGA' => [
            'class'     => 'app\components\DBGAClient',
            'url'       => 'https://leads.digitalbga.com/api/leads',
            'api_key'   => '9d119bab-c348-44fe-8f40-4dc5d80224c6',
        ],
        'Sagicor' => [
	        'class'        => 'app\components\Sagicor',
        ],
        'Helpers' => [
	        'class'        => 'app\components\Helpers',
        ],
	    'shortcodes' => [
		    'class' => 'tpoxa\shortcodes\Shortcode',
		    'callbacks' => [
			    'authors-small' => ['app\components\shortcodes\AuthorsSmallShortcode', 'widget'],
			    'breadcrumbs' => ['app\components\shortcodes\BreadcrumbsShortcode', 'widget'],
			    'rate-calc-form' => ['app\components\shortcodes\RateCalcFormShortcode', 'widget'],
			    'rate-widget-cta' => ['app\components\shortcodes\RateWidgetCtaShortcode', 'widget'],
			    'anothershortcode' => function($attrs, $content, $tag){
				    ///
			    },
		
		    ]
	    ],
	    'reCaptcha' => [
		    'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
		    #'siteKeyV3' => '6LeVpNsZAAAAAC4Y9UqFtL3Rpu_ZwhPfdKZrJZo8',
		    #'secretV3' => '6LeVpNsZAAAAAILW_qz0qwFs4k48iA1-_ps2X8Ri',
		    'siteKeyV3' => '6Lf3Fd4ZAAAAAJhGizsJWSedOix1QPvPUkHabjS3',
		    'secretV3' => '6Lf3Fd4ZAAAAAGvAOfcWe03NhyJ6vWL9qTPGwUwy',
	    ],
    ],
    'params' => $params,
];

if(YII_ENV_DEV){
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*.*.*.*', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*.*.*.*', '::1'], //37.60.208.122
    ];
}

return $config;
