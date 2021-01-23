<?php
//echo $this->session->userdata('subject_code');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Portal - Landing Page</title>
<meta charset="UTF-8" />
<meta name="description" content="Merchant">
<meta name="keywords" content="Merchant Login">
<meta name="viewport" id="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" href="<?php echo base_url();?>images1/favicon.ico" type="image/x-icon" />	
<link rel="stylesheet" href="<?php echo base_url();?>css1/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css1/online-style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js1/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/common.js"></script>
<style>
tr{
	
    background: #f9f9f9;
}
.container-fluid{
	 padding:0px;
 }
 #mytable{
	 box-shadow: 5px 5px 21px grey;
 }
 #mytable th {
    background: #00afb5  none repeat scroll 0 0;
    color: #fff;
}
#mytable td:nth-child(1) {
    padding-left: 14px;
}
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
.nav.navbar-nav.navbar-right a
{
	color:#000!important;
}

#content {
      margin-top: 26px;

}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #fff!important;
}
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
#login{
<?php /* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */ ?>
/*background-image: url('<?php echo base_url();?>/images1/gg.jpg');*/
		/* background: #cdd0c9; */
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} 
#mytable td {
    padding: 9px;
}
#content h2
{
	border-left:unset;
	margin-bottom:20px;
	font-size: 24px;
    text-align: center !important;
	background:none;
	display:block !important;
}
.info-btn .btn
{
	padding: 6px 10px;
	background:#5bc0de;
}
h3{
	color:#fff;
	margin-bottom:20px;
}
.info-btn .btn
{
	font-weight:normal;
}


#firstrow{
	   /*  background: slateblue;    */
	    background: #11588a;   
}

.lastrow{
	    background: tomato;
    padding: 1%;
}
 </style><script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid"id="login">


<div id="wrapper"> 

	

	<div class="container" id="content">
	<?php 
$logged_in=$this->session->userdata('logged_in');
$log_subject=$this->session->userdata('subject_code');
?>
	<?php 
