

<script>
    var wtf = $('#chatbody');
	
  var height = wtf[0].scrollHeight;
  wtf.scrollTop(height);  

</script>
		
 	<?php
                        //    $get_msg = mysqli_query($conn,"select * from msg order by time ASC ");
                           //     while($msg_detail = mysqli_fetch_array($get_msg)) {
                              foreach($result as $msg_detail)
							  {
                               $id = $msg_detail['id'];
							   
                            
								$senders = $msg_detail['sender'];
								
								$receivers = $msg_detail['receiver'];
								
								$messages = $msg_detail['message'];
								
								$time = $msg_detail['time'];
								
								$times=date("d-M h:i a", strtotime($time) );
							
								if($receivers==$this->session->userdata('uid')){
								?>
				
				
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo $senders; ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $times; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="<?php echo base_url();?>upload/<?php echo $this->session->userdata('profile_image');?>" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text" style="overflow-wrap: break-word;">
                    <?php echo $messages; ?>
					
					
					</div>
                  <!-- /.direct-chat-text -->
                </div>
				
								<?php } elseif($senders==$this->session->userdata('uid'))  { ?>	
                <!-- /.direct-chat-msg -->

				
				
				
				
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo $firstname; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo $times; ?></span>
                  </div>
                  
                  				  <?php
				  $mm=$this->session->userdata('profile_image');
				  if($mm==''){
					  $tuy="img_avatar2.png";
				  }
				  else{
					  
					  $tuy=$this->session->userdata('profile_image');
					  
				  }
				  
				  ?>
                  
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="<?php echo base_url();?>upload/<?php echo $tuy;?>" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text" style="overflow-wrap: break-word;">
                    <?php echo $messages;  ?>
					
					
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
				
				
			
				
				
				
								<?php } } ?>
								
					
								
								
								