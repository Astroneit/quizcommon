 <div class="container">
 <?php 
$logged_in=$this->session->userdata('logged_in');
?>
<div class="row">
<div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_users;?></div>
                                    <div><?php echo $this->lang->line('no_registered_user');?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('user');?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $this->lang->line('users');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


<div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_quiz;?></div>
                                    <div><?php echo $this->lang->line('no_registered_quiz');?> </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('quiz');?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $this->lang->line('quiz');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>

<div class="col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_qbank;?></div>
                                    <div><?php echo $this->lang->line('no_questions_qbank');?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('qbank');?>">
                            <div class="panel-footer"><?php echo $this->lang->line('question');?> <?php echo $this->lang->line('list');?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
 </div>
</div>
 
<div class="row"></div>
<div class="row"  > 
<hr><br> 
<h4><?php echo $this->lang->line('recently_registered');?></h4>
<table class="table table-bordered" >
<tr>
 <th><?php echo $this->lang->line('email');?></th>
<th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
<th><?php echo $this->lang->line('group_name');?> </th>
<th><?php echo $this->lang->line('contact_no');?> </th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $val['email'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['group_name'];?></td>
<td><?php echo $val['contact_no'];?></td>
</tr>

<?php 
}
?>
</table>


</div>


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

foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $val['rid'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['quiz_name'];?></td>
 <td><?php echo $val['result_status'];?></td>
 <td><?php echo $val['percentage_obtained'];?>%</td>
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
}
?>
</table>
</div>

</div>

</div>