<style>
.container-fluid{
	 padding:0px;
 }

#search{
	 border:1px solid black;
 }
 
 .qlist,.panel{
	 box-shadow: 5px 5px 21px grey;
 }
.qlist th
{
	background:slateblue !important;
}

.qlist tr:hover{
	background:lightgrey !important;
}
#login{
	
	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/*background-image: url('<?php echo base_url();?>/images1/gg.jpg');*/
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
th
{
	background:#f4b609;
}
 #content {
    margin-top: 34px;
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

   
 <h3 style="color:white;"><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('qbank/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" id="search" placeholder="<?php echo $this->lang->line('search');?>...">
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
						<div class="form-group">	 
					<form method="post" action="<?php echo site_url('qbank/pre_question_list/'.$limit.'/'.$cid.'/'.$lid);?>">
					<select   name="cid">
					<option value="0"><?php echo $this->lang->line('all_category');?></option>
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>" <?php if($val['cid']==$cid){ echo 'selected';} ?> ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			 	<select  name="lid">
				<option value="0"><?php echo $this->lang->line('all_level');?></option>
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"  <?php if($val['lid']==$lid){ echo 'selected';} ?> ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
					 <button class="btn btn-default filter_btn" type="submit"><?php echo $this->lang->line('filter');?></button>
					 </form>
			</div>
	
<table style="color:white;" class="table table-bordered qlist">
<tr>
 <th>#</th>
 <th><?php echo $this->lang->line('question');?></th>
<th><?php echo $this->lang->line('question_type');?></th>
<th><?php echo $this->lang->line('category_name');?> / <?php echo $this->lang->line('level_name');?></th>
 
<th><?php echo $this->lang->line('percent_corrected');?></th>
<th>Analysis</th>
<th><?php echo $this->lang->line('action');?> </th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
$rowcount=1;
foreach($result as $key => $val){
?>
<tr>
 <td>  <a href="javascript:show_question_stat('<?php echo $val['qid'];?>');">+</a>  <?php echo $rowcount;?></td>
 <td><?php echo substr(strip_tags($val['question']),0,40);?>
 
 
 <span style="display:none;" id="stat-<?php echo $val['qid'];?>">
  
 
 <table class="table table-bordered ">
<tr><td>Correct</td><td><?php echo $val['no_time_corrected'];?></td>
<td>Incorrect</td><td><?php echo $val['no_time_incorrected'];?></td>
<td>Unattempted</td><td><?php echo $val['no_time_unattempted'];?></td></tr>

</table>


 

 </span>
 
 
 
 </td>
<td><?php echo $val['question_type'];?></td>
<td><?php echo $val['category_name'];?> / <span style="font-size:12px;"><?php echo $val['level_name'];?></span></td>
 
<td><?php if($val['no_time_served']!='0'){ $perc=($val['no_time_corrected']/$val['no_time_served'])*100; 
?>

<div style="background:#eeeeee;width:100%;height:10px;"><div style="background:#449d44;width:<?php echo intval($perc);?>%;height:10px;"></div>
<span style="font-size:10px;"><?php echo intval($perc);?>%</span>

<?php
}else{ echo $this->lang->line('not_used');} ?></td>
<td><a href="<?php echo site_url('qbank/viewstudent/'.$val['qid']);?>">Get students</a></td>
<td>
<?php 
$qn=1;
if($val['question_type']==$this->lang->line('multiple_choice_single_answer')){
	$qn=1;
}
if($val['question_type']==$this->lang->line('multiple_choice_multiple_answer')){
	$qn=2;
}
if($val['question_type']==$this->lang->line('match_the_column')){
	$qn=3;
}
if($val['question_type']==$this->lang->line('short_answer')){
	$qn=4;
}
if($val['question_type']==$this->lang->line('long_answer')){
	$qn=5;
}


?>
<a href="<?php echo site_url('qbank/edit_question_'.$qn.'/'.$val['qid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('qbank/remove_question/<?php echo $val['qid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
$rowcount++;
}
?>
</table>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('qbank/index/'.$back.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('qbank/index/'.$next.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>







<br><br><br><br>
<div class="login-panel panel panel-default">
		<div class="panel-body"> 

<?php echo form_open('qbank/import',array('enctype'=>'multipart/form-data')); ?>
 <h4 style=" margin: 0 0 22px;"><?php echo $this->lang->line('import_question');?></h4> 
 <select name="cid"   >
 <option value="0"><?php echo $this->lang->line('select_category');?></option>
<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>" <?php if($val['cid']==$cid){ echo 'selected';} ?> ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?></select>
 <select name="did">
 <option value="0"><?php echo $this->lang->line('select_level');?></option>
<?php 
					foreach($level_list as $key => $val){
						?>
						
<option value="<?php echo $val['lid'];?>"  <?php if($val['lid']==$lid){ echo 'selected';} ?> > <?php echo $val['level_name'];?> </option>
						<?php 
					}
					?>
					</select> 

<?php echo $this->lang->line('upload_excel');?>
	<input type="hidden" name="size" value="3500000">
	<input type="file" name="xlsfile" style="width:150px;float:left;">
	<div style="clear:both;"></div>
	<input type="submit" value="Import" style="margin-top:15px;" class="btn btn-default pull-left">
	
<p class="pull-left" style="margin: 22px 0 0 8px;"><a href="<?php echo base_url();?>sample/sample.xls" target="new">Click here</a> <?php echo $this->lang->line('upload_excel_info');?> </p>
</form>

</div>
</div>



</div>

<br><br>
</div>
<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
                <p>&copy; 2018 Infoziant. All Rights Reserved.</p>
            </div>
			</div>
		
	</div>	
</footer>
	</div>
