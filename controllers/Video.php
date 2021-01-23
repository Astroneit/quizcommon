<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   // $this->load->database();
	   $this->load->helper('file');
	   $this->load->model("video_model");
	   $this->load->model("user_model");
	   $this->load->model("result_model");
	   $this->lang->load('basic', $this->config->item('language'));
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url())
		{
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
	 }

	public function index($limit='0')
	{
		
		 $logged_in=$this->session->userdata('logged_in');	


		$data['limit']=$limit;
		$data['title']=$this->lang->line('quiz');
		// fetching quiz list
		$data['result']=$this->video_model->quiz_list($limit);
		
			$data['result']=$this->video_model->take_video();
		
		
	 //   print_r($data['result']); exit;
	  	$data['numresult']=$this->video_model->num_video();
		
		$data['course_list']=$this->user_model->course_list();
		
		$this->load->view('header',$data);
		$this->load->view('video_list',$data);
		// $this->load->view('footer',$data);
		
	}
	
	public function add_new()
	{
		
		$logged_in=$this->session->userdata('logged_in');
		//print_r($logged_in);
			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}

		$data['title']=$this->lang->line('add_new').' '.$this->lang->line('quiz');
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		$data['course_list']=$this->user_model->course_list();
		$this->load->view('header',$data);
		$this->load->view('new_video',$data);
		//$this->load->view('footer',$data);
	}
	
	
	
	
	
	
