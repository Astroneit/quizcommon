	<?php
	class Email_controller extends CI_controller
{
	
	
	public function send_mail($data,$otp_enc) { 
         $from_email = "studentportal@infoziant.com"; 
         $to_email = $data['email']; 
            $mesg = $this->load->view('emailcontent','',true);
   $config=array(
'charset'=>'utf-8',
'wordwrap'=> TRUE,
'mailtype' => 'html'
);

$this->email->initialize($config);

         $this->email->from($from_email, 'Infoziant Student Portal'); 
         $this->email->to($to_email);
         $this->email->subject('Student Portal Email Verification'); 
         $this->email->message($mesg); 

         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('welcome/register'); 
      } 
	  }
	  
	  
	  
	  ?>