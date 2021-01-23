<style>
.panel{
	    box-shadow: 5px 5px 21px grey;
}
 
	   .err
	   {
		   color:red;
	   }

</style> 
<script>
$(function(){
	
    $("#skill_data").change(function () {
		
            event.preventDefault();
			var skillid=$('#skill_data :selected').val();
			//var skillid=2;
			//alert(skillid);
 $.ajax({
		
        type: "POST",
        url: "<?php echo site_url();?>/Qbank/get_cat",
        data: {'skill': skillid},       
        success: function(datas){
			//alert(datas);
					$("#cat_div").html(datas);

        }
        });

     
    });


	
});





	 function get_skills(skillid)
{
	
	//alert(skillid);
	$.ajax({
	
	type: "POST",
	url: "<?php echo site_url();?>/Qbank/get_skill",
	data: {'cat_id': skillid},       
	success: function(datas){
		//alert(datas);
				$("#skill_div").html(datas);

	}
	});
} </script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>multiselect/example-styles.css">
	 
	  <!-- 
	  
	  .dropdown-menu{
          height:200px;
          overflow-y:scroll;
       }
	  select type -->	
		
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js"></script>
		
<div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/new_question_1/'.$nop);?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
		
				<div class="form-group">	 
					
<?php echo $this->lang->line('multiple_choice_single_answer');?>
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  >Skills</label> 
			<select   id="skill_data" name="skills" tabindex="-1" aria-hidden="true" class="form-control">

 <option value="">Select Type</option>

<?php foreach($skill_list_main as $skills_main){ ?>
    <option value="<?php echo $skills_main['sno'];?>"><?php echo $skills_main['skill_type'];?></option>
                                                                        
      <?php } ?>


</select>
			</div>
			<span id="cat_div"><div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_category');?></label> 
					<select class="form-control" name="cid" id="cat_ajax">
					<option value=""> Select Category</option>
					
					</select>
			</div></span>
			
			
			<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_level');?></label> 
					<select class="form-control" name="lid">
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>

 
 <span id="skill_div">
 <div class="form-group">	 
					<label for="inputEmail"  >Sub Skills</label> 
			<select  id="boot-multiselect-demo2"   multiple="multiple" id="skill_data1" name="sub_skill" tabindex="-1" aria-hidden="true">



<?php foreach($skill_list as $skills){ ?>
    <option value="<?php echo $skills['sub_skill_id'];?>"><?php echo $skills['sub_skill_name'];?></option>
                                                                        
      <?php } ?>


</select><script>
													$('#boot-multiselect-demo2').multiselect({
            										includeSelectAllOption: true,
            										buttonWidth: 250,
            										enableFiltering: true
        											});
												</script>
			</div></span>
			
			<div class="form-group">	 
					<label for="inputEmail"  >Company</label> 
			<select  id="boot-multiselect-demo3"   multiple="multiple" id="company_data" name="company_list[]" tabindex="-1" aria-hidden="true">



<?php foreach($company_list as $company){ ?>
    <option value="<?php echo $company['id'];?>"><?php echo $company['company_name'];?></option>
                                                                        
      <?php } ?>


</select><script>
													$('#boot-multiselect-demo3').multiselect({
            										includeSelectAllOption: true,
            										buttonWidth: 250,
            										enableFiltering: true
        											});
												</script>
			</div>
 
			
			<div class="form-group">	 
					<label for="mintime"  >Min & Max Time for Beginner  (<span class="err">  in seconds</span>)</label> 
			<input type="text" name="minmaxb" id="minmaxb" value=""> (e.g: 30,50)
			</div>
			<div class="form-group">	 
					<label for="mintime"  >Min & Max Time for Intermediator(<span class="err">in seconds)</span></label> 
			<input type="text" name="minmaxi" id="minmaxi" value=""> (e.g: 20,40)
			</div>
			<div class="form-group">	 
					<label for="maxtime"  >Min & Max Time for Expert(<span class="err">in seconds)</span></label> 
			<input type="text" name="minmaxe" id="minmaxe" value=""> (e.g: 15,30)
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('question');?></label> 
					<textarea  name="question"  class="form-control"   ></textarea>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('description');?></label> 
					<textarea  name="description"  class="form-control"></textarea>
			</div>
		<?php 
		for($i=1; $i<=$nop; $i++){
			?>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('options');?> <?php echo $i;?>)</label> <br>
					<input type="radio" name="score" value="<?php echo $i-1;?>" <?php if($i==1){ echo 'checked'; } ?> > Select Correct Option 
					<br><textarea  name="option[]"  class="form-control"   ></textarea>
			</div>
		<?php 
		}
		?>

 
 
 <!-- jothi -->
 
 <div class="form-group">	 
					<label for=""  >Asked During (e.g: 12-2018 , 06-2019)</span></label> 
			<input type="text" name="year" id="year" value=""> 
			</div>
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>