<?php
namespace app\components;

/**
* 
*/
class Soap
{
	public function sendDecision($request=false)
	{
		$status = false;
		$errors = ['false'];

        if(!empty($request->xmlcontent)){

	        libxml_use_internal_errors( true );
	        
	        $doc = new \DOMDocument('1.0', 'utf-8');
	         
	        $doc->loadXML($request->xmlcontent);
	         
	        $errors = libxml_get_errors();
        }else{
        	$errors = 'XMLContent is empty';
        }
        
        if(!count($errors)){
        	$status = true;
        }

        $result = 
    	[
    		'status' => $status,
    		'errors' => json_encode($errors),
        ];
        return $result;
	}
}