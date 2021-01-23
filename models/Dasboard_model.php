<?php
Class Dasboard_model extends CI_Model
{
	
 
 function home_result_list($limit,$status='0'){
	 echo "in";
	 exit;
	$result_open=$this->lang->line('open');
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	  
		
	if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where('savsoft_users.email',$search);
		 $this->db->or_where('savsoft_users.first_name',$search);
		 $this->db->or_where('savsoft_users.last_name',$search);
		 $this->db->or_where('savsoft_users.contact_no',$search);
		 $this->db->or_where('savsoft_result.rid',$search);
		 $this->db->or_where('savsoft_quiz.quiz_name',$search);
 
	 }
		else
		{
		$this->db->where('savsoft_result.result_status !=',$result_open);
		}
		if($logged_in['su']=='0'){
		$this->db->where('savsoft_result.uid',$uid);
		}

		if($status !='0'){
		$this->db->where('savsoft_result.result_status',$status);
		}
		

		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('rid','desc');
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();

 }
 
function home_quiz_list(){
	 $this->db->order_by('quid','desc');
	$query=$this->db->get('savsoft_quiz');	
	return $query->result_array();	 
 }
 function home_get_result($rid){
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
		if($logged_in['su']=='0'){
			$this->db->where('savsoft_result.uid',$uid);
		}
		$this->db->where('savsoft_result.rid',$rid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->row_array();
	 
	 
 }
 function home_last_ten_result($quid,$uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 function home_get_all_result($uid){
	  
		$this->db->order_by('rid','asc');
	 	$this->db->where('savsoft_result.uid',$uid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 
 function jobupdate_skill(){
	 
	//echo "rrr"; exit;
	 //$this->db->query('select * from company_skill');
	$skill_field=$this->db->list_fields('company_skill'); 
	
	return $skill_field;
	
	
	 
 }
 
 
  function jobupdate_insert($data){
	  
	$skills=$data['skill_each'];
	
	$county= count($skills); 
	
	$comp=$data['company_name'];
	
	$skilp=$data['skill'];
	
	
	
	for($i=1;$i<=$county;$i++){
		
		//$datp=array(implode(",",$i));
		$datp.="'1'".",";
	}
	
	$ss=rtrim($datp,',');
	//echo $ss; exit;
	  
	//echo "insert into company_skill(company_name,$skilp) values ('$comp',$ss)"; exit;
	  
	 $queryrs=$this->db->query("select * from company_skill where company_name='$comp' ");
	 
	$vcount=$queryrs->num_rows();  
	 

		  
	 	  
	  $query=$this->db->query('insert into info_jobupdates(company_name,designation,technology,job_required,type,experience,location,interview_timing,mobile_number,posted_date,website_name,website_url,sal1,sal2,openings,exp_yr1,exp_yr2,venue,hr_email,comments,end_date) values ("'.$data['company_name'].'","'.$data['designation'].'","'.$data['technology'].'","'.$data['skill'].'","'.$data['company_type'].'","'.$data['experience'].'","'.$data['location'].'","'.$data['interview_on'].'","'.$data['contactno'].'","'.$data['posted_on'].'","'.$data['posted_by'].'","'.$data['website_url'].'","'.$data['sal1'].'","'.$data['sal2'].'","'.$data['openings'].'","'.$data['exp1'].'","'.$data['exp2'].'","'.$data['venue'].'","'.$data['hremail'].'","'.$data['comments'].'","'.$data['end_date'].'")');
	  
	
	
	
	  $querys=$this->db->query("insert into company_skill(company_name,$skilp) values ('$comp',$ss)");
	
	
	
	
	if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	  
	  
  }
 
  function newskill_insert($datam){
	   
	  	$skillnew=$datam['newskill']; 
		
		
	   $existskill=$datam['existskill']; 
		
		if (!in_array($skillnew, $existskill)){
			
			
		$querys=$this->db->query("ALTER TABLE company_skill ADD COLUMN `$skillnew` varchar(200) NOT NULL");
		
		}
		
		else{
			echo "already exist";
		}
		
	
   }
   
   
 
  function newtech_insert($datam) {
	   
	   	$technew=$datam['newtech'];
		

		$querys=$this->db->query("Insert into new_technology (`newtech`) values ('$technew')");
		
		
		   if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	
   }  
   
   
  
   
   
   //jothi
   
    function get_user_max_mark()
 {
	  	  $query=$this->db->query('SELECT max(percentage_obtained) as max_per FROM savsoft_result');
   
	  return $query->result_array();	
 }
 
 
 
   
 function get_user_active_test_taken()
 {
	
	 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where result_status!="Open"'); 
		  
		  //need quid or not
   
	return $query->num_rows();		   
 }
 
 
 
 
   function get_user_num_pass()
 {
 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where result_status="Pass" ');
   
	return $query->num_rows();	
 }  
 
 function get_user_num_fail()
 {
 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where result_status="Fail" ');
   
	return $query->num_rows();	
 }
   
   
   function get_user_active_test_attempt()
 {
	
	 	  $query=$this->db->query('SELECT * FROM savsoft_result');
   
	return $query->num_rows();		   
 }
   
   
   
   
   function groupwise()
 {
	
	 	  $query=$this->db->query("select `gid`,count(`result_status`) as maxcount from savsoft_result where result_status='Pass' group by `gid` order by maxcount DESC limit 3;");
   
          $res=   $query->result_array();	

      $first_gid=$res[0][gid];
      $second_gid=$res[1][gid];
       $third_gid=$res[2][gid];

	 
	   
	   


	 	  $querys=$this->db->query("select group_name as fg_name from savsoft_group where gid='$first_gid'");
          $rest= $querys->result_array();
          $first_grp= $rest[0][fg_name]; 

         $querysd=$this->db->query("select group_name as fg_name from savsoft_group where gid='$second_gid'");
          $restd= $querysd->result_array();
          $second_grp= $restd[0][fg_name]; 

		  
  $querysdp=$this->db->query("select group_name as fg_name from savsoft_group where gid='$third_gid'");
          $restdp= $querysdp->result_array();
          $third_grp= $restdp[0][fg_name]; 

		 
  
	    $queryq=$this->db->query("SELECT * FROM savsoft_result where gid='$first_gid'");
     	$first_gid_count = $queryq->num_rows();	
	
	    $queryq=$this->db->query("SELECT * FROM savsoft_result where gid='$second_gid'");
     	$second_gid_count = $queryq->num_rows();	
	
	   $queryqu=$this->db->query("SELECT * FROM savsoft_result where gid='$third_gid'");
     	$third_gid_count = $queryqu->num_rows();	
	
	

return array(
    'res' => $res,
    'first_grp' => $first_grp,
    'second_grp' => $second_grp,
    'third_grp' => $third_grp,
    'f_gid_count' => $first_gid_count,
    's_gid_count' => $second_gid_count,
    't_gid_count' => $third_gid_count
);		 
   
//	return $res;	
	//return $first_grp;	
	//return $second_grp;	
	//return $third_grp;	

	
 }
   
   function newcompany_insert($company_name,$new_name){
	  



	  
	   $this->db->query("insert into company_names (`company_name`,`logo`) values ('$company_name','$new_name')");
	   
	   if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	   
   }
   function newcompany_update($company_name,$new_name,$whredit){
	  



	  
	   $this->db->query("update company_names set company_name='$company_name',logo='$new_name' where id='$whredit'");
	   
	   if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	   
   }   
   
   function newcompany_update_logo($company_name,$whredit){
	  



	  
	   $this->db->query("update company_names set company_name='$company_name' where id='$whredit'");
	   
	   if ($this->db->affected_rows() > 0) {
return true;
}
else
{
return false;
}
	   
   }
   
function mkiytf(){
	$query=$this->db->query("select distinct(company_name),id from company_names order by id desc");
	return $query->result_array();
	
	
	
}

function techno(){
	$query=$this->db->query("select distinct(newtech) from new_technology order by newtech ASC");
	return $query->result_array();
	
	
	
}
   
   function joblist(){
	   
	   $query=$this->db->query("select * from info_jobupdates");
	   return $query->result_array();
	   
	   
   }
  
  function job_loc(){
	   
	    $query=$this->db->query("select * from job_locations");
	    return $query->result_array();
	   
   } 

function company_view()
{
$query=$this->db->query("select * from company_names order by id desc");
	    return $query->result_array();
}
function get_company($whr)
{
$query=$this->db->query("select * from company_names where id='$whr'");
	    return $query->row_array();	
}

function designation_view()
{
$query=$this->db->query("select * from designation order by sno desc");
	    return $query->result_array();
}	
   
}