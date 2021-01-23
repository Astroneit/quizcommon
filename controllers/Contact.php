<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

public function index(){
	
	$this->load->view('welcome/contact');
	
}

public function insertcontact(){
	
	//name,mobile,subject,message
	
	$this->form_validation->set_rules('name','Name','required');
	$this->form_validation->set_rules('mobile','Mobile','required|numeric');
	$this->form_validation->set_rules('subject','Subject','required');
	$this->form_validation->set_rules('message','Message','required');
	
	if($this->form_validation->run()==FALSE){
		
	$this->load->view('welcome/contact');	
		
	}
	
	else{
		
		$data['name']=$this->input->post('name');
		$data['mobile']=$this->input->post('mobile');
		$data['subject']=$this->input->post('subject');
		$data['message']=$this->input->post('message');
		
		
		$this->load->model("Contact_model");
		
	$ss=$this->Contact_model->insert_contact($data);
		
	if($ss==true){
		
		$data['message_display']="Entry Successfull";
		$this->load->view('welcome/contact',$data);
		
	}

else{
	$data['message_display']="Please try again";
		$this->load->view('welcome/contact',$data);
}	
		
		
		
	}
	
	
}

}

?>