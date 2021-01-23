<html>
<head>
 <style>
 .container-fluid{
	 padding:0px;
 }

#login{
	<?php	/* background-image: url('<?php echo base_url();?>images1/blue.jpg');
			background: #cdd0c9; */ ?>
			/*background-image: url('<?php echo base_url();?>/images1/gg.jpg');*/
background: #cdd0c9;
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} 


#foot1{
	display:none ;
}

.brek{
	display:none;
}

.takenon{
	margin-left: 47%;
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

.headr{
	display:block !important;
	
}

.takenon{
	margin-left: 0% !important;
}

.panel-body {
    padding: 15px !important;
}




    table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }


.pagebreak { page-break-before: always; }


#foot{
	display:none !important;
}

#foot1{
	display:block !important;
}



/*color for th*/
					   

.all_th{
background: lightgrey !important;	
}
.corr_th{
background: yellowgreen !important;
}
.incorr_th{
background: red !important;	
}
.unattp_th{
background: sandybrown !important;	
}
.perc_th {
background: slateblue !important;	
}




/*color for td*/

.all_td{
background: lightgrey; !important ;
}
.corr_td{
background: yellowgreen !important;
}
.incorr_td{
background: red !important;	
}
.unattp_td{
background: sandybrown !important;	
}
.perc_td {
background: slateblue!important;
}	




.brek{
	display:block !important;
}






}



.passfail{
	font-size:12px;
	
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
</style><style>
.container {
    padding-right: 0px !important;
    padding-left: 0px !important;
	
}

.headr{
	display:none;
	
}

.lab{
	    font-weight: bold;
    font-style: italic;
	
}

.colon{
	 font-weight: bold;
}

.det{
	    color: purple;
    font-weight: bold;
    font-size: 17px;
	    margin: 0px;
}

.lab{
	float:left;
	    color: grey;

}

</style>





<style>

.panel.with-nav-tabs .panel-heading{
    padding: 5px 5px 0 5px;
}
.panel.with-nav-tabs .nav-tabs{
	border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
	margin-bottom: -1px;
}
/********************************************************************/
/*** PANEL DEFAULT ***/
.with-nav-tabs.panel-default .nav-tabs > li > a,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
}
.with-nav-tabs.panel-default .nav-tabs > .open > a,
.with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
	background-color: #ddd;
	border-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.active > a,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
	color: #555;
	background-color: #fff;
	border-color: #ddd;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f5f5f5;
    border-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #777;   
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #555;
}
/********************************************************************/
/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
	color: #fff;
	background-color: #3071a9;
	border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
	color: #428bca;
	background-color: #fff;
	border-color: #428bca;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;   
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
}
/********************************************************************/
/*** PANEL SUCCESS ***/
.with-nav-tabs.panel-success .nav-tabs > li > a,
.with-nav-tabs.panel-success .nav-tabs > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li > a:focus {
	color: #3c763d;
}
.with-nav-tabs.panel-success .nav-tabs > .open > a,
.with-nav-tabs.panel-success .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-success .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-success .nav-tabs > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li > a:focus {
	color: #3c763d;
	background-color: #d6e9c6;
	border-color: transparent;
}
.with-nav-tabs.panel-success .nav-tabs > li.active > a,
.with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {
	color: #3c763d;
	background-color: #fff;
	border-color: #d6e9c6;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #3c763d;   
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #d6e9c6;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #3c763d;
}
/********************************************************************/
/*** PANEL INFO ***/
.with-nav-tabs.panel-info .nav-tabs > li > a,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
	color: #31708f;
}
.with-nav-tabs.panel-info .nav-tabs > .open > a,
.with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
	color: #31708f;
	background-color: #bce8f1;
	border-color: transparent;
}
.with-nav-tabs.panel-info .nav-tabs > li.active > a,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
	color: #31708f;
	background-color: #fff;
	border-color: #bce8f1;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #31708f;   
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #31708f;
}
/********************************************************************/
/*** PANEL WARNING ***/
.with-nav-tabs.panel-warning .nav-tabs > li > a,
.with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
	color: #8a6d3b;
}
.with-nav-tabs.panel-warning .nav-tabs > .open > a,
.with-nav-tabs.panel-warning .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
	color: #8a6d3b;
	background-color: #faebcc;
	border-color: transparent;
}
.with-nav-tabs.panel-warning .nav-tabs > li.active > a,
.with-nav-tabs.panel-warning .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.active > a:focus {
	color: #8a6d3b;
	background-color: #fff;
	border-color: #faebcc;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #fcf8e3;
    border-color: #faebcc;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #8a6d3b; 
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #faebcc;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #8a6d3b;
}
/********************************************************************/
/*** PANEL DANGER ***/
.with-nav-tabs.panel-danger .nav-tabs > li > a,
.with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
	color: #a94442;
}
.with-nav-tabs.panel-danger .nav-tabs > .open > a,
.with-nav-tabs.panel-danger .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
	color: #a94442;
	background-color: #ebccd1;
	border-color: transparent;
}
.with-nav-tabs.panel-danger .nav-tabs > li.active > a,
.with-nav-tabs.panel-danger .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.active > a:focus {
	color: #a94442;
	background-color: #fff;
	border-color: #ebccd1;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f2dede; /* bg color */
    border-color: #ebccd1; /* border color */
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #a94442; /* normal text color */  
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ebccd1; /* hover bg color */
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff; /* active text color */
    background-color: #a94442; /* active bg color */
}
</style>

