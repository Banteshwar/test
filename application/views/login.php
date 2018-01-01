<div id="main">
    <?php if ($no_msg != '') { ?>
        <p class="msg error">The Email-id or Password you have entered is incorrect.</p>
    <?php } ?>
    <!-- Mini Post -->
    <article class="post gn_tmg2">
        <section>
            <h3>Login to our site</h3>
            <form id="form1" name="form1" method="POST" action="">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <input name="c_email" type="text" id="c_email" placeholder="Username"/>
                        <span class="text-danger"><?php echo form_error('c_email'); ?></span>
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input name="c_password" type="password" id="c_password" placeholder="Password" />
                        <span class="text-danger"><?php echo form_error('c_password'); ?></span>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input value="Sign in" name="commit" type="submit" id="submit" class="btn_c"/></li>
                        </ul>
                    </div>
                    <div class="strike"><span>Or</span></div>
                    <div class="3u 12u$(xsmall)">
                        <a href="<?php echo $login_url; ?>" class="button icon fa-facebook fb">FACEBOOK</a>
                    </div>
                    <div class="3u 12u$(xsmall)">
                        <a href="<?php echo $auth; ?>" class="button icon fa-google-plus gp">GOOGLE</a>
                    </div>
                    <div class="3u 12u$(xsmall) txt_rc">
                        <a href="<?php echo base_url(); ?>customer/registration" class="blck">Create Account</a>
                    </div> 
                    
                </div>
            </form>
        </section>
    </article>
</div>	

