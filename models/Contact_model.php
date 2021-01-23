<?php
Class Contact_model extends CI_Model
{
	
	
public function insert_contact($data){
	
	$name=$data['name'];
	$mobile=$data['mobile'];
	$subject=$data['subject'];
	$message=$data['message'];
	
	
	
	$this->db->query("Insert into contact_enquiry (`name`,`mobile`,`subject`,`message`) values ('$name','$mobile','$subject','$message')");
	
	 if($this->db->affected_rows()>0)
 {
	 return true;
 }
 else
 {
	 return false;
 }
		
	
	
}
	
	
	}
	
	?>