<style>

/*color for th*/
					   
.test_th{
	min-width: 257px;
}
.all_th{
min-width: 73px; text-align:center;background: lightgrey;	
}
.corr_th{
min-width: 73px; text-align:center;background: yellowgreen;color: white;
}
.incorr_th{
min-width: 73px; text-align:center;background: red;color: white;	
}
.unattp_th{
min-width: 73px; text-align:center;background: sandybrown;color: white;	
}
.perc_th {
min-width: 73px; text-align:center;background: slateblue;     color: white;	
}




/*color for td*/

.all_td{
text-align:center;background: lightgrey; font-weight:bold;
}
.corr_td{
text-align:center;background: yellowgreen;color: white; font-weight:bold;
}
.incorr_td{
text-align:center;background: red;color: white; font-weight:bold;	
}
.unattp_td{
text-align:center;background: sandybrown;color: white; font-weight:bold;	
}
.perc_td {
text-align:center;background: slateblue;color: white; font-weight:bold;
}	


</style>
</head>
<body>

<div class="container-fluid"id="login">

 <div class="container">
 


 

 <br/>
<a href="javascript:print();" class="btn btn-danger printbtn"><?php echo $this->lang->line('print');?></a>

 <br/> <br/>


<?php
if($result['gen_certificate']=='1'){
?>
<!--<a href="<?php echo site_url('result/generate_certificate/'.$result['rid']);?>" class="btn btn-warning printbtn"><?php echo $this->lang->line('download_certificate');?></a>-->
	
<?php
}
?>









<div class="row headr" style="border-bottom:1px solid black;">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<img src="<?php echo base_url() ?>images1/logo.png" style="margin-left:5%;margin-bottom:2%;">
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<h3 style="float:right;
    font-size: 31px;
    margin-top: 5%;margin-right:5%;
    font-style: italic;font-weight:600;">Overall Test Reports</h3>
</div>
</div>








<div class="container">
 
	<?php

