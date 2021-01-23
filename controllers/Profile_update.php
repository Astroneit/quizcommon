<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_update extends CI_Controller {
	
		 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("Chat_model");
	 }
	
	
	function index()
	{
	$this->load->view('welcome/register_second_step');		
	}

	
	
}

?>