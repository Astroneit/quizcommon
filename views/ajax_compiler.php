<?php


use SphereEngine\Api\CompilersClientV4;
use SphereEngine\Api\SphereEngineResponseException;

require_once('vendor/autoload.php');

$accessToken = 'f08237ca9f84a36c09f2b57ec362b07f';
$endpoint = '1783b728.compilers.sphere-engine.com';



$client = new CompilersClientV4($accessToken, $endpoint);

$source = '#include <iostream>

int main() 
{
    std::cout << " welcome infoziant!";
    return 0;
}';
$compiler = 1; 
$input = '2017';

try {
	$response = $client->createSubmission($source, $compiler, $input);
	

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


  echo $ress=trim($response['id']);
/* $_SESSION['resp']=$ress;
$client1 = new CompilersClientV4($accessToken, $endpoint);

// API usage
try {
	$response1 = $client1->getSubmission($ress);
	 //echo $response1['id'];
	 print_r($response1);
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
 */


?>