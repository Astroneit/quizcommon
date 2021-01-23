<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetpass_controller extends CI_Controller {

	
	 
public function toforget(){
	
	$this->load->view('welcome/forgot_password');
}	 
	
public function toreset(){
	 $token=$this->uri->segment(3);
if($token==""){
		redirect('Login'); 
	 }
	    $this->load->model("Forgetpass_model");
	$rr=$this->Forgetpass_model->istoken($token);
	 
	 if($rr==false){
		
		redirect('Forgetpass_controller/toforget'); 
	 }
	 elseif($rr==true){
		
		 $this->load->view('reset_pass');
	 }
	 
	
}	 

	
	

public function forgetpass(){
	
	
	
	$data['email']=$this->input->post('forgetemail');
	   $this->load->model("Forgetpass_model");
	$rr=$this->Forgetpass_model->forget_pass($data);
	
 	if($rr==true){
		
		
			//email
			
	  $from_email = "arumugam@astrone.ltd"; 
         $to_email = $data['email']; 
		 
		 
	    $chars = 16;       
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       $shuffle=  substr(str_shuffle($letters), 0, $chars);	  
		

	$shuff_enc=md5($shuffle);
	
	

			$this->session->set_userdata('enc_pass_sess',$shuff_enc);
		 
		 
		 
		 
		 
		
		 
            $mesg = $this->load->view('forgetpass_email_content','',true);
			
			$config['protocol'] = 'smtp';
$config['mailtype'] = 'html';
$config['smtp_host'] = 'ssl://smtp.gmail.com'; //'ssl://smtp.googlemail.com';
$config['smtp_user'] = 'email_address';
$config['smtp_pass'] = 'password';
$config['smtp_port'] = '465';
$config['charset'] = 'utf-8';
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
			


$this->email->initialize($config);

         $this->email->from($from_email, 'AICL Portal'); 
         $this->email->to($to_email);
         $this->email->subject('Reset Your Password'); 
         $this->email->message($mesg); 

         //Send mail 
         if($this->email->send()) {
			 
			 
			 
			 

        $this->load->model("Forgetpass_model");
	$rss=$this->Forgetpass_model->insert_forget_pass($shuff_enc,$data);
	
			 
			 
			 
         $this->session->set_flashdata("email_sent","Email sent successfully to Your Mail Address."); 
		 
		 
		 $success['succ_msg'] = "Reset link sent to your Email ID";
		 
		 $this->load->view('welcome/forgot_password',$success);
		
		 
		 
		 
		 }
		 
		 
		 
		 
         else {
			 
			 
        $this->session->set_flashdata("email_sent","Error in sending Email"); 
		
		$error['err_msg'] = "Error in sending Email";
				
		
         $this->load->view('welcome/forgot_password',$error); 


		

		 
			
		 }	
			
	}
	
	else{
		
		$datas['message_display']="Invalid Email Address";
				$this->load->view('welcome/forgot_password',$datas);
	}

	
	
}
	 
	 
	 public function resetnewpass(){
	
     $token=$this->uri->segment(3);
	   
		
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_pass','Confirm Password','trim|required|matches[password]');
		
		
		
		if($this->form_validation->run()==false)
		{
			$this->load->view('reset_pass');
		}
		else
		{
		
          $data['password']=$this->security->xss_clean($this->input->post('password'));
		  $data['confirm_pass']=$this->security->xss_clean($this->input->post('confirm_pass'));
		
		
		
		  $this->load->model("Forgetpass_model");
	      $rr=$this->Forgetpass_model->reset_new_pass($data,$token);
		
		
		if($rr==true){
			 
			//$this->load->view('welcome/index',$dataa);
			
			redirect('Login/tologin');
		}
		
		else{
			 $dataa['invalid']="Sorry!! Go back to your Email and Try again";
			 
			 $this->load->view('reset_pass',$dataa);
		}
		
		
		}
		
		
		
		
	
	
}			
		
	
	 
	 
	 
	 }
	 
	 
	 ?>