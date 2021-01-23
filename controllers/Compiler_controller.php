<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compiler_controller extends CI_Controller {

function index()
{
	echo "in";
	exit;
	$this->load->view('spherephp.php');
}

public function compiler_ajax(){
	 
	 
	 $data = array(
        'input' => $this->input->post('keyinput'),
        'code'=>$this->input->post('keycode'));
		
	use SphereEngine\Api\CompilersClientV4;
use SphereEngine\Api\SphereEngineResponseException;
	
	require_once APPPATH.'vendor/autoload.php';


/* 
	$accessToken = 'f08237ca9f84a36c09f2b57ec362b07f';
$endpoint = '1783b728.compilers.sphere-engine.com';




$client = new CompilersClientV4($accessToken, $endpoint);

// API usage
$source = '#include <iostream>

int main() 
{
    std::cout << " welcome infoziant!";
    return 0;
}';
$compiler = 1; // C++ language
$input = '2017';

try {
	$response = $client->createSubmission($source, $compiler, $input);
	
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


 // print_r($response);


echo  $ress=trim($response['id']);
 */


		
 }



}