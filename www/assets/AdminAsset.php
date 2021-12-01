<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use Yii;
use yii\web\AssetBundle;
use yii\helpers\Url;
use \yii\helpers\VarDumper;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'v2/plugins/icons/bootstrap-icons.css',
        'css/bootstrap-select.css',
        'css/datepicker.css',
        //'css/jquery.jscrollpane.css',
        'css/admin.css',
        'css/fontello.css?1',
        //'css/table-default.css?11',
        //'css/datatables-row-details.css',
    ];
    public $js = [
        'js/bootstrap-select.js',
        'js/bootstrap-datepicker.js',
        //'js/snap.svg-min.js',
        //'js/jquery.inview.min.js',
        //'js/jquery.mousewheel.js',
        //'js/jquery.jscrollpane.min.js',
        //'js/jquery.maskedinput.min.js',
        // 'js/inputmask.js',
        // 'js/inputmask.extensions.js',
        // 'js/inputmask.date.extensions.js',
        // 'js/jquery.inputmask.js',
	    //'js/tablesorter/jquery.tablesorter.min.js',
	    //'js/jquery.inputmask.bundle.min.js',
        'js/admin.js',
        //'js/tabby.js',
        //'js/tinysort/tinysort.min.js',
        //'js/tinysort/jquery.tinysort.min.js',
        //'js/jquery.easing.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

	public function init(){
		parent::init();

		//$this->baseUrl = '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com';
		#VarDumper::dump(Url::current());

		/*foreach($this->js as $k => $js){
			$this->js[$k] = str_replace('@base_url', Url::base(true), $js);
		}*/
	}

}
