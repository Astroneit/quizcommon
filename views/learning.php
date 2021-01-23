<?php
//print_r($courseid); exit;
//print_r($courseidfv); exit;

$baseurl=base_url();


$rtys=$this->session->userdata('logged_in');


$cids=$rtys['course_id'];

 function encryptcids($string, $key) {

     $result = '';
     
     for($i=0; $i<strlen($string); $i++) {
       $char = substr($string, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)+ord($keychar));
      $result.=$char;
     }

     return base64_encode($result);
     
    }        
    
    $cids_enc=encryptcids("$cids","learn_lms@info#2018");






//print_r($rtys); exit;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>LMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="<?php echo base_url(); ?>learning/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="<?php echo base_url(); ?>learning/css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>learning/css/style.css" rel='stylesheet' type='text/css' media="all" />
<link href="<?php echo base_url(); ?>css/topnavscroll.css" rel='stylesheet' type='text/css' media="all" />
<script src="<?php echo base_url(); ?>learning/js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->


<style>
.cons{
	    border-bottom: 1px solid lightgrey;
}
#jjk{
	
 /*    width: 171px; */
  /*   height: 110px; */
	    float: left;
}

#tils{
	    color: #E91E63;
    font-weight: 600;
}
.song{
	width:98% !important;
}

.video-grid{
	    box-shadow: 6px 6px 24px grey;
}

#chinvideo{
	   font-size: 15px;
	       padding-left: 7%;
    color: black;
    font-weight: 600;
    padding-top: 5%;
	    margin: 0px;
		    word-wrap: break-word;
			
			    max-width: 167px;
    max-height: 90px;
    overflow: hidden;
}

#upn{
	    font-weight: 600;
    color: #3F51B5;
	    font-size: 21px;

}

.single-grid-right{
	    margin-top: 13px !important;
		    max-height: 392px;
    overflow: auto;
}

.single-left {
    padding-bottom: 0px;
}
@media(max-width:990px){
	
	#vid1{
		width:100% !important;
	}
	
	.song{
		width:100% !important;
	}
	
	.single-left{
		width:100% !important;
	}
	
	#viw{
		display:none !important;
	}
	
}

#bodys{
	padding-top:0px !important; 
}

</style>
</head>
  <body id="bodys">

   <!--  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images1/logo.png" alt="" style="width: 118px;"/></a>
        </div>
     <div id="navbar" class="navbar-collapse collapse">
			
			<div class="header-top-right">
			<a href="<?php echo base_url(); ?>index.php/learning/view_profile"><button class="btn btn-warning">Profile</button></a>
			<a href="<?php echo base_url(); ?>index.php/user/logout"><button class="btn btn-danger">Logout</button></a>
			
			
        </div>
        </div> 
		<div class="clearfix"> </div>
      </div>
    </nav>-->
 
		
		
		<!--working area -->
		
		
		<div class="container cons">
        <div class="row  main">
			<div class="show-top-grids">
			
			
				<div class="col-md-8 single-left">
				<div id="sperm">
					<div class="song">
						<div class="song-info">
							<h3>Welcome to <span id="tils">Infoziant Learning Management</span></h3>	
					</div>
						<div class="video-grid" id="repid">

							<a href="#" ><video id="vid1" src="<?php echo $baseurl."videoupload/".$courseidfv[0]['video_file'];?>" controls class="video-js vjs-default-skin vjs-big-play-centered" width="100%" height="360" preload="auto"></video><input type="hidden" id="wws" value="<?php echo $courseidfv[0]['id'];?>"></a>
						</div>
					</div>
					
					
					
					
					<div>
					<div style="float:left;width:75%;">
					<label style="font-size: 21px;padding-top: 3%;padding-left: 2%;"><?php echo $courseidfv[0]['title'];?></label>
				<p style="font-size: 16px; padding-left: 2%;color: darkgrey;"><?php echo $courseidfv[0]['description'];?></p>
				</div>
			<a href="<?php echo site_url(); ?>/Learning/takeques/<?php echo $cids_enc; ?>" target="_blank">	<button class="btn btn-success" style="float:right;    margin-top: 4%;">Go for Assessment</button></a>
					</div>
					
				</div>
					
					
				<!--	<div class="published"style="width:750px;">
						<script src="jquery.min.js"></script>
							<script>
								$(document).ready(function () {
									size_li = $("#myList li").size();
									x=1;
									$('#myList li:lt('+x+')').show();
									$('#loadMore').click(function () {
										x= (x+1 <= size_li) ? x+1 : size_li;
										$('#myList li:lt('+x+')').show();
									});
									$('#showLess').click(function () {
										x=(x-1<0) ? 1 : x-1;
										$('#myList li').not(':lt('+x+')').hide();
									});
								});
							</script>
							<div class="load_more">	
								<ul id="myList">
									<li>
										<h4>Published on 11 October 2018</h4>
										<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
									</li>
									
								</ul>
							</div>
					</div>-->
					
					
					
					
					<!--<div class="all-comments">
						<div class="all-comments-info">
							<a href="#">All Comments (8,657)</a>
							<div class="box">
								<form>
									<input type="text" placeholder="Name" required=" ">			           					   
									<input type="text" placeholder="Email" required=" ">
									<input type="text" placeholder="Phone" required=" ">
									<textarea placeholder="Message" required=" "></textarea>
									<input type="submit" value="SEND">
									<div class="clearfix"> </div>
								</form>
							</div>
							
						</div>
						
					</div>-->
				</div>
				<?php
				
				$query1=mysqli_query($conn,"select * from video_status where user_id='$ss' ");
						$fgi=mysqli_fetch_array($query1);
						$ref=$fgi['status'];
						?>
				<div class="col-md-4 col-sm-12 col-xs-12 " style=" margin-left: 0px;    background: #f7f7f7; min-height:410px; overflow:auto; border:1px solid lightgrey;">
					<h3 id="upn">UpNext</h3>
					<hr style="margin-bottom:0px">
					<div class="single-grid-right">
						<?php 
						
					foreach($courseid as $res){
						
						
						
						?>
						
						<div class="single-right-grids" style="margin-bottom: 0px;">
						
                     <!--   <a href="#" id="next_<?php echo $res['id'];?>"  onclick="get_video(<?php echo $res['id'];?>);">-->

                       <a href="#" id="next_<?php echo $res['id'];?>"  onclick="getvideo(<?php echo $res['id'];?>);">

						
						<div class="single-right-grid-left">
						
						<div class="col-md-6" style="padding:0px; background:#fff;    overflow: hidden;">
						<video src="<?php echo $baseurl."videoupload/".$res['video_file'];?>" id="jjk"     height="100"    width="100%"></video>
						</div>
						<div class="col-md-6">
						<label id="chinvideo"><?php echo $res['title'];  ?></label>
						<p id="viw" style="font-size: 13px; padding-left: 8%;color: darkgrey;">2k Views</p>
						</div>
								
								
								
								
								
								
								
								
							</div>
					</a>
								
					
							<div class="clearfix"> </div>
						</div>
						
						<br>
					<?php } ?>
					<!-- while ends-->
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- footer -->
		<!--	<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="press.html">Press</a></li>
								<li><a href="copyright.html">Copyright</a></li>
								<li><a href="creators.html">Creators</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="developers.html">Developers</a></li>
							</ul>
						</div>
						
					</div>
					
				</div>
			</div>-->
			<!-- //footer -->
		</div>
		</div>
		<div class="clearfix"> </div>
	
	
