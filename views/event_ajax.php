<?php

?><div class="modal-dialog">
            <div class="modal-header">
			<?php if($job_detail[0]['event_name']=='')
		{
		}
		else{
			?>
		<h4 class="modal-title"><?php echo $job_detail[0]['event_name'];?></h4><?php } ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-content">
				<div class="jobstitle">
				<?php if($job_detail[0]['skill_required']=='')
		{
		}
		else{
			?>
				   <h4><?php echo $job_detail[0]['skill_required'];?></h4>
		<?php } ?>
				   <div class="jobexp">
						<ul>
							<li>
							<?php if($job_detail[0]['category']=='')
		{
		}
		else{
			?>
								<span><i class="fa fa-briefcase" aria-hidden="true"></i></span>
		<?php echo $job_detail[0]['category']; }?>
							</li>
							<!--<li>
								<span><i class="fa fa-money" aria-hidden="true"></i></span>
								Rs. 2.0-3.0 Lakh/Yr
							</li>-->
							<li>
							<?php if($job_detail[0]['salary']=='')
		{
		}
		else{
			?>
								<span><i class="fa fa-money" aria-hidden="true"></i></span>
		<?php echo $job_detail[0]['salary']; }?>
							</li>
						</ul>
				   </div>
				 </div>
				 <div class="jobdesc">
					
<div class="table-responsive">          
  <table class="table">
    
    <tbody>
	<tr> 
	<?php if($job_detail[0]['no_required']=='')
		{
		}
		else{
			?>
	<td><strong>Required:</strong></td> <td> <?php echo $job_detail[0]['no_required'];?> </td>
		<?php } ?>
		</tr>
		<?php if($job_detail[0]['starts']=='')
		{
		}
		else{
			?>
		<tr>
		
        <td><strong>StartsOn:</strong></td> <td> <?php echo $job_detail[0]['starts'];?></td>
		</tr>
		<?php } ?>
		<tr>
		<?php if($job_detail[0]['duration']=='')
		{
		}
		else{
			?>
        <td><strong>Duration:</strong></td><td><?php echo $job_detail[0]['duration'];?></td>
		<?php } ?>
        </tr>
		<tr>
		<?php if($job_detail[0]['deadline']=='')
		{
		}
		else{
			?>
        <td><strong>Deadline</strong></td><td><?php echo $job_detail[0]['deadline'];?></td>
		<?php } ?>
		</tr>
		<tr>
		<?php if($job_detail[0]['benefits']=='')
		{
		}
		else{
			?>
        <td><strong>Benefits:</strong></td><td><?php echo $job_detail[0]['benefits'];?></td>
		<?php } ?>
      </tr>

    </tbody>
  </table>
  </div>
				 </div>
				 <div class="postedon">
												
						<?php if($job_detail[0]['location']=='')
		{
		}
		else{
			?>	
		<p style="margin-left:200px;"><span><strong>Location: </strong> </span><?php echo $job_detail[0]['location'];?></p><?php } ?>
				 </div> 
            </div>
        </div>