<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("user_model");
	   $this->load->model("qbank_model");
	   $this->load->model("quiz_model");
	   $this->load->model("result_model");
	   
	   
	      $this->load->model("Dasboard_model");  //jothi
	   
	   
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
			if($logged_in['su']!='1'){	
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
			//echo $this->session->userdata('uid');
			
		
    //jothi
	
	   
	    	 $data['get_user_max_mark']=$this->Dasboard_model->get_user_max_mark(); 
             $data['get_user_active_test_taken'] = $this->Dasboard_model->get_user_active_test_taken();
			 $data['get_user_num_pass'] = $this->Dasboard_model->get_user_num_pass(); 
			 $data['get_user_num_fail'] = $this->Dasboard_model->get_user_num_fail();

   $data['pass_per']=($data['get_user_num_pass'] / $data['get_user_active_test_taken'])*100;
   $data['fail_per']=($data['get_user_num_fail'] / $data['get_user_active_test_taken'])*100;
				
				
   $data['get_user_active_test_attempt'] = $this->Dasboard_model->get_user_active_test_attempt();
   
   
   $query = $this->Dasboard_model->groupwise();
		

	
		$data['res'] = $query['res'];

		
		$data['first_grp'] = $query['first_grp'];	
		$data['second_grp'] = $query['second_grp'];	
		$data['third_grp'] = $query['third_grp'];	
		
		
		$data['f_gid_count'] = $query['f_gid_count'];	
		$data['s_gid_count'] = $query['s_gid_count'];	
		$data['t_gid_count'] = $query['t_gid_count'];	
			
			
		//$data['test_result']=$this->result_model->home_result_list();
	
		$last_ten_result = $this->result_model->last_ten_test_result($this->session->userdata('uid'));
		$value=array();
     $value[]=array('Quiz Name','Percentage (%)');
		foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	// print_r($data['value']);
		//$data['result']=$this->result_model->get_result($uid);
		$this->load->view('header',$data);
		$this->load->view('dashboard',$data);
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
		
		// new updates 
		
		
		public function jobupdates(){
		//	echo"in";exit;
			$this->load->model('Dasboard_model');
			
			$skillmodel['skill']=$this->Dasboard_model->jobupdate_skill();
			$skillmodel['skills']=$this->Dasboard_model->mkiytf();
			$skillmodel['techs']=$this->Dasboard_model->techno();
	        // $skillmodel['job_location']=$this->Dasboard_model->job_loc();
		
		
		
			$this->load->view('header',$data);
			$this->load->view('jobupdates',$skillmodel);
		
		}
		
		
		public function insert_job(){


		$this->form_validation->set_rules('company_name','company name','required');

		$this->form_validation->set_rules('designation','designation ','required');

		$this->form_validation->set_rules('technology','Technology ','required');

		$this->form_validation->set_rules('skill[]','skill ','required');


		$this->form_validation->set_rules('company_type','company_type ','required');
		
		//$this->form_validation->set_rules('hremail','HR Email ','required');

		$this->form_validation->set_rules('fresh_exp','experience ','required');

		$this->form_validation->set_rules('location','location ','required');


		//$this->form_validation->set_rules('contact_no','contactno ','required');

		$this->form_validation->set_rules('posted_on','posted_on ','required');

		$this->form_validation->set_rules('posted_by','posted_by ','required');

         // $this->form_validation->set_rules('website_url','website_url ','required');




		if($this->form_validation->run()==false)
		{

	$skillmodel['skill']=$this->Dasboard_model->jobupdate_skill();
			$skillmodel['skills']=$this->Dasboard_model->mkiytf();
		$this->load->view('header',$data);
		$this->load->view('jobupdates',$skillmodel);
		//redirect('Dashboard/jobupdates');

		}
		else
		{
$com_name=$this->input->post('company_name');
$com_name_split=explode(",",$com_name);
		$data = array(
		'company_name' => $this->security->xss_clean($com_name_split[0]),
		'company_id' => $this->security->xss_clean($com_name_split[1]),
		'designation' => $this->security->xss_clean($this->input->post('designation')),
		'technology'=>$this->security->xss_clean($this->input->post('technology')),
		'skill_each' => $this->security->xss_clean($this->input->post('skill')),
		'skill' => implode(",",$this->input->post('skill')),
		'company_type' => $this->security->xss_clean($this->input->post('company_type')),
		'sal1' => $this->security->xss_clean($this->input->post('salary1')),
		'sal2' => $this->security->xss_clean($this->input->post('salary2')),
		'openings' => $this->security->xss_clean($this->input->post('openings')),
		'experience' => $this->security->xss_clean($this->input->post('fresh_exp')),
		'exp1' => $this->security->xss_clean($this->input->post('experience1')),
		'exp2' => $this->security->xss_clean($this->input->post('experience2')),
		'location'=>$this->security->xss_clean($this->input->post('location')),
		'interview_on'=>$this->security->xss_clean($this->input->post('interview_on')),
		'venue'=>$this->security->xss_clean($this->input->post('venue')),
		'hremail'=>$this->security->xss_clean($this->input->post('hremail')),
		'contactno'=>$this->security->xss_clean($this->input->post('contact_no')),
		'posted_on'=>$this->security->xss_clean($this->input->post('posted_on')),
		'posted_by'=>$this->security->xss_clean($this->input->post('posted_by')),
         'website_url'=>$this->security->xss_clean($this->input->post('website_url')),
         'comments'=>$this->security->xss_clean($this->input->post('comments')),
         'end_date'=>$this->security->xss_clean($this->input->post('end_date'))

		);



		$this->load->model('Dasboard_model');
		$jobresult=$this->Dasboard_model->jobupdate_insert($data);


		redirect('Dashboard/jobupdates');



		}


		}

		
		public function newskill(){
	$this->load->view('header',$data);
	
	$this->load->view('addnewskill');
	
}	

public function insert_newdesignation()
{
	

	$this->form_validation->set_rules('designation_name','Designation Name','trim|required|is_unique[designation.desg_name]');
	
	
	if($this->form_validation->run()==false)
		{
				$this->load->view('header',$data);
			$this->load->view('addnew_designation');
		}
		else
		{
			
			
	//logo upload        
	
	 $config['upload_path']   = './logo/'; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; 
         $config['max_size']      = 300; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $config['remove_spaces']    = TRUE;  

		 $new_name = time()."_".$_FILES["userfile"]['name'];
			
           $config['file_name'] = $new_name;
		   
		

         $this->load->library('upload', $config);
		 
		
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error);
				$this->load->view('header',$data);
			$this->load->view('addnewcompany');
         }
	
	    else{
		
            $data = $this->upload->data(); 
			
		}
		
			
			
			
			
			$company_name=$this->security->xss_clean($this->input->post('company_name'));
	
	        $this->load->model('Dasboard_model');
			$newskills=$this->Dasboard_model->newcompany_insert($company_name,$new_name);
			
			if($newskills == "true"){
				$ss['val']="Added Successfully";
				
			}
			else{
				$ss['val']="Some Error Found Please Try Again";
			}
	
	$this->load->view('header',$data);
			$this->load->view('addnewcompany',$ss);
	
		}
	
	
}




	public function insert_newskill(){
			
			


           $this->load->model('Dasboard_model');
			
			$skill_field['existskill']=$this->Dasboard_model->jobupdate_skill();

			
			
		$this->form_validation->set_rules('skillreq','Enter new skill or enter with no spaces','trim');

		 
		if($this->form_validation->run()==false)
		{
			
			//echo "elsein"; exit;
			$this->load->view('header',$data);
			$this->load->view('addnewskill');
			//redirect('Dashboard/newskill');
		
		}
		else
		{
		$datam = array(
		'newskill' =>$this->security->xss_clean($this->input->post('skillreq')),
		
		'existskill' => $skill_field['existskill']
		);
        

 $this->load->model('Dasboard_model');
			$newskills=$this->Dasboard_model->newskill_insert($datam);
				

redirect('Dashboard/newskill');
			
		}
	}
		
	