if($logged_in['su']=='1' && $log_subject==""){
	?>
		<!--<h2 >Generate Report</h2>-->
		<h2 >Report Analysis</h2>
		<div class="row" id="firstrow">
			<div class="report-block">
			<form method="post" name="form1"  action="<?php echo site_url('result/view_result1/');?>">
			
			<div class="col-md-3">
					<span class="plain-select">	
			<select name="quid" class="form-control">
<option value="0"><?php echo $this->lang->line('select_quiz');?></option>
<?php 
foreach($quiz_list as $qk => $quiz){
	?>
	<option value="<?php echo $quiz['quid'];?>"><?php echo $quiz['quiz_name'];?></option>
	<?php 
}
?>
</select>
</span>
</div>
			
			
				<div class="col-md-3">
					<span class="plain-select">						 
						<select name="qcat" id="company" class="form-control">
                        <option value="0"><?php echo "Select Category";?></option>
                        <?php 
                            foreach($quiz_cat as $qk => $cat)
							{
	                    ?>
	                    <option value="<?php echo $cat['category_name'];?>"><?php echo $cat['category_name'];?></option>
	                    <?php 
                           }
                        ?>
                         </select>
					</span>
				</div>
				<div class="col-md-3">
					<span class="plain-select">
						<?php 
	
	if($this->session->userdata('gid')==0)
		{?>
<select name="gid" id="company1" class="form-control">
<option value="0"><?php echo  "select college";?></option>
<?php 
foreach($group_list as $gk => $group){
	?>
	<option value="<?php echo $group['gid'];?>"><?php echo $group['group_name'];?></option>
	<?php 
}
?>
</select>

		<?php }
else {		?>
<select name="gid" id="company2" class="form-control">
<option value="0"><?php echo  "select college";?></option>
<?php 
foreach($group_list as $gk => $group){
	if($group['gid']==$this->session->userdata('gid'))
	{
	?>
	<option value="<?php echo $group['gid'];?>" selected="selected"><?php echo $group['group_name'];?></option>
	<?php 
	}
}
?>
</select>

<?php } ?>
					</span>	
				</div>
				
				<div class="col-md-3 info-btn">
					<!--<button type="submit" class="btn" title="Submit">Submit</button>!-->
					<input class="btn" type="button" name="btnSubmit" value="Submit" onclick="submitForm()" style="background: #b2d622;font-weight:bold;" />
				</div>
				</form>
			</div>
		</div>
		<?php
		}
		?>
		
			<div class="row">
				<div class="col-md-6" id="search-field">
				
				
				<?php 
		$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1'){ ?>
			
				<div class="col-md-6" style="padding-left:0px;">
			<?php } else { ?>
				<div class="col-md-12" style="padding-left:0px;">
				
			<?php  } ?>
				
		<?php /* 		 <form method="post" action="<?php echo site_url('result/index/');?>">
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>..." id="search" value=""/>
							<span class="input-group-btn">
								<button class="btn btn-info" type="submit"><?php echo $this->lang->line('search');?></button>
							</span>
					</div>	
					</form> */ ?>
				</div>
				
			<?php 
		$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1'){ ?>


		<?php /* 	
				<div class="col-md-6">
				  <form method="post" action="<?php echo site_url('result/quizwise_report/');?>">
				   <div class="col-md-8" style="padding:0px;">
				   <select class="form-control" name="selquiz" style="margin-top: 6%;" required>
				   <option value=""><?php echo  "Select Quiz";?></option>
				<?php 
foreach($quiz_list as $quizz){
	?>
	<option value="<?php echo $quizz['quid'];?>"><?php echo $quizz['quiz_name'];?></option>
	<?php 
}
?>
				   
				   </select>
				   </div>
				   <div class="col-md-4" style="padding-left:0px;">
				   	<span class="input-group-btn">
								<button class="btn btn-info" type="submit" style="margin-top: 9%;    background: #d9534f;border:none;outline:none;">Quiz Report</button>
							</span>
				   </div>
				   
				   
				   </form>
				</div> */ ?>
				
					<?php } ?>
					
				</div>
				
				
				
				
			<!--   jothi -->	
				
				
				
		<?php 
		$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1' && $log_subject==""){ ?>
			
				<div class="col-md-12" id="rep-field">
					
				   <div class="col-md-12" style="padding-left:0px;    margin-top: 2%;    background-color: #828a8f;">
				
				    <form method="post" action="<?php echo site_url('result/groupreport/');?>">
				   <div class="col-md-4" style="padding:10px;">
				   <select class="form-control" name="grouprep" style="margin-top: 0.6%;" required>
				   <option value=""><?php echo  "Select Group";?></option>
				<?php 
foreach($group_list as $gk => $group){
	?>
	<option value="<?php echo $group['gid'];?>"><?php echo $group['group_name'];?></option>
	<?php 
}
?>
				   
				   </select>
				   </div>   <div class="col-md-4" style="padding:10px;">
				   <select class="form-control" name="selquiz" style="margin-top: 0.6%;" required>
				   <option value=""><?php echo  "Select Quiz";?></option>
				<?php 
