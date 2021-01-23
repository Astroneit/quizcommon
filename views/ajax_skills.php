 <div class="form-group">	 
					<label for="inputEmail"  >Sub Skills</label> 
			<select  id="boot-multiselect-demo2"   id="skill_data" name="sub_skill" tabindex="-1" aria-hidden="true">



<?php foreach($skills_list as $skills){ ?>
    <option value="<?php echo $skills['sub_skill_id'];?>"><?php echo $skills['sub_skill_name'];?></option>
                                                                        
      <?php } ?>


</select><script>
													$('#boot-multiselect-demo2').multiselect({
            										includeSelectAllOption: true,
            										buttonWidth: 250,
            										enableFiltering: true
        											});
												</script>
			</div>