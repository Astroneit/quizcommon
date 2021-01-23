<style>
.container-fluid{
	 padding:0px;
 }

 .attempted{
	   box-shadow: 5px 5px 21px grey;
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
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
						<div class="form-group">	 
					<form method="post" >
					<select  id="ss" name="cid">
					<option value="0"><?php echo $this->lang->line('all_category');?></option>
					<?php 
					foreach($clg as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"><?php echo $val['group_name'];?></option>
						<?php 
					}
					?>
					</select>
			 <input type="hidden" name="passvalue" id="passvalue" value="<?php echo $her[0]['qid'];?>">
					 <button class="btn btn-default filter_btn" id="filtering" type="button"><?php echo $this->lang->line('filter');?></button>
					 </form>
			</div>
	
	
	
	
	
	<div id="hidewhenshowtable">
	
<table style="color:white;"  class="table table-bordered attempted">
<tr>
 <th>#</th>
 <th>StudentName</th>
<th>E-Mail</th>
<th>CollegeName</th>

</tr>
	
	
	<?php

$rowcount=1;
foreach($her as $key => $val){
?>
<tr>
 <td>  <a href="javascript:show_question_stat('<?php echo $val['qid'];?>');"></a>  <?php echo $rowcount;?></td>

<td><?php echo $val['first_name'];?></td>
<td><?php echo $val['email'];?></td>

<td><?php echo $val['group_name'];?></td>

</tr>

<?php 
$rowcount++;
}
?>
</table>

</div>

<div id="showtable"></div>



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
<script>
 $(function(){
        $('#filtering').click(function() {
            
            var keywordgh = $('#ss').val();
            var ss=$('#passvalue').val();
          //  alert(keywordgh);
	        //alert(ss);
            $.ajax({
        url: "<?php echo base_url();?>index.php/Qbank/keyword_search",
        type: "POST",
        data: {keyval:keywordgh,val:ss}, 
 
        success: function(data){
           //alert(data);
                     //if(data!="")
            
		if(data!=''){
			 $('#showtable').html(data);
			 $('#hidewhenshowtable').hide();
			 
		}
		
		
		
           
       }
    });

	
    
        });
    });

</script>