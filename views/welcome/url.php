
<html> 
<body>



   <?php
foreach($url_detail as $row) { ?>

          <div class="col-md-4">          
 <iframe width="100%" height="315" src="<?php echo $row['url'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  <p class="videotitle"><a href="<?php echo $row['url'];?>" ><?php echo $row['title'];?></a></p>
  </div>
   <?php  }  ?>


   
    


        </body>
        </html>