
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('js/jquery-linedtextarea.css');?>" rel="stylesheet">
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	<script src="<?php echo base_url('js/jquery.js');?>"> </script>
	<script src="<?php echo base_url('js/jquery-linedtextarea.js');?>"> </script>
	
	<!-- custom javascript -->
	<script src="<?php echo base_url('js/basic.js');?>"> </script>
		
	<!-- bootstrap js -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"> </script>
<script>function disableselect(e) {
    return false;
}

function reEnable() {
    return true;
}

document.onselectstart = new Function("return false");

if (window.sidebar) {
    document.onmousedown = disableselect;
    document.onclick = reEnable;
}</script>


<script>
$(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);
});
</script>
<style>
body
{
	background: url('<?php echo base_url();?>images/background.jpg');
}
 td{
		font-size:14px;
		padding:4px;
	}

	   .runbtn {
		background: #3a559f;
		border: unset;
		padding: 6px 24px 6px 24px;
		color: #fff;
		border-radius: 4px;
	}
    
    .runbtn:hover {
        background: #0d2f84;
    }
    
   .tab-content {
    padding-top: 30px;
    background: #fff;
    padding: 9px;
}
	.nav.nav-tabs li a:focus
	{
		outline:unset;
	}
	.eheight
	{
		height:270px;
	}
	.container-fluid.compiler_header {
    background: #2b4367;
    padding: 0 51px;
}
.compilerwrap
{
	
	box-shadow: 0 5px 25px 0 rgba(41,128,185,0.15);
background: #fff;
padding: 0;
min-height: 508px;
}
.nav.nav-tabs
{
	background: #000;
}
.nav-tabs > li > a
{
	border-radius: unset;
}
.compilewrap form
{
	border: 1px solid #ddd;
}
.tab-content
{
	margin-top:30px;
}
.nav.nav-tabs li a
{
	color:#fff;
}
.nav.nav-tabs li.active a
{
	color:#000;
}
.nav.nav-tabs li:hover a
{
	color:#000;
}
.compiler_hist
{
	background: #fff;
	min-height: 508px;
	border-top:4px solid #475a6c;
}
.history_title
{
	margin-top: 33px;
	font-weight: bold;
	color: #e5163c;
	font-size: 20px;
	float: left;
	margin-bottom: 45px;
}
.compiler_hist img
{
		padding: 15px 12px 0 0;
}
tr {
    border-bottom: 1px solid #eee;
}
th {
    padding: 6px 6px;
}
table{
	width:100%;
}

tbody {
    display:block;
    height:300px;
    overflow:auto;
	    width: 97%;
		border:1px solid #ddd;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
}
thead {
    width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
}
thead tr
{
	background: #475a6c;
}
thead tr th
{
	color:#fff;
	text-align:left;
}
tbody td h5
{
	color:#367fa9;
}
tbody td .date{
color:#247533;
}
</style><script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true
  });
  var input = document.getElementById("select");
  function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
  }
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
  }
  CodeMirror.on(window, "hashchange", function() {
    var theme = location.hash.slice(1);
    if (theme) { input.value = theme; selectTheme(); }
  });
</script>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>



<div class="container-fluid compiler_header">

<div class="save_answer_signal" id="save_answer_signal2"></div>
<div class="save_answer_signal" id="save_answer_signal1"></div>

 <div style="float:right;margin-top: 9px;color: #fff;font-size: 17px; margin-right:10px;" >

	<a href="<?php echo base_url(); ?>index.php/login/reply" style="color:#fff;font-size:14px;">Back to home</a>
</div> 
<div style="float:left;width:250px; " >
 <h4 style="color:#fff;">Online Compiler</h4>
</div>
	
<div style="clear:both;"></div>

<!-- Category button -->

 <div class="row">
 
<?php 

 $categories=explode(',',$quiz['categories']);
$quiz['category_range'];
$category_range=explode(',',$quiz['category_range']);
//  print_r($categories);

function getfirstqn($cat_keys='0',$category_range) {
	if($cat_keys==0){
		return 0;
	} else {
		$r=0;
		for($g=0; $g < $cat_keys; $g++){
		 $r+=$category_range[$g];	
		}
		return $r;
	}
	
	
}


/*  if(count($categories) > 1 ){
	$jct=0;
	foreach($categories as $cat_key => $category){
?>

<a href="javascript:switch_category('cat_<?php echo $cat_key;?>');"   class="btn btn-info"  style="cursor:pointer;"><?php echo $category;?></a>

<input type="hidden" id="cat_<?php echo $cat_key;?>" value="<?php echo getfirstqn($cat_key,$category_range);?>">
<?php 
}
}  */

