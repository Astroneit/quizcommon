<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_controller extends CI_Controller {
	
		 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("Chat_model");
	   
	   
	 }
	
	
	function countmsg()
	{

	$cn=$this->Chat_model->getmsg_count();	
		echo $cn;		
	}
	function chat_ajax($msg="")
	{
		$data['result']=$this->Chat_model->getmsg_all();
		$this->load->view('chat_ajax',$data);
		
	}

	
	function validateautosms()
	{
	   
	   $keywordint=xss_clean($this->input->post('keywordint'));	
		$this->Chat_model->insert_msg($keywordint);
		$data['result']=$this->Chat_model->getmsg_all();
		// print_r($data['result']);
	 $getval="";
			     foreach($data['result'] as $msg_detail)
							  {
                              
                               $id = $msg_detail['id'];
							   
                            
								$senders = $msg_detail['sender'];
								
								 $receivers = $msg_detail['receiver'];
								
								$messages = $msg_detail['message'];
								
								$time = $msg_detail['time'];
								
								$times=date('d-M h:i a', strtotime($time) );
							
								if($receivers==$this->session->userdata('uid')){
								
				
				 echo "
                <div class='direct-chat-msg'>
                  <div class='direct-chat-info clearfix'>
                    <span class='direct-chat-name pull-left'>".$senders."</span>
                    <span class='direct-chat-timestamp pull-right'>". $times."</span>
                  </div>
               
                  <img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='Message User Image'>
                  <div class='direct-chat-text' style='overflow-wrap: break-word;'>
                    ".$messages."
					
					
					
					</div>
              
                </div>";
				
								 } elseif($senders==$this->session->userdata('uid')) { 

               echo "<div class='direct-chat-msg right'>
                  <div class='direct-chat-info clearfix'>
                    <span class='direct-chat-name pull-right'>".$firstname."</span>
                    <span class='direct-chat-timestamp pull-left'>". $times."</span>
                  </div>
                
                  <img class='direct-chat-img' src='dist/img/user3-128x128.jpg' alt='Message User Image'>
                  <div class='direct-chat-text' style='overflow-wrap: break-word;'>
                    ".$messages." 
                  </div>
           
                </div>
				
				"; }
				} 
				
				echo "
					<script>
                      $( document ).ready(function() {  	
				 var wtf    = $('#chatbody');
	
  var height = wtf[0].scrollHeight;

  wtf.scrollTop(height);   
		
					  });	
							  </script> ";
							 // echo $getval;
		
	}
	
	
	
}

?>