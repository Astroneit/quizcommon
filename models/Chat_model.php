<?php

Class Chat_model extends CI_Model
{
	
	
	
	
	function getmsg_count()
	{
		
		$query=$this->db->query('select * from msg where receiver="'.$this->session->userdata('uid').'"');	

return $query->num_rows();
	
	}	
	
	function getmsg_all()
	{
		
	
			
$query=$this->db->query('select * from msg order by time ASC');
  return $query->result_array();
	
	}
	function insert_msg($keywordint)
	{
		

	
	$query=$this->db->query('insert into msg(sender,message,receiver) values ("'.$this->session->userdata('uid').'","'.$keywordint.'","admin")');



	if ($this->db->affected_rows() > 0) {
return true;
}
	
	
	
	
	
	}
	
}
?>