<div class="updateheader">
	<h4 class="modal-title">CHANGE PASSWORD</h4>
	<a href="#0" class="cd-popup-close img-replace"></a>
	</div>
	
<?php echo form_open('Profile_controller/change_password');?>
						<div class="input-group">
								<label>Old Password</label>
                                <input type="password"  name="oldpw" aria-label="Old Password" class="form-control" placeholder="Enter old password" value="" onchange="check_pass(this.value);"  autofocus>		
								<!--<span class="error"><?php //echo form_error('first_name');?></span>-->
						</div>
											
						<div class="input-group">
						
								<label>New Password</label>
                                <input type="password" id="password" name="newpw" class="form-control" aria-label="New Password"  value="" placeholder="Enter new password">								
						</div>
						
						<div class="input-group text-center btngroup">
						    <button type="submit" class="btn orangebtn"> Change Password </button>
							<!--<button type="submit" class="btn" title="Login">Register</button>!-->
						
						</div>
				</form>
				</div>