<?php
Class Profile_model extends CI_Model
{
function updateprofile($datas)
{
	$uid = $this->session->userdata('uid');
	
	
	
	
	 $pro_ref_name=$datas['pro_ref_name'];
	 $pro_ref_desig=$datas['pro_ref_desig'];
	 $pro_ref_phn=$datas['pro_ref_phn'];
	 $pro_certification=$datas['pro_certification'];
	 $pro_cert_name=$datas['pro_cert_name'];
	 $pro_job_pref1=$datas['pro_job_pref1'];
	 $pro_job_pref2=$datas['pro_job_pref2'];
	 $pro_job_pref3=$datas['pro_job_pref3'];
	
	 $resume_name=$datas['resume_name'];
	
if($resume_name=="")
	
	{
		$pro_job_pref3=$datas['old_resume'];
	}

	//echo "update savsoft_users set first_name='$name', email='$email',reg_no='$domain',contact_no='$mobile',img='$new_name' where uid='$uid'"; exit;
	
 $this->db->query("update savsoft_users set pro_ref_name='$pro_ref_name',pro_ref_desig='$pro_ref_desig',pro_ref_phn='$pro_ref_phn',pro_certification='$pro_certification',pro_cert_name='$pro_cert_name',pro_job_pref1='$pro_job_pref1',pro_job_pref2='$pro_job_pref2',pro_job_pref3='$pro_job_pref3',profile_update=1 where uid='$uid'");
 if($this->db->affected_rows()>0)
 {
	 return true;
 }
 else
 {
	 return false;
 }
}

function updateprofile_image($new_name){
	$uid = $this->session->userdata('uid');

	$this->db->query("update savsoft_users set img='$new_name' where uid='$uid' ");
	 if($this->db->affected_rows()>0)
 {
	 return true;
 }
 else
 {
	 return false;
 }
	
}

function changepsd($data){
	$psd=md5($data['oldpsd']);
	$newpsd=md5($data['newpsd']);
	$uid=$this->session->userdata('uid');
	
	$ss=$this->db->query("select * from savsoft_users where uid='$uid' and password='$psd' ");
	
	if($ss->num_rows()== 1){
		
		$this->db->query("update savsoft_users set password='$newpsd' where uid='$uid' ");
		echo "success";
	}
	
	else{
		
		return false;
		
	}
	
}



}

?>