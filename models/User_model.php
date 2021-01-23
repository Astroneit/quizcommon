<?php
Class User_model extends CI_Model
{
	private $_limit;
    private $_pageNumber;
    private $_offset;
		
 function login($username, $password)
 {
    // $this->load->database();
   
   /* if($password!=$this->config->item('master_password')){
       
   $this -> db -> where('savsoft_users.password', MD5($password));
   } */
   $this -> db -> where('savsoft_users.password', MD5($password));
    $this->db->where('savsoft_users.email', $username);
  //  $this -> db -> where('savsoft_users.verify_code', '1');
   // $this -> db -> join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
   // $this->db->limit(1);
   $query = $this->db->get('savsoft_users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();  
   }
   else
   {
      
     return false;
   }
 }
 
 function login_count_verify($username, $password)
 {
	    $this -> db -> where('savsoft_users.password', MD5($password));
    $this->db->where('savsoft_users.email', $username);
$query = $this->db->get('savsoft_users');
	 return $query -> num_rows();
 }
 
  function admin_login()
 {
   
    $this -> db -> where('uid', '1');
    $query = $this -> db -> get('savsoft_users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }

 function num_users(){
	 
	 $query=$this->db->get('savsoft_users');
		return $query->num_rows();
 }
 
 
 
 function user_list($limit){
	 if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where('savsoft_users.email',$search);		
		 $this->db->or_where('savsoft_users.first_name',$search);
		 $this->db->or_like('savsoft_users.first_name',$search);
		 $this->db->or_where('savsoft_users.last_name',$search);
		 $this->db->or_where('savsoft_users.uid',$search);
		 $this->db->or_where('savsoft_users.contact_no',$search);

	 }
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('savsoft_users.uid','desc');
		 $this->db->where('savsoft_users.su',0);
		  	if($this->session->userdata('gid')!=0)
		{
			$this->db->where('savsoft_users.gid',$this->session->userdata('gid'));
		}
		 $this -> db -> join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
		 $query=$this->db->get('savsoft_users');
		return $query->result_array();
		
	 
 }
 
 
 function group_list(){
	 $this->db->order_by('gid','desc');
	$query=$this->db->get('savsoft_group');
		return $query->result_array();
		 	 
 }
 
 function verify_code($vcode){
	 $this->db->where('verify_code',$vcode);
	$query=$this->db->get('savsoft_users');
		if($query->num_rows()=='1'){
			$user=$query->row_array();
			$uid=$user['uid'];
			$userdata=array(
			'verify_code'=>'0'
			);
			$this->db->where('uid',$uid);
			$this->db->update('savsoft_users',$userdata);
			return true;
		}else{
			
			return false;
		}
		 
	 
 }
 
 
 function insert_user(){
	 
		$userdata=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'contact_no'=>$this->input->post('contact_no'),
		'gid'=>$this->input->post('gid'),
		'subscription_expired'=>strtotime($this->input->post('subscription_expired')),
		'su'=>$this->input->post('su')		
		);
		
		if($this->db->insert('savsoft_users',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
  function insert_user_2(){
	 
		$userdata=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'contact_no'=>$this->input->post('contact_no'),
		'gid'=>$this->input->post('gid'),
		'su'=>'0'		
		);
		//$veri_code=rand('1111','9999');
		$veri_code='0';
		 if($this->config->item('verify_email')){
			$userdata['verify_code']=$veri_code;
		 }
 
		if($this->db->insert('savsoft_users',$userdata)){
			 /* if($this->config->item('verify_email')){
				 // send verification link in email
				 
$verilink=site_url('login/verify/'.$veri_code);
 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('activation_subject');
			$message=$this->config->item('activation_message');;
			
			$message=str_replace('[verilink]',$verilink,$message);
		
			$toemail=$this->input->post('email');
			 
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 print_r($this->email->print_debugger());
			exit;
			}
			 
				 
			 } */
			 
			return true;
		}else{
			
			return false;
		}
	 
 }
 

 
 
 
 
 
 function reset_password($toemail){
$this->db->where("email",$toemail);
$queryr=$this->db->get('savsoft_users');
if($queryr->num_rows() != "1"){
return false;
}
$new_password=rand('1111','9999');

 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('password_subject');
			$message=$this->config->item('password_message');
			
		//	$message=str_replace('[new_password]',$new_password,$message);
		$message="New Password: ".$new_password;

			
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			print_r($this->email->print_debugger());
			
			}
			else
			{
			$user_detail=array(
			'password'=>md5($new_password)
			);
			$this->db->where('email', $toemail);
 			$this->db->update('savsoft_users',$user_detail);
			return true;
			}

}



 function update_user($uid){
	 $logged_in=$this->session->userdata('logged_in');

		$userdata=array(
		  'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'reg_no'=>$this->input->post('reg_no'),
		'dept'=>$this->input->post('department'),
		'contact_no'=>$this->input->post('contact_no')	
		);
		if($logged_in['su']=='1'){
			$userdata['email']=$this->input->post('email');
			$userdata['gid']=$this->input->post('gid');
			if($this->input->post('subscription_expired') !='0'){
			$userdata['subscription_expired']=strtotime($this->input->post('subscription_expired'));
			}else{
			$userdata['subscription_expired']='0';	
			}
			$userdata['su']=$this->input->post('su');
			}
			
		if($this->input->post('password')!=""){
			$userdata['password']=md5($this->input->post('password'));
		}
		 $this->db->where('uid',$uid);
		if($this->db->update('savsoft_users',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 function update_group($gid){
	 
		$userdata=array();
		if($this->input->post('group_name')){
		$userdata['group_name']=$this->input->post('group_name');
		}
		if($this->input->post('price')){
		$userdata['price']=$this->input->post('price');
		}
		if($this->input->post('valid_day')){
		$userdata['valid_for_days']=$this->input->post('valid_day');
		}
		 $this->db->where('gid',$gid);
		if($this->db->update('savsoft_group',$userdata)){
			return true;
		}
		else
		{
			
			return false;
		}
	 
 }
 
 
 function remove_user($uid){
	 
	 $this->db->where('uid',$uid);
	 if($this->db->delete('savsoft_users')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 function remove_group($gid){
	 
	 $this->db->where('gid',$gid);
	 if($this->db->delete('savsoft_group')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 
 function get_user($uid){
	// echo $uid;
$this->db->where('savsoft_users.uid',$uid);
$this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
$query=$this->db->get('savsoft_users');

//$fff=$query->row_array();

			//  echo "dd"; print_r($fff);exit;
   if($query->num_rows()== 1)
   {
	 
	 return $query->row_array();
   }
   else
   {
	   return false;
   }
	 
 }
 
 
 
 function insert_group(){
	 
	 	$userdata=array(
		'group_name'=>$this->input->post('group_name'),
		'price'=>$this->input->post('price'),
		'valid_for_days'=>$this->input->post('valid_for_days'),
			);
		
		if($this->db->insert('savsoft_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
  function insert_skills(){
	 
	 	$userdata=array(
		'skill_id'=>$this->input->post('tech_type'),
		'sub_skill_name'=>$this->input->post('skills'),
		'category_id'=>$this->input->post('cid')
		
			);
		
		if($this->db->insert('savsoft_skills',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 function get_expiry($gid){
	 
	$this->db->where('gid',$gid);
	$query=$this->db->get('savsoft_group');
	 $gr=$query->row_array();
	 if($gr['valid_for_days']!='0'){
	$nod=$gr['valid_for_days'];
	 return date('Y-m-d',(time()+($nod*24*60*60)));
	 }else{
		 return date('Y-m-d',(time()+(10*365*24*60*60))); 
	 }
 }
 
 
  function get_ieee_desc()
  {
     $db1 = $this->load->database('serverdb',TRUE);
	 $query= $db1->get('ieee_projects');
	 return $query->result_array();
	 
  }
  
  function get_ieee_j_desc()
  {
     $db1 = $this->load->database('serverdb',TRUE);
	 $query= $db1->get('job_updates');
	 return $query->result_array();
	 
  }
 
 function project_req()
 {
     $db = $this->load->database('default',TRUE);
     $userdata=array(
'uid'=>$this->session->userdata('uid'),
'project_id'=>$this->input->post('project_id'),
'project_title'=>$this->input->post('project_title'),
'project_platform'=>$this->input->post('project_platform'),
'project_domain'=>$this->input->post('project_domain')
);
    
     $query3= $db->insert('project_request',$userdata); 
  } 

 function project_req1($pro_id,$uid)
 {
 
$this->db->select('*');
$this->db->where('project_request.uid',$uid);
$this->db->where('project_request.project_id',$pro_id);
$this->db->from('project_request');
$query=$this->db->get();
return $query->num_rows();

  }

function job_updates()
{
	
	$query=$this->db->query('select * from info_jobupdates');
	
	return $query->result_array();
	
	
}

function level_list()
{

	$query=$this->db->query('select * from student_level');
	
	return $query->result_array();	
}

function get_skills()
{
	$query=$this->db->query('select * from skill_config');
	
	return $query->result_array();	
}

function events()
{
 $todays = date('d-M-y');  
 $newdates = date('d-M-y', strtotime('-20 days', strtotime($todays))); 

   
	//$ent = $this->db->query("select * from events where deadline between '$todays' and '$newdates' ");
	
	$ent = $this->db->query("select * from events ");
	return $ent->result_array();
}
function courses_list()
{
	
	$ent = $this->db->query("select * from course_table where start_date >=now() ");
	return $ent->result_array();
}

function is_available($data)
{

	$val=$this->db->query("select * from info_jobupdates where sno='$data' ");
	return $val->result_array();
	 
} 

function compjob_is_available($data)
{
	
	
	$val=$this->db->query("select * from info_jobupdates where company_name='$data' ");
	return $val->result_array();
	 
} 


 function education_table_select($data)
{
	
	
	$edu=$this->db->query("select * from educational_updates where sno='$data' ");
	return $edu->result_array();
	
} 


function latest_education_updates()
{
	$ss=$this->db->query("select * from info_jobupdates order by sno desc limit 0,5");
	return $ss->result_array();
	
	
}


function excel_insert($data)
{
		
		//$this->db->query('insert into info_jobupdates values('$data')');
		$this->db->insert_batch('info_jobupdates', $data);
		
}

/*	public function getAllEmployeeCount() {
        $this->db->from('info_jobupdates');
        return $this->db->count_all_results();
    }
	*/
		public function getAllEmployeeCount() {
		  $this->db->where('active_status','0');
  $this->db->where('website_name','AICL');
        $this->db->from('info_jobupdates');
        return $this->db->count_all_results();
    }
	
	public function setLimit($limit) {
        $this->_limit = $limit;
    }

public function setPageNumber($pageNumber) {
        $this->_pageNumber = $pageNumber;
    }
   
public function setOffset($offset) {
        $this->_offset = $offset;
    }

	
	
	
	
function count_msg()
{
	$query=$this->db->query('select * from msg where receiver="'.$this->session->userdata('uid').'"');	

return $query->num_rows();
}	
	
	
public function employeeList($perpage, $url) {   
$ss= $this->session->userdata('interest'); 
 $sm=$this->session->userdata('admin_su');
/* if($sm==1)
{
	
	$mm=$this->db->query("select * from info_jobupdates order by sno desc limit 0,20");
	
}
else{
 $mh=explode(",",$ss);
 
foreach($mh as $ses){
    //echo $ses;
    
    $whr .='technology="'.$ses.'" or ';
}

 $whr1=substr($whr, 0 , -3); 



$mm=$this->db->query("select * from info_jobupdates where $whr1 order by sno desc "); 
      
} */

 $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
 
 if($url!=0)
 {
 $fromm=($url - 1) * $perpage;
 }
 else {
	 $fromm=$url  * $perpage;
 }


  $this->db->limit($perpage,$fromm);
  $this->db->order_by('sno','desc');
  $this->db->where('active_status','0');
  $this->db->where('website_name','AICL');
  $this->db->from('info_jobupdates');
        $query=$this->db->get();
        return $query->result_array();
		



    }
    
    
public function employeeList1()

{
	$mm=$this->db->query("select * from info_jobupdates where  website_name!='AICL' order by sno desc limit 0,20");
       $ress =$mm->result_array();
return $ress;
}

public function my_jobs()
{
$current_user=$this->session->userdata('uid');
	$mm=$this->db->query("SELECT a.*,b.*,c.*,d.* FROM `job_application` a,`savsoft_users` b,`info_jobupdates` c,`company_names` d   WHERE a.job_id=c.sno and a.user_id=b.uid and d.company_name=c.company_name and a.user_id='$current_user'");
       $ress =$mm->result_array();
return $ress;
	
}

public function apply_job($whr)

{
	$current_user=$this->session->userdata('uid');
	$this->db->query("insert into job_application (job_id,user_id) values ('$whr','$current_user')");

}
	
public function check_apply_status($key)

{
$current_user=$this->session->userdata('uid');
 $this->db->where('job_application.job_id',$key);
 $this->db->where('job_application.user_id',$current_user);
	$query=$this->db->get('job_application');
		return $query->num_rows();
}	
	
	function loca_data($val)
 {
     $sss=$this->db->query("SELECT distinct(technology) FROM info_jobupdates where technology like '".$val."%' ");
     return $sss->result_array();
 }
function select_location_track()
{
    
    $val=$this->db->query("select GROUP_CONCAT(location) as loc from info_jobupdates");
     $mm= $val->row_array();
$tt=$mm['loc'];
$srt=implode(',',array_unique(explode(',', $tt)));
$ww=explode(',',$srt);
return $ww;


}
function company_types()
    {
        
        $yui=$this->db->query("select distinct(experience) from info_jobupdates");
        return $yui->result_array();
        
    }
 function show_more()
	{
		
		$val=$this->db->query('select * from info_jobupdates');
		return $val->result_array();
		
	}
	
	
	public function getAllEmployeeCounts() {
        $this->db->from('info_jobupdates');
        return $this->db->count_all_results();
    }
	
	public function setPageNumbers($pageNumber) {
        $this->_pageNumber = $pageNumber;
    }
	public function setOffsets($offset) {
        $this->_offset = $offset;
    }
	
	public function employeeLists() {       
        $this->db->select(array('sno', 'company_name', 'job_required', 'location', 'experience'));
        $this->db->from('info_jobupdates');          
        $this->db->limit($this->_pageNumber, $this->_offset);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
function event_details($data)
{
	
	$ses=$this->db->query("select * from events where id='$data'");
	return $ses->result_array();
	
	
} 

function get_video_java()
{
	$video=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='JAVA' AND day='Day 1'");
	return $video->result_array();
}
function get_video_android()
{
	$video=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='Android' AND day='Day 1'");
	return $video->result_array();
}


function get_video_php()
{
	$video=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='PHP' AND day='Day 1'");
	return $video->result_array();
}

function get_video_python()
{
	$video=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='PYTHON' AND day='Day 1'");
	return $video->result_array();
}
function get_video_iot()
{
	$video=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='IOT' AND day='Day 1'");
	return $video->result_array();
}

function get_ajax_url($keyday,$keysub)
{
	
		$url=$this->db->query("SELECT url,title FROM vdo_lnk WHERE subject='$keysub' AND day='$keyday' ");
	return $url->result_array();
}
function educational_update()
{
	$url=$this->db->query("SELECT * FROM educational_updates");
	return $url->result_array();
}
function key_filter($data)
{
    
    $val=$this->db->query("select * from info_jobupdates where technology='".$data['keyword']."' and location='".$data['location']."' and experience='".$data['types']."'");
    
    return $val->result_array();
    
} 

function subscribe_list($ss)

{
	$mm=$this->session->userdata('uid');
$sqll=$this->db->query("select * from savsoft_users where uid='$mm' ");
return $sqll->result_array();
}

function insert_sub()
{
	
	$ff=$this->session->userdata('email_sub');
	
	$this->db->query("insert into subscribe (email) values ('$ff')");
	
}
function profile()
{
		$userid = $this->session->userdata('uid');
		$query = $this->db->query("select * from savsoft_users where uid = '$userid'"); 
	    return $query->result_array();
}

function company_list()
{
	
	//	$query = $this->db->query("select DISTINCT(b.company_name) from company_names as a inner join info_jobupdates as b on a.company_name=b.company_name order by b.sno DESC limit 0,8"); 
	$query = $this->db->query("select DISTINCT(b.company_name),(select count(sno) from info_jobupdates where company_name=b.company_name) as counts from company_names as a inner join info_jobupdates as b on a.company_name=b.company_name order by counts DESC limit 0,8"); 
	    return $query->result_array();
}

function company_list_old()
{
	
		//$query = $this->db->query("select DISTINCT(b.company_name) from company_names as a inner join info_jobupdates as b on a.company_name=b.company_name order by b.sno DESC limit 8,16");
		
		$query = $this->db->query("select DISTINCT(b.company_name),(select count(sno) from info_jobupdates where company_name=b.company_name) as counts from company_names as a inner join info_jobupdates as b on a.company_name=b.company_name order by counts DESC limit 8,16"); 
	    return $query->result_array();
}



function company_job_list($comp_typed)
{
	
		$query = $this->db->query("select * from info_jobupdates where company_name='$comp_typed'"); 
	    return $query->result_array();
}




function company_job_list_open($comp_nams)
{
	
		$query = $this->db->query("select sum(`openings`) as open from info_jobupdates where company_name='$comp_nams'"); 
	    return $query->result_array();
}
 function activate_account($key)
 {
     //echo $key;exit;
      $this->db->where('savsoft_users.otp_token',$key);
	$query=$this->db->get('savsoft_users');
		if($query->num_rows()=='1'){
     
     $userdata=array(
			'verify_code'=>'1'
			);
			$this->db->where('otp_token',$key);
			$this->db->update('savsoft_users',$userdata);
				return true;
		}
		
		else
		{
		    
		     return false;
		}
 }
 
  public function check_apply_course_status($key)

{
$current_user=$this->session->userdata('uid');
 $this->db->where('course_application.course_id',$key);
 $this->db->where('course_application.user_id',$current_user);
	$query=$this->db->get('course_application');
		return $query->num_rows();
}	

public function apply_course($whr)

{
	$current_user=$this->session->userdata('uid');
	$this->db->query("insert into course_application (course_id,user_id) values ('$whr','$current_user')");

}
public function company_logo($whr)
{	
$query = $this->db->query("select logo from `company_names` where company_name='$whr'");
  return $query->result_array();
}
public function applied_jobs()
{
	$current_user=$this->session->userdata('uid');
	$mm=$this->db->query("SELECT a.job_id,a.user_id,b.company_name,c.first_name,c.email,c.contact_no,c.pro_job_pref3,a.applied_date  from job_application a, info_jobupdates b, savsoft_users c WHERE a.job_id=b.sno and a.user_id=c.uid and c.su!=1 order by a.sno DESC");
       $ress =$mm->result_array();
return $ress;
	
}
	public function new_openings() {   

	$this->db->order_by('sno','desc');
	$this->db->where('active_status','0');
	$this->db->where('DATE(posted_date) BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE()');
	$this->db->where('website_name','AICL');
	$this->db->from('info_jobupdates');
	$query=$this->db->get(); 
	return $query->num_rows();

    }
		public function total_jobs() {   

	$this->db->order_by('sno','desc');
	$this->db->where('active_status','0');
	$this->db->where('website_name','AICL');
	$this->db->from('info_jobupdates');
	$query=$this->db->get(); 
	return $query->num_rows();

    }
    function userslist()
{
    
    $query=$this->db->query("select a.*,b.* from savsoft_users a,savsoft_group b where a.gid=b.gid order by a.uid desc");
	    return $query->result_array();
    
}
}
?>