<?php
namespace app\components;
 
use yii\base\Component;

/**
 * 
 */
class IEIClient extends Component
{
	private $errors 		= [];
	private $ping_id 		= NULL;
	private $buyers 		= NULL;
	public $placement_id 	= NULL;
	public $result 			= NULL;
	public $api_token 		= NULL;
	public $version 		= NULL;
	public $url 			= NULL;
	public $error 			= false;
	public $params 			= NULL;


	public function __construct()
	{

	}

	private function send( $request_type ){

		if( $request_type == '' ) return false;

 		$ch = curl_init();

        $json_data = json_encode($this->params);
        curl_setopt($ch, CURLOPT_URL, $this->url[ $request_type ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [                                                                          
            	'Content-Type: application/json',                                                                                
        	]                                                                       
        ); 

        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if( $status_code == 200){

        	$this->error  = false;
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

	private function parse_response(){

		$this->result = json_decode($this->result);

		if( is_object($this->result) ){

			if( property_exists( $this->result, 'error') ){

				$this->error = true;
        		$this->errors = $this->result->error;
        		return false;

			}else{

				if( property_exists( $this->result, 'ping_id') ){

					$this->ping_id = $this->result->ping_id;

				}

				if( property_exists( $this->result, 'buyers') ){

					if( is_array( $this->result->buyers ) ){

						$this->buyers = $this->result->buyers;

					}

				}

				return true;

			}

		}

		return false;

	}

	public function get_buyers()
	{
		if( !is_null( $this->buyers ) ){

			return $this->buyers;

		}else{

			return NULL;

		}
		
	}


	public function get_ping_id()
	{
		if( !is_null( $this->ping_id ) ){

			return $this->ping_id;

		}else{

			return NULL;

		}

	}

	public function push( $request_type = 'ping' ){

		$this->check_params( $this->params );

		if( $this->has_error() ){

			return false;

		}else{

			if( $this->send( $request_type ) ){

	        	$parsed = $this->parse_response();
	        	return $parsed;

			}else{
				return false;
			}

		}
	}

	public function ping_request(){

		return $this->push();

	}

	public function post_request(){

		return $this->push( 'post' );

	}

	public function has_error(){

		if( $this->error ){
			return true;
		}else{
			return false;
		}

	}

	public function get_error(){

		if( count( $this->errors ) ){
			return $this->errors;
		}else{
			return 'No errors.';
		}
	}

	private function check_params( $params = NULL ){

		if( count($params) ){

			foreach( $params as $key => $value ) {
				
				if( is_array($value) ){

					$this->check_params( $value );

				}else{

					if( !strlen($value) ){

						$this->errors[] = 'The "'.$key.'" is empty.';
						$this->error = true;
					}
					
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

	public function add_params( array $params ){

		$this->params = $params;
		$this->params['placement_id'] = $this->placement_id;
		$this->params['version']      = $this->version;
		$this->params['api_token']    = $this->api_token;

		return true;

	}
	public function get_result(){
		return $this->result;
	}
}

?>
