<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Add New Company</title>
<meta charset="UTF-8" />
<meta name="description" content="Merchant">
<meta name="keywords" content="Merchant Login">
<meta name="viewport" id="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" href="<?php echo base_url();?>images1/favicon.ico" type="image/x-icon" />	
<link rel="stylesheet" href="<?php echo base_url();?>css1/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css1/online-style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js1/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/common.js"></script>

	 <link rel="stylesheet" href="<?php echo base_url();?>datatable/jquery.dataTables.min.css">
	 <link rel="stylesheet" href="<?php echo base_url();?>datatable/buttons.dataTables.min.css">
	 

    

   <script type='text/javascript' src='<?php echo base_url();?>datatable/jquery-3.5.1.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/jquery.dataTables.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/dataTables.buttons.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.flash.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/jszip.min.js'></script>
   
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.html5.min.js'></script>
   <script type='text/javascript' src='<?php echo base_url();?>datatable/buttons.print.min.js'></script>
<style>
input[placeholder], [placeholder], *[placeholder] {
    color: white!important;
}
.container-fluid{
	 padding:0px;
 }
#content {
    margin-top: 56px;
	
}
#login{
	
/* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/* background-image: url('<?php echo base_url();?>images1/gg.jpg'); */
	
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
 }

.info-btn .sub_btn {
    background: #2db795 none repeat scroll 0 0;
}
.info-btn .reset_btn{
	 background: #f7b156 none repeat scroll 0 0;
}

#skill{
	text-transform:uppercase !important;
	    padding-right: 5%;
		

}
#skillinput{
	 margin-right: 1%;
}


</style>
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
		"pageLength": 30,
      /*   buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ] */
		
		   buttons: [
            {
                extend: 'excelHtml5',
                title: 'JobList'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
    } );
} );
</script>

</head>
<body>
<div class="container-fluid"id="login">
<div id="wrapper"> 

	<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

	<div class="container" id="content">
		<h2>Add New Company</h2>
		
		
		
		<a href="<?php echo site_url('Dashboard/Jobupdates');?>" class="btn" style="float:right;background:wheat;">Back to Job Updates</a>
		
		
		
		
		
		<div class="row">
	<span style="color:red;">	
		<?php 
if(isset($val)){
	echo $val;
}
?></span>

<?php if($company_edit['company_name']=="")
{?>

		<form method="post"  enctype="multipart/form-data" style="color:white;"class="form-horizontal" action="<?php echo site_url('Dashboard/insert_newcompany/');?>">
			<div class="report-block">
				<div class="col-lg-6" id="add-user" style="border-top: 30px solid #e42767 !important;border: 1px solid #e42767;">
				<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>	
					
						<fieldset>

						
						
						<div class="form-group">
							
							<div class="col-md-6">
								<!--<input id="email" name="email" type="text" placeholder="Email Address" class="form-control"/>!-->
								<label class="control-label" for="skillreq">New Company</label>  <span style="color:red !important;" >*</span>
								
									<div class="input-group">
								<input type="text" id="inputskills" name="company_name" placeholder="Company Name" class="form-control" style="color:#000 !important;" value="<?php echo $company_edit['company_name'];?>"  autofocus autocomplete=off>
									
					<span style="color:red;">
								<?php echo form_error('company_name') ; ?></span>
								
								</div>
							
							
							<br>

						<div class="input-group">
								<label>Logo Upload</label> <span style="color:red !important;" > (optional 1024 * 768 )</span>
                                <input type="file" name="userfile"  id="userfile" class="pl0 form-control noborder"  >	
								<span style="color:red;">
								<?php echo form_error('userfile') ; ?></span>
						</div>
					
							</div>
						</div>

						
						
						
						
						
						
						

						<div class="form-group">
							<label class="col-md-6 control-label" for="login"></label>
							<div class="col-md-6 info-btn">
								<button type="submit" class="btn sub_btn" title="Submit">Submit</button>
								<button type="reset" class="btn reset_btn" title="Reset">Reset</button>
							</div>
						</div>

						</fieldset>
					
				</div>

			</div>
			</form>
<?php } else {  ?>

<form method="post"  enctype="multipart/form-data" style="color:white;"class="form-horizontal" action="<?php echo site_url('Dashboard/update_newcompany/'.$company_edit['id'].'');?>">
			<div class="report-block">
				<div class="col-lg-6" id="add-user" style="border-top: 30px solid #e42767 !important;border: 1px solid #e42767;">
				<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>	
					
						<fieldset>

						
						
						<div class="form-group">
							
							<div class="col-md-6">
								<!--<input id="email" name="email" type="text" placeholder="Email Address" class="form-control"/>!-->
								<label class="control-label" for="skillreq">New Company</label>  <span style="color:red !important;" >*</span>
								
									<div class="input-group">
								<input type="text" id="inputskills" name="company_name" placeholder="Company Name" class="form-control" style="color:#000 !important;" value="<?php echo $company_edit['company_name'];?>"  autofocus autocomplete=off>
									
					<span style="color:red;">
								<?php echo form_error('company_name') ; ?></span>
								
								</div>
							
							
							<br>

						<div class="input-group">
								<label>Logo Upload</label> <span style="color:red !important;" > (optional 1024 * 768 )</span>
                                <input type="file" name="userfile"  id="userfile" class="pl0 form-control noborder"  >

  <input type="hidden" name="oldfile"  id="oldfile" class="pl0 form-control noborder" value="<?php echo $company_edit['logo'];?>">									
  <input type="hidden" name="whredit"  id="whredit" class="pl0 form-control noborder" value="<?php echo $company_edit['id'];?>">									
								<span style="color:red;">
								<?php echo form_error('userfile') ; ?></span>
						</div>
					
							</div>
						</div>

						
						
						
						
						
						
						

						<div class="form-group">
							<label class="col-md-6 control-label" for="login"></label>
							<div class="col-md-6 info-btn">
								<button type="submit" class="btn sub_btn" title="Submit">Update</button>
							
							</div>
						</div>

						</fieldset>
					
				</div>

			</div>
			</form>
<?php } ?>
			<table id="example" class="display nowrap" style="width:100%">
											<thead>
            <tr>
											<th>Sno</th>
											<th>company Name</th>
											<th>Logo</th>
											<th>Edit</th>
											
											
											</tr>	</thead>
											<tbody>
											<?php 
											$i=1;
											foreach($company_list as $company_list1) { ?>
										<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $company_list1['company_name'];?></td>
										<td><img src="<?php echo base_url();?>logo/<?php echo $company_list1['logo'];?>" style="width:10%;"></td>
										<td><a href="<?php echo base_url();?>index.php/dashboard/edit_company/<?php echo $company_list1['id'];?>">Edit</a></td>
										
										
										
										</tr>
											<?php $i++; } ?></tbody>
</table>
		</div>
		
		
		<div class="row">
		
		
		
		</div>
	</div>	

<!--Footer-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<p class="pull-right hidden-xs"></p>
			</div>
		</div>
	</div>	
</footer>
<!--//Footer-->
</div>
<script>
getexpiry();
</script>
</div>
</body>
</html>