<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->library('excel');
	 //  $this->load->database();
	   $this->load->model("user_model");
	   $this->lang->load('basic', $this->config->item('language'));
	  $this->load->library('pagination');
	  $this->load->library('Ajax_pagination');
$this->lang->load('basic', $this->config->item('language'));
        $this->perPage = 3;
	//	  $this->clear_cache();
/* 		if($this->db->database ==''){
		redirect('install');	
		} */

		
		
	 }
	 
	 function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

	public function index()
	{
		//echo $this->session->userdata('logged_in');exit;

		if(!empty($this->session->userdata('logged_in'))){
			
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1'){
				//redirect('dashboard');
				redirect('login/reply');	
			}else{
				//redirect('dashboard');
//redirect('login/reply');	
redirect('quiz');				
			}
			
		}
	
		$data['title']=$this->lang->line('login');
		//$this->load->view('header',$data);
		$this->load->view('welcome/index',$data);
	//	$this->load->view('footer',$data);
	}
	
	public function subscribe()
	
	{
		
 //$ss=$this->input->post('email');	
	
	$val=$this->user_model->subscribe_list();
$this->session->set_userdata('email_sub', $val[0]['email']);

$this->user_model->insert_sub();	
redirect('Login/reply');
	
	}
	
	
	
 public function login()
  {
	  $dataa['invalid']="Invalid Username or password";
	//$this->load->view('header',$data);
		$this->load->view('welcome/index',$dataa);
		//$this->load->view('footer',$data);
  }
	
		public function registration()
	{
		
		
		$data['title']=$this->lang->line('register_new_account');
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		//$this->load->view('header',$data);
		$this->load->view('register',$data);
		//$this->load->view('footer',$data);
	}

	public function  toregister()
	
	{
		
			$data['group_list']=$this->user_model->group_list();
			
		 $this->load->view('welcome/register',$data);
		//$this->load->view('welcome/register_closed',$data);
	}
	
	public function  tologin()
	
	{
		$dataa['message_display']="Your Password Has been Changed";
		$this->load->view('welcome/index',$dataa);
	}
	
	
	public function register_account()
	{
		 	$this->form_validation->set_rules('name','FullName','trim|required');
		//	$this->form_validation->set_rules('register_no','University Roll Number','trim|required');
		$this->form_validation->set_rules('mobile','Mobile','trim|required|min_length[10]|max_length[10]|numeric|is_unique[savsoft_users.contact_no]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[savsoft_users.email]');
	$this->form_validation->set_rules('password','Password','trim|required');

	$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]');
	//$this->form_validation->set_rules('group','Group','trim|required');
		//$this->form_validation->set_rules('degree','Degree','trim|required');
	//	$this->form_validation->set_rules('department','Department','trim|required');
