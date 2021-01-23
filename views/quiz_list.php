 <style>
.container-fluid
{
	 padding:0px;
 }
 #search{
	 border:1px solid black;
 }

#login
{
		<?php /* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */ ?>
		/*background-image: url('<?php echo base_url();?>/images1/gg.jpg');*/

	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
}

#nav-dropdown .navbar-right {
    margin: 21px -52px 0 0;
}

#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #fff!important;
}

.nav.navbar-nav.navbar-right a
{
	color:#000!important;
}
th {
    background: #f4b609 none repeat scroll 0 0;
}

.btn-success {
    background-color: #15962c!important;
    border-color: #15962c!important;
}
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
.btn-warning
{
	background-color: #ff6363!important;
    border-color: #ff6363!important;
}
 .btn-default {
    background-color: #5bc0de;
    border-color: #5bc0de;
    color: #fff;
}
 #content {
    margin-top: 50px;
}

.portfolio-item {
  margin-bottom: 30px;

  padding:20px;
}.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}.card>hr{margin-right:0;margin-left:0}.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:.25rem;border-top-right-radius:.25rem}.card>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:.25rem;border-bottom-left-radius:.25rem}.card-body{-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem}.card-title{margin-bottom:.75rem}.card-subtitle{margin-top:-.375rem;margin-bottom:0}.card-text:last-child{margin-bottom:0}.card-link:hover{text-decoration:none}.card-link+.card-link{margin-left:1.25rem}.card-header{padding:.75rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125)}.card-header:first-child{border-radius:calc(.25rem - 1px) calc(.25rem - 1px) 0 0}.card-header+.list-group .list-group-item:first-child{border-top:0}.card-footer{padding:.75rem 1.25rem;background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125)}.card-footer:last-child{border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)}.card-header-tabs{margin-right:-.625rem;margin-bottom:-.75rem;margin-left:-.625rem;border-bottom:0}.card-header-pills{margin-right:-.625rem;margin-left:-.625rem}.card-img-overlay{position:absolute;top:0;right:0;bottom:0;left:0;padding:1.25rem}.card-img{width:100%;border-radius:calc(.25rem - 1px)}.card-img-top{width:100%;border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px)}.card-img-bottom{width:100%;border-bottom-right-radius:calc(.25rem - 1px);border-bottom-left-radius:calc(.25rem - 1px)}.card-deck{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}.card-deck .card{margin-bottom:15px}@media (min-width:576px){.card-deck{-ms-flex-flow:row wrap;flex-flow:row wrap;margin-right:-15px;margin-left:-15px}.card-deck .card{display:-ms-flexbox;display:flex;-ms-flex:1 0 0%;flex:1 0 0%;-ms-flex-direction:column;flex-direction:column;margin-right:15px;margin-bottom:0;margin-left:15px}}.card-group{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}
ul li
{
padding:5px;
}
 </style>  <script>
   var blink_speed = 1000;
var t = setInterval(function () {
  var ele = document.getElementById('blinker');
  ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
}, blink_speed);
   </script>
 <div class="container-fluid"id="login">
  <div class="container" id="content">


<?php 
$logged_in=$this->session->userdata('logged_in');
			 
			
			?>
   
 <h3 style="color:black;margin-left:20px;font-weight:bold;">Test List</h3>
    <?php 
	if($logged_in['su']=='1'){
		?>
		<div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('quiz/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" id="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
	}
?>

  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
<?php /* <table style="color:white;" class="table table-bordered">
<tr>
 <th>#</th>
 <th><?php echo $this->lang->line('quiz_name');?></th>
<th><?php echo $this->lang->line('noq');?></th>
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
$j=1;
foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $j;?></td>
 <td><?php echo substr(strip_tags($val['quiz_name']),0,50);?></td>
<td><?php echo $val['noq'];?></td>
 <td>
 <?php //echo $this->session->userdata('uid');
//echo $val['quid'];
  $this->load->model('quiz_model');
$saf=$this->quiz_model->check_quiz1($val['quid'],$this->session->userdata('uid')); 
 
if($saf==0){
?>
<a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success"> <?php echo $this->lang->line('attempt');?> </a>

<?php 	
}
else{
	?>
	<a  class="btn btn-warning"> <?php echo "Taken";?> </a>
	<?php
}
if($logged_in['su']=='1' && $this->session->userdata('gid')==0){	
	?>		
<a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');">
<img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}
?>
</td>
</tr>

<?php 
$j++;
}
?>
</table> */ ?>
</div>

   

<div class="col-lg-12">    
<?php $j=1;

function des($dep) {
    return implode(',', array_keys(array_flip(explode(',', $dep))));
}
foreach($result as $key => $val){ 
$whrquiz_name=$val['quiz_name'];

?>
<div class="col-lg-4 col-sm-6 portfolio-item" <?php if($whrquiz_name=="Mocktest"){ ?> style="display:none;"<?php } ?> >
          <div class="card h-100">
            
            <div class="card-body">
              <h4 class="card-title"  align="center" style="border-bottom: 3px #179bd7 solid;    padding-bottom: 2%;margin-top: 0px;">
                <a href="#" style="font-weight: bold;text-decoration:none;text-transform:uppercase;color: darkblue;"><?php echo substr(strip_tags($val['quiz_name']),0,50);?></a>
              </h4>
              <ul style=" list-style:square;">
			  <li class="listli"><strong>No of Question:</strong> <?php echo $val['noq'];?></li>
			  <li><strong>Time alloted : </strong><?php echo $val['duration'];?> Minutes.</li>
			  
			
			<?php  /*  <li><strong>Category:</strong> <?php
			  // $val['cids']; 
			   $sss=des($val['cids']);
			  $this->load->model('quiz_model');
$quiz_cat_list=$this->quiz_model->get_quiz_category(rtrim($sss,","));
echo rtrim($quiz_cat_list,","); 
			  ?> </li> */ ?>
			  <?php
			    $this->load->model('quiz_model');
$saf=$this->quiz_model->check_quiz1($val['quid'],$this->session->userdata('uid')); 
if($saf==0){			 
			 ?>
			  
<li style="color:red;"><strong>starts by : <span id="blinker"><?php echo date('d M Y H:i:s',$val['start_date']); ?> </span></strong></li> <?php } ?>
			  </ul> <?php
$totime=$val['end_date'];
$current_time=time();

	

			  //echo $this->session->userdata('uid');
//echo $val['quid'];

 
if($saf==0){
?>
<div style="text-align: center;">
<?php
if($current_time >$totime)
{?>
<a  class="btn btn-warning" style=""> Expired </a>
<?php 
} else { ?>
<a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success" style=""> <?php echo $this->lang->line('attempt');?> </a>
<?php } ?>

</div>

<?php 	
}
else{
	?>
<div style="text-align: center;">	<a  class="btn btn-warning" style=""> <?php echo "Taken";?> </a> </div><br/>

	<?php
}

if($logged_in['su']=='1' && $this->session->userdata('gid')==0){	
	?>		
<a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');">
<img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}

?>
            </div>  <span style="border-top:6px solid #11588a;"></span>
          </div>
		
        </div>
<?php $j++; } ?>
		
		
		
		
		
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>




<br>
<br>


</div>
</div>
   
<div class="container-fluid" ><br>
<br>
<br>
<br><br>
<br>
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