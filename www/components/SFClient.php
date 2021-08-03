<?php

namespace app\components;

use yii\base\Component;

class SFClient extends Component{
	private static $instance = null;
	/**
	 * @return SFCLient
	 */
	private $instance_url = null;
	private $login_data = null;
	public $token = null;
	public $grant_type = null;
	public $client_id = null;
	public $client_secret = null;
	public $username = null;
	public $password = null;
	public $lastRequest = null;
	public $faultstring = null;
	
	public static function getInstance(){
		if(null === self::$instance){
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	
	public function __clone(){
	}
	
	public function __construct($config = []){
		
		parent::__construct($config);
		$ch = curl_init();
		
		$this->login_data = [
			
			'grant_type'    => $this->grant_type,
			'client_id'     => $this->client_id,
			'client_secret' => $this->client_secret,
			'username'      => $this->username,
			'password'      => $this->password,
		
		];
		
		$http_params = http_build_query($this->login_data);
		
		curl_setopt($ch, CURLOPT_URL, 'https://login.salesforce.com/services/oauth2/token');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $http_params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$login = curl_exec($ch);
		
		$login = explode("\n", $login);
		$login = json_decode($login[count($login) - 1]);
		if($login->error){
			return $login;
		}
		$this->token        = $login->access_token;
		$this->instance_url = $login->instance_url;
		curl_close($ch);
		
	}
	
	public function create_lead(array $fields){
		$url = "$this->instance_url/services/data/v39.0/sobjects/Lead/";
		
		$content = json_encode($fields);
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				"Authorization: Bearer $this->token",
				// "Sforce-Auto-Assign: FALSE",
				"Content-type: application/json"
			));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		
		$json_response = curl_exec($curl);
		
		$status   = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$response = json_decode($json_response, true);
		if($status != 201){
			return $response;
			// die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}
		
		curl_close($curl);
		
		$id = $response["id"];
		
		return $response;
	}
	
	function update_lead($id, array $fields){
		$url = "$this->instance_url/services/data/v20.0/sobjects/Lead/$id";
		
		$content = json_encode($fields);
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				"Authorization: OAuth $this->token",
				"Content-type: application/json"
			));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $response;
	}
	
	function search_lead($email, $name, $search_type = 'full'){
		
		$name = str_replace(' ', '+', $name);
		
		if($search_type == 'email'){
			$url = "$this->instance_url/services/data/v29.0/queryAll/?q=SELECT+Id+FROM+Lead+WHERE+Email+=+'$email'+AND+isDeleted+=+FALSE";
		}else{
			$url = "$this->instance_url/services/data/v29.0/queryAll/?q=SELECT+Id+FROM+Lead+WHERE+Email+=+'$email'+AND+Name+LIKE+'%25$name%25'+AND+isDeleted+=+FALSE";
		}
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $this->token"));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $response;
	}
	
	function get_field($lead_id, $field = null){
		
		if(null == $field){
			return false;
		}
		$url = "$this->instance_url/services/data/v40.0/queryAll/?q=SELECT+".$field."+FROM+Lead+WHERE+Id+=+'$lead_id'";
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $this->token"));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $response;
	}
	
	/**
	 * Upload file by Lead ID record.
	 *
	 * @param string $subject_id Id of Lead record.
	 * @param string $full_file_path Local path of the file which should be uploaded.
	 * @param string $file_name File name which will be displayed in lead record.
	 * @param string $text Description of the file.
	 *
	 * @return array                  feed_id- id of created feed; file_id - id of attached file.
	 */
	public function upload_file_to_lead($subject_id, $full_file_path, $file_name, $text){
		
		if(!file_exists($full_file_path)){
			return false;
		}
		
		$url = 'https://na40.salesforce.com/services/data/v35.0/chatter/feed-elements';
		
		$file_content = file_get_contents($full_file_path);
		$headers      = array();
		$headers[]    = "Authorization: Bearer $this->token";
		$headers[]    = 'Content-Type: multipart/form-data; boundary=a7V4kRcFA8E79pivMuV2tukQ85cmNKeoEgJgq';
		
		$post_text = "--a7V4kRcFA8E79pivMuV2tukQ85cmNKeoEgJgq
        Content-Disposition: form-data; name=\"json\"\nContent-Type: application/json; charset=UTF-8\n".'

        {
            "body":{
                    "messageSegments":[
                                        {
                                            "type":"Text",
                                            "text":"'.$text.'"
                                        }
                                    ]
                    },
            "capabilities":{
                            "content":{
                            "description":"'.$text.'",
                            "title":"'.$file_name.'"
                            }
            },
            "feedElementType":"FeedItem",
            "subjectId":"'.$subject_id.'"
        }'."\n--a7V4kRcFA8E79pivMuV2tukQ85cmNKeoEgJgq\nContent-Disposition: form-data; name=\"feedElementFileUpload\"; filename=\"$file_name\"\nContent-Type: application/octet-stream; charset=ISO-8859-1\n\n".$file_content."\n\n--a7V4kRcFA8E79pivMuV2tukQ85cmNKeoEgJgq--";
		$curl      = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post_text);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		$response_json = curl_exec($curl);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		//print_r($info);
		
		$result = json_decode($response_json, true);
		if($status != 201){
			return $result;
		}
		
		return [
			'feed_id' => $result['id'],
			'file_id' => $result['capabilities']['content']['id']
		];
		
		
	}
	
	/**
	 * Delete feed by id.
	 * Return 204(success) or 404(file doesn't exists) status.
	 *
	 * @param string $file_id File id.
	 *
	 * @return string          Response status.
	 */
	public function delete_feed($feed_id){
		$url = "$this->instance_url/services/data/v35.0/chatter/feed-elements/$feed_id";
		
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $this->token"));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $json_response;
		
	}
	
	/**
	 * Delete file by ID.
	 * Return 204(success) or 404(file doesn't exists) status.
	 *
	 * @param string $file_id File id.
	 *
	 * @return string          Response status.
	 */
	public function delete_file($file_id){
		$url = "$this->instance_url/services/data/v35.0/chatter/files/$file_id";
		
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $this->token"));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $status;
		
	}
	
	/**
	 * Delete Lead by id.
	 * Return 204(success) or 404(file doesn't exists) status.
	 *
	 * @param string $lead_id Lead ID.
	 *
	 * @return string          Response status.
	 */
	public function delete_lead($lead_id){
		
		$url = "$this->instance_url/services/data/v20.0/sobjects/Lead/$lead_id";
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $this->token"));
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json_response = curl_exec($curl);
		$response      = json_decode($json_response, true);
		$status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		
		return $status;
		
	}
	
	/**
	 * Preparing incoming customer data before this will send to SF.
	 * Return prepared data - array.
	 *
	 * @param array          Customer data
	 *
	 * @return mixed          Prepared data.
	 */
	public function prepare_data($customer_data = null){
		
		if(is_array($customer_data) && count($customer_data)){
			
			if(!array_key_exists('height', $customer_data)){
				
				if(array_key_exists('h_foot', $customer_data) && array_key_exists('h_inch', $customer_data)){
					
					$customer_data['height'] = $customer_data['h_foot'].' '.$customer_data['h_inch'];
				}
				
			}else{
				
				$customer_data['height'] = preg_replace('/|/', ' ', $customer_data['height']);
				
			}
			
			if(array_key_exists('payment', $customer_data)){
				
				$customer_data['bank-name']           = $customer_data['payment']['bank-name'];
				$customer_data['bank-account-number'] = $customer_data['payment']['bank-account-number'];
				$customer_data['routing-number']      = $customer_data['payment']['routing-number'];
			}
			
			if(array_key_exists('birthday', $customer_data)){
				
				$birthday                  = explode('/', $customer_data['birthday']);
				$customer_data['birthday'] = $birthday[2].'-'.$birthday[1].'-'.$birthday[0];
				
			}elseif(array_key_exists('birth_date', $customer_data)){
				
				$customer_data['birthday'] = $customer_data['birth_date'];
				
			}
			
			if(array_key_exists('sex', $customer_data)){
				
				$customer_data['sex'] = ($customer_data['sex'] == 'm') ? 'Male' : 'Female';
			}
			if(array_key_exists('tobaco', $customer_data)){
				
				$customer_data['tobaco'] = ($customer_data['tobaco'] == '1') ? 'Yes' : 'No';
			}
			if(array_key_exists('birth_country', $customer_data)){
				
				$customer_data['birth_country'] = substr($customer_data['birth_country'], 0, 20);
			}
			
			//$customer_data[ 'company' ] = 'Sagicor Life Insurance Company';
			//$customer_data[ 'carrier' ] = 'Sagicor';
			//$customer_data[ 'product_name' ] = 'Sage Term';
			$customer_data['company'] = isset($customer_data['company_name']) ? $customer_data['company_name'] : '-No company-';
			$customer_data['carrier'] = isset($customer_data['company_code']) ? ucwords($customer_data['company_code']) : '-No carrier-';
			if(!isset($customer_data['product_name'])){
				$customer_data['product_name'] = '-No product-';
			}
			
			if(array_key_exists('monthly_premium', $customer_data)){
				$customer_data['monthly_premium'] = preg_replace('/,/', '', $customer_data['monthly_premium']);
			}
			
			if(array_key_exists('premium_amount', $customer_data)){
				
				$customer_data['premium_amount'] = preg_replace('/,/', '', $customer_data['premium_amount']);
			}
			if(array_key_exists('state-province', $customer_data)){
				
				$customer_data['state-province'] = $customer_data['state'];
			}
			
			if(array_key_exists('coverage_amount', $customer_data)){
				$customer_data['avg_amount'] = $customer_data['coverage_amount'].'000';
			}else{
				$customer_data['avg_amount'] *= 1000;
			}
			
			$customer_data['household_income'] = preg_replace('/,/', '', $customer_data['household_income']);
			$temp_data                         = [];
			
			
			$available_data = [
				'first_name'            => 'FirstName',
				'last_name'             => 'LastName',
				// middle_name
				// '' => 'Company',
				'height'                => 'Height__c',
				'email'                 => 'Email',
				'state'                 => 'State__c',
				'state-province'        => 'State',
				'tobaco'                => 'Tobacco_Use__c',
				'weight'                => 'Weight__c',
				// '' => 'GCLID__c',
				'rate_class'            => 'Rate_Class__c',
				'avg_amount'            => 'Coverage_Amount__c',
				'sex'                   => 'Gender__c',
				'birthday'              => 'Date_of_Birth__c',
				'phone_number'          => 'Phone',
				'monthly_premium'       => 'Monthly_Premium__c',
				'premium_amount'        => 'Premium_Amount__c',
				'product_name'          => 'Product_Name__c',
				// '' => 'Lead_Score__c'             ,
				'carrier'               => 'Carrier__c',
				'company'               => 'Company',
				// '' => 'Rate_Class__c'             ,
				'term'                  => 'Term_Length__c',
				'street_address'        => 'Street',
				'city'                  => 'City',
				'ssn'                   => 'SSN__c',
				'dln'                   => 'Drivers_License_Number__c',
				'dls'                   => 'Drivers_License_State__c',
				'birth_country'         => 'Birth_Country__c',
				'birth_state'           => 'Birth_State__c',
				// '' => 'Employer__c'               ,
				// '' => 'Annual_Income__c'          ,
				'household_income'      => 'Household_Income__c',
				'occupation'            => 'Occupation__c',
				'zip'                   => 'PostalCode',
				// '' => 'Monthly_Premium__c'        ,
				'completed_application' => 'Completed_Application__c',
				// '' => 'Lead_Score__c'             ,
				'bank-name'             => 'Bank_Name__c',
				'bank-account-number'   => 'Account_Number__c',
				'routing-number'        => 'Routing_Number__c',
				'Updated_Lead_to_App'   => 'Updated_Lead_to_App__c',
			];
			
			
			foreach($customer_data as $key => $value){
				
				if(is_array($value)){
					continue;
				}
				
				if(strlen($value) && array_key_exists($key, $available_data)){
					
					$temp_data[$available_data[$key]] = $value;
					
				}
				
			}
			
			return $temp_data;
			
		}
		
		return false;
	}
}

// $SFClient = SFClient::getInstance();
// echo "<pre>";
// print_r($SFClient->upload_file_to_lead('00Q46000004JrwMEAS', 'd:\pdf-test.pdf', 'pdf-test2.pdf', 'Description of the file.'));
// print_r($SFClient->delete_feed('0D546000008s9Z0CAI'));
// echo "</pre>";
// 0D546000008s8cFCAQ
// rray ( [feed_id] => 0D546000008s9NTCAY [file_id] => 06946000000E9tgAAC )

