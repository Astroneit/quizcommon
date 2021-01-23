<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   
	   
   // $this->load->library('session');
	
	

	   $this->load->library('excel');
	 //  $this->load->database();
	   $this->load->model("user_model");
	   $this->load->model("learning_model");
	   $this->load->model("quiz_model");
	   $this->lang->load('basic', $this->config->item('language'));
	  $this->load->library('pagination');
	  $this->load->library('Ajax_pagination');
$this->lang->load('basic', $this->config->item('language'));
        $this->perPage = 3;
/* 		if($this->db->database ==''){
		redirect('install');	
		} */

		
		
	 }

	 
public function index(){
	
	
$ers= $this->session->userdata('logged_in'); 
 
		$data['java']=$this->user_model->get_video_java();
		$data['android']=$this->user_model->get_video_android();
		$data['php']=$this->user_model->get_video_php();
		$data['python']=$this->user_model->get_video_python();
		$data['iot']=$this->user_model->get_video_iot();
	//print_r($ers); exit;
 
$courseid=1;
$data['courseid'] = $this->learning_model->selectvideo($courseid);
$data['courseidfv'] = $this->learning_model->selectfirstvideo($courseid);




			if($this->session->userdata('logged_in')=="")
	{
	

		redirect('login');
	}
	


		$config['total_rows'] = $this->user_model->getAllEmployeeCount();
        $data['total_count'] = $config['total_rows'];
        $config['suffix'] = '';
		
		 if ($config['total_rows'] > 0) {
            $page_number = $this->uri->segment(3);
		$config['base_url'] = base_url() . 'index.php/Login/reply/';
		
		 } 
		
	
	
       $this->load->view('welcome/learning',$data);

}	 


 function takevideo(){
	// echo "in"; 
	
	
		 $keyworda=$_REQUEST['keyworda']; 
		
			$datas['takevideo']=$this->learning_model->takevideo($keyworda);
		 
		//print_r($datas['c_amount']);  exit;
	
		$this->load->view('validate_take_video',$datas);
 }
 
	

 function add_new_course(){
	
	$this->load->view('header',$data);
		$this->load->view('new_course',$data);
 }
 

public function insert_course()
	{
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name', 'Course Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('duration', 'Duration', 'numeric|xss_clean');
		
		
		
		
           if ($this->form_validation->run() == false)
                {
					 $this->load->view('header',$data);
					 $data['course_list']=$this->user_model->course_list();
					 	$this->load->view('new_course',$data);
                }
                else
                {

					$base=base_url();
					
  	 $coursedata=array(
	 'course_name'=>$this->input->post('course_name'),
	 'description'=>$this->input->post('description'),
	 'amount'=>$this->input->post('amount'),
	 'duration'=>$this->input->post('duration'),
	
	 );
	 //print_r($coursedata);
  
  // echo "success";
  
  	$this->load->model('learning_model');
    $quid =  $this->learning_model->insert_course($coursedata);
   if($quid==1){
   $this->session->set_flashdata('success', 'Course Has been created');
  redirect('learning/insert_course');
}
  
}       

}	
	
	
	

	 
	 function viewcourse(){
	// echo "in"; 
	
	
	$ers= $this->session->userdata('logged_in'); 
 




			if($this->session->userdata('logged_in')=="")
	{
	

		redirect('login');
	}
	
		
			$datas['viewcourse']=$this->learning_model->viewcourse();
		 
		//print_r($datas['c_amount']);  exit;
	
		$this->load->view('header',$datas);
		$this->load->view('course_list',$datas);
 } 
	 
	 
	 
	 
	 function edit_course(){
		 
		$data['editid']=$this->uri->segment(3);
		 
		$data['editdet']=$this->learning_model->edit_course($data['editid']); 
	
	$this->load->view('header',$data);
		$this->load->view('edit_course',$data);
 } 
 
 
 
 
	 
		 
		 
		 
		 function edit_course_det($eid){
		
		
	
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name', 'Course Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
		$this->form_validation->set_rules('duration', 'Duration', 'numeric');
		
		
		
		
           if ($this->form_validation->run() == false)
                {
					 $this->load->view('header',$data);
					 $data['course_list']=$this->user_model->course_list();
					 	$this->load->view('edit_course',$data);
                }
                else
                {

					$base=base_url();
					
  	 $coursedata=array(
	 'course_name'=>$this->input->post('course_name'),
	 'description'=>$this->input->post('description'),
	 'amount'=>$this->input->post('amount'),
	 'duration'=>$this->input->post('duration'),
	
	 );
	 //print_r($coursedata);
  
  // echo "success";
  
  			$this->load->model('learning_model');
   $quids =  $this->learning_model->edit_course_det($coursedata,$eid);
   if($quids==1){
  
   
    $this->session->set_flashdata('message', "<div class='alert alert-success'>Course Has been Updated</div>");
   
  redirect('learning/viewcourse');
}
  
} 

		
	
     }  

	 
	 
	 
		 function del_course(){
		 
		$delid=$this->uri->segment(3);
		 
		$data['del']=$this->learning_model->del_course($delid); 
	
	    redirect('learning/viewcourse');
 } 
  
	 
	 
	 
 function view_profile(){
	
	$this->load->view('header',$data);
		$this->load->view('view_profile',$data);
 }	 


