 <div class="row">
 
<div class="col-md-12">
<br> 
	
<table style="color:white;"class="table table-bordered">
<tr>
 <th>#</th>
 <th>StudentName</th>
<th>E-Mail</th>
<th>CollegeName</th>

</tr>
	
	
	<?php

$rowcount=1;
foreach($dd as $key => $val){
?>
<tr>
 <td> <?php echo $rowcount;?></td>

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

</div>