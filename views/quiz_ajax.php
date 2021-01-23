<?php// print_r($gw_qw_result); ?>

				    <div class="col-md-4" style="">
				 <select class="form-control" name="quiz_id" style="margin-top: 7%;border:1px solid black;" required>

<option value="">select Quiz</option>

<?php foreach($gw_qw_result as $quizid){  ?>

<option value="<?php echo  $quizid['quid']; ?>"><?php echo  $quizid['quiz_name']; ?></option>

<?php } ?>
</select>
</div>