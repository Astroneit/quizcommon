<?php

class Insert_model extends CI_Model
{

public function inserting($data)
{
$query=$this->db->query('insert into savsoft_users(email,password,contact_no,first_name,dept,otp_status,otp_token,degree,gid) values ("'.$data['email'].'","'.$data['password'].'","'.$data['contact_no'].'","'.$data['username'].'","'.$data['dept'].'","1","'.$data['otp_token'].'","'.$data['degree'].'","21" )');

	if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}


}


public function Insertotp($otp_enc,$data){
	
	$email=$data['email'];
	
	$query=$this->db->query("update savsoft_users set otp_token='$otp_enc' where email='$email'");
	
	if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}

	
}


public function check($datas)
{
	
	$ss=$this->db->query('select * from savsoft_users where email="'.$datas['email'].'" and password="'.$datas['password'].'" ');
	
$count= $ss->num_rows();
	
	return $count;
		
}

public function get_information($username)
	{
	
	$query = $this->db->query('select * from savsoft_users where email="'.$username.'"');
	return $query->result_array();
	}
	

	
 function is_email_available($email)  
      {  
	$query=$this->db->query("select * from savsoft_users where email='$email'");
            // echo "select * from add_college where college_name='$email'";
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
	   
                return false;  
           }  
      }	
	













}