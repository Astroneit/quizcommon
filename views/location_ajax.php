<ul id="location_id">
<?php
foreach ($value as $val)
{
    if(!empty($val)){
?>
<a style="color:white;" onClick="click_keyword('<?php echo $val['technology'];?>');"><li><?php echo $val['technology']; ?></li></a>
    <?php }}?>
</ul>
 