<!--<link href="https://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">


<script src="https://vjs.zencdn.net/4.12/video.js"></script>-->


<script>
//document.getElementById("video1").currentTime = 10;

if (document.getElementById("vid1").currentTime=<?php echo $time;?>) {
  videojs("vid1").ready(function() {
    var sesd=document.getElementById('wws').value;
	
    var myPlayer = this;
	var playLength = myPlayer.duration();
//	alert(playLength);
//var currentTime = 0;
    //Set initial time to 0

window.onblur = function() { 
	document.getElementById('bodys'); 
//alert('in');
myPlayer.pause();
};


    myPlayer.on("pause", function (event) {
		
     var ww=myPlayer.currentTime();
	 var playLength = myPlayer.duration();
	 
	// alert("paused");
	// alert(ww);
	
	//alert(playLength);
	if(playLength == ww)
		{
		checkDelete(sesd,playLength,ww);	
			
		}
		
		else{
			
			  wes(ww);
		}
    
 });
    
    //This example allows users to seek backwards but not forwards.
    //To disable all seeking replace the if statements from the next
    //two functions with myPlayer.currentTime(currentTime);

    myPlayer.on("seeking", function(event) {
		
		
		
      if (currentTime < myPlayer.currentTime()) { 
	//  alert('in');
        myPlayer.currentTime(currentTime);
      }
    });

    myPlayer.on("seeked", function(event) {
      if (currentTime < myPlayer.currentTime()) {
		 
        myPlayer.currentTime(currentTime);
		
      }
    });

    setInterval(function() {
      if (!myPlayer.paused()) {
        currentTime = myPlayer.currentTime();
      }
    }, 1000);
	
	
	function wes(dd){
		
		var ses=dd;
		
		 $.ajax({
        url: 'ajax.php', //This is the current doc
        type: "POST",
        data: ({name: ses}),
        success: function(data){
           
           // alert(data);
            //or if the data is JSON
            
        }
    }); 
		
	}
	
	
	
function checkDelete(sesd,playLength,ww){
	
	var sesemail="<?php echo $ss; ?>";
    //var ok=confirm('Are you see next video?');
	
			 $.ajax({
        url: 'videoupdate.php', //This is the current doc
        type: "POST",
        data: ({name: sesd,sess:sesemail,length:playLength,nows:ww}),
        success: function(data){
           
         // alert(data);
            //or if the data is JSON
           // windows.location='index.php';
		   window.location.href = 'single.php';
        }
    }); 


		

}

	
	
	
	
	
	
	
	
	

  });
}


</script>
<script>
	
</script>
<script>
function get_video(val)
{
//alert(val);
 var red=val;

  $.ajax({
	  
  type: 'POST',
  url: "videos.php",
  data: {name:red},
  success: function (response) {
	// alert(response);
	 if(response.trim()=='noc'){
		 
		alert("Previous Video not Completed"); 
	 }
	 else{
		  $('#sperm').html(response);
	 }
	 
  
 
  }
  });
 
}
</script>

<script>
function get_videos(val)
{
//alert(val);
 var red=val;

  $.ajax({
	  
  type: 'POST',
  url: "video.php",
  data: {name:red},
  success: function (response) {
	 // alert(response);
   $('#sperm').html(response);
 
  }
  });
 
}
</script>






<script>
function getvideo(val)
{
//alert(val);
 var red=val;

 	 $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>index.php/Learning/takevideo/",

        data:'keyworda='+red,
       
        success: function(data){
       //alert(data);
		
		
		 $("#sperm").html(data);
		  
		  
		  

        }
        });	
	
 
 
 
}
</script>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>learning/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>