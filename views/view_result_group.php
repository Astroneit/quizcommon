
 <style>
@media print {
   
   .navbar{
   display:none;
   }
   #footer{
   display:none;
   } 
   .printbtn{
	  display:none; 
   }
   #social_share{
	   display:none;
   }
   #page_break2{
	   
   page-break-after: always;
	}
	

}
 td{
		font-size:14px;
		padding:4px;
	}
	
	
</style>
 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
 <h3><?php echo $title;?></h3>
   
 
<a href="javascript:print();" class="btn btn-success printbtn"><?php echo $this->lang->line('print');?></a>


  <div class="row">
     
<div class="col-md-12">

<br>
<div align="center">
<?php 

echo $grp_name->group_name;
?>
 Results</div>
<?php
 
 
  
if($this->config->item('google_chart') == true ){ 
?>


<!-- google chart starts -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		 

		
 
 
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
/*        var data = google.visualization.arrayToDataTable([
        ['', 'Passf', 'Failgh' ],
        ['2010', 10, 24],
        ['2020', 16, 22],
        ['2030', 28, 19]
	
      ]);  */
  var data = google.visualization.arrayToDataTable(<?php echo $values;?>); 
      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true
      };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div2" style="width: 800px; height: 500px;"> </div>
 
 


<?php 
}

?>





 
 
 
 
</div>
      
</div>

 



</div>

<input type="hidden" id="evaluate_warning" value="<?php echo $this->lang->line('evaluate_warning');?>">
 