function takeques($cuids){
	
	
	function decryptcids($string, $key) {
 $result = '';
 $string = base64_decode($string);

 for($i=0; $i<strlen($string); $i++) {
   $char = substr($string, $i, 1);
   $keychar = substr($key, ($i % strlen($key))-1, 1);
   $char = chr(ord($char)-ord($keychar));
   $result.=$char;
 }

 return $result;
}
 $cuid = decryptcids($cuids, "learn_lms@info#2018");
	
	
	$yy=$this->session->userdata('logged_in');
	

	
	$uids=$yy['uid'];
	
			if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}
	
	
	
	$insid=$this->learning_model->insert_quiz($uids,$cuid);   //insert quiz
	
	
	
	
	
	
	/* take question*/
	
		$data['qidsa']=$this->learning_model->takeques($cuid); 
	
	//print_r($data['qidsa']);  
	
	foreach($data['qidsa'] as $try){
		
		
		$rtg.=$try['qids'].",";
		
	}
	
	foreach($data['qidsa'] as $trys){
		
		
		$rtgs.=$trys['cids']."";
		
	}
	
	$listqids=$rtg;  //whole questions of course
	 $listcids=$rtgs;  //whole cat ids of course
	
	
	$expq=explode(',',$listqids);
	
	$lol=array_unique($expq);
	

	 $impq=implode(',',$lol);   //removed duplicate entries

	 $impqs=rtrim($impq,",");
	
	$ert=explode(',',$impqs);
	
	
	 $rand_ques = array_rand($ert,10);    // take 10 ques for exam
	 
	 
 foreach($rand_ques as $ff){
		 $v .= $ert[$ff].",";
	 }
	 
	// print_r($v); 
	 
	
	  $rand_quest=rtrim($v,",");   //random 10 ques
	 
	
	$exprq=explode(",",$rand_quest);
	
	
	foreach($exprq as $yy){
		
		$cidf=$this->learning_model->takecids($yy); 
		
		$cidk=$cidf['cid'];
		
		
		
		
		$cidfs=$this->quiz_model->add_qid($insid,$yy,$cidk); 
		
	}
	
	
	
	/*encrypt ins id*/
	
	 function encryptinsids($string, $key) {

     $result = '';
     
     for($i=0; $i<strlen($string); $i++) {
       $char = substr($string, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)+ord($keychar));
      $result.=$char;
     }

     return base64_encode($result);
     
    }        
    
    $ins_enc=encryptinsids("$insid","id_ins_lms@info#2018");

	
	
	/*encrypt ins id*/
	
	
	
	
	redirect('quiz/quiz_detail/'.$ins_enc);
	
 } 
	 
	
	 
	 
}
	 
	 
	 ?>