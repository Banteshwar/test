
 <?php if (!empty($posts)) {
        foreach ($posts as $value) { //echo '<pre/>';print_r($posts);  ?>
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="<?php echo base_url(); ?>home/details/<?php echo $value['post_id'];?>"><?php if (isset($value['title'])) {
                echo $value['title'];
            } ?></a></h2>
<!--                        <p>Subtitle Description Comes Here</p>-->
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-10-25"><?php if (isset($value['modified_on'])) {
                echo date('F j, Y', strtotime($value['modified_on']));
            } ?></time>
                        <a href="#" class="author"><span class="name"><?php if(isset($value['fname'])){echo $value['fname']; }?></span><img src="<?php echo base_url(); ?>assets/frontend/images/dummy_pp.jpg" alt="" /></a>
                    </div>
                </header>
                <p><?php if (isset($value['description'])) {
                echo substr(strip_tags($value['description']), 0, 350);
            } ?></p>

                <a href="<?php echo base_url(); ?>home/details/<?php if (isset($value['post_id'])) {
                echo $value['post_id'] . '#';
            } if (isset($value['image'][0]['gallery_id'])) {
                echo $value['image'][0]['gallery_id'];
            } ?>" class="image featured"><img src="<?php if (!empty($value['image'][0]['path'])) {
                echo base_url() . 'uploads/' . $value['image'][0]['path'];
            } else {
                echo base_url() . 'assets/frontend/images/no-image.png';
            } ?>" alt="" /></a>
                <div class="glr_img clearfix">

                        <?php if (count($value['image']) >= 4) {
                            $count = 4;
                        } else {
                            $count = count($value['image']);
                        }
                        for ($i = 1; $i <= $count - 1; $i++) {
                            ?>
                        <div class="vb_img">
                            <a href="<?php echo base_url(); ?>home/details/<?php if (isset($value['post_id'])) {
                                echo $value['post_id'] . '#';
                            } if (isset($value['image'][$i]['gallery_id'])) {
                                echo $value['image'][$i]['gallery_id'];
                            } ?>" class="image featured"><img src="<?php if (!empty($value['image'][$i]['path'])) {
                                echo base_url() . 'uploads/thumbnail/' . $value['image'][$i]['path'];
                            } else {
                                echo base_url() . 'assets/frontend/images/no-image.png';
                            } ?>" alt="" /></a>
                        </div>
        <?php } ?>
        <?php if (count($value['image']) >= 5) {
            ?>
                        <div class="vb_img mor">
                            <div class="txt"><a href="<?php echo base_url(); ?>home/details/<?php echo $value['post_id'];?>">more</a></div>
                            <a href="<?php echo base_url(); ?>home/details/<?php if (isset($value['post_id'])) {
                echo $value['post_id'] . '#';
            } if (isset($value['image'][$i]['gallery_id'])) {
                echo $value['image'][$i]['gallery_id'];
            } ?>" class="image featured"><img src="<?php if (!empty($value['image'][$i]['path'])) {
                echo base_url() . 'uploads/thumbnail/' . $value['image'][$i]['path'];
            } else {
                echo base_url() . 'assets/frontend/images/no-image.png';
            } ?>" alt="" /></a>
                        </div>
        <?php } ?>
                </div>
                <footer>
                    <ul class="stats">
                        <li ><a class="icon fa-share-alt tgl_sr" rel="<?php echo $value['post_id'];?>"  title="Share It" onclick="openshare(<?php echo $value['post_id'];?>);">Share</a></li>
                        <?php
                        if (!empty($this->session->userdata["User"])) {
                            $sesdata = $this->session->userdata["User"];
                            $user_id = $sesdata['c_id'];
                            $login = 1;
                            if(!empty($user_id))
                            {
                                if($user_id==$value['customer_id'] && $value['liked']==1)
                                {
                                    $cls='active';
                                    $val=1;
                                }else{
                                    $cls='';$val='';
                                    
                                }
                            }
                        } else {
                            $login = 0;
                            $val='';
                        }
                        ?>
                        <?php if ($login == 1 && !empty($cls)) { ?>
                                            <li><a  rel='<?php echo $val;?>' class="icon fa-heart active" id='like<?php echo $value['post_id'] ?>' onClick="likeFun(<?php echo $value['post_id'] ?>,<?php echo $login; ?>,<?php echo $user_id;?>)" title="Love It"><?php if (isset($value['like_counter'])) {
                                echo $value['like_counter'];
                            } ?></a></li>
                        <?php } elseif ($login == 1) { ?>
                                            <li><a  rel='<?php echo $val;?>' class="icon fa-heart" id='like<?php echo $value['post_id'] ?>' title="Love It" onClick="likeFun(<?php echo $value['post_id'] ?>,<?php echo $login; ?>,<?php echo $user_id;?>)"><?php if (isset($value['like_counter'])) {
                                echo $value['like_counter'];
                            } ?></a></li>
                        <?php } else { ?>
                                            <li><a  rel='<?php echo $val;?>' class="icon fa-heart" id='like<?php echo $value['post_id'] ?>' title="Love It" onClick="likeFun(<?php echo $value['post_id'] ?>,<?php echo $login; ?>)"><?php if (isset($value['like_counter'])) {
                                echo $value['like_counter'];
                            } ?></a></li>
                        <?php } ?>
                                            <li><a href="<?php echo $value['hyperlink']; ?>" class="icon fa-arrow-circle-right" title="Tell Me More" target="_blank">Tell Me More</a></li>
                                    </ul>
                </footer>
                <div class="tgl_srbx" id="sahre<?php echo $value['post_id'];?>">
                 <?php $url=base_url().'home/details/'.$value['post_id'];
                      if (isset($value['title'])) {$text=$value['title'];}?>
               <div class="clearfix">
                        <div class="ssl_alg ht"> 
                            <a href="http://twitter.com/intent/tweet?url=<?php echo urlencode($url); ?>&text=<?php echo urlencode($text); ?>">
                                <img src="<?php echo base_url() .'assets/frontend/images/tweet-share-icon.jpg';?>" title="Share our Twitter page!">
                            </a>
                            <?php //echo share_button('twitter',array('url'=>$url, 'text'=>$text, 'via'=>'mpak666', 'type'=>'iframe'))?></div>
                        <div class="ssl_alg">
                            <?php //echo share_button('facebook', array('url'=>$url, 'text'=>$text))?>
                            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $value['title'];?>&amp;p[summary]=<?php echo $value['title'];?>&amp;p[url]=<?php echo $url; ?>&amp;&', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                                <img src="<?php echo base_url() .'assets/frontend/images/fb-share-icon.jpg';?>" title="Share our Facebook page!">                      
                            </a>
                        </div>
                         <div class="so_tpt">
                            <div class="ssl_alg ht"> 
                            <?php //echo share_button('google+', array('url'=>$url, 'text'=>$text))?>
                                <a href="https://plus.google.com/share?url=<?php echo urlencode($url);?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <img src="<?php echo base_url() .'assets/frontend/images/gp-share-icon.jpg';?>" alt="Share on Google+"/></a>
                         </div>
                            <div class="ssl_alg ht">  <?php echo share_button('pinterest', array('url'=>$url, 'text'=>$text))?></div>
                        </div>
              
                </div>

                </div>
            </article>
    <?php }} else { 
        //echo "No Record Found!";
    } ?>