foreach($results as $result){

?>	


<div class="single">

<div class="row" style="border-top: 12px solid tomato;">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:white;height:137px;border: 1px solid lightslategrey;">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="border-right: 1px solid lightslategrey;min-height: 137px;">

<div>

<div style="margin-top: 3%;">
<label class="lab">Candidate Name <span>:</span>&nbsp;</label>
<h3 class="det"><?php echo $result['first_name'];?></h3>
</div>

<div style="margin-top: 3%;">
<label class="lab">Test Name <span>: </span>&nbsp;</label>
<h3 class="det" style="float:left;"><?php echo $result['quiz_name'];?></h3>
<span style="font-weight: 600;margin-left: 3%;font-style: italic;">(Test IP : <?php echo $result['attempted_ip'];?>)</span>
</div>

<div style="margin-top: 3%;">
<label class="lab">Email <span>: </span>&nbsp;</label>
<h3 class="det" style="float:left;"><?php echo $result['email'];?></h3>


<span class="brek">
<br>
<br>

</span>

<div class="takenon" style="">
<label class="lab">Taken On <span>: </span>&nbsp;</label>
<h3 class="det"><?php echo date('Y-m-d H:i:s',$result['start_time']);?></h3>
</div>

</div>



</div>


</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px;border-right: 1px solid lightslategrey;min-height: 137px;">
<div style="text-align:center;">
<i class="fa fa-clock-o" aria-hidden="true" style="font-size: 64px;margin-top: 4%;"></i>

<h3 style="text-align:center;margin-top: 4%;color: maroon;"><?php echo intval($result['total_time']/60);?> m</h3>
</div>
</div>

<div class="col-md-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
<div style="text-align:center;">
<i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 64px;margin-top: 4%;"></i>

<h3 style="text-align:center;margin-top: 4%;color: green;font-weight:bold;margin-bottom:0px;    margin-top: 3px;font-size: 29px;
"><?php echo round($result['percentage_obtained']);?> %</h3>
<span class="passfail" style="color: red;font-style:italic;font-weight:600;"> <?php if($result['percentage_obtained']>=50){?>Congrats! You have Passed.<?php } else { ?>Sorry..You have Failed <?php } ?></span>
</div>



</div>

</div>

</div>


<div class="row">

      <div class="panel with-nav-tabs" style="border: none;">
                <div class="panel-heading" style="border-color: #d3d3d3;">
                        <ul class="nav nav-tabs">
                            <li class="active" style="width: 344px;font-size: 20px;font-weight: bold;text-align: center;     margin-left: 2%;"><a href="#tab1primary" data-toggle="tab">Test Result</a></li>
							
						
							
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                       
					   
					   <table class="table table-bordered  table-striped" style="margin-top:2%;">
					   <thead>
					   <tr>


		
					   <th class="test_th" style="">Test Name</th>
					   <th class="all_th" style="">All</th>
					   <th class="corr_th" style="">Correct</th>
					   <th class="incorr_th" style="">Incorrect</th>
					   <th class="unattp_th" style="">Unattempted</th>
					   <th class="perc_th" style="">Percentage Correct</th>
					   
					   <tr>
					   </thead>
					   
					   <tbody>
					   
					  
			
<?php

 
// time spent on individual questions
	 $correct_incorrect=explode(',',$result['score_individual']);
	 
	
	 
	 $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
	 $correctcount=0;
		$incorrectcount=0;
		$unattempted=0;
		$pending_evaluation=0;
		
    foreach(explode(",",$result['score_individual']) as $key => $val){
		
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
		 $correctcount=$correctcount+1; 
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='2' ){
		 $incorrectcount=$incorrectcount+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
	 }
	 else if($correct_incorrect[$key]=='0' ){
		 $unattempted=$unattempted+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='3' ){
		 $pending_evaluation=$pending_evaluation+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
	 }
	 }
	 $data['correctcount']=$correctcount;
	 $data['incorrectcount']=$incorrectcount;
	 $data['unattempted']=$unattempted;
	 $data['pending_evaluation']=$pending_evaluation;
	 
	 
	
?>



					   

					   <tr>
					
					   <td class="test_td"><?php echo $result['quiz_name'];?></td>
					   <td class="all_td" style=""><?php echo $result['noq'];?></td>
					   <td class="corr_td" style=""><?php echo $correctcount;?></td>
					   <td class="incorr_td" style=""><?php echo $incorrectcount;?></td>
					   <td class="unattp_td" style=""><?php echo $unattempted;?></td>
					  
					   <td  class="perc_td" style=""><?php echo round($result['percentage_obtained']);?>%</td>
					   </tr>
					   
					 
					   
	
					   </tbody>
					   
					   </table>
					   
                    </div>
                </div>
            </div>



   
</div>

  <div class="row " style="margin-top:-20px;">


 
 <div class="login-panel panel panel-default" style="">
		<div class="panel-body" style=""> 
	
<?php /* 	
	<div class="col-md-3 col-sm-3 col-xs-3">
		 <h3 style="color:black;text-align:center;">Test Report(<?php echo $result['quiz_name'];?>)</h3>
<table class="table table-bordered" style="border:1px solid black;" align="center">
<?php 
if($result['camera_req']=='1'){
	?>
<tr><td colspan='2'> <?php if($result['photo']!=''){ ?> <img src ="<?php echo base_url('photo/'.$result['photo']);?>" id="photograph" ><?php } ?></td></tr>
	
	<?php 
}
?>
<tr><td><strong><?php echo $this->lang->line('first_name');?></strong>:<?php echo $result['first_name'];?></td></tr>

<tr><td><strong><?php echo $this->lang->line('email');?></strong>:<?php echo $result['email'];?></td></tr>

<tr><td><strong><?php echo $this->lang->line('attempt_time');?></strong>:<?php echo date('Y-m-d H:i:s',$result['start_time']);?></td></tr>
<tr><td><strong>Total Time Spent in </strong>:<?php echo intval($result['total_time']/60);?> min</td></tr>
<tr><td><strong><?php echo $this->lang->line('percentage_obtained');?></strong>:<?php echo $result['percentage_obtained'];?>%</td></tr>
<tr><td><strong><?php echo $this->lang->line('status');?></strong>:<span <?php if($result['percentage_obtained']>=50){?> style="color:green;" <?php } else { ?>style="color:red;" <?php } ?>><?php echo $result['result_status'];?></span></td></tr>

</table>

		</div> */ ?>
		
		
		

	<!--	 <div id="chart_div2" class="col-md-6 col-sm-6 col-xs-6" style="height: 350px;"></div>
		 
		 <div id="chart_div1" class="col-md-6 col-sm-6 col-xs-6" style="height: 350px;">  </div>-->
		 
		 
		 
		 
		</div> 
		
		
