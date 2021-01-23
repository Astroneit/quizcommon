<style>
.modtil:hover{
white-space: unset !important;
    word-wrap: break-word !important;

}

.jobdesc .table > tbody > tr > td {
	    width: 16px !important;
	
}

</style>

<?php

?><div class="modal-dialog">
            <div class="modal-header">
			<?php if($job_detail[0]['company_name']=='')
		{
		}
		else{
			?>
		<h4 class="modal-title modtil" style="text-transform:capitalize; max-width: 542px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?php echo $job_detail[0]['company_name'];?></h4><?php } ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-content">
				<div class="jobstitle" style="margin-bottom:0px;">
				<?php if($job_detail[0]['job_required']=='')
		{
		}
		else{
			?>
				   <h4 style="font-weight: bold;text-transform:capitalize;font-size: 16px;color: #565e63;"><?php echo $job_detail[0]['job_required'];?></h4>
		<?php } ?>
				   <div class="jobexp">
						<ul>
							<li>
							<?php if($job_detail[0]['experience']=='')
		{
		}
		else{
			?>
								<span><i class="fa fa-briefcase" aria-hidden="true" style="font-size: 18px;"></i></span>
		<span style="text-transform:capitalize;font-weight:bold;color: #2980b9;"><?php echo $job_detail[0]['experience'];?></span> 
		
		
		
		<?php }
		
		
		if($job_detail[0]['experience']=='experience'){
			
			echo " (".$job_detail[0]['exp_yr1']."-".$job_detail[0]['exp_yr2']." years)";
		}
		
		
		?>
		
		
		
		
		
		
							</li>
							<!--<li>
								<span><i class="fa fa-money" aria-hidden="true"></i></span>
								Rs. 2.0-3.0 Lakh/Yr
							</li>-->
							<li>
							<?php if($job_detail[0]['location']=='')
		{
		}
		else{
			?>
								<span><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 18px;"></i></span>
		<span style="text-transform:capitalize;    color: #2980b9;
    font-weight: 600;"><?php echo $job_detail[0]['location']; }?></span>
							</li>
						</ul>
				   </div>
				 </div>
				 <div class="jobdesc" style="max-height: 290px;overflow: auto;display:block;">
					
<div class="table-responsive">          
  <table class="table">
    
    <tbody>
	<tr> 
	<?php if($job_detail[0]['designation']=='')
		{
		}
		else{
			?>
	<td><strong>Designation:</strong></td> <td style="text-transform:capitalize;"> <?php echo $job_detail[0]['designation'];?> </td>
		<?php } ?>
		</tr>
		
		<tr> 
	<?php if($job_detail[0]['openings']=='')
		{
		}
		else{
			?>
	<td><strong>No. of Openings:</strong></td> <td> <?php echo $job_detail[0]['openings'];?> </td>
		<?php } ?>
		</tr>
		
		<tr> 
	<?php if($job_detail[0]['sal1']!='')
		{
		
			?>
	<td><strong>Salary Package:</strong></td> 
	<td> <?php echo $job_detail[0]['sal1'];?> - <?php echo $job_detail[0]['sal2'];?>  </td>
		<?php } else { ?>
		<td><strong>Salary:</strong></td> 
		<td>Good Salary to Right Candidate</td>
		
		<?php }  ?>
		</tr>
		
		
		<tr> 
	<?php if($job_detail[0]['venue']=='')
		{
		}
		else{
			?>
			
	<td><strong>Venue:</strong></td> <td style="text-transform:capitalize;    line-height: 25px;"> <?php echo $job_detail[0]['venue'];?> </td>
		<?php } ?>
		</tr>
		
		
		
		
		<?php if($job_detail[0]['interview_timing']=='')
		{
		}
		else{
			?>
		<tr>
		
        <td><strong>InterviewTiming:</strong></td> <td> <?php echo $job_detail[0]['interview_timing'];?></td>
		</tr>
		<?php } ?>
		<tr>
		<?php if($job_detail[0]['mobile_number']=='')
		{
		}
		else{
			?>
        <td><strong>Contact No:</strong></td><td><?php echo $job_detail[0]['mobile_number'];?></td>
		<?php } ?>
        </tr>
		<tr>
		<?php if($job_detail[0]['hr_email']=='')
		{
		}
		else{
			?>
        <td><strong>Contact Email:</strong></td><td><?php echo $job_detail[0]['hr_email'];?></td>
		<?php } ?>
		</tr>
		<tr>
		<?php if($job_detail[0]['job_type']=='')
		{
		}
		else{
			?>
        <td><strong>Job Type:</strong></td><td style="text-transform:capitalize;"><?php echo $job_detail[0]['job_type'];?></td>
		<?php } ?>
      </tr>
 <tr><td><strong>
 Experience: </strong></td><td style="text-transform:capitalize;"><?php if($job_detail[0]['experience']=='fresher'){ echo $job_detail[0]['experience']; }
 else { echo $job_detail[0]['exp_yr1']." - ".$job_detail[0]['exp_yr2']." Years"; } ?> </td></tr>
    </tbody>
  </table>
  </div>
  
  
  <?php if($job_detail[0]['comments']!='')
		{?>	
		<hr>
<div>
<p style="text-transform:capitalize;olor: teal;"><?php echo  $job_detail[0]['comments']; ?></p>
		
</div>		
		<?php } ?>
  
  
  
  
				 </div>
	
				 
				 
				 <div class="postedon">
			
		<p><span><strong>Posted on: </strong> </span>
<?php 
//echo $newDate = date("d-M-Y", strtotime($job_detail[0]['posted_date']));

echo $newDate = date("d-M-Y", strtotime($job_detail[0]['posted_date']));
?>


</p>
							
						<?php if($job_detail[0]['website_name']=='')
		{
		}
		else{
			?>	
		<p style="float:right;padding-right:10px;"><span><strong>Posted by: </strong> </span><?php echo $job_detail[0]['website_name'];?></p>
		
		
		
		
<?php } ?>
				 </div> 
            </div>
        </div>