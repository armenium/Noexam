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
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap',
        #'css/bootstrap-4.css?11',
        'css/bootstrap-select.css',
        #'css/datepicker.css',
        #'css/slick.css',
        #'css/slick-theme.css',
        'css/jquery.jscrollpane.css',
        #'css/ion.rangeSlider.min.css',
        //'css/Chart.css',
        #'css/style.css?13',
        #'css/fontello.css?1',
        //'css/table-default.css?11',
        #'css/datatables-row-details.css',
    ];
    public $js = [
        //'js/tuupola-lazyload/jquery.lazyload.min.js',
        'js/vanilla-lazyload/dist/lazyload.min.js',
        #'js/bootstrap-select.js',
        #'js/bootstrap-datepicker.js',
        #'js/slick.js',
        #'js/snap.svg-min.js',
        #'js/jquery.inview.min.js',
        #'js/jquery.mousewheel.js',
        #'js/jquery.jscrollpane.min.js',
        #'js/jquery.maskedinput.min.js',
        // 'js/inputmask.js',
        // 'js/inputmask.extensions.js',
        // 'js/inputmask.date.extensions.js',
        // 'js/jquery.inputmask.js',
	    #'js/tablesorter/jquery.tablesorter.min.js',
	    #'js/jquery.inputmask.bundle.min.js',
        #'js/ion.rangeSlider.min.js',
        //'js/Chart.min.js',
        //'js/tabby.js',
        #'js/tinysort/tinysort.min.js',
        //'js/tinysort/jquery.tinysort.min.js',
        'js/jquery.easing.min.js',
        'v2/common/js/frontend.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

	public function init(){
		parent::init();

		//$this->baseUrl = '//223893-681207-raikfcquaxqncofqfm.stackpathdns.com';
		//VarDumper::dump(\yii\web\Controller::className());

		$recompile = Yii::$app->request->get('recompile');
		if(!is_null($recompile)){
			$path = $this->basePath.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR;
			#VarDumper::dump($recompile, 10, 1);
			if($recompile == 'css' || $recompile == 'all'){
				$files = array_diff(scandir($path.'css-compress'), array(".", ".."));
				foreach($files as $file){
					unlink($path.'css-compress'.DIRECTORY_SEPARATOR.$file);
				}
				#VarDumper::dump($this->css, 10, 1); exit;
				/*foreach($this->css as $k => $f){
					if($pos = strpos($f, "?")){
						$f = substr($f, 0, $pos);
					}
					$this->css[$k] = $f.'?'.time();
				}*/

			}
			if($recompile == 'js' || $recompile == 'all'){
				$files = array_diff(scandir($path.'js-compress'), array(".", ".."));
				foreach($files as $file){
					unlink($path.'js-compress'.DIRECTORY_SEPARATOR.$file);
				}
				/*foreach($this->js as $k => $f){
					if($pos = strpos($f, "?")){
						$f = substr($f, 0, $pos);
					}
					$this->js[$k] = $f.'?'.time();
				}*/
			}
		}

		/*foreach($this->js as $k => $js){
			$this->js[$k] = str_replace('@base_url', Url::base(true), $js);
		}*/
	}

}