?>
</div> 

</div>

<div class="container" >

<br><br> 
 <div class="row"  style="margin-top:5px;">
 <div class="col-md-12">

 <div class="col-md-6 compilerwrap" style="padding-bottom:0 0 80px 0;">
<form method="post" action="">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#code">Code</a></li>
        <li><a data-toggle="tab" href="#input">Input</a></li>
        <li><a data-toggle="tab" href="#result">Output</a></li>
    </ul>

    <div class="tab-content">
        <div id="code" class="tab-pane fade in active">
            <div class="input-group eheight">
                <span class="input-group-addon">Code</span>

                <textarea class="lined eheight" rows="10" style="width:100%;" id="code" name="code"> </textarea>
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon">Language</span>
                     <select id="select_lang" name="select_lang" class="form-control">
                    <option selected>select</option>
                    <option value="11">C</option>
                    <option value="1">C++ (5.1.1)</option>
                    <option value="41">C++ (4.3.2)</option>
                    <option value="27">C#</option>
                    <option value="10">Java</option>
                    <option value="112">Javascript</option>
                    <option value="56">Node.js</option>
                    <option value="3">Perl 5</option>
                    <option value="54">Perl 6</option>
                    <option value="29">PHP 5</option>
                    <option value="4">Python 2.7</option>
                    <option value="99">Python 2.6</option>
                    <option value="116">Python 3</option>
                    <option value="117">R 3.2</option>
                    <option value="17">Ruby 2.1.5</option>
                    <option value="39">Scala</option>
                    <option value="50">VB .NET</option>

                </select>
            </div>
        </div>
   
    <br>
    <div id="input" class="tab-pane fade">
        <div class="input-group">

            <span class="input-group-addon">Input</span>
            <input type="text" id="input" name="input" class="form-control" style="width:100%;">
        </div>
        <br>
    </div>
    <div id="result" class="tab-pane fade">
        <div class="input-group">

            <span class="input-group-addon">Output</span>
            <textarea id="output" name="output" rows="5" cols="60" class="form-control" style="width:100%;"> </textarea>
        </div>
        <br>
    </div>
    <div class="input-group">
        <br>

        <input type="button" name="" class="runbtn" onClick="ajax_compiler();" value="Run">
    </div>
</div>
</form>
</div>



<div class="col-md-6 compiler_hist">
<div class="col-md-12">
	<img src="<?php echo base_url();?>images/history.png" alt="history" class="pull-left">
	<h4 class="pull-left history_title">History of previous compilations</h4>
	<table>
	<thead>
	<tr>
	<th>
		S.No
	</th>
	<th>History</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>1.</td>
			<td colspan="4">
				<h5>Language : C++</h5>
				<p class="date">Date: 10/06/2018 4:10 PM</p>
				<p>Status</p>
			</td>
		</tr>
		<tr>
			<td>2.</td>
			<td colspan="4">
				<h5>Language : Java</h5>
				<p class="date">Date: 10/06/2018 4:10 PM</p>
				<p>Status</p>
			</td>
		</tr>
		<tr>
			<td>3.</td>
			<td colspan="4">
				<h5>Language : PHP</h5>
				<p class="date">Date: 10/06/2018 4:10 PM</p>
				<p>Status</p>
			</td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="4">
				<h5>Language : Python</h5>
				<p class="date">Date: 10/06/2018 4:10 PM</p>
				<p>Status</p>
			</td>
		</tr>
		</tbody>
	</table>
</div>
</div>
</div>

 
 
 </div>
  
 



</div>




 <script>
 function ajax_compiler()
{
	// alert("hfrht");
     var input = $('#input').val();
            var code = $('#code').val();
            var select_lang = $('#select_lang').val();

  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/ffff",
  data: {keyinput:input,keycode:code,select_lang:select_lang}, 
  success: function (response1) {
	//  alert(response1);
//$('#output').html(response1);
 ajax_compiler1();
  }
  });
 
}

function ajax_compiler1()
{
	alert("Confirm to submit");
	
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/get_web_page",
  data: {keyinput:""}, 
  success: function (response) {
//	  alert(response1);
$('#output').html(response);

  }
  });
	
	}
</script>
 
 
 
<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('really_Want_to_submit');?></b> <br><br>
<span id="processing"></span>

<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo $this->lang->line('cancel');?></a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:submit_quiz();"   class="btn btn-info"  style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz');?></a>

</center>
</div>