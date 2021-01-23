<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("dashbord_model");
	   $this->lang->load('basic', $this->config->item('language'));
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
	 }
	 
	 	public function index($limit='0',$status='0')
	{
		
		
		$uid=$this->session->userdata('uid');
		$data['limit']=$limit;
		$data['status']=$status;
		$data['title']=$this->lang->line('resultlist');
		// fetching result list
		$data['test_result']=$this->dashboard_model->home_result_list($limit,$status);
		// fetching quiz list
		$data['home_quiz_list']=$this->dashboard_model->quiz_list();
		// group list
		 $this->load->model("user_model");
		$data['group_list']=$this->user_model->group_list();
		
			
	 	 $data['ind_result'] = $this->dashboard_model->get_ind_cat_all($uid);
		 print_r ($data['ind_result']);


		/*  $data['ind_result'] = $this->dashboard_model->get_ind_cat_all($uid); */
		
		$this->load->view('header',$data);
		$this->load->view('home_result_list',$data);
	//	$this->load->view('footer',$data);
		
	}
	
		
	function view_result($rid){
		
		$logged_in=$this->session->userdata('logged_in');
			
		$data['test_result']=$this->dashboard_model->home_get_result($rid);
		$data['title']=$this->lang->line('result_id').' '.$data['test_result']['rid'];
		if($data['test_result']['view_answer']=='1' || $logged_in['su']=='1') {
		$this->load->model("quiz_model");
		$data['saved_answers']=$this->quiz_model->saved_answers($rid);
		$data['questions']=$this->quiz_model->get_questions($data['test_result']['r_qids']);
		$data['options']=$this->quiz_model->get_options($data['test_result']['r_qids']);
		}
		// top 10 results of selected quiz
	$home_last_ten_result = $this->dashboard_model->home_last_ten_result($data['test_result']['quid'],$data['test_result']['uid']);
	$value=array();
     $value[]=array('Quiz Name','Percentage (%)');
     foreach($home_last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	 
	// time spent on individual questions
	$correct_incorrect=explode(',',$data['test_result']['score_individual']);
	 $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
    foreach(explode(",",$data['test_result']['individual_time']) as $key => $val){
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='2' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
	 }
	 else if($correct_incorrect[$key]=='0' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='3' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
	 }
	 }
	  $data['qtime']=json_encode($qtime);
	 $data['percentile'] = $this->dashboard_model->get_percentile($data['test_result']['quid'], $data['test_result']['uid'], $data['test_result']['score_obtained']);

	/*  $data['ind_result']= $this->dashboard_model->get_ind_cat($rid,$data['test_result']['uid']); */
	 
	 
	 $ind_result = $this->dashboard_model->get_ind_cat($rid,$data['test_result']['uid']);
	 $values=array();
	  $values[]=array('Quiz Name','Marks');
	 foreach($ind_result as $ind_result1){
     $values[]=array($ind_result1['category_name'].'',intval($ind_result1['cnt']));
    
     } 
	
	 
	 $data['values']=json_encode($values);
	 

	 
		$this->load->view('header',$data);
		$this->load->view('view_result',$data);
	//	$this->load->view('footer',$data);	
		
	}
	
		
	function view_group_result($rid){
		
		$logged_in=$this->session->userdata('logged_in');

	 
	   $grp_resultdd = $this->dashboard_model->get_group_cat($rid);
	   
	 $data['grp_name'] = $this->dashboard_model->get_group_name($rid);
	 

	 $values=array();
	  $values[]=array('Result','Pass','Fail');
	 foreach($grp_resultdd as $grp_resultres){
		 
     $values[]=array($grp_resultres['quiz_name'],intval($grp_resultres['pass_count']),intval($grp_resultres['fail_count']));
	 
     } 
	

	 $data['values']=json_encode($values);
	

	 
		$this->load->view('header',$data);
		$this->load->view('view_result_group',$data);
	//	$this->load->view('footer',$data);	
		
	}
	 
}