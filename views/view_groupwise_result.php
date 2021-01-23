
 <style>
 .container-fluid{
	 padding:0px;
 }

#login{
	<?php	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */ ?>
			background: #cdd0c9;
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} 
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
	
	h1 { flow: static(header); }
/* Use the value from "header" as the content for the page header */
@page {
  @top { content: flow(header); }
}
</style>
<div class="container-fluid"id="login">

 <div class="container">
 


<?php /*   <script src="https://docraptor.com/docraptor-1.0.0.js"></script>
  <script>
    var downloadPDF = function() {
      DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
        test: true, // test documents are free, but watermarked
        type: "pdf",
        document_content: document.querySelector('html').innerHTML, // use this page's HTML

      })
    }
  </script> */ ?>
  <style>
    @media print {
      #pdf-button {
        display: none;
      }
    }
  </style>
</head>
<body>
 

 <br/>
<a href="javascript:print();" class="btn btn-success printbtn"><?php echo $this->lang->line('print');?></a>






  <div class="row">
  
  
     <?php //for($i=0;$i<=3;$i++){ 
	 
	 //foreach($result as $row){
	 
	 ?>

<div class="col-md-12 ">
<br> 


	 
	<?php

foreach($result as $row){

?>	

 <div class="login-panel panel panel-default">
		<div class="panel-body" style="margin-top:10px;"> 
	
 
	
	<div class="col-md-6 col-sm-6 col-xs-6">
		 <h3 style="color:black;text-align:center;">Test Report</h3>
	
<table class="table table-bordered" style="border:1px solid black;" align="center">

<tr><td><?php echo $this->lang->line('first_name');?></td><td><?php echo $row['first_name'];?></td></tr>

<tr><td><?php echo $this->lang->line('email');?></td><td><?php echo $row['email'];?></td></tr>
<tr><td><?php echo $this->lang->line('quiz_name');?></td><td><?php echo $row['quiz_name'];?></td></tr>
<tr><td><?php echo $this->lang->line('attempt_time');?></td><td><?php echo date('Y-m-d H:i:s',$row['start_time']);?></td></tr>
<tr><td><?php echo $this->lang->line('time_spent');?></td><td><?php echo intval($row['total_time']/60);?></td></tr>
<tr><td><?php echo $this->lang->line('percentage_obtained');?></td><td><?php echo $row['percentage_obtained'];?>%</td></tr>

<tr><td><?php echo $this->lang->line('score_obtained');?></td><td><?php echo $row['score_obtained'];?></td></tr>
<tr><td><?php echo $this->lang->line('status');?></td><td><?php echo $row['result_status'];?></td></tr>

</table>


<?php

$resid=$row['rid'];

 $this->load->model('result_model');


$compdet=$this->result_model->compilerdet($resid);
//print_r($compdet);
//echo $compdet[0]['language'];

?>



		</div>

		 <div id="chart_div2_<?php echo $row['rid']; ?>" class="col-md-6 col-sm-6 col-xs-6" style="height: 350px;"></div>
		</div>
		
		
		
		
		<div class="row" style="">

		
		 <h3 style="color:black;text-align:center;">Compiler Report</h3>
		 <table class="table table-bordered" style="border:1px solid black;padding:30px;width:90%;" align="center">
		 <tr>
		 <td>Sno</td>
		 <td>Compile Time</td>
		 <td>Language</td>
		 <td>Code</td>
		 <td>Error</td>
		 <td>Output</td>
		
		 </tr>
		 
	<?php

$k=1;
foreach($compdet as $compdetails){


?>	 
			  <tr>
		 <td><?php echo $k;?></td>
		 <td><?php echo $compdetails['date'];?></td>
		 <td><?php echo $compdetails['language'];?></td>
		 <td><?php echo str_replace("<?php"," ",$compdetails['source']);?></td>
		 <td><?php echo $compdetails['error'];?></td>
		 <td><?php echo $compdetails['output'];?></td>
		
		 </tr>
		 
		 
<?php $k++;} ?>
			 </table>
		 
		 
		 
		 </div>
		 
		 
		 




<?php
 
 

if($this->config->item('google_chart') == true ){ 


$rid=$row['rid'];
 $this->load->model('result_model');
$data['result']=$this->result_model->get_result($rid);


// time spent on individual questions
	$correct_incorrect=explode(',',$data['result']['score_individual']);
	 $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='2' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
	 }
	 else if($correct_incorrect[$key]=='0' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='3' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
	 }
	 }
	 
	 
	 
	  $qtime=json_encode($qtime);
	  
	// print_r($qtime);
	  
	//print_r($data['qtime']); 




?>



<script type="text/javascript" src="<?php echo base_url();?>js/google.js"></script>

		 


     <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: '<?php echo $this->lang->line('time_spent_on_ind');?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2_<?php echo $row['rid']; ?>'));
        chart.draw(data, options);
      }
    </script>
		

			
	
		

<?php $qtime="";
}

	
?>


	
		 
		 <br/>
		 <br/>
		 <br/>
</div>



	 
		 <?php } ?>







 
<br>




<!-- chart old place -->	 
	 




 
 
</div>
      
	
	  
</div>





</div>

<input type="hidden" id="evaluate_warning" value="<?php echo $this->lang->line('evaluate_warning');?>">
</div>
<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
                <p>&copy; 2018 Infoziant. All Rights Reserved.</p>
            </div>
			</div>
		
	</div>	
</footer>
	</div>

</body>
 