public function edit_video($quid)
		{
			
			
			
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['su']!='1'){
		exit($this->lang->line('permission_denied'));
		}

	//	$data['title']=$this->lang->line('edit').' '.$this->lang->line('quiz');
		// fetching group list
		//$data['group_list']=$this->user_model->group_list();
		$data['quiz']=$this->video_model->get_video($quid);
	
	 $data['course_list']=$this->user_model->course_list();
	
	
		if($data['quiz']['question_selection']=='0') {
		$data['questions']=$this->video_model->get_questions($data['quiz']['qids']);	



		
		} 
		
		else {
		$this->load->model("qbank_model");
		$data['qcl']=$this->quiz_model->get_qcl($data['quiz']['quid']);
		$data['category_list']=$this->qbank_model->category_list();
		$data['level_list']=$this->qbank_model->level_list();
		}
		
		$this->load->view('header',$data);
		$this->load->view('edit_video',$data);
		//$this->load->view('footer',$data);
	}
	
	
	
		public function edit_quiz($quid)
		{
			
			
			
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['su']!='1'){
		exit($this->lang->line('permission_denied'));
		}

	//	$data['title']=$this->lang->line('edit').' '.$this->lang->line('quiz');
		// fetching group list
		//$data['group_list']=$this->user_model->group_list();
		$data['quiz']=$this->video_model->get_video($quid);
	
	
	
	
		if($data['quiz']['question_selection']=='0') {
		$data['questions']=$this->video_model->get_questions($data['quiz']['qids']);	



		
		} 
		
		else {
		$this->load->model("qbank_model");
		$data['qcl']=$this->quiz_model->get_qcl($data['quiz']['quid']);
		$data['category_list']=$this->qbank_model->category_list();
		$data['level_list']=$this->qbank_model->level_list();
		}
		
		$this->load->view('header',$data);
		$this->load->view('edit_quiz',$data);
		//$this->load->view('footer',$data);
	}
	
	
	
	
	function no_q_available($cid,$lid){
		$val="<select name='noq[]'>";
		$query=$this->db->query("select * from savsoft_qbank where cid='$cid' and lid='$lid' ");
		$nor=$query->num_rows();
		for($i=0; $i<= $nor; $i++){
			$val.="<option value='".$i."' >".$i."</option>";
	
		}
		$val.="</select>";
		echo $val;
		
	}
	
	
	
	
	function remove_qid($quid,$qid){
		
		if($this->video_model->remove_qid($quid,$qid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
		}
		redirect('video/edit_video/'.$quid);
	}
	
	function add_qid($quid,$qid,$cid){
		
		 $this->video_model->add_qid($quid,$qid,$cid);
          echo 'added';              
	}
	
	
	
	function pre_add_question($quid,$limit='0',$cid='0',$lid='0'){
		
		
		
		$cid=$this->input->post('cid');
		$lid=$this->input->post('lid');
		redirect('video/add_question/'.$quid.'/'.$limit.'/'.$cid.'/'.$lid);
	}
	
	
	
		public function add_question($quid,$limit='0',$cid='0',$lid='0')
	{
		
		
	
		
		$this->load->model("qbank_model");
	   
		
		$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}
			
			
	 
		 $data['quiz']=$this->video_model->get_video($quid);
		 
		
		 
		$data['title']=$this->lang->line('add_question_into_quiz').': '.$data['quiz']['quiz_name'];
		if($data['quiz']['question_selection']=='0'){
		
		 $data['result']=$this->qbank_model->question_list($limit,$cid,$lid);
		 $data['category_list']=$this->qbank_model->category_list();
		 $data['level_list']=$this->qbank_model->level_list();
			 
		}
		else {
			
			exit($this->lang->line('permission_denied'));
		}
		$data['limit']=$limit;
		$data['cid']=$cid;
		$data['lid']=$lid;
		$data['quid']=$quid;
		
		$this->load->view('header',$data);
		$this->load->view('add_irsoquestion_into_quiz',$data);
		// $this->load->view('footer',$data);
	}
	
	
	
	
	function up_question($quid,$qid,$not='1'){
	$logged_in=$this->session->userdata('logged_in');
	if($logged_in['su']!="1"){
	exit($this->lang->line('permission_denied'));
	return;
	}		
	for($i=1; $i <= $not; $i++){
	$this->quiz_model->up_question($quid,$qid);
	}
	redirect('quiz/edit_quiz/'.$quid, 'refresh');
	}
	
	
	
	
	
	
	function down_question($quid,$qid,$not='1'){
	$logged_in=$this->session->userdata('logged_in');
	if($logged_in['su']!="1"){
	exit($this->lang->line('permission_denied'));
	return;
	}	
			for($i=1; $i <= $not; $i++){
	$this->quiz_model->down_question($quid,$qid);
	}
	redirect('quiz/edit_quiz/'.$quid, 'refresh');
	}
	
	
	
	
		public function insert_video()
	{

					
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
			
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('video_name', 'video_name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'description', 'required|xss_clean');
		$this->form_validation->set_rules('cname', 'Course Name', 'required|xss_clean');
		
		
		
		
           if ($this->form_validation->run() == false)
                {
                   //  $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					 $this->load->view('header',$data);
					 $data['course_list']=$this->user_model->course_list();
					 	$this->load->view('new_video',$data);
				
					//redirect('video/add_new/');
                }
                else
                {
					/*video upload*/

					$base=base_url();
					
   		 $configVideo['upload_path'] = './videoupload/'; # check path is correct
$configVideo['max_size'] = '0';
$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
$configVideo['overwrite'] = FALSE;
$configVideo['remove_spaces'] = TRUE;
/* $video_name = random_string('numeric', 5);
$configVideo['file_name'] = $video_name; */
		 
		 
		$image=$_FILES['userfile']['name'];
 $file_basename = substr($image, 0, strripos($image, '.')); // get file extention



	$file_ext = substr($image, strripos($image, '.')); // get file name



	
      $new_name= time()."-video". $file_ext;  
	   
 
		 
		 
		// $new_name = time()."_".$_FILES['userfile']['name'];
			
           $configVideo['file_name'] = $new_name;

         $this->load->library('upload', $configVideo);
		 
		// $this->upload->initialize($configVideo);

if (!$this->upload->do_upload('userfile')) # form input field attribute
{
    # Upload Failed
	echo "failed";
	
    $this->session->set_flashdata('error', $this->upload->display_errors());
    //redirect('controllerName/method');
}
else
{
    # Upload Successfull
  
  
  	 $userdata=array(
	 'video_name'=>$this->input->post('video_name'),
	 'description'=>$this->input->post('description'),
	 'cname'=>$this->input->post('cname'),
	
	 );
	 
  
  // echo "success";
  
  
    $quid =  $this->video_model->insert_video($userdata,$new_name);
   $this->session->set_flashdata('success', 'Video Has been Uploaded');
  redirect('video/edit_video/'.$quid);
  
}
		
					/*video upload*/
					
					
					
					
                   
				//	
                }       

	}
	
		public function update_quiz($quid)
	{
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('quiz_name', 'quiz_name', 'required');
           if ($this->form_validation->run() == FALSE)
                {
                     $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					redirect('quiz/edit_quiz/'.$quid);
                }
                else
                {
					$quid=$this->quiz_model->update_quiz($quid);
                   
					redirect('quiz/edit_quiz/'.$quid);
                }       

	}
	
	
		public function update_video($quid)
	{
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
			
		$this->load->library('form_validation');
		
		
		
		$this->form_validation->set_rules('video_name', 'Video Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
		$this->form_validation->set_rules('cname', 'Course Name', 'required|xss_clean');
		
		
           if ($this->form_validation->run() == FALSE)
                {
					
					
					 $data['course_list']=$this->user_model->course_list();
					
                   $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					//redirect('video/edit_video/'.$quid);
							 $this->load->view('header',$data);
					 	$this->load->view('edit_video',$data);
                }
                else
                {
					
					 $userdata=array(
	 'video_name'=>$this->input->post('video_name'),
	 'description'=>$this->input->post('description'),
	 'cname'=>$this->input->post('cname'),
	
	 );
	 
		
					
					$quid=$this->video_model->update_video($userdata,$quid);
                   
					redirect('video/edit_video/'.$quid);
                }       

	}
	
	
	
	

		
			
	
	
	
	
	
	
	
	
	
	public function viewlist(){
		$data['numresult']=$this->video_model->num_video();
		
		//print_r($data['numresult']);
		
		$data['result']=$this->video_model->take_video();
		$data['resultk']=$this->video_model->take_video_mod();
		$data['resultm']=$this->video_model->take_module();
	//print_r($data['resultm']); exit;
		
$data['course_list']=$this->user_model->course_list();
		$this->load->view('header');
		$this->load->view('video_list',$data);
	}
	
	
		public function viewlist_ajax(){
	
	
	$cid=$_REQUEST['courseid'];
		
		if($cid!=''){
			$data['result']=$this->video_model->take_video_ajax($cid);
		}
		
		else{
				$data['result']=$this->video_model->take_video();
		}
		
		
		
		

		$this->load->view('ajax_video_list',$data);
	}
	
	
	
	public function addmodule(){
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
			
			$this->form_validation->set_rules('modulename', 'modulename', 'required');
		$this->form_validation->set_rules('vid[]', 'vid', 'required');
		
		
		
		
           if ($this->form_validation->run() == false)
                {
                   //  $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					 $this->load->view('header',$data);
					 	$this->load->view('video_list');
				
						redirect('video/viewlist');
                }
                else
                {
				 $modname=	$this->input->post('modulename');
	 $vids=	$this->input->post('vid');  
	
	 $videos=implode(',',$vids);	
			

			$module=$this->video_model->module($modname,$videos);
			
			if($module=='true'){
		   // $this->session->set_flashdata('message', 'Module Created Successfully');
			}
			
                   
					redirect('video/viewlist');
					
				}
		
	}
	
	
		public function add_into_module(){
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
			
			$this->form_validation->set_rules('viid', 'viid', 'required');
		$this->form_validation->set_rules('module', 'module', 'required');
		
		
		
		
           if ($this->form_validation->run() == false)
                {
                   //  $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					 $this->load->view('header',$data);
					 	$this->load->view('video_list');
				
						redirect('video/viewlist');
                }
                else
                {
				 $modname=	$this->input->post('module');
	           $video=	$this->input->post('viid');  
	
	
			

			$module=$this->video_model->add_into_module($modname,$video);
			
			if($module=='true'){
		   // $this->session->set_flashdata('message', 'Module Created Successfully');
			}
			
                   
					redirect('video/viewlist');
					
				}
		
	}
	
	
	
	public function edit_module(){
		
		
		
		 $keyworda=$_REQUEST['keyworda']; 
		
			$datas['video']=$this->video_model->take_module_vid($keyworda);
		 
	//	print_r($datas['video']);
	
		$this->load->view('validate_edit_mod',$datas);
		
	}
	
		public function editmodfinal(){
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
			
			$this->form_validation->set_rules('module_ids', 'Module', 'required');
		$this->form_validation->set_rules('editvid[]', 'Video', 'required');
		
		     if ($this->form_validation->run() == false)
                {
                   //  $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
				echo "Failed to Update. Go Back"; exit;
				
						redirect('video/viewlist');
                }
                else
                {
				 $modname=	$this->input->post('module_ids');
	           $video=	$this->input->post('editvid');  
			    $vijo=implode(",",$video); 
	
	
			

			$moduledit=$this->video_model->editmodfinal($modname,$vijo);
			
		redirect('video/viewlist');
			
				}
		
	}
	
	
	
	
	public function remove_quiz($quid){

			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			} 
			
			if($this->quiz_model->remove_quiz($quid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
					}else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
						
					}
					redirect('quiz');
                     
			
		}
	

		public function remove_video($quid){
			
			
			
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			} 
			
			
			  $rty=    $this->video_model->take_removal_video($quid);

                    // print_r($rty); exit;   

$filename=  $rty['video_file'];   
			
			if($this->video_model->remove_video($quid)){
				
				
				 $path="./videoupload/".$filename;
                               unlink($path); 
				
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
					}else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
						
					}
					redirect('video/viewlist');
                     
			
		}


	public function quiz_detail(){
		
		$logged_in=$this->session->userdata('logged_in');
	//	print_r($logged_in);
		 $quid=$this->uri->segment(3); 
		
		$gid=$logged_in['gid'];
		$uid=$logged_in['uid'];
		$data['title']=$this->lang->line('attempt').' '.$this->lang->line('quiz');
		
		$data['quiz']=$this->quiz_model->get_quiz($quid);
		$data['checkquiz']=$this->quiz_model->check_quiz($quid,$uid);
	
		$this->load->view('header',$data);
		$this->load->view('quiz_detail',$data);
		// $this->load->view('footer',$data);
		
	}
	
	public function validate_quiz($quid){
		 
		$logged_in=$this->session->userdata('logged_in');
		$gid=$logged_in['gid'];
		$uid=$logged_in['uid'];
		 
		 // if this quiz already opened by user then resume it
		 $open_result=$this->quiz_model->open_result($quid,$uid);
		if($open_result != '0'){
		$this->session->set_userdata('rid', $open_result);		
		redirect('quiz/attempt/'.$open_result);			
		}
		$data['quiz']=$this->quiz_model->get_quiz($quid);
		// validate assigned group
		if(!in_array($gid,explode(',',$data['quiz']['gids']))){
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('quiz_not_assigned_to_your_group')." </div>");
		redirect('quiz/quiz_detail/'.$quid);
		 }
		// validate start end date/time
		if($data['quiz']['start_date'] > time()){
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('quiz_not_available')." </div>");
		redirect('quiz/quiz_detail/'.$quid);
		 }
		// validate start end date/time
		if($data['quiz']['end_date'] < time()){
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('quiz_ended')." </div>");
		redirect('quiz/quiz_detail/'.$quid);
		 }

		// validate ip address
		if($data['quiz']['ip_address'] !=''){
		$ip_address=explode(",",$data['quiz']['ip_address']);
		$myip=$_SERVER['REMOTE_ADDR'];
		if(!in_array($myip,$ip_address)){
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('ip_declined')." </div>");
		redirect('quiz/quiz_detail/'.$quid);
		 }
		}
		 // validate maximum attempts
		$maximum_attempt=$this->quiz_model->count_result($quid,$uid);
		if($data['quiz']['maximum_attempts'] <= $maximum_attempt){
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('reached_maximum_attempt')." </div>");
		redirect('quiz/quiz_detail/'.$quid);
		 }
		
		// insert result row and get rid (result id)
		$rid=$this->quiz_model->insert_result($quid,$uid);
		
		
	
		
		$this->session->set_userdata('rid',$rid);
		
	
		
		redirect('quiz/attempt/'.$rid);	
		
		
	}
	
	
	
	function attempt($rid){
		
		
		
		
		 $srid=$this->session->userdata('rid');
	
	
						// if linked and session rid is not matched then something wrong.
						
						
						
						
						
						
						//jothi -> condition to be checked 
						
	 	/* if($rid != $srid){
		 
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('quiz_ended')." </div>");
		redirect('quiz/');

			}  */
			
			
			
			

		if(!$this->session->userdata('logged_in')){
			exit($this->lang->line('permission_denied'));
		}
		// get result and quiz info and validate time period
		$data['quiz']=$this->quiz_model->quiz_result($rid);
		$data['saved_answers']=$this->quiz_model->saved_answers($rid);
		
// print_r($data['saved_answers']);
			
			
		// end date/time
		if($data['quiz']['end_date'] < time()){
		$this->quiz_model->submit_result($rid);
		$this->session->unset_userdata('rid');
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('quiz_ended')." </div>");
		redirect('quiz/quiz_detail/'.$data['quiz']['quid']);
		 }

		
		
		//jothi -> condition to be checked 
		
		// end date/time
	/* 	if(($data['quiz']['start_time']+($data['quiz']['duration']*60)) < time()) {
			
		$this->quiz_model->submit_result($rid);
		$this->session->unset_userdata('rid');
		$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('time_over')." </div>");
		redirect('quiz/quiz_detail/'.$data['quiz']['quid']);
		
		 } */
		 
		 
		 
		// remaining time in seconds 
		$data['seconds']=($data['quiz']['duration']*60) - (time()- $data['quiz']['start_time']);
		// get questions
		$data['questions']=$this->quiz_model->get_questions($data['quiz']['r_qids']);
		// get options
		$data['options']=$this->quiz_model->get_options($data['quiz']['r_qids']);
		$data['title']=$data['quiz']['quiz_name'];
		$this->load->view('header',$data);
		$this->load->view('quiz_attempt',$data);
		//$this->load->view('footer',$data);
			
		}
		
		
	
	
	function save_answer(){
		echo "<pre>";
	
		  // insert user response and calculate scroe
		echo $this->quiz_model->insert_answer();
		
		
	}
 function set_ind_time(){
		  // update questions time spent
		$this->quiz_model->set_ind_time();
		
		
	}
 
 
 
 function upload_photo(){

if(isset($_FILES['webcam'])){
			$targets = 'photo/';
			$filename=time().'.jpg';
			$targets = $targets.''.$filename;
			if(move_uploaded_file($_FILES['webcam']['tmp_name'], $targets)){
			
				$this->session->set_flashdata('photoname', $filename);
				}
				}
}



 function submit_quiz(){
	 
	  $rid=$this->session->userdata('rid');
	  $uid=$this->session->userdata('uid');
	 
	  $ind_result = $this->result_model->get_ind_cat($rid,$uid);
	  $get_current_quiz1 = $this->result_model->get_current_quiz($rid);

		 $values=array();
	  $values[]=array('Test Name','Marks');
	  $values1=array();
	  $values1[]=array('Test Name','Percentage');
	  $count=0;
	 foreach($ind_result as $ind_result1){
		  $get_current_quiz_cat1 = $this->result_model->get_current_quiz_cat($get_current_quiz1);
		 
		 $schools_array = explode(",", $get_current_quiz_cat1);
 		 for($i=0;$i<count($schools_array);$i++)
		 {
			 $j=0;
			 if($schools_array[$i]==$ind_result1['cat_id'])
			 {
				$count += $j +1;
				
			 }
		 }
     $values[]=array($ind_result1['category_name'].'',intval($ind_result1['cnt']));	 
     $this->db->where('rid',$rid);
	  $userdata[$ind_result1['category_name']]=round(($ind_result1['cnt']/$count)*100);
	//  $userdata[$ind_result1['category_name']]=$ind_result1['cnt'];
	 $this->db->update('savsoft_result',$userdata);
	 $values1[]=array($ind_result1['category_name'].'',round(($ind_result1['cnt']/$count)*100));
     } 
	 
	 $data['values']=json_encode($values);
	 $data['values1']=json_encode($values1);
	 
				if($this->quiz_model->submit_result($data['values'],$data['values1'])){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('quiz_submit_successfully')." </div>");
					}
					else
					{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_submit')." </div>");	
					}
			$this->session->unset_userdata('rid');		
					
 redirect('result');
 }
 
 
 
 function assign_score($rid,$qno,$score){
	 
	 $logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			} 
			$this->quiz_model->assign_score($rid,$qno,$score);
			
			echo '1';
	 
 }
 
  function ffff()
 {
	
 $this->load->view('spherephp.php');
	// echo $this->session->userdata('ssss');

	$qwe=$this->session->userdata('ssss');
 
 }
 
 
 function get_web_page()
 {
	 
$data=$this->load->view('result.php');

 }

 function sel_syntax()
{
	
$ttk['program']=$_REQUEST['keyword'];
	

$dat=$this->load->view('compiler_syntax_code',$ttk);	
	

	
}



 function com_det_exam()
{
	
$rids=$_REQUEST['keywords'];

//echo $rids;
	
$this->load->model('quiz_model');
$data['result_compile']=$this->quiz_model->compile_history($rids);
	
	
	
$dat=$this->load->view('view_comp_det',$data);	
	

	
}





 function rearrange_video()
{
	
	
	$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			
	
	$data['course_list']=$this->user_model->course_list();
		$this->load->view('header',$data);

	
$this->load->view('selectvideos',$data);	
	

	
}



function update_list()
{ 
   $hellow=$_REQUEST['keywords'];
$this->load->model(video_model);
$rty= $this->video_model->newfunction_dd($hellow);
}




function select_video(){
$logged_in=$this->session->userdata('logged_in');
if($logged_in['su']!='1'){
exit($this->lang->line('permission_denied'));
}
//$data['title']=$this->lang->line('add_new').' '.$this->lang->line('user');
// fetching group list
$data['group_list']=$this->user_model->group_list();
$data['course_list']=$this->user_model->course_list();
$this->load->view('header',$data);
$this->load->view('selectvideos',$data);
}
 function course_details(){
  $cid=$_REQUEST['courseid'];
 
$data['view_video']=$this->video_model->view_video($cid);
$this->load->view('ajaxpage',$data);
 
 
 
 
 }


	
}