foreach($quiz_list as $quizz){
	?>
	<option value="<?php echo $quizz['quid'];?>"><?php echo $quizz['quiz_name'];?></option>
	<?php 
}
?>
				   
				   </select>
				   </div>
				   <div class="col-md-4" style="padding-left:10px;">
				   	<span class="input-group-btn">
								<button class="btn btn-info" type="submit" style="margin-top: 4%;background: #aef8d3;color: black;font-weight:bold;border:none;outline:none;">Group Report</button>
							</span>
				   </div>
				   
				   
				   </form>
				   </div>
		
				
					<?php /* 	<div class="col-md-4">
							 <form method="post" action="<?php echo site_url('result/overallreport/');?>">
							<span class="input-group-btn">
								<button class="btn btn-info" type="submit" style="margin-top: 6%;    background: #d9534f;border:none;outline:none;">Preview Overall Report</button>
							</span>
							
								
					</form>
			
							</div> */ ?>
				
					
				
				</div>
		<?php	}  else{   
		
			$userid = $this->session->userdata('uid');
		
		//echo $userid; ?>		
				<?php /* 
				
				<div class="col-md-6" id="rep-field">
						 <form method="post" action="<?php echo site_url('result/overallreport/'.$userid);?>">
				 
		
				
						<div class="col-md-4">
							<span class="input-group-btn">
								<button class="btn btn-info" type="submit" style="margin-top: 6%;    background: #d9534f;border:none;outline:none;">Preview Overall Report</button>
							</span>
							</div>
				
					
					
					</form>
			
				</div>*/ ?>
		<?php } ?>
				
				
					
				
			</div>
			
			
					<?php 
		$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']=='1'){ ?>
			
			
			<div class="row">
			<div class="col-md-6">
			
			  <form method="post" action="<?php echo site_url('result/group_quiz_report/');?>">
				   <div class="col-md-4" style="padding:0px;">
				   <select class="form-control" name="group_id" style="margin-top: 6%;border:1px solid black;" onchange="selgroup(this)" required>
				   <option value="<?php echo  $log_subject;?>"><?php echo  $log_subject;?></option>

				   
				   </select>
				   </div>
				   
				   
				   
				   
				   <span id="ajaxquiz"></span>
				   
				 
				   
				   <div class="col-md-4" style="padding-left:0px;">
				   	<span class="input-group-btn">
								<button class="btn btn-info" type="submit" style="margin-top: 7%;    background: #125584;border:none;outline:none;    margin-left: 4%;">Generate Report</button>
							</span>
				   </div>
				   
				   
				   </form>
			
			</div>
			</div>
			
			<?php  } ?>
			

			<div class="row">
				<div class="col-lg-12">
				<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<?php 
		if($logged_in['su']=='1'){
			?>
				<div class='alert alert-danger' style="padding-left:0;color:black;"><?php echo $this->lang->line('pending_message_admin');?></div>		
		<?php 
		}
		?>
					<table id="mytable" class="table table-bordred table-striped table-responsive display">
						<thead><tr>
							<th>Sno</th>
 <th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
 <th><?php echo $this->lang->line('quiz_name');?></th>
 <th><?php echo $this->lang->line('status');?>
<?php /*  <select onChange="sort_result('<?php echo $limit;?>',this.value);" style="color:#000;font-size: 14px; font-weight: 500;">
 <option value="0"><?php echo $this->lang->line('all');?></option>
 <option value="<?php echo $this->lang->line('pass');?>" <?php if($status==$this->lang->line('pass')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pass');?></option>
 <option value="<?php echo $this->lang->line('fail');?>" <?php if($status==$this->lang->line('fail')){ echo 'selected'; } ?> ><?php echo $this->lang->line('fail');?></option>
 <option value="<?php echo $this->lang->line('pending');?>" <?php if($status==$this->lang->line('pending')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pending');?></option>
 </select> */ ?>
 </th>
<?php 
		if($logged_in['su']=='1'){
			?> <th><?php echo $this->lang->line('percentage_obtained');?></th>
 <th>Fake attempt</th>
 <th>Compiler Hits</th>
		<th><?php echo $this->lang->line('action');?> </th> <?php } ?>
						</tr></thead>
						
						<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="6"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
$j=1;
foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $j;?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['quiz_name'];?></td>
 <td><?php 
 //echo $val['result_status'];
 echo "Pending";
 
 ?></td>
 
	<?php 
		if($logged_in['su']=='1'){
			?>
 <td><?php echo round($val['percentage_obtained']);?>%</td>
  <td><?php if($val['fake_count']>=5){ echo "<span style='color:red;'>Fake attempt</span>"; } else { echo"-"; }?></td>
  
  <td><?php
  $ccount=$this->result_model->com_count($val['rid']);
  echo $ccount;
  ?></td>
<td>
<a href="<?php echo site_url('result/view_result/'.$val['rid']);?>" class="btn btn-success" >
<span class="glyphicon glyphicon-eye-open"></span>

 </a>

<?php 
if($logged_in['su']=='1'){
	?>
	<a href="javascript:remove_entry('result/remove_result/<?php echo $val['rid'];?>');" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
	
<?php 
}
?>
</td> 
		<?php } ?>
</tr>

<?php
$j++; 
}
?>
					
					</table>
				</div>	
			</div><?php 
