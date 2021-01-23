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

.panel-body {
    padding: 15px !important;
}




    table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }


.pagebreak { page-break-before: always; }



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
<div class="container-fluid"id="login">

 <div class="container">
 

<?php /* 
  <script src="https://docraptor.com/docraptor-1.0.0.js"></script>
  <script>
    var downloadPDF = function() {
      DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
        test: true, // test documents are free, but watermarked
        type: "pdf",
        document_content: document.querySelector('html').innerHTML, // use this page's HTML

      })
    }
  </script> */ ?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>

function showall()
{
//	alert("in");

	$('#stat1').css('display','block');
	$('.inner_skill_result').css('display','block');
	

}
function collapse()
{
//	alert("in");

	$('#stat1').css('display','none');
	$('.inner_skill_result').css('display','none');
	

}

function show_answer_table(){
	
	var did="#stat1";
	 
	if($(did).css('display')=='none'){
		$(did).css('display','block');
	}else{
		$(did).css('display','none');
	}
	 
}
function show_answer_skill(skill_id)
{
	var did="#statskill"+skill_id;
	 
	 if($(did).css('display')=='none'){
		 $(did).css('display','block');
	 }else{
		 $(did).css('display','none');
	 }
}
function show_answer_skill1(skill_id)
{
	var did="#statskill1"+skill_id;
	 
	 if($(did).css('display')=='none'){
		 $(did).css('display','block');
	 }else{
		 $(did).css('display','none');
	 }
}


function getPDF(){
 //alert('ss');
 var HTML_Width = $(".canvas_div_pdf").width();
 var HTML_Height = $(".canvas_div_pdf").height();
 alert(HTML_Height);
 var top_left_margin = 15;
 var PDF_Width = HTML_Width+(top_left_margin*2);
 var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
 var canvas_image_width = HTML_Width;
 var canvas_image_height = HTML_Height;
 
 var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
 
 
 html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
 canvas.getContext('2d');
 
 console.log(canvas.height+"  "+canvas.width);
 
 
 var imgData = canvas.toDataURL("image/jpeg", 1.0);
 var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
 
 
 for (var i = 1; i <= totalPDFPages; i++) { 
 pdf.addPage(PDF_Width, PDF_Height);
 pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
 }
 
     pdf.save("<?php echo $result['first_name']."_".$result['register_no'];?>"+".pdf");
        });
 };

</script>
</head>
<body>
 

 <br/>
<a href="javascript:print();" class="btn btn-danger printbtn"><?php echo $this->lang->line('print');?></a>

 <br/> <button onclick="getPDF()">Generate PDF</button>


<br/>


