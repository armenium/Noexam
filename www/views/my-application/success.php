<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */

$page_id = 'online-app-step-success';

$this->title = 'Success';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp">
	<div class="wrapp">
		<section class="online-app-finish">
			<img src="/v2/my-application/img/dog-bg.png" alt="background" class="online-app-finish__img">
			<h1 class="online-app-finish__title heading-0">Congratulations!</h1>
			<p class="online-app-finish__subtitle fontBodyL">Your Application has been submitted.</p>
			<?php /*<p><a href="<?=$report_data->url;?>" target="_blank">Download PDF-report</a></p>*/?>
			<div class="online-app-finish__cards">
				<div class="online-app-finish__card">
					<img src="/v2/my-application/img/message-icon.png" alt="icon" class="online-app-finish__icon">
					<p class="online-app-finish__card-content fontBodyS">One of our agents will be reaching out to you shortly if any additional information is required.</p>
				</div>
				<div class="online-app-finish__card">
					<img src="/v2/my-application/img/phone-icon.png" alt="icon" class="online-app-finish__icon">
					<p class="online-app-finish__card-content fontBodyS">If you have any questions, our friendly agents are always happy to help. They can be reached at <a href="tel:8884070714">888-407-0714</a></p>
				</div>
			</div>

			<div class="online-app-finish__note quote-s">Thank you for your business, we look forward to serving you!</div>
		</section>
	</div>
</div>