public function newcompany(){
	$this->load->view('header',$data);
	
	$whr=$this->uri->segment(3);
	
$data['company_list']=$this->Dasboard_model->company_view();
if($whr!="")
{
$data['company_edit']=$this->Dasboard_model->get_company($whr);
}
	
	$this->load->view('addnewcompany',$data);	
}

public function edit_company(){
	$this->load->view('header',$data);
	
	$whr=$this->uri->segment(3);
	
$data['company_list']=$this->Dasboard_model->company_view();
if($whr!="")
{
$data['company_edit']=$this->Dasboard_model->get_company($whr);
}
	
	$this->load->view('edit_company',$data);	
}

public function designation()

{
	
	$this->load->view('header');
	$data['designation']=$this->Dasboard_model->designation_view();
	$this->load->view('addnew_designation',$data);
	
}

public function newtech(){
	$this->load->view('header',$data);
	
	$this->load->view('addnewtechnology');
	
}


public function insert_newtech(){
	
		$this->form_validation->set_rules('newtech','New Technology','trim|required');

		 
		if($this->form_validation->run()==false)
		{
			
			
			$this->load->view('header',$data);
			$this->load->view('addnewtechnology');
			
		
		}
		else
		{
		$datam = array(
		'newtech' =>$this->security->xss_clean($this->input->post('newtech'))
		
		
		);
        

          $this->load->model('Dasboard_model');
			$new_techs=$this->Dasboard_model->newtech_insert($datam);
				

		if($new_techs == "true"){
				$ss['val']="Added Successfully";
				
			}
			else{
				$ss['val']="Some Error Found Please Try Again";
			}		
				
				
	$this->load->view('header',$data);
			$this->load->view('addnewtechnology',$ss);			
//redirect('Dashboard/newtech');
			
		}
	}


