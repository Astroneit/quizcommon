<style>
.modtil:hover{
white-space: unset !important;
    word-wrap: break-word !important;

}


.jobdesc .table > tbody > tr > td {
	    width: 16px !important;
	
}

.tkl th{
	font-size: 17px !important;
	text-align:center !important;
}

.tkl td{
	font-size: 14px !important;
	text-align:center !important;
	text-transform:capitalize !important;
}
</style>

<?php

?><div class="modal-dialog" style="width: 95%; overflow:auto;max-height: 556px;">
            <div class="modal-header" style="text-align:left;">
			<?php if($comp_job_detail[0]['company_name']=='')
		{
		}
		else{
			?>
			
			   
			
		<h4 class="modal-title modtil" style="text-transform:capitalize; max-width: 542px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;    font-size: 22px;"><?php echo $comp_job_detail[0]['company_name'];?></h4><?php } ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			
			
			
            <div class="modal-content" style="overflow: auto;display:block;">
			
			
			<table class="table table-bordered table_striped table-responsive tkl">
			<tr>
			<th>S.no</th>
			<th>Technology</th>
			<th>Designation</th>
			<th>Skill Required</th>
			<th>Fresher/Exp</th>
			<th>Type</th>
			
			<th>Openings</th>
			<th>Salary</th>
			<th>Job Location</th>
			<th>Apply</th>
			
			</tr>
				
<?php $jv=1; foreach($comp_job_detail as $cjd){  ?>			
				<tr>

			<td><?php echo $jv; ?></td>
			<td><?php echo $cjd['technology']; ?></td>
			<td><?php echo $cjd['designation']; ?></td>
			<td><?php echo $cjd['job_required']; ?></td>
			<td><?php echo $cjd['experience']; ?> </td>
			<td><?php echo $cjd['type']; ?></td>
			
			<td><?php echo $cjd['openings']; ?></td>
			<td><?php echo $cjd['sal1']; ?>-<?php echo $cjd['sal2']; ?></td>
			<td><?php echo $cjd['location']; ?></td>
			<td><a   onclick="window.open('<?php echo $cjd['website_url'];?>', 
                         'newwindow', 
                         'width=700,height=500');" style="cursor:pointer;color: red;font-weight: bold;" >Apply Here</a></td>
			
			</tr>
			
<?php $jv++;} ?>	
			</table>
	
				 
				 
				 <div class="postedon">
					<?php if($comp_job_detail[0]['posted_date']=='')
		{
		}
		else{
			?>
		<p><span><strong>Posted on: </strong> </span>
		
		
		<?php echo $newDate = date("d-M-Y", strtotime($comp_job_detail[0]['posted_date']));?>
		
		</p><?php } ?>
							
					
					
				
					
					
				 </div> 
            </div>
        </div>
		
		
		
		
<script>
$('.close').click(function(){
	 $('#iwj-register-popup').removeClass("in");
	  
  $('#iwj-register-popup').css({'display':'none' }); 
});

		
</script>		