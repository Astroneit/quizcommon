<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otpgen extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->library('excel');
	   $this->load->database();
	   $this->load->model("Otp_model");
	   $this->lang->load('basic', $this->config->item('language'));
	  $this->load->library('pagination');
	  $this->load->library('Ajax_pagination');
$this->lang->load('basic', $this->config->item('language'));
        $this->perPage = 3;
/* 		if($this->db->database ==''){
		redirect('install');	
		} */

		
		
	 }

	 
	 
function random_password($chars = 16) {
   $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
 $shuffle=  substr(str_shuffle($letters), 0, $chars);
 
 
 
     function encrypt($string, $key) {

     $result = '';
     
     for($i=0; $i<strlen($string); $i++) {
       $char = substr($string, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)+ord($keychar));
      $result.=$char;
     }

     return base64_encode($result);
     
    }        
    
    $otp_enc=encrypt("$shuffle","port@stu#");
	
	
	
	$this->Otp_model->Insertotp($otp_enc);
   
  
   
}


}