<?php

   $resid=$result['rid'];
   

 $this->load->model('result_model');


$compdet=$this->result_model->compilerdet($resid);



//print_r($compdet);
//echo $compdet[0]['language'];

?>
		
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
			 
			 <?php $k++;
		 }?>
		 
		 </table>
		 <br/>
		 <br/>
		 <br/>
</div>

 





<?php
 
 

if($this->config->item('google_chart') == true ){ 
?>



<script type="text/javascript" src="<?php echo base_url();?>js/google.js"></script>

     <script type="text/javascript">
/*       google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: '<?php echo $this->lang->line('time_spent_on_ind');?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      } */
	  
	    google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: '<?php echo $this->lang->line('time_spent_on_ind');?> ',
          hAxis: {title: 'Category', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
		
	  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
/*       function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $result['sec_percentage'];?>);

        var options = {
          title: '<?php echo "Category Comparison";?> ',
          hAxis: {title: 'Category', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      } */
	  
	  
	     function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $result['sec_percentage'];?>);

        var options = {
          title: '<?php echo "Category Comparison";?>'
        };
     var options = {
          title: '<?php echo "Category Comparison";?>',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));

        chart.draw(data, options);
      }
	  

    </script>
<?php //echo $result['sec_percentage']; ?>
<?php 
}

$ind_score=explode(',',$result['score_individual']); 
// view answer
if($result['view_answer']=='1' || $logged_in['su']=='1'){
	
?>

	 
	  <script type="text/javascript">
/*       google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

        var options = {
          title: '<?php echo "Test Comparison";?> ',
          hAxis: {title: '<?php echo $this->lang->line('quiz');?>', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      } */
	  
	  
	  function download_result()
	  {
		 // alert("");
		  
		    $.ajax({
	  
  type: 'POST',
    url: "<?php echo base_url();?>index.php/result/download_pdf/1",
  data: {quiz_id:'<?php echo $this->session->userdata('rid');?>'}, 
  
  success: function (response1) {

  }
  });
 
		  
	  }
    </script>

	<br>
	<br>
	
	<?php /* 	 <div id="chart_div" style="width: 400px; height: 400px;">  
		 
		 </div>	 */ ?>
	<!--	 <div id="chart_div1" style="width: 400px; height: 400px;">  
		 
		 </div>-->
		 

		 
		 
		
<div class="login-panel panel panel-default" style="display:none;">
		<div class="panel-body"> 
<h3><?php echo $this->lang->line('answer_sheet');?></h3>

<?php 
$abc=array(
'0'=>'A',
'1'=>'B',
'2'=>'C',
'3'=>'D',
'4'=>'E',
'6'=>'F',
'7'=>'G',
'8'=>'H',
'9'=>'I',
'10'=>'J',
'11'=>'K'
);
foreach($questions as $qk => $question){
?>
 <hr>
 <div id="q<?php echo $qk;?>" class="" style="<?php if($ind_score[$qk]=='1'){ ?>background-color:#e3f8da;<?php }else if($ind_score[$qk]=='2'){ ?>background-color:#ffe1cb;<?php }else if($ind_score[$qk]=='3'){ ?>background-color:#fdfbcf;<?php }else{ ?>background-color:#ffffff;<?php } ?>">
		
		<div style="padding:10px;" >
		 <?php echo '<b>'.$this->lang->line('question');?> <?php echo $qk+1;?>)</b><br>
		 <?php echo $question['question'];?>
<hr>
		 <?php if($question['description']!='') {
			echo '<b>'.$this->lang->line('description').'</b><br>';
			echo $question['description'];
		 }
		 ?> 
		 </div>
		<div style="padding:10px;" >
		 <?php 
		 // multiple single choice
		 if($question['question_type']==$this->lang->line('multiple_choice_single_answer')){
			 
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="1">
			 <?php
			$i=0;
			$correct_options=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					if($option['score'] >= 0.1){
						$correct_options[]=$option['q_option'];
					}
			?>
			 
		<div class="op"><?php echo $abc[$i];?>) <input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>"   <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?>  > <?php echo $option['q_option'];?> </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			echo "<br>".$this->lang->line('correct_options').': '.implode(', ',$correct_options);
		 }
			
