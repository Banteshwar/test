<?php
$this->load->view('admin/vwHeader');
?>

 


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>User <small>Edit setting</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/users/"><i class="icon-dashboard"></i> User</a></li>
                <li class="active"><i class="icon-file-alt"></i> Edit setting</li>        


            </ol>
        </div>
    </div><!-- /.row -->

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            
            <div class="panel-body">
                 <?php echo $this->session->flashdata('msg'); ?>
                <?php $attributes = array("name" => "registrationform");
                //echo form_open("users/add_user", $attributes);?>
                 <form class="form-signin panel" method="post" action="<?php echo base_url(); ?>admin/users/update_users">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="hidden" value="<?php echo isset($users[0]['id']) && !empty($users[0]['id']) ? $users[0]['id'] : '';?>" name="pst_id"> 
                    <input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo isset($users[0]['fname']) && !empty($users[0]['fname']) ? $users[0]['fname'] : ''; ?>" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo isset($users[0]['lname']) && !empty($users[0]['lname']) ? $users[0]['lname'] : ''; ?>" />
                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo isset($users[0]['email']) && !empty($users[0]['email']) ? $users[0]['email'] : ''; ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
                     
                <div class="form-group">
                    <label for="username">Username</label>
                    <input readonly="readonly" class="form-control" name="username" placeholder="Username" type="text" value="<?php echo isset($users[0]['username']) && !empty($users[0]['username']) ? $users[0]['username'] : ''; ?>" />
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
                <div class="form-group">
                    <label for="username">Status</label>
                    <select name="status" class="form-control">
                             <option value="1" <?php echo $users[0]['status']==1?'selected="selected"':''; ?>>Active</option>
                             <option value="0" <?php echo $users[0]['status']==0?'selected="selected"':''; ?>>Inactive</option>
                         </select>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Update</button>
                  
                </div>
               </form>
               
            </div>
        </div>
    </div>
</div>
   
</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>