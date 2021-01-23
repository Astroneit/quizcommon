 <style>
.container-fluid{
	 padding:0px;
 }

#login{
		<?php /* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */ ?>
			background: #cdd0c9;
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} 
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #fff!important;
}
.nav.navbar-nav.navbar-right a
{
	color:#000!important;
}
th {
    background: #f4b609 none repeat scroll 0 0;
}

.btn-success {
    background-color: #15962c!important;
    border-color: #15962c!important;
}
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
.btn-warning
{
	background-color: #ff6363!important;
    border-color: #ff6363!important;
}
 .btn-default {
    background-color: #5bc0de;
    border-color: #5bc0de;
    color: #fff;
}
 #content {
   /*  margin-top: 50px; */
}



.til{
	
	
	    background: rgba(0, 0, 0, 0) linear-gradient(to right bottom, #eee 0%, #eee 50%, #f9f09d 50%, #f9f09d 100%) repeat scroll 0 0;
    border-left: 4px solid #394887;
    color: #555;
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    padding: 8px 10px;
    margin: 0;
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
	
   #pdf-button {
        display: none;
      }
	  
	  .arrowkeys{
		  display: none;
	  }
}

  
 </style>
 <div class="container-fluid"id="login">
  <div class="container" id="content">

		
  <script src="https://docraptor.com/docraptor-1.0.0.js"></script>
  <script>
    var downloadPDF = function() {
      DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
        test: true, // test documents are free, but watermarked
        type: "pdf",
        document_content: document.querySelector('html').innerHTML, // use this page's HTML
        // document_content: "<h1>Hello world!</h1>",               // or supply HTML directly
        // document_url: "http://example.com/your-page",            // or use a URL
        // javascript: true,                                        // enable JavaScript processing
        // prince_options: {
        //   media: "screen",                                       // use screen styles instead of print styles
        // }
      })
    }
  </script>		
		
		
 <br/>
<a href="javascript:print();" class="btn btn-success printbtn"><?php echo $this->lang->line('print');?></a>
<a  onclick="downloadPDF()" class="btn btn-success printbtn"><?php echo "Download PDF";?></a>


<br>
<br>

<?php 
$logged_in=$this->session->userdata('logged_in');
			 
			
			?>
   
 <h3 class="til" style=""><?php echo $quiz_lists[0]['quiz_name'];?></h3>
  
  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
<table style="color:white;" class="table table-bordered">
<tr>
 <th>#</th>
 <th>User Id</th>
<th>Name</th>
<th>Percentage</th>
<th>Status </th>
</tr>
<?php 
if(count($qw_result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
<?php
} else{
$k=1;
 foreach($qw_result as $qz_res){  	?>	

	<tr>
	<td><?php echo $k;  ?></td>
	<td><?php echo $qz_res['uid'];  ?></td>
	<td><?php echo $qz_res['first_name'];  ?></td>
	<td><?php echo round($qz_res['percentage_obtained']).'%';  ?></td>
	<td><?php echo $qz_res['result_status'];  ?></td>
	
	
	</tr>
<?php $k++;} } ?>

</table>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('quiz/index/'.$back);?>"  class="btn btn-primary arrowkeys"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('quiz/index/'.$next);?>"  class="btn btn-primary arrowkeys"><?php echo $this->lang->line('next');?></a>


<br>
<br>


</div>
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