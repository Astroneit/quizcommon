<?php

class Forgetpass_model extends CI_Model
{



public function forget_pass($data)
{
	
	$email=$data['email'];
	
	
	
	$ss=$this->db->query("select * from savsoft_users where email='$email'  ");
	
$count= $ss->num_rows();
	
	//return $count;
if($count==1){
	
	return true;
	
}else{
	
	return false;
}	
	
	
		
}


public function insert_forget_pass($shuff_enc,$data){
	
	$email=$data['email'];
	
	$this->db->query("update savsoft_users set forgetpass_token='$shuff_enc' where email='$email'");
	
	
	
}


public function istoken($token){
	
	$ss=$this->db->query("select * from savsoft_users where forgetpass_token='$token'");
	
	$count= $ss->num_rows();
	
	//return $count;
if($count==1){
	
	return true;
	
}else{
	
	return false;
}	
	
	
}




public function reset_new_pass($data,$token){
	
	$password=$data['password'];
	//$confirm_pass=$data['confirm_pass'];
	
	$enc_pass=md5($password);
	
	$this->db->query("update savsoft_users set password='$enc_pass',forgetpass_token='' where forgetpass_token='$token'");
	
		if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	
}



}

?>