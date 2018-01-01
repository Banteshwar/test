<?php
$this->load->view('admin/vwHeader');
?>
 <script src="<?php echo ADMIN_HTTP_JS_PATH; ?>jquery.js"></script>
 <script src="<?php echo ADMIN_HTTP_JS_PATH; ?>script_profile.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_HTTP_CSS_PATH; ?>style.css">
<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1>Add User </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/users/add_user"><i class="icon-dashboard"></i>Add User</a></li>
                <li class="active"><i class="icon-file-alt"></i>Registration</li>        


            </ol>
        </div>
    </div><!-- /.row -->

    
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            
            
                 <div class="panel-body">
                 <?php echo $this->session->flashdata('msg'); ?>
                
                                 <div id="maindiv">

                       <div id="formdiv">
                           
                           <form enctype="multipart/form-data" action="" method="post">
                  
                         <div class="form-group">
                    <label for="name">First Name</label>
                    <input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo set_value('fname'); ?>" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
                     
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" name="username" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>" />
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Confirm Password</label>
                    <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                </div>
                            
                               <div id="filediv" class="form-group">
                                      <label for="subject">Profile Image</label>
                                   <input name="file[]" type="file" id="file"/></div>
                                 <span class="text-danger" id="img_upload"></span>
                              
                               
                  
                               
                                 <div class="form-group">
                               <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                               </div>
                           </form>
                           <br/>
                           <br/>
                                           <!-------Including PHP Script here------>
                           <?php //include "upload.php"; ?>
                       </div>

                              <!-- Right side div -->

                   </div>
             
               
               
            </div>
            
            
            
            
            
      
        </div>
    </div>
</div>
</div>
<?php
$this->load->view('admin/vwFooter');
?>