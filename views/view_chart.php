
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

   

  <div class="row">
     
<div class="col-md-12">



<?php
 
 

if($this->config->item('google_chart') == true ){ 
?>


<!-- google chart starts -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		 

		 
<!-- google chart ends -->


<!-- google chart starts 

     <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: '<?php echo $this->lang->line('time_spent_on_ind');?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div2" style="width:800px; height: 500px;"></div>-->
		 
<!-- google chart ends -->


 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		   ['Quiz Name', 'Percentage (%)', { role: 'style' }],
	
	
		<?php
 foreach($last_ten_result as $val){
 //  echo "[".$val['quiz_name']." (".$val['first_name']." ".$val['last_name'].")",intval($val['percentage_obtained']),'silver'."],";
 ?>
 ['<?php echo $val['quiz_name']." ".$val['first_name'];?>', <?php echo intval($val['percentage_obtained']);?>, '<?php if($val['percentage_obtained'] >=50){ echo 'green'; } else { echo 'red'; } ?>' ],
 <?php
 }
		//echo $value;
		
		?>
		
		]);

	/* 	    var data = google.visualization.arrayToDataTable([
         ['Element', 'Density', { role: 'style' }],
         ['Copper', 8.94, '#b87333'],            // RGB value
         ['Silver', 10.49, 'silver'],            // English color name
         ['Gold', 19.30, 'gold'],

       ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
      ]); */
		
        var options = {
          title: '<?php echo "Test Comparison";?> ',
          hAxis: {title: '<?php echo $this->lang->line('quiz');?>(<?php echo $this->lang->line('user');?>)', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	  
	  function get_image()
	  {
	    var my_div = document.getElementById('chart_div');
    var my_chart = new google.visualization.ChartType(chart_div);

    google.visualization.events.addListener(my_chart, 'ready', function () {
      my_div.innerHTML = '<img src="' + my_chart.getImageURI() + '">';
    });

    my_chart.draw(data);
	  }
    </script>
		 <div id="chart_div" style="width: 1000px; height: 500px;">  
		 
		 </div>

<?php 
}


// view answer ends
?>





 
 
 
 
</div>
      
</div>

 



</div>


 