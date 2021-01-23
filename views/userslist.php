
  <link type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    
<style>
.container-fluid{
	 padding:0px;
 }

 .lisrt{
	  box-shadow: 5px 5px 21px grey;
 }
#search{
	border:1px solid black;
} 
 
#login{
	
	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/* background-image: url('<?php echo base_url();?>/images1/gg.jpg'); */
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	
 }
 .btn-default {
    background: #5bc0de none repeat scroll 0 0;
    border-color: #5bc0de;
    color: #fff;
}
select
{
	padding:4px;
}
.filter_btn{
	 padding: 3px 12px;
    position: relative;
    top: -2px;
}

 #content {
   margin-top: 19px;
}
th
{
	background-color:#006a8b;
	color:white;
}
</style> 
<div class="container-fluid"id="login">
<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
 <div class="container" id="content">

   
 
    <div class="row">
 
  <div class="col-lg-6">

  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		




<div class="panel " style="" >
  <div class="panel-heading" style="background: #006b93; color: wheat;font-weight: bold;font-size: 16px;">List of Users</div>
  <div class="panel-body">
  
<table style="color:white;font-size:14px;"class="table table-bordered lisrt" id="example">
<thead>
<tr style="color:black;">
 <th>#</th>
 <th><?php echo "Candidate Name";?></th>

<th><?php echo "Email";?></th>
<th><?php echo "Phone";?></th>
<th><?php echo "Dept";?></th>
<th><?php echo "Created On ";?></th>
<th><?php echo "Group ";?></th>

</tr>
</thead>
<tbody>
	<?php

$rowcount=1;
foreach($users as $key => $val){
?>
<tr>
 <td><?php echo $rowcount;?></td>
 <td><?php echo $val['first_name'];?></td>

<td><?php echo $val['email'];?></td>
<td><?php echo $val['contact_no'];?></td>

<td><?php echo $val['dept'];?></td>
<td><?php echo date("d-M-Y", strtotime($val['created_on'])) ;?></td>
<td><?php echo $val['group_name'];?></td>
</form></td>
</tr>

<?php 
$rowcount++;
}
?>
</tbody>
</table>
  
  </div>
</div>
		
	
</div>

</div>


<?php
/* if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('qbank/index/'.$back.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('qbank/index/'.$next.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a> */

?>





<br><br><br><br>




</div>

<br><br>
</div>
<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
                <p>&copy; 2020 AICL. All Rights Reserved.</p>
            </div>
			</div>
		
	</div>	
</footer>
	</div>

	<link rel="stylesheet" href="<?php echo base_url();?>datatable/jquery.dataTables.min.css">
	 <link rel="stylesheet" href="<?php echo base_url();?>datatable/buttons.dataTables.min.css">
	<script type='text/javascript' src='<?php echo base_url();?>datatable/jquery-3.5.1.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/jquery.dataTables.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/dataTables.buttons.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.flash.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/jszip.min.js'></script>
   
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.html5.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.print.min.js'></script>
 
  
<script>
 function update_comm(comm,uid){
	
 //alert(comm);
// alert(uid);
	
 	$.ajax({		
	url:'<?php echo base_url();?>index.php/User/comm_update_al',
	type:'post',
		data:{title:uid,feed:comm},
	
		success: function(data){
       alert("Updated");
	
} 
});

}

 function update_tech(comm,uid){
	
 //alert(comm);
// alert(uid);
	
 	$.ajax({		
	url:'<?php echo base_url();?>index.php/User/tech_update_al',
	type:'post',
		data:{title:uid,feed:comm},
	
		success: function(data){
       alert("Updated");
	
} 
});

}

function expertiseval(uid)
{
	
	var feedval=document.getElementById("expertise"+uid).value;

	 	$.ajax({		
	url:'<?php echo base_url();?>index.php/User/expertise_update',
	type:'post',
	data:{title:uid,feed:feedval},
	
		success: function(data){
        alert("updated");
 //$("#div"+uid).html(data);
	
} 
}); 
}
function feedbackval(uid)
{
	
	var feedval=document.getElementById("feedback"+uid).value;
alert(feedval);
	 	$.ajax({		
	url:'<?php echo base_url();?>index.php/User/feedback_update',
	type:'post',
	data:{title:uid,feed:feedval},
	
		success: function(data){
        alert("updated");
 //$("#div"+uid).html(data);
	
} 
}); 
}





$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
		"pageLength": 100,
		 "scrollX": true,
      /*   buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ] */
		
		   buttons: [
            {
                extend: 'excelHtml5',
                title: 'Users'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
    } );
} );
	
</script>	
	