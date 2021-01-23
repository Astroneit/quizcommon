<?php
class Excel_import_model extends CI_Model
{
	function select_students()
	{
		//$this->db->order_by('id', 'ASC');
		$query = $this->db->get('students');
		return $query;
		
	}

	function insert($data)
	{
		$this->db->insert_batch('students', $data);
	}
}
