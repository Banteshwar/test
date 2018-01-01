<div id="main">
    <article class="post">
        <section>
            <h3>Select Category</h3>
            <hr/>
            <?php //echo '<pre/>';print_r($categories);
            if(!empty($categories)) {
                if(count($categories)%2==0)
                {
                    for($i=1;$i<=count($categories);) {?>
                        <div class="row">
                            <div class="6u 12u$(medium)">
                                <a href="<?php echo base_url();?>home/viewCategory/<?php echo $categories[$i-1]['category_id']?>">
                                    <div class="brws_bx">
                                        <img src="<?php if(!empty($categories[$i-1]['image_path'])) { echo base_url().'uploads/category/'.$categories[$i-1]['image_path'];} else { echo base_url().'assets/frontend/images/no-image.png';}?>" class="img-responsive trsn_image" alt="" onerror='src="<?php echo base_url().'assets/frontend/images/no-image.png' ?>"' />
                                        <h3 class="sd_hdg"><?php if(!empty($categories[$i-1]['title'])){ echo $categories[$i-1]['title']; }?> </h3>
                                    </div>
                                </a>
                            </div>

                            <div class="6u 12u$(medium)">
                                 <a href="<?php echo base_url();?>home/viewCategory/<?php echo $categories[$i]['category_id']?>">
                                    <div class="brws_bx">
                                        <img src="<?php if(!empty($categories[$i]['image_path'])) { echo base_url().'uploads/category/'.$categories[$i]['image_path'];} else { echo base_url().'assets/frontend/images/no-image.png';}?>" class="img-responsive trsn_image" alt="" onerror='src="<?php echo base_url().'assets/frontend/images/no-image.png' ?>"' />
                                        <h3 class="sd_hdg"><?php if(isset($categories[$i]['title'])){ echo $categories[$i]['title']; }?></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php $i=$i+2; } 
                }
                else
                { ?>
                     <div class="row">
                   <?php for($i=1;$i<=count($categories);) {?>
                            <?php if ($i%2!=0) { ?>
                            
                            <div class="6u 12u$(medium)">
                                <a href="<?php echo base_url();?>home/viewCategory/<?php echo $categories[$i-1]['category_id']?>">
                                    <div class="brws_bx">
                                        <img src="<?php if(!empty($categories[$i-1]['image_path'])) { echo base_url().'uploads/category/'.$categories[$i-1]['image_path'];} else { echo base_url().'assets/frontend/images/no-image.png';}?>" class="img-responsive trsn_image" alt="" onerror='src="<?php echo base_url().'assets/frontend/images/no-image.png' ?>"' />
                                        <h3 class="sd_hdg"><?php if(!empty($categories[$i-1]['title'])){ echo $categories[$i-1]['title']; }?> </h3>
                                    </div>
                                </a>
                            </div>
                            
                            <?php } else { ?>
                            <div class="6u 12u$(medium)">
                                 <a href="<?php echo base_url();?>home/viewCategory/<?php echo $categories[$i-1]['category_id']?>">
                                    <div class="brws_bx">
                                        <img src="<?php if(!empty($categories[$i-1]['image_path'])) { echo base_url().'uploads/category/'.$categories[$i-1]['image_path'];} else { echo base_url().'assets/frontend/images/no-image.png';}?>" class="img-responsive trsn_image" alt="" onerror='src="<?php echo base_url().'assets/frontend/images/no-image.png' ?>"' />
                                        <h3 class="sd_hdg"><?php if(isset($categories[$i-1]['title'])){ echo $categories[$i-1]['title']; }?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                       
                    <?php $i=$i+1; }  ?>  
                     </div>
              <?php   }  }?>
            


        </section>                     
    </article>

</div>