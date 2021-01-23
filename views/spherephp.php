<?php
$input_value=$this->input->post('keyinput');
$source_code=$this->input->post('keycode');
$select_lang=$this->input->post('select_lang');
$quiz_idd=$this->input->post('quiz_id');
use SphereEngine\Api\CompilersClientV4;
use SphereEngine\Api\SphereEngineResponseException;

// require library
require_once APPPATH.'vendor/autoload.php';


// define access parameters
$accessToken = 'f08237ca9f84a36c09f2b57ec362b07f';
$endpoint = '1783b728.compilers.sphere-engine.com';

$client = new CompilersClientV4($accessToken, $endpoint);

// API usage
$source = "$source_code";
$compiler = $select_lang; // C++ language
$input = $input_value;

try {
   
	$response = $client->createSubmission($source, $compiler, $input);
	//print_r($response);
	//exit;
	// response['id'] stores the ID of the created submission
} catch (SphereEngineResponseException $e) {
	if ($e->getCode() == 401) {
		echo 'Invalid access token';
	} elseif ($e->getCode() == 402) {
	    echo 'Unable to create submission';
	} elseif ($e->getCode() == 400) {
	    echo 'Error code: '.$e->getErrorCode().', details available in the message: ' . $e->getMessage();
	}
}




  $ress=trim($response['id']);

 $client1 = new CompilersClientV4($accessToken, $endpoint);

// API usage
try {
	$response1 = $client1->getSubmission($ress);

	// echo $response1['compiler']['name'];
$sql ="insert into compiling_details(user_id,compile_id,source,language,quiz_id,result_id) values('".$this->session->userdata('uid')."','".$response1['id']."','$source','".$response1['compiler']['name']."','$quiz_idd','".$this->session->userdata('compiler_rowid')."')";

$query = $this->db->query($sql);
$this->session->set_userdata('compileid',$response1['id']);

	// print_r($response1);
} catch (SphereEngineResponseException $e) {
	if ($e->getCode() == 401) {
		echo 'Invalid access token';
	} elseif ($e->getCode() == 403) {
	    echo 'Access to the submission is forbidden';
	} elseif ($e->getCode() == 404) {
    	echo 'Submission does not exist';
    }
}

$vall=$response1['id']; 

$this->session->set_userdata('ssss',$vall);
 return $response1;

?>