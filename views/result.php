<?php 
//echo $this->session->userdata('ssss');

//$fp = fopen("file.txt", "r");


$qwe=$this->session->userdata('ssss');
$url1="https://1783b728.compilers.sphere-engine.com/api/v4/submissions/$qwe/output?access_token=f08237ca9f84a36c09f2b57ec362b07f";
?>

<?php
                  $url = $url1;
                  $crl = curl_init();
                   
                  curl_setopt($crl, CURLOPT_URL, $url);
                  curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
                  curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($crl);
                 
              
                  curl_close($crl);
				  
	$update_output_url="https://1783b728.compilers.sphere-engine.com/api/v4/submissions/$qwe/output?access_token=f08237ca9f84a36c09f2b57ec362b07f";
				  
 $url1 = "https://1783b728.compilers.sphere-engine.com/api/v4/submissions/$qwe/cmpinfo?access_token=f08237ca9f84a36c09f2b57ec362b07f";
 if($response!='{"message":"Submission resource not found","data":[],"error_code":1101}')
	 { 
 print_r($response);
 	 $sql ="update compiling_details set output='$response',output_url='$update_output_url',error_url='$url1' where compile_id='".$this->session->userdata('compileid')."'";
$query = $this->db->query($sql);
	 }

                  $crl1 = curl_init();
                   
                  curl_setopt($crl1, CURLOPT_URL, $url1);
                  curl_setopt($crl1, CURLOPT_FRESH_CONNECT, true);
                  curl_setopt($crl1, CURLOPT_RETURNTRANSFER, true);
                  $response1 = curl_exec($crl1);
                   
           
                  curl_close($crl1);
				   if($response1!='{"message":"Submission resource not found","data":[],"error_code":1101}')
	 {
		// print_r($response1);
				$sql1 ="update compiling_details set error='$response1',output_url='$update_output_url',error_url='$url1' where compile_id='".$this->session->userdata('compileid')."'";
$query1 = $this->db->query($sql1);	   
	 }
				  
?>