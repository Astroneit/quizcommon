<span id="skill_div">
<div class="form-group">	 
			 	<select  name="subskillid[]">
				<option value="0">Select Skill</option>
					<?php 
					foreach($subSkillList as $key => $val){
						?>
						
						<option value="<?php echo $val['sub_skill_id'];?>"><?php echo $val['sub_skill_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>
            </span>