public function insert_newcompany(){
	
	
	

	$this->form_validation->set_rules('company_name','Company Name','trim|required|is_unique[company_names.company_name]');
	
	
	if($this->form_validation->run()==false)
		{
				$this->load->view('header',$data);
			$this->load->view('addnewcompany');
		}
		else
		{
			
			
	//logo upload        
	
	 $config['upload_path']   = './logo/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG'; 
         $config['max_size']      = 300; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $config['remove_spaces']    = TRUE;  

if($_FILES["userfile"]['name']=="")
{
    
    $new_name="";
}
else 

{
 $new_name = str_replace(" ","_",time()."_".$_FILES["userfile"]['name']);
}
			
           $config['file_name'] = $new_name;
		   
		

         $this->load->library('upload', $config);
		 
		
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error);
	
				$this->load->view('header',$data);
			$this->load->view('addnewcompany');
         }
	
	    else{
		
            $data = $this->upload->data(); 
			
		}
		
			
			
			
			
			$company_name=$this->security->xss_clean($this->input->post('company_name'));
	
	        $this->load->model('Dasboard_model');
			$newskills=$this->Dasboard_model->newcompany_insert($company_name,$new_name);
			
			if($newskills == "true"){
				$ss['val']="Added Successfully";
				
			}
			else{
				$ss['val']="Some Error Found Please Try Again";
			}
	$ss['company_list']=$this->Dasboard_model->company_view();
	$this->load->view('header',$data);
			$this->load->view('addnewcompany',$ss);
			
	
		}
	
}



public function update_newcompany(){
	
	
	

	$this->form_validation->set_rules('company_name','Company Name','trim|required');
	$whr=$this->uri->segment(3);
	$data['company_edit']=$this->Dasboard_model->get_company($whr);
	if($this->form_validation->run()==false)
		{
				$this->load->view('header',$data);
			$this->load->view('edit_company');
		}
		else
		{
						
	//logo upload        
	if($_FILES["userfile"]['name']!="")
	{
	 $config['upload_path']   = './logo/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG'; 
         $config['max_size']      = 300; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $config['remove_spaces']    = TRUE;  

		 $new_name = str_replace(" ","_",time()."_".$_FILES["userfile"]['name']);
			
           $config['file_name'] = $new_name;
		   
		

         $this->load->library('upload', $config);
		 
		
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error);
				$this->load->view('header',$data);
			$this->load->view('edit_company');
         }
	
	    else{
		
            $data = $this->upload->data(); 
			
		}

			
			$company_name=$this->security->xss_clean($this->input->post('company_name'));
			$whredit=$this->security->xss_clean($this->input->post('whredit'));
	
	        $this->load->model('Dasboard_model');
			$newskills=$this->Dasboard_model->newcompany_update($company_name,$new_name,$whredit);
			
			if($newskills == "true"){
				$ss['val']="Updated Successfully";
				
			}
			else{
				$ss['val']="Some Error Found Please Try Again";
			}
	}
	
	else 
		
		{
				$company_name=$this->security->xss_clean($this->input->post('company_name'));
			$whredit=$this->security->xss_clean($this->input->post('whredit'));
	
	        $this->load->model('Dasboard_model');
			$newskills=$this->Dasboard_model->newcompany_update_logo($company_name,$whredit);
				if($newskills == "true"){
				$ss['val']="Updated Successfully";
				
			}
			else{
				$ss['val']="Some Error Found Please Try Again";
			}
		}
	
	
	$ss['company_list']=$this->Dasboard_model->company_view();
	$this->load->view('header',$data);
			$this->load->view('edit_company',$ss);
	
		}
	
}


public function Joblists(){
	
	 $this->load->model('Dasboard_model');
			
			$skills['jobs']=$this->Dasboard_model->joblist();
	
	
	$this->load->view('header',$data);
			$this->load->view('joblist',$skills);
	
	
}


	public function joblocation(){
		
		
		
		 $this->load->model('Dasboard_model');
			
			$skill['job_location']=$this->Dasboard_model->job_loc();
	
print_r();
	
      $this->load->view('jobupdates',$skill);
	
		
		
	}





	
	
}
