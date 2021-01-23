<?php
  
   class Profile_controller extends CI_Controller {
	
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      }
		
      public function index() { 
          			if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}
	
          
         $this->load->view('upload_form', array('error' => ' ' )); 
      } 
		
		public function profile_uploads()
		{
			
			 $config['upload_path']   = './upload/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 300; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $config['remove_spaces']    = FALSE;  

		 $new_name = time()."_".$_FILES["userfile"]['name'];
			
           $config['file_name'] = $new_name;

         $this->load->library('upload', $config);
		 
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error);
				 redirect('Login/index'); 
         }
			
         else { 
		
		
            $data = $this->upload->data(); 
			
			$this->load->model('Profile_model');
			$this->Profile_model->updateprofile_image($new_name);
			redirect('Login/index');
			
		 }
		}
		
		
		
	 public function do_upload() {

  $this->form_validation->set_rules('ref_name','Reference Name','xss_clean|required');
	 
	// $this->form_validation->set_rules('ref_designation',' Designation','xss_clean|required');
	 
	 if (empty($_FILES['resume_candidate']['name']) && $this->input->post('oldresume')=="" )
{
    $this->form_validation->set_rules('resume_candidate', 'Document', 'required');
}
	 

	
	if($this->form_validation->run()==false)
		{
			$this->load->model('user_model');
			$data['profile'] = $this->user_model->profile();
			$this->load->view('welcome/edit_profile',$data);
		}
		else
		{
	$newName=time()."_".str_replace(" ","_",$_FILES['resume_candidate']['name']);
	$datas['pro_ref_name']=xss_clean($this->input->post('ref_name'));
	$datas['pro_ref_desig']=xss_clean($this->input->post('ref_designation'));
	$datas['pro_ref_phn']=xss_clean($this->input->post('ref_contact_no'));
	$datas['pro_certification']=xss_clean($this->input->post('certification'));
		$datas['pro_cert_name']=xss_clean($this->input->post('certification_name'));
		$datas['pro_job_pref1']=xss_clean($this->input->post('job_preference1'));
		$datas['pro_job_pref2']=xss_clean($this->input->post('job_preference2'));
		$datas['pro_job_pref3']=xss_clean($newName);
		$datas['resume_name']=xss_clean($_FILES['resume_candidate']['name']);
		$datas['old_resume']=xss_clean($this->input->post('oldresume'));

	//	$imagename	= $data['raw_name'].$data['userfile'];
			
			$config['upload_path']   = 'resume_candidate/';
                $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg|pdf|doc|docx';
             //   $config['max_size']      = 1024;
				   $config['remove_spaces']    = TRUE;  
				   $config['file_name'] = $newName; 
                $this->load->library('upload', $config);
                //upload file to directory
				
				if($_FILES['resume_candidate']['name']!="")
					
					{
                if($this->upload->do_upload('resume_candidate')){
					
					$this->load->model('Profile_model');
			$this->Profile_model->updateprofile($datas);
$this->session->set_flashdata('update', 'Updated Successfully');
redirect('Login/edit_profile'); 
					
				}
				
				else {
						 //$this->form_validation->set_message('resume_candidate', 'Invalid file format');			
$this->session->set_flashdata('invalidfile', 'Invalid file format');
redirect('Login/edit_profile',$data); 
					
				}
					}
					
					else {
						$this->load->model('Profile_model');
			$this->Profile_model->updateprofile($datas);
$this->session->set_flashdata('update', 'Updated Successfully');
redirect('Login/edit_profile'); 
						
					}
				

      } 
	  }
	  
	  
	  	public function upload_image_resume(){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png','application/pdf');
        $mime = get_mime_by_extension($_FILES['resume_candidate']['name']);
        if(isset($_FILES['resume_candidate']['name'])){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('resume_candidate', 'Please select only jpg/png/gif file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('resume_candidate', 'Please choose a file to upload.');
            return false;
        }
    }
	  
	  Public function change_password()
	  {
		
		  $data=array('oldpsd'=>$this->input->post('keyval'),
		  'newpsd'=>$this->input->post('keysdd'));
		  
		  $this->load->model('Profile_model');
		$val=$this->Profile_model->changepsd($data);
	
	//redirect('Login/reply');
		
	  }
   } 
?>