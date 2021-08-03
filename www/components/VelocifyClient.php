<?php
namespace app\components;
 
use yii\base\Component;
use Yii;
/**
 * 
 */
class VelocifyClient extends Component
{
	public $url;
	public $error = false;
	public $params = NULL;
	private $errors = [];
	private $result = NULL;


	public function __construct( $config = [] )
	{
		parent::__construct($config);
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

        if( $status_code == 200){

        	if( strstr($result, 'Failure') ){

        		$this->error = true;
        		$this->errors[] = 'The server returned message - ' . $result;

        		return false;
        	}

        	$this->result = $result;
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
}

?>