/* 		
	
		$this->form_validation->set_rules('interest[]','Domain Interest','trim|required'); 
			$this->form_validation->set_rules('group','Group','trim|required');*/
			
			
		if($this->form_validation->run()==false)
		{
			$data['group_list']=$this->user_model->group_list();
			$this->load->view('welcome/register',$data);
		}
		else
		{
			
			$username=$this->security->xss_clean($this->input->post('name'));
				//	$register_no=$this->security->xss_clean($this->input->post('register_no'));
					$mobile=$this->security->xss_clean($this->input->post('mobile'));
			$email=$this->security->xss_clean($this->input->post('email'));
	$pass=$this->security->xss_clean($this->input->post('password'));
	$retype_pass=$this->security->xss_clean($this->input->post('retype_password'));
	
			$degree=$this->security->xss_clean($this->input->post('degree'));
			$dept=$this->security->xss_clean($this->input->post('department'));
		
			
		//	$group=$this->security->xss_clean($this->input->post('group'));
			
	/* 		
			
			$inter=$this->security->xss_clean(implode(",",$this->input->post('interest'))); */
		
			 $chars = 16;       
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       $shuffle=  substr(str_shuffle($letters), 0, $chars);	  
	   
			$data = array(
			'username' => $username,
			//'register_no' => $register_no,
			'contact_no' => $mobile,
		'email' => $email,
		'password' =>md5($pass),
		'degree' => $degree,
		//'gid' =>$group,
		'dept' =>$dept,
		'otp_token' => $shuffle
	/* 	
		
		'interest'=>$inter */ );
		
//$data['interest']; 
			$this->load->model('welcome/insert_model');
			$result=$this->insert_model->inserting($data);
			/* if($result==true)
			{
				
	$data['message_display']="Please Login to continue....";
					
	            $this->load->view('welcome/index',$data);			
				
		
			}
			else
			{
				$data['message_display']="Not registered Please Try Again";
				$this->load->view('welcome/register',$data);
			} */
				
	  $from_email = "support@aicl.training"; 
      $to_email = $email;  
		 
		 
	  //  $chars = 16;       
      //  $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      // $shuffle=  substr(str_shuffle($letters), 0, $chars);	   
		

	 // $shuff_enc=md5($shuffle);
	
			$this->session->set_userdata('enc_pass_sess',$shuffle);
		 		 $this->session->set_userdata('enc_user',$username);
           // $mesg = $this->load->view('password_email_content','',true);
            $mesg = $this->load->view('password_email','',true);	
			//echo $mesg; exit;			
   $config=array(
'charset'=>'utf-8',
'wordwrap'=> TRUE,
'mailtype' => 'html'
);

$this->email->initialize($config);

         $this->email->from($from_email, 'AICL Portal'); 
         $this->email->to($to_email);
         $this->email->subject('Activate Account'); 
         $this->email->message($mesg); 

         //Send mail 
       if($this->email->send()) {
			
			
			if($result==true)
			{
				
	$data['message_display']="Registered Successfully";
					
	            $this->load->view('welcome/index',$data);			
						
			}
			else
			{
				$data['message_display']="Not registered Please Try Again";
				$this->load->view('welcome/register',$data);
			}
		 }
		
		}
	
	}
	
	
	public function verifylogin()
	{
		
		$this->form_validation->set_rules('emails','Enter Email','trim|required');
		$this->form_validation->set_rules('passwords','Enter Password','trim|required');
		
		
		if($this->form_validation->run()==false)
		{
			$this->load->view('welcome/index');
		}
		else
		{
		$username=$this->security->xss_clean($this->input->post('emails'));
		$password=$this->security->xss_clean($this->input->post('passwords'));
	$count_verify=$this->user_model->login_count_verify($username,$password);
		if($this->user_model->login($username,$password)){
			
	// row exist fetch userdata
			$user=$this->user_model->login($username,$password);
	//	echo "inn";
	//	exit;
			
		//	 echo $user['uid']; exit;
			// validate if user assigned to paid group
			if($user['price'] > '0'){
				
				// user assigned to paid group now validate expiry date.
				if($user['subscription_expired'] <= time()){
					// eubscription expired, redirect to payment page
		redirect('payment_gateway/subscription_expired/'.$user['uid']);
					
				}
				
			}
			$user['base_url']=base_url();
			// creating login cookie
			
			$this->session->set_userdata('logged_in', $user);
			$this->session->set_userdata('gid', $user['gid']);
			$this->session->set_userdata('uid', $user['uid']);
			$this->session->set_userdata('first_name', $user['first_name']);
			$this->session->set_userdata('interest', $user['reg_no']);
			$this->session->set_userdata('admin_su', $user['su']);
			$this->session->set_userdata('subject_code', $user['subject_code']);
			$this->session->set_userdata('profile_image', $user['img']);
			// redirect to dashboard 
			if($user['su']=='1'){
				//redirect('dashboard');
				redirect('login/reply');	
			}
			else
			{
				
			if($user['profile_update']==1)
			{
				   //redirect('login/reply');
				   redirect('quiz');
				
			}
			else
			{
				redirect('quiz');
		//	redirect('login/edit_profile');
			}
				//redirect('dashboard1');
       				
			}
		}
		else
		{
			
			if($count_verify==1)
				{
				$datas['invalid']="Email Not Verified";	
				}
				else 
				{
					$datas['invalid']="Invalid Credentials";
				}
		//	echo "out";exit;
			 
			// invalid login
			/* $this->session->set_flashdata('message', $this->lang->line('invalid_login'));
			redirect('login'); */
		//	$datas['invalid']="Invalid Username or Password";
				
			$this->load->view('welcome/index',$datas);
		}
		
		
		}	
	}
	
	function edit_profile()
	{
		if($this->session->userdata('uid')=="") {
				redirect('login');
		}
		
		$data['profile'] = $this->user_model->profile();
		$this->load->view('welcome/edit_profile',$data);
	}
	function myjobs()
	{
		if($this->session->userdata('uid')=="") {
				redirect('login');
		}
		
		$data['job'] = $this->user_model->my_jobs();
		$this->load->view('welcome/my_jobs',$data);
	}
	
	function applied_jobs()
	{
		if($this->session->userdata('admin_su')!="1") {
				redirect('login');
		}
		
		$data['job'] = $this->user_model->applied_jobs();
		$this->load->view('welcome/applied_jobs',$data);
	}
	
	function reply()
	{
	//echo $this->session->userdata('uid');
		if(empty($this->session->userdata('uid'))) {
				redirect('login');
		}
/* 	 		if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}  */
	

		$data['values']=$this->user_model->job_updates();
		
$data['eventlist']=$this->user_model->courses_list();	

		$config['total_rows'] = $this->user_model->getAllEmployeeCount();
        $data['total_count'] = $config['total_rows'];
		$config['base_url'] = base_url() . 'index.php/Login/reply/';
		 $config["per_page"] = 16;
        $config["uri_segment"] = 3;
		    $this->pagination->initialize($config);
			
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();
			
			
       // $config['suffix'] = '';
		$data['employeeInfo'] = $this->user_model->employeeList($config["per_page"], $page); //jobs in homepage
			$data['employeeInfo1'] = $this->user_model->employeeList1(); //jobs in homepage
			$data['new_openings'] = $this->user_model->new_openings(); //jobs in homepage exit;
			$data['total_jobs'] = $this->user_model->total_jobs(); //jobs in homepage
		/* 
		 if ($config['total_rows'] > 0) {
            $page_number = $this->uri->segment(3);
		
		if (empty($page_number))
                $page_number = 1;
            $offset = ($page_number - 1) * $this->pagination->per_page;
			 $this->user_model->setPageNumber($this->pagination->per_page);
			 $this->user_model->setOffset($offset);
            $this->pagination->cur_page = $offset;
            $this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			$data['employeeInfo'] = $this->user_model->employeeList(); //jobs in homepage
			$data['employeeInfo1'] = $this->user_model->employeeList1(); //jobs in homepage
		
		 }  */
		 $data['profile'] = $this->user_model->profile();
		 $data['location']=$this->user_model->select_location_track();
         $data['company_type']=$this->user_model->company_types();
        
        //load the view
       // $this->load->view('posts/index', $data);
		$data['education']=$this->user_model->educational_update();
		$data['county']=$this->user_model->count_msg();
		$data['education_list']=$this->user_model->latest_education_updates();

		$data['company_list']=$this->user_model->company_list();
		$data['company_list_old']=$this->user_model->company_list_old();

		$this->load->view('welcome/home',$data);

}
 
 
 function show_location()
 {
   $val=$this->input->post('keyword'); 
$this->load->model('User_model');
 $ss['value']=$this->User_model->loca_data($val);
$this->load->view('location_ajax',$ss);
 }   
 

 
 function excel()
 {
	 
	 $this->load->view('welcome/excel_import');
	 
 }
 
 
 function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			//echo "welcome";
			//exit;
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$company_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$job_requirement = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$job_required = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$technology = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$designation = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$openings = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$location = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$experience = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$timing = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$posted = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$mail = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$mobile = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$website = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$url = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					 $type = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					
					$data[] = array(
						'company_name'		=>	$company_name,
						'job_requirement'			=>	$job_requirement,
						'job_required'				=>	$job_required,
						'technology'		=>	$technology,
						'designation'			=>	$designation,
						'no_of_openings'  => $openings,
						'location'  => $location,
						'experience'   =>$experience,
						'interview_timing'  =>$timing,
						'posted_date'  =>$posted,
						'contact_mail'  =>$mail,
						'mobile_number'  =>$mobile,
						'website_name'   =>$website,
						'website_url'   =>$url,
						'type'  =>$type
					);
				}
			}
			$this->load->model('user_model');
			$this->user_model->excel_insert($data);
			echo 'Data Imported successfully';
		}	
	}
 
 