if($logged_in['su']=='1'){
	?>
   <div class="row">
 
  <div class="col-lg-12 col-md-12" style="margin: 30px 0;">
  
    <form method="post" name="form2"  action="<?php echo site_url('result/generate_report_test/');?>">
	<div class="">
    <h3 style="color:black;">Generate Report (.xls) </h3> 
	
	<div class="row lastrow">
	<div class="col-md-3 col-lg-3">
<select name="quid" class="form-control">
<option value="0"><?php echo $this->lang->line('select_quiz');?></option>
<?php 
foreach($quiz_list as $qk => $quiz){
	?>
	<option value="<?php echo $quiz['quid'];?>"><?php echo $quiz['quiz_name'];?></option>
	<?php 
}
?>
</select>
</div>
<div class="col-md-3 col-lg-3">
<select name="qcat" class="form-control">
<option value="0"><?php echo "Select Category";?></option>
<?php 
foreach($quiz_cat as $qk => $cat){
	?>
	<option value="<?php echo $cat['category_name'];?>"><?php echo $cat['category_name'];?></option>
	<?php 
}


?>
</select>
</div>



 	<div class="col-md-3 col-lg-3"><?php 
	
	if($this->session->userdata('gid')==0)
		{?>
<select name="gid" class="form-control">
<option value="0"><?php echo  "select college";?></option>
<?php 
foreach($group_list as $gk => $group){
	?>
	<option value="<?php echo $group['gid'];?>"><?php echo $group['group_name'];?></option>
	<?php 
}
?>
</select>

		<?php }
else {		?>
<select name="gid" class="form-control">
<option value="0"><?php echo  "select college";?></option>
<?php 
foreach($group_list as $gk => $group){
	if($group['gid']==$this->session->userdata('gid'))
	{
	?>
	<option value="<?php echo $group['gid'];?>" selected="selected"><?php echo $group['group_name'];?></option>
	<?php 
	}
}
?>
</select>

<?php } ?>
</div>

<?php /* <input type="text" name="date1" value="" placeholder="<?php echo $this->lang->line('date_from');?>">
 
 <input type="text" name="date2" value="" placeholder="<?php echo $this->lang->line('date_to');?>"> 
	*/ ?>
	
	<div class="col-md-3 col-lg-3">
 <input class="btn btn-success" type="submit" name="btnSubmit" value="Generate Report" />
</div>

</div>
    </div><!-- /input-group -->
	
	 </form>
	 
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
}
?>
	</div>	

<!--Footer-->

<!--//Footer-->
</div>
<?php /* 
<div class="container">
<?php 
 $values1=array();
	  $values1[]=array('Quiz Name','Marks'); 
	  $i=0;
	 
		foreach($ind_result as $key => $vals){
  
	 ?>
		 
		  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $vals['sec_percentage'];?>);

        var options = {
          title: '<?php echo "Result";?> <?php echo $vals['quiz_name'];?>',
          hAxis: {title: '<?php echo "Result";?>(<?php echo $vals['quiz_name'];?>)', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div<?php echo $i;?>'));
        chart.draw(data, options);
      }
	  
	   function getchart()
  {
    
   var unitr= $("#unit").val();
   var fromr= $("#from").val();
   var tor= $("#to").val();
   var tot = "unit="+unitr +"&from="+fromr+"&to="+tor;
    window.open('chart.php?'+tot,'_blank');
  //  window.open('chart.php','_blank');
  }
  
    </script>
	
	
	<div id="chart_div<?php echo $i;?>" class="col-lg-4 col-md-4 col-sm-4" style="width: 500px; height: 350px;padding:20px; "></div>
	
	
	 <?php $i++; } ?>
	 </div> */ ?>
		 <script type="text/javascript">
function submitForm()
{

document.form1.target = "myActionWin";
window.open("","myActionWin","width=1200,height=600,toolbar=0");
document.form1.submit();
}

$(document).ready(function() {
    $('#mytable').DataTable(
	{
		"pageLength": 100
	}
	);
	
} );
</script>
</div>
<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div style="text-align:center;">
				<p>&copy;  2020 AICL. All Rights Reserved.</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<p class="pull-right hidden-xs"></p>
			</div>
			</div>
		
	</div>	
</footer>
	</div>

	
	
	
	
	<script type="text/javascript">


function selgroup(val)
{
	
	var selgroup=val.value;
	
	 //alert(selgroup);
 

	//alert("ss");
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/Result/selquiz_groupwise",
  data: {
   data:+selgroup
  },
  success: function (response) {
	 // alert(response);
   $( '#ajaxquiz' ).html(response);
 
  }
  });
 
}

</script>
	
	
	
	
	
	
</body>
</html>