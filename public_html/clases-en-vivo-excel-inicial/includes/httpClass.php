<?php 
class httpClass{
	
	public function sendHttpRequest($data,$webHookUrl)
	{
		$data_string = json_encode($data);
        	$ch=curl_init($webHookUrl);
    
        	curl_setopt_array($ch, array(
            	CURLOPT_POST => true,
            	CURLOPT_POSTFIELDS => $data_string,
            	CURLOPT_HEADER => true,
            	CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string))));
    
        	$result = curl_exec($ch);
        	curl_close($ch);
	}
	
}
?>