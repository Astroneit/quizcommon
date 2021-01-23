 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
  

<?php 
if($logged_in['su']=='1'){
	?>
   <div class="row">
 
  <div class="col-lg-12 col-md-12">
  
    <form method="post" name="form1"  action="<?php echo site_url('result/view_result1/');?>">
	<div class="">
    <h3><?php echo $this->lang->line('generate_report');?> </h3> 
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
 	<div class="col-md-3"><?php 
	
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
 <input class="btn btn-info" type="button" name="btnSubmit" value="Submit" onclick="submitForm()" />

    </div><!-- /input-group -->
	
	 </form>
	 
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
}
?>


<h3><?php echo $title;?></h3>
 
  <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('result/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
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
		<?php 
		if($logged_in['su']=='1'){
			?>
				<div class='alert alert-danger'><?php echo $this->lang->line('pending_message_admin');?></div>		
		<?php 
		}
		?>
<table class="table table-bordered">
<tr>
 <th><?php echo $this->lang->line('result_id');?></th>
 <th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
 <th><?php echo $this->lang->line('quiz_name');?></th>
 <th><?php echo $this->lang->line('status');?>
 <select onChange="sort_result('<?php echo $limit;?>',this.value);">
 <option value="0"><?php echo $this->lang->line('all');?></option>
 <option value="<?php echo $this->lang->line('pass');?>" <?php if($status==$this->lang->line('pass')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pass');?></option>
 <option value="<?php echo $this->lang->line('fail');?>" <?php if($status==$this->lang->line('fail')){ echo 'selected'; } ?> ><?php echo $this->lang->line('fail');?></option>
 <option value="<?php echo $this->lang->line('pending');?>" <?php if($status==$this->lang->line('pending')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pending');?></option>
 </select>
 </th>
 <th><?php echo $this->lang->line('percentage_obtained');?></th>
<th><?php echo $this->lang->line('action');?> </th>
</tr>
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
 <td><?php echo $val['result_status'];?></td>
 <td><?php echo round($val['percentage_obtained']);?>%</td>
<td>
<a href="<?php echo site_url('result/view_result/'.$val['rid']);?>" class="btn btn-success" ><?php echo $this->lang->line('view');?> </a>
<?php 
if($logged_in['su']=='1'){
	?>
	<a href="javascript:remove_entry('result/remove_result/<?php echo $val['rid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}
?>
</td>
</tr>

<?php
$j++; 
}
?>
</table>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('result/index/'.$back.'/'.$status);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('result/index/'.$next.'/'.$status);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>
<?php 
if($logged_in['su']=='1'){
	?>
   <div class="row">
 
  <div class="col-lg-12 col-md-12">
  
    <form method="post" name="form2"  action="<?php echo site_url('result/generate_report/');?>">
	<div class="">
    <h3><?php echo $this->lang->line('generate_report');?> </h3> 
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
 	<div class="col-md-3"><?php 
	
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
 <input class="btn btn-info" type="submit" name="btnSubmit" value="Generate Report" />

    </div><!-- /input-group -->
	
	 </form>
	 
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
}
?>
	 
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
	
	<div id="chart_div<?php echo $i;?>" style="width: 600px; height: 400px;float:left; "></div>
	 <?php $i++; } ?>
		 <script type="text/javascript">
function submitForm()
{

document.form1.target = "myActionWin";
window.open("","myActionWin","width=1200,height=600,toolbar=0");
document.form1.submit();
}


</script>