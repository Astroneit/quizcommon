<?php
Class Quiz_model extends CI_Model
{
 
  function quiz_list($limit){
	  
	  $logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='0'){
			$gid=$logged_in['gid'];
			$where="FIND_IN_SET('".$gid."', gids)";  
			 $this->db->where($where);
			}
			
			
	 if($this->input->post('search') && $logged_in['su']=='1'){
		 $search=$this->input->post('search');
		 $this->db->or_where('quid',$search);
		 $this->db->or_like('quiz_name',$search);
		 $this->db->or_like('description',$search);

	 }
	 
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('quid','desc');
		$query=$this->db->get('savsoft_quiz');
		//print_r($query->result_array());exit;
		return $query->result_array();
		
		
	 
 }
 
 function num_quiz(){
	 
	 $query=$this->db->get('savsoft_quiz');
	 return $query->num_rows();
 }
 
 function insert_quiz(){
	 
	 $userdata=array(
	 'quiz_name'=>$this->input->post('quiz_name'),
	 'description'=>$this->input->post('description'),
	 'student_level'=>$this->input->post('student_level'),
	 'start_date'=>strtotime($this->input->post('start_date')),
	 'end_date'=>strtotime($this->input->post('end_date')),
	 'duration'=>$this->input->post('duration'),
	 'maximum_attempts'=>$this->input->post('maximum_attempts'),
	 'pass_percentage'=>$this->input->post('pass_percentage'),
	 'correct_score'=>$this->input->post('correct_score'),
	 'incorrect_score'=>$this->input->post('incorrect_score'),
	 'ip_address'=>$this->input->post('ip_address'),
	 'view_answer'=>$this->input->post('view_answer'),
	 'compiler_status'=>$this->input->post('show_compiler'),
	 'subject_code'=>$this->input->post('subject_code'),
	 'camera_req'=>$this->input->post('camera_req'),
	 'gids'=>implode(',',$this->input->post('gids')),
	 'question_selection'=>$this->input->post('question_selection')
	 );
	 	$userdata['gen_certificate']=$this->input->post('gen_certificate'); 
	 
	 if($this->input->post('certificate_text')){
		$userdata['certificate_text']=$this->input->post('certificate_text'); 
	 }
	
	  if($this->db->insert('savsoft_quiz',$userdata))
	  {
		$quid=$this->db->insert_id();
		$duration=$this->input->post('duration');
		$data=array(
			'quid' =>$quid,
			'duration' =>$this->input->post('duration'),
			'assumed_duration' =>0
		);
		$this->db->insert('savsoft_quiz_qstn_time',$data);
		return $quid;
	  }
	
	 
 }
 
 
 function update_quiz($quid){
	 
	 $userdata=array(
	 'quiz_name'=>$this->input->post('quiz_name'),
	 'description'=>$this->input->post('description'),
	 'start_date'=>strtotime($this->input->post('start_date')),
	 'end_date'=>strtotime($this->input->post('end_date')),
	 'duration'=>$this->input->post('duration'),
	 'maximum_attempts'=>$this->input->post('maximum_attempts'),
	 'pass_percentage'=>$this->input->post('pass_percentage'),
	 'correct_score'=>$this->input->post('correct_score'),
	 'incorrect_score'=>$this->input->post('incorrect_score'),
	 'ip_address'=>$this->input->post('ip_address'),
	 'view_answer'=>$this->input->post('view_answer'),
	 'camera_req'=>$this->input->post('camera_req'),
	 'gids'=>implode(',',$this->input->post('gids'))
	 );
	 
	 $duration=$this->input->post('duration');
	$this->db->query("UPDATE `savsoft_quiz_qstn_time` SET `duration`='$duration' WHERE quid='$quid'");
		$userdata['gen_certificate']=$this->input->post('gen_certificate'); 
	  
	 if($this->input->post('certificate_text')){
		$userdata['certificate_text']=$this->input->post('certificate_text'); 
	 }
 
	  $this->db->where('quid',$quid);
	  $this->db->update('savsoft_quiz',$userdata);
	  
	  $this->db->where('quid',$quid);
	  $query=$this->db->get('savsoft_quiz',$userdata);
	 $quiz=$query->row_array();
	 if($quiz['question_selection']=='1'){
		 
	  $this->db->where('quid',$quid);
	  $this->db->delete('savsoft_qcl');
	 
	 foreach($_POST['cid'] as $ck => $val){
		 if(isset($_POST['noq'][$ck])){
			 if($_POST['noq'][$ck] >= '1'){
		 $userdata=array(
		 'quid'=>$quid,
		 'cid'=>$val,
		 'lid'=>$_POST['lid'][$ck],
		 'noq'=>$_POST['noq'][$ck]
		 );
		 $this->db->insert('savsoft_qcl',$userdata);
		 }
		 }
	 }
		 $userdata=array(
		 'noq'=>array_sum($_POST['noq'])
	);
	 $this->db->where('quid',$quid);
	  $this->db->update('savsoft_quiz',$userdata);
	 }
	return $quid;
	 
 }
 
 function get_questions($qids){
	 if($qids == '')
	 {
		$qids=0; 
	 }
	 else
	 {
		 $qids=$qids;
	 }
/*
	 if($cid!='0'){
		 $this->db->where('savsoft_qbank.cid',$cid);
	 }
	 if($lid!='0'){
		 $this->db->where('savsoft_qbank.lid',$lid);
	 }
*/

	 $query=$this->db->query("select * from savsoft_qbank join savsoft_category on 
	 savsoft_category.cid=savsoft_qbank.cid join savsoft_level on savsoft_level.lid=savsoft_qbank.lid 
	 where savsoft_qbank.qid in ($qids) order by FIELD(savsoft_qbank.qid,$qids) 
	 ");
	 return $query->result_array();
	 
	 
 }
 
 
 function get_options($qids){
	 
	 
	 $query=$this->db->query("select * from savsoft_options where qid in ($qids) order by FIELD(savsoft_options.qid,$qids)");
	 return $query->result_array();
	 
 }
 
 
 
 function up_question($quid,$qid){

  	$this->db->where('quid',$quid);
 	$query=$this->db->get('savsoft_quiz');
 	$result=$query->row_array();
 	$qids=$result['qids'];
 	if($qids==""){
 	$qids=array();
 	}else{
 	$qids=explode(",",$qids);
 	}
 	$qids_new=array();
 	foreach($qids as $k => $qval){
 	if($qval == $qid){

 	$qids_new[$k-1]=$qval;
	$qids_new[$k]=$qids[$k-1];
	
 	}
	else
	{
		
	$qids_new[$k]=$qval;
 	
	}
 	}
 	
 	$qids=array_filter(array_unique($qids_new));
 	$qids=implode(",",$qids);
 	$userdata=array(
 	'qids'=>$qids
 	);
 		$this->db->where('quid',$quid);
	$this->db->update('savsoft_quiz',$userdata);

}



function down_question($quid,$qid){

  	$this->db->where('quid',$quid);
 	$query=$this->db->get('savsoft_quiz');
 	$result=$query->row_array();
 	$qids=$result['qids'];
 	if($qids==""){
 	$qids=array();
 	}else{
 	$qids=explode(",",$qids);
 	}
 	$qids_new=array();
 	foreach($qids as $k => $qval){
 	if($qval == $qid){

 	$qids_new[$k]=$qids[$k+1];
$kk=$k+1;
	$kv=$qval;
 	}else{
	$qids_new[$k]=$qval;
 	
	}

 	}
 	$qids_new[$kk]=$kv;
	
 	$qids=array_filter(array_unique($qids_new));
 	$qids=implode(",",$qids);
 	$userdata=array(
 	'qids'=>$qids
 	);
 	$this->db->where('quid',$quid);
	$this->db->update('savsoft_quiz',$userdata);

}




function get_qcl($quid){
	
	 $this->db->where('quid',$quid);
	 $query=$this->db->get('savsoft_qcl');
	 return $query->result_array();
	
}

 function remove_qid($quid,$qid){
	 
	$this->db->query("DELETE FROM `quiz_question_tracking` WHERE qid='$qid' AND quid='$quid'");
	 $this->db->where('quid',$quid);
	 $query=$this->db->get('savsoft_quiz');
	 $quiz=$query->row_array();
	 $new_qid=array();
	 foreach(explode(',',$quiz['qids']) as $key => $oqid){
		 
		 if($oqid != $qid){
			$new_qid[]=$oqid; 
			 
		 }
		 
	 }
	 $noq=count($new_qid);
	 $userdata=array(
	 'qids'=>implode(',',$new_qid),
	 'noq'=>$noq
	 );
	 $this->db->where('quid',$quid);
	 $this->db->update('savsoft_quiz',$userdata);
	 
	  $whr_quiz_status=0;
	  $userdata1=array(	 
	 'quiz_status'=>$whr_quiz_status	 
	  );
	  $this->db->where('qid',$qid);
	  $this->db->update('savsoft_qbank',$userdata1);
	 //
	 $this->db->where('qid',$qid);
	 $result=$this->db->get('qbank_time_levels');
	 $time_for_questions=$result->result_array();
	 $length=sizeof($time_for_questions);
	$MaxSum=0;
	for($i=0;$i<$length;$i++)
	{
		$MaxTime=$time_for_questions[$i]['max_time'];
		$MaxSum+=$MaxTime;	
	}
	$MaxSumAvg=round($MaxSum/3); 
	$res1=$this->db->query("SELECT assumed_duration FROM `savsoft_quiz_qstn_time` WHERE quid='$quid'");
	$res=$res1->row_array();
	$totalTimeForQuestions=$res['assumed_duration'] - $MaxSumAvg ;
	$this->db->query("UPDATE `savsoft_quiz_qstn_time` SET `assumed_duration`='$totalTimeForQuestions'
		WHERE quid='$quid'");
	 return true;
 }
 
  function add_qid($quid,$qid,$cid,$skillid,$subskillid){
	$quizQuestionTracking=array(
		'quid' =>$quid,
		'qid'  =>$qid,
		'skill_id' =>$skillid,
		'sub_skill_id' =>$subskillid,
		'cat_id' =>$cid
	);
	$this->db->insert('quiz_question_tracking',$quizQuestionTracking);
	 $this->db->where('quid',$quid);
	 $query=$this->db->get('savsoft_quiz');
	 $quiz=$query->row_array();
	 $this->db->where('qid',$qid);
	 $result=$this->db->get('qbank_time_levels');
	 $time_for_questions=$result->result_array();
	$totalSecForQuiz=$quiz['duration'] * 60;
	$length=sizeof($time_for_questions);
	$MaxSum=0;
	for($i=0;$i<$length;$i++)
	{
		$MaxTime=$time_for_questions[$i]['max_time'];
		$MaxSum+=$MaxTime;	
	}
	$MaxSumAvg=round($MaxSum/3); 
	$res1=$this->db->query("SELECT assumed_duration FROM `savsoft_quiz_qstn_time` WHERE quid='$quid'");
	$res=$res1->row_array();
	// $totalTimeForQuestions=0;
	//echo $this->db->last_query().$res['assumed_duration'];  exit;
	 $totalTimeForQuestions=$MaxSumAvg + $res['assumed_duration'];
	 if($totalSecForQuiz < $totalTimeForQuestions)
	{
		//echo 'error'; exit;
		return false; 
	}
	else{
		$result1=$this->db->query("UPDATE `savsoft_quiz_qstn_time` SET `assumed_duration`='$totalTimeForQuestions'
		WHERE quid='$quid'");

	}
	
	


	$new_skill=array();
	$new_skill[]=$skillid;
	foreach(explode(',',$quiz['skill_id']) as $key => $oskill_id){
	
		$new_skill[]=$oskill_id; 		
	
	}
	$new_skill1=$new_skill;

	


	$new_sub_skill=array();
	$new_sub_skill[]=$subskillid;
	foreach(explode(',',$quiz['sub_skill_id']) as $key => $osub_skill_id){
	
		$new_sub_skill[]=$osub_skill_id; 		
	
	} 
	$new_sub_skill1=$new_sub_skill;




	 
	 $new_qid=array();
	 $new_qid[]=$qid;
	 foreach(explode(',',$quiz['qids']) as $key => $oqid){
		 
		 if($oqid != $qid)
		 {
			 
		 $new_qid[]=$oqid; 		
		 
		 }
		 
	 }

	  $new_cid=array();
	 $new_cid[]=$cid;
	 foreach(explode(',',$quiz['cids']) as $key => $cqid){
			 
		 $new_cid[]=$cqid; 		 
		 
	 }
	 
	
	 $new_qid=array_filter(array_unique($new_qid));
	 $new_cid1=$new_cid;

	 $noq=count($new_qid);
	 $userdata=array(
		'sub_skill_id'=>implode(',',$new_sub_skill1),
	 'skill_id'=>implode(',',$new_skill1),
	 'qids'=>implode(',',$new_qid),
	 'cids'=>implode(',',$new_cid1),
	 'noq'=>$noq
	 
	 );
	 $this->db->where('quid',$quid);
	 $this->db->update('savsoft_quiz',$userdata);

/*  one question for one quiz only  start */
	 $whr_quiz_status=1;
	  $userdata1=array(	 
	 'quiz_status'=>$whr_quiz_status	 
	  );
	  $this->db->where('qid',$qid);
	 $this->db->update('savsoft_qbank',$userdata1);
	 
	 
	 
	    $ifexist= $this->db->query("select * from savsoft_quiz_test_category where quid='$quid' and cids='$cid'");
   
    $numexist = $ifexist->num_rows();
   
    $res= $ifexist->result_array();
   
     if($numexist=='0'){
         $this->db->query("insert into savsoft_quiz_test_category (`quid`,`quiz_name`,`qids`,`cids`) values ('$quid','".$quiz['quiz_name']."','$qid','$cid')");
     
     }
     else {
        
         $ques_id=$res[0]['qids'];
        
         $concat=$qid.",".$ques_id;
        
         $this->db->query("update savsoft_quiz_test_category set quiz_name='".$quiz['quiz_name']."',qids='$concat',cids='$cid' where quid='$quid' and cids='$cid'");
     }
	
	 
/*  one question for one quiz only  end */
	 return true;
 }
 

 
 function get_quiz($quid){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('quid',$quid);
	
	 $query=$this->db->get('savsoft_quiz');
	 return $query->row_array();
 
 }  
 
 function get_quiz_category($sss)
 {
	 $cat_list=explode(',',$sss);
	 foreach($cat_list as $cat_li)
	 {
	 $this->db->where('cid',$cat_li);
	
	 $query=$this->db->get('savsoft_category');
	$cat_res=$query->row_array();
	 $cat_res1 .= $cat_res['category_name'].",";
	 }	 
	 return  $cat_res1;
	 
 }
 
 
 function check_quiz($quid,$uid) {
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('quid',$quid);
	 $this->db->where('uid',$uid);
	 $this->db->where('result_status',"Open");
	
	 $query=$this->db->get('savsoft_result');
	 return $query->row_array();
	 
	 
 } 
  function check_quiz1($quid,$uid) {
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('quid',$quid);
	 $this->db->where('uid',$uid);
	 $this->db->where('result_status !=','Open');
	 // $this->db->where('result_status',"Open");
	
	 $query=$this->db->get('savsoft_result');
	 return $query->num_rows();
	 
	 
 } 
 function remove_quiz($quid){
	 
	$this->db->query("DELETE FROM `quiz_question_tracking` WHERE quid='$quid'");
	 $this->db->where('quid',$quid);
	 if($this->db->delete('savsoft_quiz')){
		 $this->db->query("DELETE FROM `savsoft_quiz_qstn_time` WHERE quid='$quid'");
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
  
 
 function count_result($quid,$uid){
	 
		$this->db->where('quid',$quid);
		$this->db->where('uid',$uid);
		$query=$this->db->get('savsoft_result');
		return $query->num_rows();
	 
 }
 
 
 function insert_result($quid,$uid){
	  $gid=$this->session->userdata('gid');
		// get quiz info
		$this->db->where('quid',$quid);
		$query=$this->db->get('savsoft_quiz');
		$quiz=$query->row_array();
	 //echo $quiz['subject_code']; exit;
if($quiz['question_selection']=='0'){

		// get questions	
		$noq=$quiz['noq'];	
	//	$qids=explode(',',$quiz['qids']);

$catwise = $this->db->query("select * from savsoft_quiz_test_category where quid='$quid'");
 
$rest=$catwise->result_array();
 
$qid_cw="";
 
 foreach($rest as $quesid){
    //print_r($quesid['qids']);
    $my_array=explode(",",$quesid['qids']);
   // shuffle($my_array);
    $qq=implode(",",$my_array);
     //$arr[]=$qq;
     $qid_cw.=$qq.",";
         
 }
 
 
$qid_cws= rtrim($qid_cw,',');
  
$qids=explode(',',$qid_cws);	
	
		$categories=array();
		$category_range=array();

		$i=0;
		$wqids=implode(',',$qids);
		$noq=array();
		$query=$this->db->query("select * from savsoft_qbank join savsoft_category on savsoft_category.cid=savsoft_qbank.cid where qid in ($wqids) ORDER BY FIELD(qid,$wqids)");	
		$questions=$query->result_array();
		foreach($questions as $qk => $question){
		if(!in_array($question['category_name'],$categories)){
		$categories[]=$question['category_name'];
		$noq[$i]+=1;
		} else {
		$i+=1;
		$noq[$i]+=1;	
		}
		}

		$categories=array();
		$category_range=array();

		$i=-1;
		foreach($questions as $qk => $question){
		if(!in_array($question['category_name'],$categories)){
		$categories[]=$question['category_name'];
		$i+=1;	
		$category_range[]=$noq[$i];

		} 
		}
 
	
	} else {
	// randomaly select qids
	 $this->db->where('quid',$quid);
	 $query=$this->db->get('savsoft_qcl');
	 $qcl=$query->result_array();
	$qids=array();
	$categories=array();
	$category_range=array();
	
	foreach($qcl as $k => $val){
		$cid=$val['cid'];
		$lid=$val['lid'];
		$noq=$val['noq'];
		
		$i=0;
	$query=$this->db->query("select * from savsoft_qbank join savsoft_category on savsoft_category.cid=savsoft_qbank.cid where savsoft_qbank.cid='$cid' and lid='$lid' ORDER BY RAND() limit $noq ");	
	$questions=$query->result_array();
	foreach($questions as $qk => $question){
		$qids[]=$question['qid'];
		if(!in_array($question['category_name'],$categories)){
		$categories[]=$question['category_name'];
		$category_range[]=$i+$noq;
		}
	}
	}
	}
	$zeros=array();
	 foreach($qids as $qidval){
	 $zeros[]=0;
	 }
	 
	 
	 
	 $userdata=array(
	 'quid'=>$quid,
	 'uid'=>$uid,
	 'gid'=>$gid,
	 'subject_code'=>$quiz['subject_code'],
	 'r_qids'=>implode(',',$qids),
	 'categories'=>implode(',',$categories),
	 'category_range'=>implode(',',$category_range),
	 'start_time'=>time(),
	 'individual_time'=>implode(',',$zeros),
	 'score_individual'=>implode(',',$zeros),
	 'attempted_ip'=>$_SERVER['REMOTE_ADDR'] 
	 );
	 
	 if($this->session->userdata('photoname')){
		 $photoname=$this->session->userdata('photoname');
		 $userdata['photo']=$photoname;
	 }
	 
	 
	 $this->db->insert('savsoft_result',$userdata);   //open status result
	 
	 
	 
	   $rid=$this->db->insert_id();
	   	$this->session->set_userdata('compiler_rowid', $rid);

	
	return $rid;
 }
 
 
 
 function open_result($quid,$uid){
	 $result_open=$this->lang->line('open');
		$query=$this->db->query("select * from savsoft_result  where savsoft_result.result_status='$result_open' and quid='$quid' and uid='$uid'  "); 
	if($query->num_rows() >= '1'){
		$result=$query->row_array();
return $result['rid'];		
	}else{
		return '0';
	}
	
	 
 }
 
 function quiz_result($rid){
	 
	 
	$query=$this->db->query("select * from savsoft_result join savsoft_quiz on savsoft_result.quid=savsoft_quiz.quid where savsoft_result.rid='$rid' "); 
	return $query->row_array(); 
	 
 }
 
function saved_answers($rid){
	 
	 
	$query=$this->db->query("select * from savsoft_answers  where savsoft_answers.rid='$rid' "); 
	return $query->result_array(); 
	 
 }
 
 
 function assign_score($rid,$qno,$score){
	 $qp_score=$score;
	 $query=$this->db->query("select * from savsoft_result join savsoft_quiz on savsoft_result.quid=savsoft_quiz.quid where savsoft_result.rid='$rid' "); 
	$quiz=$query->row_array(); 
	$score_ind=explode(',',$quiz['score_individual']);
	$score_ind[$qno]=$score;
	$r_qids=explode(',',$quiz['r_qids']);
	$correct_score=$quiz['correct_score'];
	$incorrect_score=$quiz['incorrect_score'];
		$manual_valuation=0;
	foreach($score_ind as $mk => $score){
		
		if($score == 1){
			
			$marks+=$correct_score;
		}
		if($score == 2){
			
			$marks+=$incorrect_score;
		}
		if($score == 3){
			
			$manual_valuation=1;
		}
		
	}
	$percentage_obtained=($marks/$quiz['noq'])*100;
	if($percentage_obtained >= $quiz['pass_percentage']){
		$qr=$this->lang->line('pass');
	} else {
		$qr=$this->lang->line('fail');
		
	}
	 $userdata=array(
	  'score_individual'=>implode(',',$score_ind),
	  'score_obtained'=>$marks,
	 'percentage_obtained'=>$percentage_obtained,
	 'manual_valuation'=>$manual_valuation
	 );
	 if($manual_valuation == 1){
		 $userdata['result_status']=$this->lang->line('pending');
	}else{
		$userdata['result_status']=$qr;
	}
	 $this->db->where('rid',$rid);
	 $this->db->update('savsoft_result',$userdata);
	 
	 // question performance
	 $qp=$r_qids[$qno];
	 		 $crin="";
		if($$qp_score=='1'){
			$crin=", no_time_corrected=(no_time_corrected +1)"; 	 
		 }else if($$qp_score=='2'){
			$crin=", no_time_incorrected=(no_time_incorrected +1)"; 	 
		 }
		  $query_qp="update savsoft_qbank set  $crin  where qid='$qp'  ";
	 $this->db->query($query_qp);
 }
 
 
 
 function submit_result($secres){
	 $logged_in=$this->session->userdata('logged_in');
	 $email=$logged_in['email'];
	 $rid=$this->session->userdata('rid');
	$query=$this->db->query("select * from savsoft_result join savsoft_quiz on savsoft_result.quid=savsoft_quiz.quid where savsoft_result.rid='$rid' "); 
	$quiz=$query->row_array(); 
	$score_ind=explode(',',$quiz['score_individual']);
	$r_qids=explode(',',$quiz['r_qids']);
	$qids_perf=array();
	$marks=0;
	$correct_score=$quiz['correct_score'];
	$incorrect_score=$quiz['incorrect_score'];
	$total_time=array_sum(explode(',',$quiz['individual_time']));
	$manual_valuation=0;
	foreach($score_ind as $mk => $score){
		$qids_perf[$r_qids[$mk]]=$score;
		
		if($score == 1){
			
			$marks+=$correct_score;
			
		}
		if($score == 2){
			
			$marks+=$incorrect_score;
		}
		if($score == 3){
			
			$manual_valuation=1;
		}
		
	}
	$percentage_obtained=($marks/$quiz['noq'])*100;
	if($percentage_obtained >= $quiz['pass_percentage']){
		$qr=$this->lang->line('pass');
	}else{
		$qr=$this->lang->line('fail');
		
	}
		 
	 $userdata=array(
	  'total_time'=>$total_time,
	   'end_time'=>time(),
	  'score_obtained'=>$marks,
	 'percentage_obtained'=>$percentage_obtained,
	 'sec_result'=>$secres,
	 'student_level'=>$quiz['student_level'],
	// 'sec_percentage'=>$secresper,
	 'manual_valuation'=>$manual_valuation
	 );
	 if($manual_valuation == 1){
		 $userdata['result_status']=$this->lang->line('pending');
	} else {
		$userdata['result_status']=$qr;
	}
	 $this->db->where('rid',$rid);
	 $this->db->update('savsoft_result',$userdata);
	 
	 
	 foreach($qids_perf as $qp => $qpval){
		 $crin="";
		 if($qpval=='0'){
			$crin=", no_time_unattempted=(no_time_unattempted +1) "; 
		 }else if($qpval=='1'){
			$crin=", no_time_corrected=(no_time_corrected +1)"; 	 
		 }else if($qpval=='2'){
			$crin=", no_time_incorrected=(no_time_incorrected +1)"; 	 
		 }
		  $query_qp="update savsoft_qbank set no_time_served=(no_time_served +1)  $crin  where qid='$qp'  ";
	 $this->db->query($query_qp);
		 
	 }
	 
if($this->config->item('allow_result_email')){
	$this->load->library('email');
	$query = $this -> db -> query("select savsoft_result.*,savsoft_users.*,savsoft_quiz.* from savsoft_result, savsoft_users, savsoft_quiz where savsoft_users.uid=savsoft_result.uid and savsoft_quiz.quid=savsoft_result.quid and savsoft_result.rid='$rid'");
	$qrr=$query->row_array();
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
			$toemail=$qrr['email'];
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('result_subject');
			$message=$this->config->item('result_message');
			
			$subject=str_replace('[email]',$qrr['email'],$subject);
			$subject=str_replace('[first_name]',$qrr['first_name'],$subject);
			$subject=str_replace('[last_name]',$qrr['last_name'],$subject);
			$subject=str_replace('[quiz_name]',$qrr['quiz_name'],$subject);
			$subject=str_replace('[score_obtained]',$qrr['score_obtained'],$subject);
			$subject=str_replace('[percentage_obtained]',$qrr['percentage_obtained'],$subject);
			$subject=str_replace('[current_date]',date('Y-m-d H:i:s',time()),$subject);
			$subject=str_replace('[result_status]',$qrr['result_status'],$subject);
			
			$message=str_replace('[email]',$qrr['email'],$message);
			$message=str_replace('[first_name]',$qrr['first_name'],$message);
			$message=str_replace('[last_name]',$qrr['last_name'],$message);
			$message=str_replace('[quiz_name]',$qrr['quiz_name'],$message);
			$message=str_replace('[score_obtained]',$qrr['score_obtained'],$message);
			$message=str_replace('[percentage_obtained]',$qrr['percentage_obtained'],$message);
			$message=str_replace('[current_date]',date('Y-m-d H:i:s',time()),$message);
			$message=str_replace('[result_status]',$qrr['result_status'],$message);
			 
			
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 //print_r($this->email->print_debugger());
			
			}
	}
	

	return true;
 }
 
 
 
 function get_attmpt_count($uid,$rid,$quess_id)
 {
	$query_qp1="select * from check_attempt where qid='$quess_id' and uid='$uid' and rid='$rid' ";
	 $out=$this->db->query($query_qp1); 
	 return $out->num_rows();
 }
 
 function insert_answer(){
	$rid=$_POST['rid'];
//	$final_question=$_POST['final_question'];
	$srid=$this->session->userdata('rid');
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	if($srid != $rid){

	return "Something wrong";
	}
	$query=$this->db->query("select * from savsoft_result join savsoft_quiz on savsoft_result.quid=savsoft_quiz.quid where savsoft_result.rid='$rid' "); 
	$quiz=$query->row_array(); 
	$correct_score=$quiz['correct_score'];
	$incorrect_score=$quiz['incorrect_score'];
	$qids=explode(',',$quiz['r_qids']);
	$vqids=$quiz['r_qids'];
	$correct_incorrect=explode(',',$quiz['score_individual']);
	
	
	// remove existing answers
	$this->db->where('rid',$rid);
	$this->db->delete('savsoft_answers');
	$gidd=$this->session->userdata('gid');
	 foreach($_POST['answer'] as $ak => $answer){
		
		 // multiple choice single answer
		 if($_POST['question_type'][$ak] == '1' || $_POST['question_type'][$ak] == '2'){
			 $myvar_catid=$_POST['questcat_id'][$ak];
			 $qid=$qids[$ak];
			 $query=$this->db->query(" select * from savsoft_options where qid='$qid' ");
			 $options_data=$query->result_array();
			 
			 $options=array();
			 foreach($options_data as $ok => $option){
				 $options[$option['oid']]=$option['score'];
			 }
			 $attempted=0;
			 $marks=0;
				foreach($answer as $sk => $ansval){
					$s_query=$this->db->query("select skill_id,sub_skill_id,company_id from savsoft_qbank where qid='$qid' ");
		$s_data=$s_query->row_array();
					if($options[$ansval] <= 0 ){
					$marks+=-1;	
					}else{
					$marks+=$options[$ansval];
					}
					$userdata=array(
					'rid'=>$rid,
					'qid'=>$qid,
					'uid'=>$uid,
					'skill_id'=>$s_data['skill_id'],
					'company_id'=>$s_data['company_id'],
					'sub_skill_id'=>$s_data['sub_skill_id'],
					'q_option'=>$ansval,
					'cat_id'=>$myvar_catid,
					'score_u'=>$options[$ansval],
					'gid'=>	$gidd
					);
					$this->db->insert('savsoft_answers',$userdata);
				$attempted=1;	
				}
				if($attempted==1){
					if($marks >= '0.99' ){
					$correct_incorrect[$ak]=1;	
					}else{
					$correct_incorrect[$ak]=2;							
					}
				}else{
					$correct_incorrect[$ak]=0;
				}
		 }
		 // short answer
		 if($_POST['question_type'][$ak] == '3'){
			 
			 $qid=$qids[$ak];
			 $query=$this->db->query(" select * from savsoft_options where qid='$qid' ");
			 $options_data=$query->row_array();
			 $nans=$options_data['q_option'];
			 $options_data=explode(',',$options_data['q_option']);
			 $noptions=array();
			 foreach($options_data as $op){
				 $noptions[]=strtoupper(trim($op));
			 }
			 
			 $attempted=0;
			 $marks=0;
				foreach($answer as $sk => $ansval){
					if($ansval != ''){
					//if(in_array(strtoupper(trim($ansval)),$noptions)){
						if(trim($ansval)==$nans){
					$marks=1;	
					}else{
					$marks=0;
					}
					
				$attempted=1;

					$userdata=array(
					'rid'=>$rid,
					'qid'=>$qid,
					'uid'=>$uid,
					'q_option'=>$ansval,
					'score_u'=>$marks,
					'gid'=>	$gidd
					);
					$this->db->insert('savsoft_answers',$userdata);

				}
				}
				if($attempted==1){
					if($marks==1){
					$correct_incorrect[$ak]=1;	
					}else{
					$correct_incorrect[$ak]=2;							
					}
				}else{
					$correct_incorrect[$ak]=0;
				}
		 }
		 
		 // long answer
		 if($_POST['question_type'][$ak] == '4'){
			 
			 
			  $attempted=0;
			 $marks=0;
			 $qid=$qids[$ak];
					foreach($answer as $sk => $ansval){
					if($ansval != ''){
					$userdata=array(
					'rid'=>$rid,
					'qid'=>$qid,
					'uid'=>$uid,
					'q_option'=>$ansval,
					'score_u'=>0,
					'gid'=>	$gidd
					);
					
					$this->db->insert('savsoft_answers',$userdata);
					
					
					
					
					}
					}
					
					
				if($attempted==1){
					
					$correct_incorrect[$ak]=3;							
					
				}else{
					$correct_incorrect[$ak]=0;
				}
		 }
		 
		 // match
			 if($_POST['question_type'][$ak] == '5'){
		 $myvar_catid=$_POST['questcat_id'][$ak];
				 			 $qid=$qids[$ak];
			 $query=$this->db->query(" select * from savsoft_options where qid='$qid' ");
			 $options_data=$query->result_array();
			$noptions=array();
			foreach($options_data as $op => $option){
				$noptions[]=$option['q_option'].'___'.$option['q_option_match'];				
			}
			 $marks=0;
			 $attempted=0;
					foreach($answer as $sk => $ansval){
						if($ansval != '0'){
						$mc=0;
						if(in_array($ansval,$noptions)){
							$marks+=1/count($options_data);
							$mc=1/count($options_data);
						}else{
							$marks+=0;
							$mc=0;
						}
					$userdata=array(
					'rid'=>$rid,
					'qid'=>$qid,
					'uid'=>$uid,
					'q_option'=>$ansval,
					'cat_id'=>$myvar_catid,
					'score_u'=>$mc,
					'gid'=>	$gidd
					);
					
				
					$this->db->insert('savsoft_answers',$userdata);
					$attempted=1;
					}
					}
					if($attempted==1){
					if($marks==1){
					$correct_incorrect[$ak]=1;	
					}else{
					$correct_incorrect[$ak]=2;							
					}
				}else{
					$correct_incorrect[$ak]=0;
				}
		 }
 
		 
	 }
	 
	 $userdata=array(
	 'score_individual'=>implode(',',$correct_incorrect),
	 'individual_time'=>$_POST['individual_time'],
	 
	 );
	 $this->db->where('rid',$rid);
	 $this->db->update('savsoft_result',$userdata);
	 
	 return true;
	 
 }
 
 function insert_answer_attempt($final_question)
 {
	 	$srid=$this->session->userdata('rid');
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];

	 $query_qp1="insert into check_attempt  (qid,uid,rid,attempt_id) values('$final_question','$uid','$srid','1')";
	 $this->db->query($query_qp1);
	 
 }
 function insert_answer_image($final_question_rid,$filename,$rid_for_user)
 {
	 
	 $query_qp1="insert into quiz_image_test  (rid,image_name,uid) values('$final_question_rid','$filename','$rid_for_user')";
	 $this->db->query($query_qp1);
	 
	 
 }
 
 function set_ind_time(){
	 
	 $rid=$this->session->userdata('rid');

	 $userdata=array(
	 'individual_time'=> $_POST['individual_time'],	 
	 );
	 $this->db->where('rid',$rid);
	 $this->db->update('savsoft_result',$userdata);
	 
	 return true;
 }

 function compile_history($rids){
	 
	 $query=$this->db->query("select * from compiling_details where result_id='$rids' order by id DESC "); 
	return $query->result_array(); 
	 
 }
 
function getSubSkillFromCategoryID($cid)
{
	$query=$this->db->query("SELECT * FROM `savsoft_skills` WHERE category_id='$cid'");
	return $query->result_array();
}
 
}
?>