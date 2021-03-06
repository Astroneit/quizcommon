<?php
Class Video_model extends CI_Model
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
 
  function num_video(){
	 
	 $query=$this->db->get('video');
	 return $query->num_rows();
 }
 
 function insert_video($userdata,$new_name){
	 
	 
	$vname=$userdata['video_name'];
	$description=$userdata['description'];
	$cname=$userdata['cname'];
	 
	
	
	$this->db->query("insert into video (`title`,`description`,`video_file`,`course_id`) values ('$vname','$description','$new_name','$cname')");
	 
	  $quid=$this->db->insert_id();
	 
	 
	return $quid;
	 
	
	 	/* $userdata['gen_certificate']=$this->input->post('gen_certificate'); 
	 
	 if($this->input->post('certificate_text')){
		$userdata['certificate_text']=$this->input->post('certificate_text'); 
	 }
	  $this->db->insert('savsoft_quiz',$userdata);
	 $quid=$this->db->insert_id();
	return $quid; */
	 
 }
 
 
  function update_video($userdata,$quid){
	  
	 $vname=$userdata['video_name'];
	$description=$userdata['description'];
	$cname=$userdata['cname'];
	 
	 
	 $this->db->query("update video set title='$vname',description='$description',course_id='$cname' where id='$quid'");
	  
	  return $quid;
	 
	 
  }
 
 function get_cname($cuid){
		 $query=$this->db->query("select * from course where id='$cuid' 
	 ");
	 
	 
	 
	 return $query->row_array(); 
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

	 $query=$this->db->query("select * from savsoft_qbank join savsoft_category on savsoft_category.cid=savsoft_qbank.cid join savsoft_level on savsoft_level.lid=savsoft_qbank.lid 
	 where savsoft_qbank.qid in ($qids) order by FIELD(savsoft_qbank.qid,$qids) 
	 ");
	 return $query->result_array();
	 
	 
 }
 
 
 
 
 function get_questions_forlist($qids){
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

	 $query=$this->db->query("select * from savsoft_qbank where qid='$qids' 
	 ");
	 
	 
	 
	 return $query->row_array();
	 
	 
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
	 
	 
	 /* remove qid in video table */
	 
	 $this->db->where('id',$quid);
	 $query=$this->db->get('video');
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
	 
	 $this->db->where('id',$quid);
	 $this->db->update('video',$userdata);
	 
	   /* remove qid in video table */
	   
	   
	   
	   
	     /* remove qid in test category table */
	 
	 
	 
	 
	 
	  $whr_quiz_status=0;
	  $userdata1=array(	 
	 'quiz_status'=>$whr_quiz_status	 
	  );
	  $this->db->where('qid',$qid);
	  $this->db->update('savsoft_qbank',$userdata1);
	 
	 return true;
 }
 
  function add_qid($quid,$qid,$cid){
	 
	 

	 
	 $this->db->where('id',$quid);
	 $query=$this->db->get('video');
	 $quiz=$query->row_array();
	 

	 
/* 	  $this->db->where('qid',$quid);
	 $query1=$this->db->get('savsoft_qbank');
	 $quiz1=$query1->row_array();
	  */
	 
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
	 'qids'=>implode(',',$new_qid),
	 'cids'=>implode(',',$new_cid1),
	 'noq'=>$noq
	 
	 );
	 
	
	 
	 $this->db->where('id',$quid);
	 $this->db->update('video',$userdata);

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
      //  $this->db->query("insert into savsoft_quiz_test_category (`quid`,`quiz_name`,`qids`,`cids`) values ('$quid','".$quiz['quiz_name']."','$qid','$cid')");
     
     }
     else {
        
         $ques_id=$res[0]['qids'];
        
         $concat=$qid.",".$ques_id;
        
       //  $this->db->query("update savsoft_quiz_test_category set quiz_name='".$quiz['quiz_name']."',qids='$concat',cids='$cid' where quid='$quid' and cids='$cid'");
     }
	 
	 
/*  one question for one quiz only  end */
	 return true;
 }
 

 
 
   function take_video(){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	// $this->db->where('id',$quid);
	
	 $query=$this->db->get('video');
	 return $query->result_array();
 
 } 

   function take_video_ajax($cid){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('course_id',$cid);
	
	 $query=$this->db->get('video');
	 return $query->result_array();
 
 } 
 
 
 
   function take_video_edit($vid){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('id',$vid);
	
	 $query=$this->db->get('video');
	 return $query->row_array();
 
 }  
 
 
  function take_module(){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	// $this->db->where('id',$quid);
	
	 $query=$this->db->get('video_module');
	 return $query->result_array();
 
 }  
 
 
   function take_video_mod(){
	 
	 
	 $query=$this->db->query("select * from video where module_id=''");
	 return $query->result_array();
 
 } 
 
 
   function take_module_vid($modid){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('id',$modid);
	
	 $query=$this->db->get('video_module');
	 return $query->row_array();
 
 }  
 
  function get_video($quid){
	 
	  // $this->db->order_by('quid', 'RANDOM');
	 $this->db->where('id',$quid);
	
	 $query=$this->db->get('video');
	 return $query->row_array();
 
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
 function  remove_video($quid){
	 
	 
	  $qer=$this->db->query("select * from video where id='$quid' ");
	  
	  $rty=$qer->row_array();
	  
	   $modid=$rty['module_id']; 
	 
	 $qer=$this->db->query("select * from video_module where id='$modid' ");
	  
	  $rty=$qer->row_array();
	  
	    $vdid=$rty['video_id'];    
	 
	
$modids=explode(',',$vdid);
$index = array_search($quid,$modids);



if($index == true){
    unset($modids[$index]);
	
}


 $updated_mod=implode(',',$modids);

 
 
 
	 $upt_mod=$this->db->query("update video_module set video_id='$updated_mod' where id='$modid'");
	$vid_del=$this->db->query("delete from video where id='$quid'");

	 
	 $vid_play_del=$this->db->query("delete from video_playlist where video_id='$quid'");
	 
	 
		//$vid_cat_del=$this->db->query("delete from  savsoft_quiz_test_category where quid='$quid'");
	 
	 if($vid_del && $upt_mod && $vid_play_del ){
		 
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
  
  
   function take_removal_video($quid){
		 $query=$this->db->query("select * from video where id='$quid' 
	 ");
	 
	 
	 
	 return $query->row_array(); 
 }
 

  
 
 
 function count_result($quid,$uid){
	 
		$this->db->where('quid',$quid);
		$this->db->where('uid',$uid);
		$query=$this->db->get('savsoft_result');
		return $query->num_rows();
	 
 }
 
 
 function module($modname,$videos){
	 
		
	$kk=	$this->db->query("Insert into video_module (`module_name`,`video_id`) values ('$modname','$videos')");
	 
	   $mid=$this->db->insert_id();  
	   
	   $expvideos=explode(',',$videos);
	   
	   foreach($expvideos as $jv){
		   
		     $invid=$this->db->query("update video set module_id='$mid' where id='$jv'");
			 
			

          $getfile=$this->db->query("select * from video where id='$jv'");
		  
		  $rt=$getfile->row_array();
		  
		  $file=$rt['video_file'];
			
			
			$quer=$this->db->query("select * from video_playlist where module_id='$mid' and video_id='$jv'");
			 $wer=$quer->num_rows();
			
			
			if($wer==0){
				 $invidplay=$this->db->query("Insert into video_playlist (`module_id`,`video_id`,`path`) values ('$mid','$jv','$file')");
			}
			
	  
	  
	  
	  
	   }
	   
	  

if($kk){
	return true;
}	  
	 
 }
 
 
 
 
 
  function add_into_module($modname,$videos){
	 
	 
	    $getfiles=$this->db->query("select * from video_module where id='$modname'");
		  
		  $rts=$getfiles->row_array();
		  
		  $vidfiles=$rts['video_id'];  
		  
		  $dr=explode(',',$vidfiles);
		  
		 
array_push($dr,$videos);

 $vidids=implode(',',$dr); 
	 
		
	$kk=$this->db->query("update video_module  set video_id='$vidids' where id='$modname'");
	 
   $invid=$this->db->query("update video set module_id='$modname' where id='$videos'");
			 
 
 
    $getfile=$this->db->query("select * from video where id='$videos'");
		  
		  $rt=$getfile->row_array();
		  
		  $file=$rt['video_file']; 
		  
		  
			
			$quer=$this->db->query("select * from video_playlist where module_id='$modname' and video_id='$videos'");
			 $wer=$quer->num_rows();
			
			
			if($wer==0){
				 $invidplay=$this->db->query("Insert into video_playlist (`module_id`,`video_id`,`path`) values ('$modname','$videos','$file')");
			}
			  
		  
		  
 
	   
	   $expvideos=explode(',',$videos);
	   
	   foreach($expvideos as $jv){
		   
		
	  
	  
	   }
	   
	  

if($kk){
	return true;
}	  
	 
 }
 
 
function editmodfinal($modname,$vijo){
	
	//echo $vijo."<br/>";
	
	$vids=explode(",",$vijo);
	//print_r($vids); 
	
	
	    $getfiles=$this->db->query("select * from video_module where id='$modname'");
		  
		  $rts=$getfiles->row_array();
		  
		  $vidfiles=$rts['video_id'];  
		  
		  $dr=explode(',',$vidfiles);
	
	//print_r($dr); 
	
	//echo "<br/>";
	$new_list=array_diff($dr,$vids);
	
	//print_r($new_list);

foreach($new_list as $nl){
	
	$this->db->query("Delete from video_playlist where module_id='$modname' and video_id='$nl'");
	
	$this->db->query("update video set module_id='' where module_id='$modname' and id='$nl'");
	
	

	
}

$clean1 = array_diff($dr, $new_list); 
$clean2 = array_diff($new_list, $dr); 
$final_output = array_merge($clean1, $clean2);

$vid_rem=implode(",",$final_output);

	$this->db->query("update video_module set video_id='$vid_rem' where id='$modname' ");
	
	
	
	



	
}
 
 
 
 
 
 function insert_result($quid,$uid){
	  $gid=$this->session->userdata('gid');
		// get quiz info
		$this->db->where('quid',$quid);
		$query=$this->db->get('savsoft_quiz');
		$quiz=$query->row_array();
	 
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
    shuffle($my_array);
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
 
 
 
 function submit_result($secres,$secresper){
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
	 'sec_percentage'=>$secresper,
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
 
 
 
 
 
 function insert_answer(){
	$rid=$_POST['rid'];
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
					if($options[$ansval] <= 0 ){
					$marks+=-1;	
					}else{
					$marks+=$options[$ansval];
					}
					$userdata=array(
					'rid'=>$rid,
					'qid'=>$qid,
					'uid'=>$uid,
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
			 $options_data=explode(',',$options_data['q_option']);
			 $noptions=array();
			 foreach($options_data as $op){
				 $noptions[]=strtoupper(trim($op));
			 }
			 
			 $attempted=0;
			 $marks=0;
				foreach($answer as $sk => $ansval){
					if($ansval != ''){
					if(in_array(strtoupper(trim($ansval)),$noptions)){
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
					$attempted=1;
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
 
function newfunction_dd($hellow){
$hr=explode(',',$hellow);
foreach($hr as $key=>$val){
$zzz=$this->db->query( "update video set alignment='$key' where id='$val'");
}
if($zzz){
return true;
}

} 


function view_video($cid){

$queryy=$this->db->query("select * from video where course_id='$cid' order by alignment ASC");
return $queryy->result_array();
}
 
}
?>