function popup_detail()
{
	
	$whr=$this->input->post('data');
	
	$this->load->model('user_model');  
	$tt['job_detail']=$this->user_model->is_available($this->input->post('data'));
	$this->load->view('job_ajax',$tt);
	
	
}


function comp_job_popup_detail()
{
	
	 $whr=$this->input->post('keywordas'); 
	
	$this->load->model('user_model');  
	$tt['comp_job_detail']=$this->user_model->compjob_is_available($whr);
	$this->load->view('comp_job_ajax',$tt);
	
	
}


 
 
 function popup_education_detail()
{
	
	/* $this->load->model('user_model');
	$va['datas']=$this->user_model->education_table_select($this->input->post('data'));
	$this->load->view('education_ajax',$va); */
	
	
	$this->load->model('user_model');  
	$tt['job_detail']=$this->user_model->is_available($this->input->post('data'));
	$this->load->view('education_ajax',$tt);
} 
 


	

	function verify($vcode){
			 
		 if($this->user_model->verify_code($vcode)){
			 $data['title']=$this->lang->line('email_verified');
		   $this->load->view('header',$data);
			$this->load->view('verify_code',$data);
		  $this->load->view('footer',$data);

			}else{
			 $data['title']=$this->lang->line('invalid_link');
		   $this->load->view('header',$data);
			$this->load->view('verify_code',$data);
		  $this->load->view('footer',$data);

			}
	}
	
	
	
	
	function forgot(){
			if($this->input->post('email')){
			$user_email=$this->input->post('email');
			 if($this->user_model->reset_password($user_email)){
				$this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('password_updated')." </div>");
						
			}else{
				$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('email_doesnot_exist')." </div>");
						
			}
			redirect('login/forgot');
			}
			
  
			$data['title']=$this->lang->line('forgot_password');
		   //$this->load->view('header',$data);
			$this->load->view('forgot_password',$data);
		  //$this->load->view('footer',$data);

	
	}
	
	
		public function insert_user()
	{
		
		
		 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[savsoft_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_rules('first_name', 'First Name', 'xss_clean|required');
		 $this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean|required');
		 $this->form_validation->set_rules('contact_no', 'Contact Number', 'xss_clean|required|regex_match[/^[0-9]{10}$/]');
		 $this->form_validation->set_rules('gid', 'Select Group', 'required');
          if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					$data['title']=$this->lang->line('register_new_account');
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
	//	$this->load->view('header',$data);
		$this->load->view('register',$data);
		//$this->load->view('footer',$data);
					//redirect('login/registration/');
					 // $this->load->view('register',$data);
                }
                else
                {
					if($this->user_model->insert_user_2()){
                        if($this->config->item('verify_email')){
						$this->session->set_flashdata('message1', "<div class='alert alert-success'>".$this->lang->line('account_registered_email_sent')." </div>");
						}else{
							$this->session->set_flashdata('message1', "<div class='alert alert-success'>".$this->lang->line('account_registered')." </div>");
						}
						}else{
						    $this->session->set_flashdata('message1', "<div class='alert alert-danger'>".$this->lang->line('error_to_add_data')." </div>");
						
					}
					redirect('login/login/');
                }       

	}
	
	
	
	
	function verify_result($rid){
		
		$this->load->model("result_model");
		
			$data['result']=$this->result_model->get_result($rid);
	if($data['result']['gen_certificate']=='0'){
		exit();
	}
	
	
	$certificate_text=$data['result']['certificate_text'];
	$certificate_text=str_replace('{email}',$data['result']['email'],$certificate_text);
	$certificate_text=str_replace('{first_name}',$data['result']['first_name'],$certificate_text);
	$certificate_text=str_replace('{last_name}',$data['result']['last_name'],$certificate_text);
	$certificate_text=str_replace('{percentage_obtained}',$data['result']['percentage_obtained'],$certificate_text);
	$certificate_text=str_replace('{score_obtained}',$data['result']['score_obtained'],$certificate_text);
	$certificate_text=str_replace('{quiz_name}',$data['result']['quiz_name'],$certificate_text);
	$certificate_text=str_replace('{status}',$data['result']['result_status'],$certificate_text);
	$certificate_text=str_replace('{result_id}',$data['result']['rid'],$certificate_text);
	$certificate_text=str_replace('{generated_date}',date('Y-m-d',$data['result']['end_time']),$certificate_text);
	
	$data['certificate_text']=$certificate_text;
	  $this->load->view('view_certificate_2',$data);
	 

	}
	
	
	function online_tutorial()
	{
		if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}
		
		$data['java']=$this->user_model->get_video_java();
		$data['android']=$this->user_model->get_video_android();
		$data['php']=$this->user_model->get_video_php();
		$data['python']=$this->user_model->get_video_python();
		$data['iot']=$this->user_model->get_video_iot();
		$this->load->view('welcome/video',$data);
		
	}
		
	function online_tutorial_ajax()
	{
		$keyday=$this->input->post('keyday');
		$keysub=$this->input->post('keysub');

	$tt['url_detail']=$this->user_model->get_ajax_url($keyday,$keysub);
	$this->load->view('welcome/url',$tt);
	
		
	}
	
	function change_psd_controll(){
		
	$this->load->view('welcome/chge_psd');
		
		
	}
	
	function online_exam()
	{
		if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}
		
		 $mms=$this->session->userdata('admin_su');
		
		if($mms=='1'){
				redirect('dashboard');
				
			}else{
				redirect('dashboard1');
					
			}
	}
	

	
	function more_jobs()
	{
	
		$data['eventlist']=$this->user_model->events();
		//$this->load->model('user_model');
	//$value['datas']=$this->user_model->show_more();
	
		$config['total_rows'] = $this->user_model->getAllEmployeeCounts();
		
        $data['total_count'] = $config['total_rows'];
        $config['suffix'] = '';
		
		 if ($config['total_rows'] > 0) {
            $page_number = $this->uri->segment(3);
		$config['base_url'] = base_url() . 'index.php/Login/more_jobs/';
		if (empty($page_number))
                $page_number = 1;
            $offset = ($page_number - 1) * $this->pagination->per_page;
			 $this->user_model->setPageNumbers($this->pagination->per_page);
			 $this->user_model->setOffsets($offset);
            $this->pagination->cur_page = $offset;
            $this->pagination->initialize($config);
			$data['page_links'] = $this->pagination->create_links();
			 $data['employeeInfo'] = $this->user_model->employeeLists();
		
		 } 

		
		$this->load->view('showmorejobs',$data);
	}

	function educational_updates()
	{
		 $data['result']=$this->user_model->educational_update();
	$data['eventlist']=$this->user_model->events();
	$data['education_list']=$this->user_model->latest_education_updates();
	
		$this->load->view('educational_view',$data);
	}
	
	function compltejob_popup()
{
	
	$whr=$this->input->post('data');
	
	$this->load->model('user_model');  
	$tt['job_detail']=$this->user_model->is_availables($this->input->post('data'));
	$this->load->view('fulljob_ajax',$tt);
	
	
}

 function apply_job()
 
 {
	 
	$whr=$this->input->post('data'); 
	$this->load->model('user_model');  
	$apply=$this->user_model->apply_job($whr);
	
	if($apply)
	{
		return "success";
	}
	
 }
 


