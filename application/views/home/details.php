<!-- Main -->
 <div id="main">
<!-- Mini Post -->
    <?php //echo '<pre/>';print_r(liked_user);
    if(!empty($images)) { foreach($images as $val) {?>


    <div id="<?php echo $val['gallery_id'];?>">&nbsp;</div>
    <article  class="mini-post">
       <header>
            <h3><a href="#" name="<?php echo $val['gallery_id'];?>" ><?php if(isset($val['img_title'])) { echo $val['img_title'];} ?></a></h3>
                <time class="published" datetime="2015-10-20"><?php if(isset($val['created_on'])) { echo date('F j, Y', strtotime($val['created_on']));} ?></time>
                <a href="#" class="author"><img src="<?php echo base_url();?>assets/frontend/images/dummy_pp.jpg" alt="" /></a>
            </header>
                <a href="" class="image"><img src="<?php echo base_url();?>uploads/<?php echo $val['path']?>" alt="" /></a>
            <div class="post inr_pot_sm">
                <footer>									
                    <ul class="stats">
                    <li><a class="icon fa-share-alt tgl_sr" rel="<?php echo $val['gallery_id'];?>" title="Share It">Share</a></li>
                    <?php
                        if (!empty($this->session->userdata["User"])) {
                            $sesdata = $this->session->userdata["User"];
                            $user_id = $sesdata['c_id'];
                            $login = 1;
                            if(isset($user_id))
                            {
                                if($user_id==1 && $val['liked']==1)
                                { $cls='active';$v=1;  }else{  $cls='';$v='';}
                            }
                        } else {$login = 0;$v='';}
                        ?>
                    <?php if ($login == 1 && !empty($cls)) { ?>
                      <li><a rel='<?php echo $v;?>' id='like<?php echo $val['gallery_id'] ?>' class="icon fa-heart" title="Love It" onClick="likeFun('<?php echo $val['gallery_id'] ?>','<?php echo $login; ?>','<?php echo $user_id;?>')"><?php if (isset($val['gallery_like_counter'])) {
                                echo $val['gallery_like_counter'];} ?></a></li>
                    <?php } elseif ($login == 1) { ?>
                      <li><a rel='<?php echo $v;?>' id='like<?php echo $val['gallery_id'] ?>' class="icon fa-heart" title="Love It" onClick="likeFun('<?php echo $val['gallery_id'] ?>','<?php echo $login; ?>','<?php echo $user_id?>')"><?php if (isset($val['gallery_like_counter'])) {
                                echo $val['gallery_like_counter'];} ?></a></li>
                    <?php }else { ?>
                      <li><a rel='<?php echo $v;?>' id='like<?php echo $val['gallery_id'] ?>' class="icon fa-heart" title="Love It" onClick="likeFun('<?php echo $val['gallery_id']; ?>','<?php echo $login; ?>')"><?php if (isset($val['gallery_like_counter'])) {
                                echo $val['gallery_like_counter'];} ?></a></li>
                    <?php } ?>
                    <li><a href="<?php echo $val['hyperlink']; ?>" class="icon fa-arrow-circle-right" title="Tell Me More">Tell Me More </a></li>
                    </ul>
                </footer>
                <div class="tgl_srbx" id="sahre<?php echo $val['gallery_id'];?>">
                <?php $url=base_url().'home/details/'.$val['post_id'];
                      if (isset($val['img_title'])) {$text=$val['img_title'];}?>
                <div class="clearfix">
                        <div class="ssl_alg ht"> 
                            <a href="http://twitter.com/intent/tweet?url=<?php echo urlencode($url); ?>&text=<?php echo urlencode($text); ?>">
                                <img src="<?php echo base_url() .'assets/frontend/images/tweet-share-icon.jpg';?>" title="Share our Twitter page!">
                            </a>
                            <?php //echo share_button('twitter',array('url'=>$url, 'text'=>$text, 'via'=>'mpak666', 'type'=>'iframe'))?></div>
                        <div class="ssl_alg">
                            <?php //echo share_button('facebook', array('url'=>$url, 'text'=>$text))?>
                             <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $text;?>&amp;p[summary]=<?php echo $text;?>&amp;p[url]=<?php echo $url; ?>&amp;&', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                                <img src="<?php echo base_url() .'assets/frontend/images/fb-share-icon.jpg';?>" title="Share our Facebook page!">                      
                            </a>
                        </div>
                      <div class="so_tpt">
                        <div class="ssl_alg ht">  
                            <a href="https://plus.google.com/share?url=<?php echo urlencode($url);?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <img src="<?php echo base_url() .'assets/frontend/images/gp-share-icon.jpg';?>" alt="Share on Google+"/>
                            </a>
                            <?php //echo share_button('google+',array('url'=>$url, 'text'=>$text))?></div>
                        <div class="ssl_alg ht">  <?php echo share_button('pinterest', array('url'=>$url, 'text'=>$text))?></div>
                      </div>
              
                </div>

                </div>
            </div>
    </article>
    <?php } }?>                     

							
</div>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $( ".tgl_sr" ).click(function(e) {  
            var pid=$(this).attr('rel');
              $('#sahre'+pid).toggle('slow');
      });  
    });	
function likeFun(gallery_id, login, user_id)
    { 
        if (login =='0')
        {
            window.location = "<?php echo base_url() . 'customer/login'; ?>";
            return false;
        }
        var countrVal =  $('#like'+gallery_id).attr('rel');
        if (countrVal == '')
        {
            var inc=1;
            $('#like'+gallery_id).attr('rel', '1');
        }
        else {
            inc = -1;
            $('#like'+gallery_id).attr('rel', '');
        }
       //alert(inc);alert(gallery_id);  return false;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>home/check_gallery_count",
            data: {"gallery_id": gallery_id, "count": inc, "user_id": user_id},
            success: function (count) { //alert(count);return false;
                $("#like" + gallery_id).html(count);
                if(inc==1)
                {
                 $('#like'+gallery_id).addClass( "active" );
                }
                else{
                    $('#like'+gallery_id).removeClass('active');
                }
            }
        });
    }
</script>