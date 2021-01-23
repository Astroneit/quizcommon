<?php
Class Result_model extends CI_Model
{
	
	function home_result_list($limit,$status='0'){
	
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
		if($this->session->userdata('gid')!=0)
		{
			$this->db->where('savsoft_result.gid',$this->session->userdata('gid'));
		} 
			
	$this->db->where('savsoft_result.percentage_obtained >',50);
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('rid','desc');
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();

 }
 function home_result_list1($limit,$status='0'){
	
	$result_open=$this->lang->line('open');
	$logged_in=$this->session->userdata('logged_in');
	echo $uid=$logged_in['uid']; echo "model"; exit;
	  
		
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
		$this->db->order_by('rid','asc');
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();

 }
 
 function result_list($limit,$status='0'){
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
		
if($this->session->userdata('gid')!=0)
		{
			// $this->db->where('savsoft_result.gid',$this->session->userdata('gid'));
		} 
		
		if($this->session->userdata('subject_code')!="")
		{
			$sub_cod=$this->session->userdata('subject_code');
				$this->db->where('savsoft_result.subject_code',$sub_cod);
		} 
		
	//	$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('rid','desc');
		$this->db->group_by(array("savsoft_result.subject_code", "savsoft_result.uid"));  
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();

 }
 
 function quiz_list(){
	 $this->db->order_by('quid','asc');
	$query=$this->db->get('savsoft_quiz');	
	return $query->result_array();	 
 }
 

  function quiz_cat(){
	 $this->db->order_by('cid','asc');
	$query=$this->db->get('savsoft_category');	
	return $query->result_array();	 
 }
 
 function remove_result($rid){
	 
	 $this->db->where('savsoft_result.rid',$rid);
	 if($this->db->delete('savsoft_result')){
		  $this->db->where('rid',$rid);
		  $this->db->delete('savsoft_answers');

           $this->db->query("delete from compiling_details where result_id='$rid'");  //jothi
                  
		 return true;
	 }else{
		 
		 return false; 
	 }
	 	 
 }
 
 
 function generate_report($quid,$gid,$qcat){
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	$date1=$this->input->post('date1');
	 $date2=$this->input->post('date2');
		
		if($quid != '0'){
			$this->db->where('savsoft_result.quid',$quid);
		}
		if($gid != '0'){
			$this->db->where('savsoft_users.gid',$gid);
		}if($qcat != '0'){
			
			$this->db->where('savsoft_result.'.$qcat.' >=',0);
		
/* 		if($qcat=="Prepositions")
		{
			$this->db->where('savsoft_result.Prepositions >=',0);
			}
			if($qcat=="Apptitude")
		{
			$this->db->where('savsoft_result.Apptitude >=',0);
			}
			if($qcat=="Logical")
		{
			$this->db->where('savsoft_result.Logical >=',0);
			}
			if($qcat=="English-1")
		{
			$this->db->where('savsoft_result.English-1 >=',0);
			}
			if($qcat=="English-2")
		{
			$this->db->where('savsoft_result.English-2 >=',0);
			} */
		}
	/* 	if($date1 != ''){
			$this->db->where('savsoft_result.start_time >=',strtotime($date1));
		}
		if($date2 != ''){
			$this->db->where('savsoft_result.start_time <=',strtotime($date2));
		} */

	 	$this->db->order_by('rid','desc');
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 
 
  function generate_report_test(){
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	// $this->db->order_by('reg_no','desc');
	 $this->db->order_by('first_name','asc');
   $this->db->where('savsoft_users.gid',20);
// first batch condition
//$this->db->where('verify_code =', '0');
//$this->db->where('created_on >=', '2020-10-09');
//$this->db->where('created_on <=', '2020-10-14');

// second batch condtition
//$this->db->where('verify_code =', '1');

		$query=$this->db->get('savsoft_users');
		return $query->result_array();
 }
 
 function generate_result1($uid,$gid,$quid)
 {
	 $query=$this->db->query("SELECT * from savsoft_result where uid='$uid' and quid='$quid' ");	
	return $query->row_array(); 
	 
 }
 
 function get_result($rid){
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
  function get_result_all(){

//		$this->db->where('savsoft_result.rid',$rid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->row_array(); 
 }
  function test_get_result($uid){
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

 function get_quizresult($rid){
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
 
 function last_ten_result($quid,$uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
  function last_ten_result1($quid,$gid,$qcat){
	  
	  	if($quid != '0'){
			$this->db->where('savsoft_result.quid',$quid);
		}
		if($gid != '0'){
			$this->db->where('savsoft_users.gid',$gid);
		}
		
		if($qcat != '0'){
		
		
			$this->db->where($qcat.' >',0);
			//$this->db->order_by($qcat,'asc');

		}
		
		//$this->db->order_by('rid','asc');
		$this->db->order_by('percentage_obtained','asc');

	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 
  function last_ten_result11($quid,$gid,$qcat){
	  
	  	if($quid != '0'){
			$this->db->where('savsoft_result.quid',$quid);
		}
		
		
		if($qcat != '0'){

			$this->db->where($qcat.' >',0);
		//	$this->db->order_by($qcat,'asc');

		}
		$this->db->where('savsoft_users.gid',$this->session->userdata('gid'));
		//$this->db->order_by('rid','asc');
		$this->db->order_by('percentage_obtained','asc');

	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
  function last_ten_test_result($uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 //	$this->db->where('savsoft_result.uid',$uid);
	 //echo $this->session->userdata('gid');
	// exit;
	 	 	if($this->session->userdata('gid')!=0)
		{
			$this->db->where('savsoft_result.gid',$this->session->userdata('gid'));
		} 
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
   function last_ten_test_result1($uid){
	//	$this->db->order_by('rid','asc');
	//	$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
  function last_ten_test_aptitude($uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
		
		$where = "FIND_IN_SET('Aptitude', savsoft_result.categories)";  

$this->db->where( $where );
		
	 	// $this->db->where("FIND_IN_SET('Apptitude','savsoft_result.uid')");
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 function last_ten_test_english($uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
		$where = "FIND_IN_SET('English-1', savsoft_result.categories)";  

$this->db->where( $where );
		
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
  function last_ten_test_arrays($uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
		$where = "FIND_IN_SET('Arrays', savsoft_result.categories)";  

$this->db->where( $where );
		
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }  
 function last_ten_test_operators($uid){
		$this->db->order_by('rid','asc');
		$this->db->limit(10);		
	 //	$this->db->where('savsoft_result.quid',$quid);
	 	$this->db->where('savsoft_result.uid',$uid);
		$where = "FIND_IN_SET('Operators', savsoft_result.categories)";  

$this->db->where( $where );
		
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
  function get_all_result($uid){
	  
		$this->db->order_by('rid','asc');
	 	$this->db->where('savsoft_result.uid',$uid);
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
 }
 

   function get_percentile($quid,$uid,$score){
	   
	$logged_in =$this->session->userdata('logged_in');
	$gid= $logged_in['gid'];
	$res=array();
	$this->db->where("savsoft_result.quid",$quid);
	$this->db->group_by("savsoft_result.uid");
	$this->db->order_by("savsoft_result.score_obtained",'DESC');
	$query = $this -> db -> get('savsoft_result');
	$res[0]=$query -> num_rows();

	$this->db->where("savsoft_result.quid",$quid);
	$this->db->where("savsoft_result.uid !=",$uid);
	$this->db->where("savsoft_result.score_obtained <=",$score);
	$this->db->group_by("savsoft_result.uid");
	$this->db->order_by("savsoft_result.score_obtained",'DESC');
	$querys = $this -> db -> get('savsoft_result');
	$res[1]=$querys -> num_rows();

	return $res;
   
 }
 
 
   function get_percentile1($quid,$score){
	   
	$logged_in =$this->session->userdata('logged_in');
	$gid= $logged_in['gid'];
	$res=array();
	$this->db->where("savsoft_result.quid",$quid);
	//$this->db->group_by("savsoft_result.uid");
	$this->db->order_by("savsoft_result.score_obtained",'DESC');
	$query = $this -> db -> get('savsoft_result');
	$res[0]=$query -> num_rows();

	$this->db->where("savsoft_result.quid",$quid);
	//$this->db->where("savsoft_result.uid !=",$uid);
	$this->db->where("savsoft_result.score_obtained <=",$score);
//	$this->db->group_by("savsoft_result.uid");
	$this->db->order_by("savsoft_result.score_obtained",'DESC');
	$querys = $this -> db -> get('savsoft_result');
	$res[1]=$querys -> num_rows();

	return $res;
   
 }
 function get_current_quiz($rid)
 {
	 $this->db->select('quid');
	 $this->db->where("savsoft_result.rid",$rid);
 $query = $this->db->get('savsoft_result');	 
   $row  = $query->row();
    return $row->quid;
 } 
 function get_current_quiz_cat($quid)
 {
	 $this->db->select('cids');
	 $this->db->where("savsoft_quiz.quid",$quid);
 $query = $this->db->get('savsoft_quiz');	 
  $row=$query->row();
   return $row->cids;
 }
 
 
 function get_ind_cat($rid,$uid)
 {
	 $this->db->select('category_name,first_name,last_name,cat_id, sum(`score_u`) as cnt', FALSE);
	 $this->db->where("savsoft_answers.rid",$rid);
	 $this->db->group_by("savsoft_answers.cat_id");
	 $this->db->join('savsoft_users','savsoft_users.uid=savsoft_answers.uid');
	 $this->db->join('savsoft_category','savsoft_category.cid=savsoft_answers.cat_id');
	 $query = $this -> db -> get('savsoft_answers');
	 return $query->result_array();
	
	
	/*  $this->db->order_by('rid','desc');
	 $this->db->select('*');
	 $this->db->where("savsoft_result.uid",$uid);
	 
	 $this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
	 $query = $this -> db -> get('savsoft_result');
	 return $query->result_array(); */
	
	// SELECT sum(`score_u`) as cnt,`cat_id` FROM `savsoft_answers` WHERE `rid`='11' and `uid`='7' group by `cat_id`;
 }
  function ex_get_ind_cat($rid,$uid)
 {

	
	 $this->db->order_by('rid','desc');
	 $this->db->select('*');
	 $this->db->where("savsoft_result.uid",$uid);
	 $this->db->where("savsoft_result.rid",$rid);
	 
	 $this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
	 $query = $this -> db -> get('savsoft_result');
	 return $query->result_array();
	
	// SELECT sum(`score_u`) as cnt,`cat_id` FROM `savsoft_answers` WHERE `rid`='11' and `uid`='7' group by `cat_id`;
 }
  function get_ind_cat1($rid)
 {
	 $this->db->select('category_name,first_name,last_name,cat_id, sum(`score_u`) as cnt', FALSE);
	 $this->db->where("savsoft_answers.rid",$rid);
	 $this->db->group_by("savsoft_answers.cat_id");
	 $this->db->join('savsoft_users','savsoft_users.uid=savsoft_answers.uid');
	 $this->db->join('savsoft_category','savsoft_category.cid=savsoft_answers.cat_id');
	 $query = $this -> db -> get('savsoft_answers');
	 return $query->result_array();
	
	// SELECT sum(`score_u`) as cnt,`cat_id` FROM `savsoft_answers` WHERE `rid`='11' and `uid`='7' group by `cat_id`;
 }
  function get_ind_cat_all($uid)
 {
	 $this->db->order_by('rid','desc');
	 $this->db->select('*');
	 $this->db->where("savsoft_result.uid",$uid);
	 
	 $this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
	 $query = $this -> db -> get('savsoft_result');
	 return $query->result_array();
	
	// SELECT sum(`score_u`) as cnt,`cat_id` FROM `savsoft_answers` WHERE `rid`='11' and `uid`='7' group by `cat_id`;
 }
 
  function get_group_cat($rid)
 {
		$this->db->select('result_status,quiz_name, count(case when result_status ="Fail"  then 1 end) as fail_count
		,count(case when result_status ="Pass" then 1 end) as pass_count', FALSE);
		$this->db->group_by("savsoft_result.quid");		
		$this->db->where('savsoft_result.gid',$rid);
		// $this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid'); 
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		$query=$this->db->get('savsoft_result');
		return $query->result_array();
		
/* 		
SELECT `quid`,`gid`,count(case when result_status ='Fail'  then 1 end) as fail_count
     ,count(case when result_status ='Pass' then 1 end) as pass_count FROM `savsoft_result` WHERE `gid`='8' group by `quid`
	 */
	// SELECT sum(`score_u`) as cnt,`cat_id` FROM `savsoft_answers` WHERE `rid`='11' and `uid`='7' group by `cat_id`;
 }
 
 
 
   function get_group_name($rid)
 {
	  $this->db->select('group_name');	
	  $this->db->where('gid',$rid);
	  $query=$this->db->get('savsoft_group');
	 
return $query->row();
 }
 
 
 function get_compiler($rid,$uid)
 {

	  $this->db->select('*');	
	  $this->db->where('user_id',$uid);
	  $this->db->where('quiz_id',$rid);
          $this->db->where('output_url !=','');
	  $query=$this->db->get('compiling_details');
	  return $query->result_array();
 }
 
 function get_user_active_test($gid)
 {
	
	 	  $query=$this->db->query('SELECT FIND_IN_SET("'.$gid.'", `gids`) as ddd FROM `savsoft_quiz`');
           return $query->result_array();	  
 }
  
 function get_user_active_test_taken($gid,$uid)
 {
	
	 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" and result_status!="Open" group by quid');
   
	return $query->num_rows();		   
 }
 
 function get_user_active_test_pending($gid,$uid)
 {
	
	 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" and result_status="Open" ');
   
	return $query->num_rows();		   
 } 
 
 function get_user_active_test_attempt($gid,$uid)
 {
	
	 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" ');
   
	return $query->num_rows();		   
 }
 
 function get_user_max_mark($gid,$uid)
 {
	  	  $query=$this->db->query('SELECT max(percentage_obtained) as max_per FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" ');
   
	  return $query->result_array();	
 }
 
  function get_user_num_pass($gid,$uid)
 {
 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" and result_status="Pass" ');
   
	return $query->num_rows();	
 }  
 
 function get_user_num_fail($gid,$uid)
 {
 	  $query=$this->db->query('SELECT * FROM `savsoft_result` where uid="'.$uid.'" and gid="'.$gid.'" and result_status="Fail" ');
   
	return $query->num_rows();	
 }
 
 function get_compile_details($uid)
 {
	   $query=$this->db->query('SELECT * from compiling_details where user_id="'.$uid.'" and quiz_id="" order by id desc');
   
	  return $query->result_array();	
 }
 
 
 
 
 
  function get_result_overall(){

        
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		
	    $this->db->order_by("savsoft_result.rid", "desc");
		$query=$this->db->get('savsoft_result'); 
		

		
		return $query->result_array(); 
		
		
	
 }

 
   
	   
	   
   function compilerdet($resid){
   $qry=$this->db->query("select * from compiling_details where result_id='$resid'");
  
   


   $res_comp=$qry->result_array();  


    //print_r($res_comp) ;
   return $res_comp;

   }
   
   

  function get_result_overall_single($userid){


		$this->db->where('savsoft_result.uid',$userid);
		$this->db->order_by("savsoft_result.rid", "desc");
		
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		
	
		$query=$this->db->get('savsoft_result'); 
		
		//$res=$query->result_array(); 
		//print_r($res);

	//	$querys=$this->db->query("select * from savsoft_result");
		
		return $query->result_array(); 
		
		
	
 }
 
 
 
   function get_result_groupall($selgrp_id,$selquiz_id){


	$this->db->where('savsoft_result.gid',$selgrp_id);
	
	
	if($selquiz_id!="")
	{
		$this->db->where('savsoft_result.quid',$selquiz_id);
	}
	 	$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		$this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		
		$this->db->order_by("savsoft_result.rid", "desc");
		
	
		$query=$this->db->get('savsoft_result'); 
		
		//$res=$query->result_array(); 
		//print_r($res);

	//	$querys=$this->db->query("select * from savsoft_result");
		
		return $query->result_array(); 
		
		
	
 }


 
    function get_result_quizall($quiz_id){


	$this->db->where('savsoft_result.quid',$quiz_id);
	$this->db->order_by('savsoft_result.percentage_obtained',DESC);
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		 /* $this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');*/
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		 
	
		$query=$this->db->get('savsoft_result'); 
		
		
		
		//$res=$query->result_array(); 
	//	print_r($res);

	//	$querys=$this->db->query("select * from savsoft_result");
		
		return $query->result_array(); 
		
		
	
 }
 
  function quiz_list_single($quiz_id){
	
	$query=$this->db->query("select * from savsoft_quiz where quid='$quiz_id'");	
	return $query->result_array();	 
 }
 
 
 
  function get_result_gw_quizall($group_id){
	
	$query=$this->db->query("SELECT * FROM savsoft_quiz WHERE FIND_IN_SET('$group_id',gids) > 0");	
	return $query->result_array();	 
 }
 

 
 
    function get_result_gw_quizres($group_id,$quiz_id){

	
//	$this->db->where('savsoft_result.quid',$quiz_id);


$array= array ('savsoft_result.quid' => $quiz_id, 'savsoft_result.gid' => $group_id  );     //for multiple where condition
	
	$this->db->where($array);
	
	
	
	$this->db->order_by('savsoft_result.percentage_obtained',DESC);
		$this->db->join('savsoft_users','savsoft_users.uid=savsoft_result.uid');
		 /* $this->db->join('savsoft_group','savsoft_group.gid=savsoft_users.gid');*/
		$this->db->join('savsoft_quiz','savsoft_quiz.quid=savsoft_result.quid');
		 
	
		$query=$this->db->get('savsoft_result'); 
		
		
		
		//$res=$query->result_array(); 
	//	print_r($res);

	//	$querys=$this->db->query("select * from savsoft_result");
		
		return $query->result_array(); 
		
		
	
 }
 
 
 function fake_attempt($res_id)
 {
	 
	           $this->db->where('rid',$res_id);
	 		$query=$this->db->get('savsoft_result'); 
			$res=$query->row_array(); 
			$new_fake=$res['fake_count']+1;
$this->db->query("update savsoft_result set fake_count='$new_fake' where rid='$res_id'");	
	 
			
 }
 
 function get_images_ans($rid)
 {
	 
	 	$query=$this->db->query("SELECT * FROM quiz_image_test where rid='$res_id'");	
	return $query->result_array();
	 
 }
 
 function com_count($res_id)
 {
	 $query=$this->db->query("SELECT * FROM compiling_details where result_id='$res_id'");	
	return $query->num_rows();
 }

 function get_sub_skill_result_skill($rid)
 {
	$query=$this->db->query("SELECT a.sub_skill_id,sum(a.`score_u`) as score,count(a.`qid`) as quescnt,b.sub_skill_name from savsoft_answers a, savsoft_skills b where a.sub_skill_id=b.sub_skill_id and a.rid='$rid' group by a.`cat_id` ");	
	return $query->result_array();

 }
 function get_sub_skill_result($rid)
 {
	$query=$this->db->query("SELECT a.sub_skill_id,sum(a.`score_u`) as score,count(a.`qid`) as quescnt,b.sub_skill_name from savsoft_answers a, savsoft_skills b where a.sub_skill_id=b.sub_skill_id and a.rid='$rid' group by a.`sub_skill_id` ");	
	return $query->result_array();

 }
 function get_skill_result($rid)
 {
	$query=$this->db->query("SELECT a.skill_id,sum(a.`score_u`) as score,count(a.`qid`) as quescnt,GROUP_CONCAT(`qid`) as questions,b.skill_type from savsoft_answers a, skill_config b where a.skill_id=b.sno and a.rid='$rid' group by a.`skill_id` ");	
	return $query->result_array();

 }

 function get_max_time_question($qid,$level)
 {
	$query=$this->db->query("SELECT min_time,max_time from qbank_time_levels where qid='$qid' and student_level='$level'");	
	return $query->row_array();
	

 }
 
 
}








?>