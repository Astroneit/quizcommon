<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_controller extends CI_Controller {


function index()
{
	
			$this->load->library('email');
$config['protocol']    = 'smtp';
$config['smtp_host']    = 'email-smtp.eu-west-1.amazonaws.com';
$config['smtp_port']    = '587';
$config['smtp_timeout'] = '7';
$config['smtp_crypto']  = 'tls';
$config['smtp_user']    = 'AKIAQB5534OHA3NICWXT';
$config['smtp_pass']    = 'BAvT5UCKnbkafa+B5GQB/SnzpE4B2ofQ2szqbGrZQYy7';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // or html
     
$this->email->set_newline("\r\n");
$this->email->initialize($config);
$this->email->from('support@aicl.training', 'AICL');
        $this->email->to('arumugam@astrone.ltd');
		
		$html         = "<p>welcome</p>

";
		$content = $html;	
        $this->email->subject("Test");
		$this->email->message($html);  
        $this->email->send();
		 echo $this->email->print_debugger();
		echo "inn";
}
?>