<?php
if($result['gen_certificate']=='1'){
?>
<a href="<?php echo site_url('result/generate_certificate/'.$result['rid']);?>" class="btn btn-warning printbtn"><?php echo $this->lang->line('download_certificate');?></a>
	
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
    font-style: italic;font-weight:600;">Test Results</h3>
</div>
</div>



<div class="row"style="border-top:12px solid tomato;">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:white;height:137px;border: 1px solid lightslategrey;">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="border-right: 1px solid lightslategrey;min-height: 137px;">




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
<span style="color: red;font-style:italic;font-weight:600;"> <?php if($result['percentage_obtained']>=$result['pass_percentage']){ ?>Congrats! You have Passed.<?php } else { ?>Sorry..You have Failed <?php } ?></span>
</div>



</div>

</div>

</div>
<div class="row">

      <div class="panel with-nav-tabs"  style="border: none;">
                <div class="panel-heading" style="border-color: #d3d3d3;">
                        <ul class="nav nav-tabs">
                            <li class="active" style="width: 344px;font-size: 20px;font-weight: bold;text-align: center;     margin-left: 2%;"><a href="#tab1primary" data-toggle="tab">Test Result</a></li>
							
						
							
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
					<a  onclick="showall();">Expand All</a> | <a  onclick="collapse();">Collapse All</a>
					   
					   <table class="table table-bordered  table-striped" style="margin-top:2%;">
					   <thead>
					   <tr>
					   <th style="min-width: 257px;">Test Name</th>
					   <th style="min-width: 73px; text-align:center;background: lightgrey;">No of Questions</th>
					   <th style="min-width: 73px; text-align:center;background: lightgrey;">Time Alloted(min)</th>
					   <th style="min-width: 73px; text-align:center;background: yellowgreen;     color: white;">Correct</th>
					   <th style="min-width: 73px; text-align:center;background: red;     color: white;">Incorrect</th>
					   <th style="min-width: 73px; text-align:center;background: sandybrown;     color: white;">Unattempted</th>
					   <th style="min-width: 73px; text-align:center;background: slateblue;     color: white;">Percentage Correct</th>
					   
					   <tr>
					   </thead>
					   
					   <tbody>
					   <tr>
					   <td> <a href="javascript:show_answer_table();">+</a>  <?php echo $rowcount;?><?php echo $result['quiz_name'];?></td>
					   <td style="text-align:center;background: lightgrey; font-weight:bold;"><?php echo $result['noq'];?></td>
					   <td style="text-align:center;background: lightgrey; font-weight:bold;"><?php echo $result['duration'];?></td>
					   <td style="text-align:center;background: yellowgreen;color: white; font-weight:bold;"><?php echo $correctcount;?></td>
					   <td style="text-align:center;background: red;color: white; font-weight:bold;"><?php echo $incorrectcount;?></td>
					   <td style="text-align:center;background: sandybrown;color: white; font-weight:bold;"><?php echo $unattempted;?></td>
					  
					   <td style="text-align:center;background: slateblue;color: white; font-weight:bold;"><?php echo round($result['percentage_obtained']);?>%</td>

					
  
					   <table style="display:none;" id="stat1">
		<tr>
		<td>Sno</td>
		<td>Skill Name</td>
		<td>% of Question</td>
		<td>Score</td>
		<td>Score %</td> </tr>
		<?php
		$j=1; 
		foreach($skill_result as $skill_result1)
		{
			?>

			<tr>
			<td><a href="javascript:show_answer_skill(<?php echo $skill_result1['skill_id'];?>);">+</a> <?php echo $j;?></td>
		<td><?php echo $skill_result1['skill_type'];?></td>
		<td><?php echo round(($skill_result1['quescnt']/$result['noq'])*100);?></td>
		<td><?php echo $skill_result1['score'];?> / <?php echo $skill_result1['quescnt'];?></td>
		<td><?php $percent=($skill_result1['score'] / $skill_result1['quescnt'])*100;
		echo $percent; 
         
//SELECT a.cat_id,sum(a.`score_u`) as score,GROUP_CONCAT(`qid`) as questions,count(a.`qid`) as quescnt,b.category_name from savsoft_answers a, savsoft_category b  where a.cat_id=b.cid  and a.rid='".$result['rid']."' and a.skill_id='".$skill_result1['skill_id']."' group by a.`cat_id`


	$sql_skill_report = $this->db->query("SELECT a.cat_id,sum(a.`score_u`) as score,GROUP_CONCAT(`qid`) as questions,count(a.`qid`) as quescnt,b.category_name from savsoft_answers a, savsoft_category b  where a.cat_id=b.cid  and a.rid='".$result['rid']."' and a.skill_id='".$skill_result1['skill_id']."' group by a.`cat_id`");
	$res_skill_report=$sql_skill_report->result_array();
?>
	</td><td>
	<table style="display:none;" class="inner_skill_result" id="statskill<?php echo $skill_result1['skill_id'];?>">
	<tr>
	<td>Sno</td>
	<td>Category Name</td>
	<td>% of Question</td>
	<td>Score</td>
	<td>Score %</td> 
	<td>Actual Time(in sec)</td> 
	<td>Time Taken(in sec)</td>
	</tr>
	<?php
	$i=1; 
	foreach($res_skill_report as $res_skill_report1)
	{
		?>

		<tr>
		<td><a href="javascript:show_answer_skill1(<?php echo $skill_result1['skill_id'];?>);">+</a><?php echo $i;?></td>
	<td><?php echo $res_skill_report1['category_name'];?></td>
	<td><?php echo round(($res_skill_report1['quescnt']/$result['noq'])*100);?></td>
	<td><?php echo $res_skill_report1['score'];?> / <?php echo $res_skill_report1['quescnt'];?></td>
	<td><?php $percent=($res_skill_report1['score'] / $res_skill_report1['quescnt'])*100;
	echo $percent; 
	?>
	</td> 
	<td><?php  $ques_time=explode(',',$res_skill_report1['questions']);
	//print_r($ques_time);
	$total_time=0;
	$out_actual_time=0;
	foreach($ques_time as $ques_time1)
	{
		$get_ques_position = $this->db->query("SELECT individual_time,r_qids from savsoft_result 
		where rid='".$result['rid']."'");
		$get_ques_position_res=$get_ques_position->row_array();
		$input_array=explode(',',$get_ques_position_res['r_qids']);
		$out_position=array_search($ques_time1,$input_array);

		$time_array=explode(',',$get_ques_position_res['individual_time']);
		$total_time +=$time_array[$out_position];


		// actual time 
		$get_ques_actual_time = $this->db->query("SELECT min_time,max_time from qbank_time_levels 
		where qid='".$ques_time1."' and student_level='".$result['student_level']."'");
		$get_ques_actual_time_res=$get_ques_actual_time->row_array();
		
		$out_actual_time += $get_ques_actual_time_res['min_time'];
		//echo $out_position;
      // echo $get_ques_position_res['r_qids'];
	//echo $ques_time1;	
	

	}
	echo $out_actual_time;
	?></td>
	
	<td><?php echo $total_time; ?></td>

<tr>
	<td>
	<table style="display:none;" class="inner_skill_result1" id="statskill1<?php echo $skill_result1['skill_id'];?>">
	<tr>
	<td>Sno</td>
	<td>Skill Name</td>
	<td>% of Question</td>
	<td>Score</td>
	<td>Score %</td> 
	<td>Actual Time(in sec)</td> 
	<td>Time Taken(in sec)</td>
	</tr>
	<?php
	$i=1; 
	$sql_skill_report = $this->db->query("SELECT a.sub_skill_id,sum(a.`score_u`) as score,GROUP_CONCAT(`qid`) as questions,count(a.`qid`) as quescnt,b.sub_skill_name from savsoft_answers a, savsoft_skills b where a.sub_skill_id=b.sub_skill_id and a.skill_id='".$skill_result1['skill_id']."' and a.rid='".$result['rid']."' group by a.`sub_skill_id`");
	$res_skill_report=$sql_skill_report->result_array();
	foreach($res_skill_report as $res_skill_report1)
	{
		?>

		<tr>
		<td><?php echo $i;?></td>
	<td><?php echo $res_skill_report1['sub_skill_name'];?></td>
	<td><?php echo round(($res_skill_report1['quescnt']/$result['noq'])*100);?></td>
	<td><?php echo $res_skill_report1['score'];?> / <?php echo $res_skill_report1['quescnt'];?></td>
	<td><?php $percent=($res_skill_report1['score'] / $res_skill_report1['quescnt'])*100;
	echo $percent; 
	?>
	</td> 
	<td><?php  $ques_time=explode(',',$res_skill_report1['questions']);
	//print_r($ques_time);
	$total_time=0;
	$out_actual_time=0;
	foreach($ques_time as $ques_time1)
	{
		$get_ques_position = $this->db->query("SELECT individual_time,r_qids from savsoft_result 
		where rid='".$result['rid']."'");
		$get_ques_position_res=$get_ques_position->row_array();
		$input_array=explode(',',$get_ques_position_res['r_qids']);
		$out_position=array_search($ques_time1,$input_array);

		$time_array=explode(',',$get_ques_position_res['individual_time']);
		$total_time +=$time_array[$out_position];


		// actual time 
		$get_ques_actual_time = $this->db->query("SELECT min_time,max_time from qbank_time_levels 
		where qid='".$ques_time1."' and student_level='".$result['student_level']."'");
		$get_ques_actual_time_res=$get_ques_actual_time->row_array();
		
		$out_actual_time += $get_ques_actual_time_res['min_time'];
		//echo $out_position;
      // echo $get_ques_position_res['r_qids'];
	//echo $ques_time1;	
	

	}
	echo $out_actual_time;
	?></td>
	
	<td><?php echo $total_time; ?></td>


		</tr>

<?php
$i++;
	}
	?>
	
	</table>
	</td></tr>


		</tr>

<?php
$i++;
	}
	?>
	
	</table>

		
		</td>
		
		
		 </tr>

			</tr>

<?php
$j++;
		}
		?>
		
		</table>
 
 
 
  
 
  
					   </tr>
					   
					   
					   
	
					   </tbody>
					   
					   </table>
					   
                    </div>
                </div>
            </div>



   
</div>

  <div class="row " style="margin-top:-20px;">


 
 <div class="login-panel panel panel-default" style="">
		<div class="panel-body col-md-12" style=""> 
	
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

		</div> 
		 <div id="chart_div1" class="col-md-6 col-sm-6 col-xs-6" style="height: 350px;">  </div>
		*/ ?>
<p><b>Average Time Taken to Answern a Question : <?php echo round(intval($result['total_time']) / $result['noq']) ;?> Sec</b></p>
		 <div id="chart_div2" class="col-md-6 col-sm-6 col-xs-6" style="height: 350px;"></div>
		 
		
	
		<div id="" class="col-md-6 col-sm-6 col-xs-6" >
		<?php //echo $result['student_level'];?>
		
		<br/>
	<?php /*	<table>
		<tr>
		<td>Sno</td>
		<td>Skill Name</td>
		<td>% of Question</td>
		<td>Score</td>
		<td>Score %</td> </tr>
		<?php
		$i=1; 
		foreach($sub_skill_result as $sub_skill_result1)
		{
			?>

			<tr>
			<td><?php echo $i;?></td>
		<td><?php echo $sub_skill_result1['sub_skill_name'];?></td>
		<td><?php echo round(($sub_skill_result1['quescnt']/$result['noq'])*100);?></td>
		<td><?php echo $sub_skill_result1['score'];?> / <?php echo $sub_skill_result1['quescnt'];?></td>
		<td><?php $percent=($sub_skill_result1['score'] / $sub_skill_result1['quescnt'])*100;
		echo $percent; 
		?>
		</td> </tr>

			</tr>

<?php
$i++;
		}
		?>
		
		</table>*/?>
		
		<br/>
		


		<?php
		
		
		foreach($questions as $qk => $question){
			 $company_ids .= $question['company_id'].',';

		}

//echo $company_ids;
$company_id_array=explode(',',$company_ids);
$company_group=array_count_values($company_id_array);
//print_r($company_group);
?><br/>
<table>
<tr>
		<td>Sno</td>
		<td>Company Name</td>
		<td>% of Question</td>
		<td>Score</td>
<?php	/*	<td>Score %</td> */?>
		<td>Category</td>
		</tr>
<?php
$l=1;
foreach($company_group as $key => $company_count)
{
	if($key!=""){
?>
<tr>
<td><?php echo $l;?></td>
<td>
<?php
	$sql ="select company_name from company_names where id='".$key."'";
	$query = $this->db->query($sql);
	$res=$query->row_array();

	$sql1 ="SELECT sum(`score_u`) as score,`rid` FROM `savsoft_answers` WHERE `rid`='".$result['rid']."' and FIND_IN_SET($key,`company_id`)";
	$query1 = $this->db->query($sql1);
	$res1=$query1->row_array();
//SELECT sum(a.`score_u`) as score,a.`rid`,a.`cat_id`,b.category_name FROM `savsoft_answers` a,savsoft_category b WHERE  a.cat_id=b.cid and a.`rid`='24' and FIND_IN_SET(3,a.`company_id`) group by a.`cat_id` 

$getindcat=$this->db->query("SELECT count(`aid`) as qcount,sum(a.`score_u`) as score,b.category_name FROM `savsoft_answers` a,savsoft_category b WHERE  a.cat_id=b.cid and a.`rid`='".$result['rid']."' and FIND_IN_SET($key,a.`company_id`) group by a.`cat_id` ");
$res2=$getindcat->result_array();
$res_cat="";
foreach($res2 as $res21)
{
	$res_cat .=$res21['category_name']."(".round(($res21['score']/$res21['qcount'])*100)."%),";

}
	echo $res['company_name'];
	
?>
</td>
<td><?php echo round(($company_count/$result['noq'])*100);?></td>
<td><?php echo $res1['score'];?> / <?php echo $company_count;?></td>
<?php /*
<td><?php echo $per=round(($res1['score'] / $company_count) * 100); ?></td> */?>
<td><?php echo $res_cat;?></td>
<?php
//	echo $key;

$l++;
	}
}
?>
	</table>	</div>
		 
		
		</div> 
		
		
		
		
<div class="pagebreak"> </div>
		
		
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
		 foreach($compiler as  $compiler_list){
			 
			 ?>
			  <tr>
		 <td><?php echo $k;?></td>
		 <td><?php echo $compiler_list['date'];?></td>
		 <td><?php echo $compiler_list['language'];?></td>
		 <td><?php echo str_replace("<?php"," ",$compiler_list['source']);?></td>
		 <td><?php echo $compiler_list['error'];?></td>
		 <td><?php echo $compiler_list['output'];?></td>
		
		 </tr>
			 
			 <?php $k++;
		 }?></table>
		 <br/>
		 <br/>
		 <br/>
</div>

 
<br>


<?php
 
 


?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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


$ind_score=explode(',',$result['score_individual']); 
// view answer

	
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
	
	
	<?php /* 	 <div id="chart_div" style="width: 400px; height: 400px;">  
		 
		 </div>	 */ ?>
	<?php /*	 <div id="chart_div1" style="width: 400px; height: 400px;">  
		 
		 </div>*/ ?>
		 

		
<div class="login-panel panel panel-default"  style="">
		<div class="panel-body canvas_div_pdf"  style="border:1px solid red;"> 
		

<div style="margin-top: 3%;">
<label class="lab">Candidate Name <span>:</span>&nbsp;</label>
<h3 class="det"><?php echo $result['first_name'];?><?php echo $result['register_no'];?></h3>
</div>

<div style="margin-top: 3%;">
<label class="lab">Test Name <span>: </span>&nbsp;</label>
<h3 class="det" style="float:left;"><?php echo $result['quiz_name'];?></h3>
<span style="font-weight: 600;margin-left: 3%;font-style: italic;">(Test IP : <?php echo $result['attempted_ip'];?>)</span>
</div>

<div style="margin-top: 3%;">
<label class="lab">Email <span>: </span>&nbsp;</label>
<h3 class="det" style="float:left;"><?php echo $result['email'];?></h3>


<div style="margin-left: 47%;">
<label class="lab">Taken On <span>: </span>&nbsp;</label>
<h3 class="det"><?php echo date('Y-m-d H:i:s',$result['start_time']);?></h3>
</div>

</div>



</div>
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

		<textarea name="answer[<?php echo $qk;?>][]" readonly id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
		</div>
		
			 
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

 
 
 <?php
}
?>
</div>
</div>
<?php 

// view answer ends

foreach($result_img as $result_img_ans)
{
	?>
	<img src="https://www.infoziant.com/portal/answer_images/<?php echo $result_img_ans['image_name'];?>" style="width:80%;height:80%"> <br/>
	
	<?php
	
}
?>


 

      
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


 