

<script>
	/*  var wtf    = $('#conversation11');
	
  var height = wtf[0].scrollHeight;
  wtf.scrollTop(height);  */
  
  
  
		 
</script>
		
				<?php
                          
                              foreach($result as $msg_detail)
							  {
                              
                               $id = $msg_detail['id'];
							   
                            
								$senders = $msg_detail['sender'];
								
								$receivers = $msg_detail['receiver'];
								
								$messages = $msg_detail['message'];
								
								$time = $msg_detail['time'];
								
								$times=date("d-M h:i a", strtotime($time) );
							
								if($receivers==$chatid){
								?>
				
				
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo $senders; ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $times; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text" style="overflow-wrap: break-word;">
                    <?php echo $messages; ?>
					
					
					
					</div>
                  <!-- /.direct-chat-text -->
                </div>
				
								<?php } elseif($senders==$chatid) { ?>	
                <!-- /.direct-chat-msg -->

				
				
				
				
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo $firstname; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo $times; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text" style="overflow-wrap: break-word;">
                    <?php echo $messages;  ?>
					
					
					
					
					
					
					
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
				
				
				
				
				
				<script>
                      $( document ).ready(function() {  	
				 var wtf    = $('#chatbody');
	
  var height = wtf[0].scrollHeight;

  wtf.scrollTop(height);   
		
					  });	
						</script>
				
				
				
								<?php } } ?>
								
								
								
								
								