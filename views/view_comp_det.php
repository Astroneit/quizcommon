<?php

	


foreach($result_compile as $res_comp){
	
	
	if($res_comp['error']!=""){
?>	
	
<style>
#nocomp{
display:none !important;
}
</style>	

	
	
	<div class="alert alert-warning alert-dismissible fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> <span style="margin-left: 4%;"><?php echo $res_comp['error'];?></span>
   </div>
   
   
 
   
   
<?php } elseif($res_comp['output']!=""){ ?>

<style>
#nocomp{
display:none !important;
}
</style>
 
 <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong><span style="margin-left: 4%;"> <?php echo $res_comp['output'];?></span>
  </div>
<?php }    ?>
	
	
	
<?php 



 } 


 ?> 
  