// multiple_choice_multiple_answer	

		 if($question['question_type']==$this->lang->line('multiple_choice_multiple_answer')){
			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="2">
			 <?php
			$i=0;
			$correct_options=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
						if($option['score'] >= 0.1){
						$correct_options[]=$option['q_option'];
					}
			?>
			 
		<div class="op"><?php echo $abc[$i];?>) <input type="checkbox" name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$i;?>"   value="<?php echo $option['oid'];?>"  <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> > <?php echo $option['q_option'];?> </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			echo "<br>".$this->lang->line('correct_options').': '.implode(', ',$correct_options);
		 }
			 
	// short answer	

		 if($question['question_type']==$this->lang->line('short_answer')){
			 			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="3"   >
			 
			 <?php

			 
			
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('your_answer');?> 
		<input type="text" name="answer[<?php echo $qk;?>][]" value="<?php echo $save_ans;?>" id="answer_value<?php echo $qk;?>"   >  
		</div>
			 
			 
			 <?php 
			 			 foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					 echo "<br>".$this->lang->line('correct_answer').': '.$option['q_option'];
			 }
			 }
			 
		 }
		 
		 
		 	// long answer	

		 if($question['question_type']==$this->lang->line('long_answer')){
			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk;?>" value="4">
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> <br>
		<?php echo $this->lang->line('word_counts');?>  <?php echo str_word_count($save_ans);?>
		<textarea name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
		</div>
		<?php 
		if($logged_in['su']=='1'){
			if($ind_score[$qk]=='3'){
			
		?>
		<div id="assign_score<?php echo $qk;?>">
		<?php echo $this->lang->line('evaluate');?>	
		<a href="javascript:assign_score('<?php echo $result['rid'];?>','<?php echo $qk;?>','1');"  class="btn btn-success" ><?php echo $this->lang->line('correct');?></a>	
		<a href="javascript:assign_score('<?php echo $result['rid'];?>','<?php echo $qk;?>','2');"  class="btn btn-danger" ><?php echo $this->lang->line('incorrect');?></a>	
		</div>
		<?php 
			}
		}
		?>		
			 
			 <?php 
			 
			 
		 }
			 
		
		
		
		
		
		
		// matching	

		 if($question['question_type']==$this->lang->line('match_the_column')){
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					// $exp_match=explode('__',$saved_answer['q_option_match']);
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden" name="question_type[]" id="q_type<?php echo $qk;?>" value="5">
			 <?php
			$i=0;
			$match_1=array();
			$match_2=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					$match_1[]=$option['q_option'];
					$match_2[]=$option['q_option_match'];
			?>
			 
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			?>
			<div class="op">
						<table>
						<tr><td></td><td><?php echo $this->lang->line('your_answer');?></td><td><?php echo $this->lang->line('correct_answer');?></td></tr>
						<?php 
			 
			foreach($match_1 as $mk1 =>$mval){
						?>
						<tr><td>
						<?php echo $abc[$mk1];?>)  <?php echo $mval;?> 
						</td>
						<td>
						
							<select name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$mk1;?>"  >
							<option value="0"><?php echo $this->lang->line('select');?></option>
							<?php 
							foreach($match_2 as $mk2 =>$mval2){
								?>
								<option value="<?php echo $mval.'___'.$mval2;?>"  <?php $m1=$mval.'___'.$mval2; if(in_array($m1,$save_ans)){ echo 'selected'; } ?> ><?php echo $mval2;?></option>
								<?php 
							}
							?>
							</select>

						</td>
						
						<td>
						<?php 
							echo $match_2[$mk1];
							?>
						</td>
						
						</tr>
				
						
						<?php 
			}
			
			
			?>
			</table>
			 </div>
			<?php
			
		 }
			
		 ?>

		</div> 
 </div>
 <div id="page_break"></div>
 
 
 <?php
}
?>
</div>
</div>
<?php 
}
// view answer ends
?>


 

      
</div>

</div>




<!-- footer-->
<div class="container-fluid" id="foot1" >
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




<div class="pagebreak"> </div>
<br>
<br>
<?php } ?>


</div>

<!-- container ends -->














</div>

<input type="hidden" id="evaluate_warning" value="<?php echo $this->lang->line('evaluate_warning');?>">
</div>





<!-- footer-->
<div class="container-fluid" id="foot" >
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
	
	</html>

 