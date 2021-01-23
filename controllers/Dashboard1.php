<?php


class Dashboard1 extends CI_Controller {

	 function __construct()
	 {

	   parent::__construct();
	   $this->load->database();
           $this->load->library('session');
	   $this->load->model("user_model");
	   $this->load->model("qbank_model");
	   $this->load->model("quiz_model");
	   $this->load->model("result_model");
	 //  $this->load->model("dashboard_model");
	   $this->lang->load('basic');
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

	public function index()
	{

		$data['title']=$this->lang->line('dashboard');
		
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['su']=='1'){				
		$data['result']=$this->user_model->user_list(0);		
		$data['num_users']=$this->user_model->num_users();
		$data['num_qbank']=$this->qbank_model->num_qbank();
		$data['num_quiz']=$this->quiz_model->num_quiz();
		}		

		//$data['ieee_desc']=$this->user_model->get_ieee_desc();
	   // $data['ieee_j_desc']=$this->user_model->get_ieee_j_desc();	


		//$data['test_result']=$this->result_model->home_result_list1();		
	
		$last_ten_result = $this->result_model->last_ten_test_result1($this->session->userdata('uid'));

		$data['last_ten_result']=$last_ten_result;
		$value=array();
     $value[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	
	$last_ten_aptitude = $this->result_model->last_ten_test_aptitude($this->session->userdata('uid'));
	$last_ten_english = $this->result_model->last_ten_test_english($this->session->userdata('uid'));
	$last_ten_arrays = $this->result_model->last_ten_test_arrays($this->session->userdata('uid'));
	$last_ten_operators = $this->result_model->last_ten_test_operators($this->session->userdata('uid'));
	
$data['get_user_active_test'] = $this->result_model->get_user_active_test($this->session->userdata('gid'));

$data['get_user_active_test_taken'] = $this->result_model->get_user_active_test_taken($this->session->userdata('gid'),$this->session->userdata('uid'));

$data['get_user_active_test_pending'] = $this->result_model->get_user_active_test_pending($this->session->userdata('gid'),$this->session->userdata('uid'));

$data['get_user_active_test_attempt'] = $this->result_model->get_user_active_test_attempt($this->session->userdata('gid'),$this->session->userdata('uid'));

$data['get_user_max_mark'] = $this->result_model->get_user_max_mark($this->session->userdata('gid'),$this->session->userdata('uid'));

	 $data['get_user_num_pass'] = $this->result_model->get_user_num_pass($this->session->userdata('gid'),$this->session->userdata('uid')); 
	 $data['get_user_num_fail'] = $this->result_model->get_user_num_fail($this->session->userdata('gid'),$this->session->userdata('uid'));

$data['pass_per']=($data['get_user_num_pass'] / $data['get_user_active_test_taken'])*100;
$data['fail_per']=($data['get_user_num_fail'] / $data['get_user_active_test_taken'])*100;

	/* 	$value1=array();
     $value1[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_aptitude as $val1){
     $value1[]=array($val1['quiz_name'].' ('.$val1['first_name']." ".$val1['last_name'].')',intval($val1['Apptitude']));
     }
     $data['value1']=json_encode($value1);
	 
	 	$value2=array();
     $value2[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_english as $val2){
     $value2[]=array($val2['quiz_name'].' ('.$val2['first_name']." ".$val2['last_name'].')',intval($val2['English-1']));
     }
     $data['value2']=json_encode($value2);
	 
	 $value3=array();
     $value3[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_arrays as $val3){
     $value3[]=array($val3['quiz_name'].' ('.$val3['first_name']." ".$val3['last_name'].')',intval($val3['Arrays']));
     }
     $data['value3']=json_encode($value3);
	 
	 
	  $value4=array();
     $value4[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_operators as $val4){
     $value4[]=array($val4['quiz_name'].' ('.$val4['first_name']." ".$val4['last_name'].')',intval($val4['Operators']));
     }
     $data['value4']=json_encode($value4); */
	// print_r($data['value1']);
		//$data['result']=$this->result_model->get_result($uid);

		$this->load->view('header',$data);
		$this->load->view('dashboard1',$data);
		//$this->load->view('view_result',$data);
	    //$this->load->view('footer',$data);
	}
	
	
		public function config(){
		
		$logged_in=$this->session->userdata('logged_in');

			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}
			if($this->config->item('frontend_write_admin') > $logged_in['su']){
			exit($this->lang->line('permission_denied'));
			}			
			
		if($this->input->post('config_val')){
		if($this->input->post('force_write')){
		if(chmod("./application/config/config.php",0777)){ } 	
		}
		
		$file="./application/config/config.php";
		$content=$this->input->post('config_val');
		 file_put_contents($file,$content);
		if($this->input->post('force_write')){
		if(chmod("./application/config/config.php",0644)){ } 	
		}

		 	 redirect('dashboard/config');
		} 
		 
		$data['result']=file_get_contents('./application/config/config.php');
		$data['title']=$this->lang->line('config');
		$this->load->view('header',$data);
		$this->load->view('config',$data);
		$this->load->view('footer',$data);

		}

		public function css(){
		
		$logged_in=$this->session->userdata('logged_in');

			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}
			
			
		if($this->input->post('config_val')){
		if($this->input->post('force_write')){
		if(chmod("./css/style.css",0777)){ } 	
		}

		$file="./css/style.css";
		$content=$this->input->post('config_val');
		 file_put_contents($file,$content);
		if($this->input->post('force_write')){
		if(chmod("./css/style.css",0644)){ } 	
		}

		 redirect('dashboard/css');
		} 
		 
		$data['result']=file_get_contents('./css/style.css');
		$data['title']=$this->lang->line('config');
		$this->load->view('header',$data);
		$this->load->view('css',$data);
		$this->load->view('footer',$data);

		}		
		
		
		
	
}
