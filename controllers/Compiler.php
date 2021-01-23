<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compiler extends CI_Controller {
	public function comp()
	{
		$this->load->model('Result_model');
	    			if($this->session->userdata('logged_in')=="")
	{
	
		redirect('login');
	}
	
	    
	    $data['compile_result']=$this->Result_model->get_compile_details($this->session->userdata('uid'));
		$this->load->view('view_compiler',$data);
	}
}
?>