function event_detail()
{
	
	$whr=$this->input->post('data');
	
	$this->load->model('user_model');  
	$tt['job_detail']=$this->user_model->event_details($this->input->post('data'));
	//echo $job_detail; exit;
	$this->load->view('event_ajax',$tt);
	
	
}

function keyword_search()
 {
    /* // echo"in";
     
      $val=$this->input->post('keyval');
          $val=$this->input->post('keysdd');
echo  $val=$this->input->post('cate');
     exit; */
      $data = array(
        'keyword' => $this->input->post('keyval'),
        'location'=>$this->input->post('keysdd'),
        'types'=>$this->input->post('cate'));

        $mm['rect']=$this->user_model->key_filter($data); 
     $this->load->view('keysearch_ajax',$mm);
     
 }
  function verifyotp()
{

	$verify = $this->uri->segment(3); 
	$res=$this->user_model->activate_account($verify);
	if($res)
	{
	    // echo"updated";
	    	$data['message_display']="Your account has been activated";	
	        $this->load->view('welcome/index',$data);
	}
	else
	{
	    // echo"not updated";
	    	$data['message_display']="Your account not exist";	
	        $this->load->view('welcome/index',$data);
	}
	
}

function courses()
{
	
	if($this->session->userdata('uid')=="") {
				redirect('login');
		}
		
		$data['job'] = $this->user_model->my_jobs();
	$this->load->view('welcome/courses',$data);
	
}

function apply_course()
{
	$whr=$this->input->post('data'); 
	$this->load->model('user_model');  
	$apply=$this->user_model->apply_course($whr);
	
	if($apply)
	{
		return "success";
	}
}
}
