<?php
Class Learning_model extends CI_Model
{
 

 
  function selectvideo($courseid){
	  
	$sry=$this->db->query("select * from video where course_id='$courseid' order by alignment ASC");
	return $sry->result_array();
	 
	 
  }
 
  
  function selectfirstvideo($courseid){
	  
	$sry=$this->db->query("select * from video where course_id='$courseid' order by alignment ASC ");
	return $sry->result_array();
	 
	 
  }
   
   
   function  takevideo($keyworda){
	  
	$sry=$this->db->query("select * from video where id='$keyworda' ");
	return $sry->row_array();
	 
	 
  }
  
  
  
  function insert_course($coursedata){
       //print_r($coursedata); exit;
	$ziant=$this->db->insert('course',$coursedata);
	if($ziant){
		redirect('learning/insert_course');
	}

}
  
  
     function  viewcourse(){
	  
	$sry=$this->db->query("select * from course ");
	return $sry->result_array();
	 
	 
  }
  
  
     function  edit_course($editid){
	  
	$sry=$this->db->query("select * from course where id='$editid' ");
	return $sry->row_array();
	 
	 
  }
  
     
  
  
  
  
      function  edit_course_det($coursedata,$eid){
	  
	  $course_name=$coursedata['course_name'];
	  $description=$coursedata['description'];
	  $amount=$coursedata['amount'];
	  $duration=$coursedata['duration'];
	  
	  
	$sry=$this->db->query("update course set course_name='$course_name',description='$description',amount='$amount',duration='$duration' where id='$eid' ");
	
	
	if($sry){
	return 1;	
	}
	 
	 
  }
 

 
 
  function  del_course($delid){
	  
	  
	  
	$sry=$this->db->query("delete from course where id='$delid' ");
	
	
	if($sry){
		return 1;
	}
	
	 
	 
  }
 
 
 
 function takeques($cuid){
		$sry=$this->db->query("select * from video where course_id='$cuid' ");
	return $sry->result_array();
	  
 }
 
 
 
 
 function insert_quiz($uids,$cuid){
	 
	 
	
		$sry=$this->db->query("select * from savsoft_users where uid='$uids' ");
	    $user= $sry->row_array(); 
	
	     $gid=$user['gid']; 
	 
	 
	   $srys=$this->db->query("select * from course where id='$cuid' ");
	    $course= $srys->row_array();
	 
	 $quizname=$course['course_name']; 
	 $desc=$course['course_name']; 
	 
	 
	 $starts=date('Y-m-d H:i:s');
	 $start=strtotime($starts);
     
	 
	 
	
	
	 $ends=date('Y-m-d 23:59:00');  
	 $end=strtotime($ends);
	
	

	
	 $rto=$this->db->query("insert into savsoft_quiz (`quiz_name`,`course_id`,`description`,`start_date`,`end_date`,`gids`,`question_selection`,`correct_score`,`incorrect_score`,`camera_req`,`gen_certificate`,`uid`) values ('$quizname','$cuid','$desc','$start','$end','$gid','0','1','0','0','1','$uids')");
	 
	 
   $insert_id = $this->db->insert_id();
	 
	 
	 return $insert_id;
	 
	 
 }
 
 
 
 function takecids($yy){
	 	$sry=$this->db->query("select * from savsoft_qbank where qid='$yy' ");
	return $sry->row_array();
 }

 
}
?>