 <?php foreach($posts as $post){ ?>
     <div class="list-item"><a href="javascript:void(0);"><h2><?php echo $post['company_name']; ?></h2></a></div>
 <?php } ?>
 <p>Post(s) not available.</p>

 <?php echo $this->ajax_pagination->create_links(); ?>