<style id="sa_custom_css" type="text/css">
	#shopper_approved {z-index: 2147483647; font: 14px arial, sans-serif !important; color: black !important; display: none; position: absolute; width: 100%; bottom: 0;}
	#shopper_approved * {font-family: Poppins, arial, sans-serif !important;}
	#shopper_approved img {width: inherit !important; height: inherit !important; }
	#shopper_background {position: fixed !important; left: 0 !important; top: 0 !important; width: 100% !important; height: 100% !important; z-index: 32765 !important; background-color: rgba(117, 117, 117, 0.45) !important; display: none; opacity: 1 !important; filter: alpha(opacity=40) !important; }
	#shopper_approved #sa_outer {position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 94%; max-width: 700px !important; min-height: 395px; background: #FFFFFF; box-shadow: 10px 20px 80px rgba(117, 117, 117, 0.2); border-radius: 4px; padding: 38px 40px !important; margin: 0;}
	#shopper_approved #sa_rounded {background-color: white !important; padding: 0 !important; border: 0 none !important; -moz-box-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important; -moz-border-radius: 0 !important; -webkit-border-radius: 0 !important; -khtml-border-radius: 0 !important; border-radius: 0 !important;}
	#shopper_approved #sa_rounded * {position: relative;}
	#shopper_approved #sa_header {border: 0 !important; text-align: center !important; padding: 0 !important; vertical-align: middle !important; font-style: normal !important; font-size: 14px !important; position: relative; }
	#shopper_approved #sa_close { border: 0 !important; display: block !important; float: right !important; margin: -11px 0 0 0 !important; cursor: pointer;}
	#shopper_approved #sa_ratings { text-align: center !important; padding: 0 30px !important; position: relative; }
	#shopper_approved #sa_thankyou { text-align: center !important; padding: 0 30px !important; position: relative; }
	#shopper_approved #sa_thankyou_no_email { text-align: center !important; padding: 0 30px !important; position: relative; }
	#shopper_approved .sa_ratingBox {padding: 0 !important; font-family: Poppins, arial, sans-serif !important; font-size: 24px !important; color: #282B29 !important; width: 100%; max-width: 470px; margin: 0 auto 32px; font-weight: bold !important; line-height: 32px !important; text-align: center;}
	#shopper_approved select.sa_value { width: 200px !important; margin-top: 7px !important; }
	div#Overall_stars {display: flex; flex-flow: row nowrap; justify-content: space-between; width: 100%; max-width: 364px; margin: 24px auto 0 !important;}
	.sa_star { cursor: pointer; background: url(/v2/my-application/img/sprite-stars.svg) no-repeat center top !important; width: 72px !important; height: 60px !important; display: inline-block; }
	.sa_activestar { background-position: center bottom !important; }
	#shopper_approved select, #shopper_approved input, #shopper_approved textarea { font-size: 16px !important; }
	#sa_comments { padding: 20px 0 !important; display: none; font: 16px arial, sans-serif !important; }
	#shopper_approved .sa_comments { z-index: 2147483648; }
	#sa_lowrating { padding: 20px 0 !important; display: none; font: 16px arial, sans-serif !important; color: red !important; }
	#sa_lowrating a { font: 16px arial, sans-serif !important; color: blue !important; cursor: pointer; }
	#shopper_approved textarea { border: 1px solid #bbb !important; color: gray; padding: 2px; width: 100% !important; }
	.sa_heading { border: 1px solid #bbb !important; color: gray; padding: 2px; width: 100% !important; margin-bottom: 20px; }
	#sa_optin { padding: 0 !important; display: none; font: 16px arial, sans-serif !important; color: black !important; }
	#sa_optin input[type="text"] { border: 1px solid #bbb !important; width: 300px !important; color: black !important; float: right; margin-right: 50px; }
	#shopper_approved input[type="radio"] { float: none !important; opacity: 1 !important; }
	#sa_optin .sa_optin { padding: 10px 0 !important; }
	#sa_last_chance { display: none; font-size: smaller !important; color: red !important; padding: 0 0 6px 0 !important; }
	#shopper_submit, #disabled_submit {border: inherit !important; background-color: #339E75 !important; text-indent: 0; color: #fff !important; background-image: none !important; width: auto !important; height: auto !important; text-transform: uppercase; border-radius: 4px !important;	padding: 10px 20px !important; margin-left: auto !important; margin-right: auto !important; margin-bottom: 20px; display: block;}
	#shopper_submit.custom { padding: inherit !important; text-indent: 0px; width: 170px !important; height: 40px !important; color: white !important; background-image: none !important; background-color: #04599c !important; -moz-border-radius: 7px; -webkit-border-radius: 7px; -khtml-border-radius: 7px; border-radius: 7px; font-size: 20px; border: 0 !important; }
	#shopper_approved #sa_footer_img {float: none !important; display: block !important; width: auto !important; margin: auto; padding: 10px 40px; border: 1px solid #E4E4E4; border-radius: 4px;}
	#shopper_approved .sa_feature { font-size: 11px; color: gray; position: static; }
	#sa_safeemail { }
	#sa_safe { font-weight: bold; }
	.sa_thankyou_text { padding-top: 6px; }
	.sa_message { color: red; }
	#sa_header_img { max-width: 300px; display: block; margin-bottom: 0 !important; }
	#sa_header_text {display: block; flex: 1 1 100%; margin: 40px 0 15px; color: #339E75; text-transform: uppercase;}
	#sa_header_img.sa_blockimage { display: block; }
	.sa_bottom_br { padding-bottom: 15px; }
	.sa_bin label:nth-of-type(2) { margin-left: 15px; }
	@media (max-width: 600px) {
		#sa_optin input[type="text"] { margin-right: 0 !important; }
	}
	@media (max-width: 540px) {
		#sa_optin input[type="text"] { margin-right: 0 !important; width: 200px !important; }
	}
	@media (max-width: 500px) {
		#shopper_approved #sa_outer { margin: 0 !important; padding: 30px 15px !important; }
		#shopper_approved #sa_ratings {padding: 0 !important;}
	}
	@media (max-width: 450px) {
		#sa_header_img { max-width: 200px; }
	}
	#sa_feature { font-size: 11px; visibility: hidden; }
	.product_desc { font-size: 16px; }
	#ProductComments { font: 16px arial, sans-serif !important; }
	#sa_optin input[type="text"] { width: 360px !important; }
	@media (max-width: 450px) {
		#sa_optin input[type="text"] { display: block !important; width: 100% !important; float: none; margin-bottom: 10px; }
	}
	#shopper_approved img { vertical-align: middle; }
</style>
<script type="text/javascript">
	var sa_values = {site: 12271, token: "dea92"};
	function saLoadScript(b){
		var a = window.document.createElement("script"); a.src = b; a.type = "text/javascript"; document.getElementsByTagName("head")[0].appendChild(a)
	}
	var d = new Date;
	1477399567E3 < d.getTime() - 1728E5 ? saLoadScript("//www.shopperapproved.com/thankyou/rate/12271.js") : saLoadScript("//direct.shopperapproved.com/thankyou/rate/12271.js?d\x3d" + d.getTime());
</script>

