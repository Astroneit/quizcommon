<?php

class Otp_model extends CI_Model
{

public function Insertotp($otp_enc)
{
$query=$this->db->query('update savsoft_users set ');

	if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}


}







}