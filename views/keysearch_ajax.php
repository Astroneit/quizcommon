<style>

.company{
	    max-height: 23px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.iwj-item{
	    height: max-content;
}
.jobtitles{
    max-width: 235px !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
    overflow: hidden !important;

}

.jobtitles:hover{
 white-space: unset !important;
    word-wrap: break-word !important;

}

</style>                                                                     



   <div class="row">
                                                                        <?php
                                                                                  foreach($rect as $ssss)
                                                                                  {
                                                                                  
                                                                                  ?>
                                                                            <div class="iwj-item col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="job-item ">
                                                                                  
                                                                                    <div class="job-info">
                                                                                        <h3 class="job-title ">
                                                                                        
                                                                                    
                                                                                    
                                                                                        <a href="#" class="jobtitles" onclick="get_job_details(<?php echo $ssss['sno'];?>);return InwaveRegisterBtn();" ><?php echo $ssss['job_required'];?></a>
                                                                                          
                                                                                        </h3>
                                                                                       <div class="company"><i class="fa fa-suitcase"></i>
                                                                                            <a ><?php echo $ssss[
                                                                                            'company_name'];?></a>
                                                                                        </div>
                                                                                        <div class="sallary">
                                                                                        <i class="fa fa-user"></i><?php echo $ssss['experience'];?></div>
                                                                                        <div class="address"><i class="fa fa-map-marker"></i><a href="#"><a href="#"><?php echo $ssss['location'];?></a></div>
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                  <?php } ?>
                                                                        </div>
                                                                  