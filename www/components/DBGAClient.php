<?php
namespace app\components;
 
use yii\base\Component;
use Yii;
/**
 * 
 */
class DBGAClient extends Component
{
	public $url;
	public $api_key;
	public $error = false;
	public $params = NULL;
	private $errors = [];
	private $result = NULL;


	public function __construct( $config = [] )
	{
		parent::__construct($config);

		$this->params = [
			'source_id' => $this->api_key,
		];
	}

	private function send(){

 		$ch = curl_init();

        $http_params = http_build_query($this->params);

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $http_params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result = json_decode( $result );

        if( $status_code == 200 || $status_code == 401 || $status_code == 422){

        	if( property_exists($result, 'error') ){

        		$this->error = true;
        		$this->errors[] = $result->message;

        		curl_close($ch);
        		return false;
        	}

        	$this->result = $result;

        	curl_close($ch);
        	return true;

        }else{

        	$this->error = true;
        	$this->errors = 'The request returned status code - ' . $status_code;

        	curl_close($ch);
        	return false;
        }

        curl_close($ch);

	}

	public function push(){

		$this->check_params();

		if( $this->has_error() ){
			return false;
		}else{

			if( $this->send() ){
				return $this->result;
			}else{
				return false;
			}

		}
	}

	public function has_error(){

		if( $this->error ){
			return true;
		}else{
			return false;
		}

	}

	public function get_error(){

		if( count($this->errors) ){
			return $this->errors;
		}else{
			return ['No errors.'];
		}
	}

	private function check_params(){

		if( count($this->params) ){

			foreach ($this->params as $key => $value) {
				
				if( empty($value) ){

					$this->params[$key] = 'Empty';
				}

			}

			if( $this->has_error() ){
				return false;
			}else{
				return true;
			}

		}else{

			$this->error = true;
			$this->errors[] = 'Please add data.';

			return false;
		}
	}

	public function add_params(array $params ){

		$this->params = $params;
		return true;

	}

	public function get_result(){

		return $this->result;

	}
}


// Test data.
/*$params = [

	"source_id" =>'9d119bab-c348-44fe-8f40-4dc5d80224c6',
	"first_name" =>'Test',
	"last_name" =>'LTest',
	"state" =>'LA',
	"email" =>'test@test.com',
	"phone1" =>'1234567890',
	"gender" =>'male',
	"rate_class" =>'PP',
	"birthdate" =>'1965-07-24',
	"company_name" =>'Sagicor Life Insurance Company',
	"product_name" =>'Sage Term',
	"annual_premium" =>'1111.22',
	"monthly_premium" =>'123.54',
	"tobacco_use" =>'true',
	"coverage" =>'700000',
	"term" =>'20'

];*/

?>
