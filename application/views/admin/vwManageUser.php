<?php
$this->load->view('admin/vwHeader');
?> 


    <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Users <small>Manage Users Module</small></h1>
            <ol class="breadcrumb">
              <li><a href="Users"><i class="icon-dashboard"></i> Users</a></li>
              <li class="active"><i class="icon-file-alt"></i> Users</li>
            
              
              <a href="<?php echo base_url(); ?>admin/users/add_user"> <button class="btn btn-primary" type="button" style="float:right;">Add New User</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $this->session->flashdata('verify_msg'); ?>
                </div>
            </div>

            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">UserName <i class="fa fa-sort"></i></th>
                    <th class="header">Email <i class="fa fa-sort"></i></th>
                     <th class="header">Status <i class="fa fa-sort"></i></th>
                    <th class="header">Last Login <i class="fa fa-sort"></i></th>
                    <th class="header">Signup Date<i class="fa fa-sort"></i></th>
                      <th class="header">Operation <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                     if($userdata){
                    foreach($userdata as $user){ ?>
                  <tr>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->email; ?></td>
                     <td><?php echo $user->status==1?'Active':'Inactive'; ?></td>
                    <td><?php echo $user->created_on; ?></td>
                    <td><?php echo $user->updated_on; ?></td>
                     <td>
                        <a href="<?php echo base_url(); ?>admin/users/edit_user/<?php echo $user->id; ?>" class="btn btn-primary btn-xs">Edit</a> | 
                       
               <a class="btn btn-primary btn-xs" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/users/delete_user/'.$user->id;?>');" deleteConfirm href="#">Delete</a>
                    </td>
                  </tr>
                     <?php } } ?>
                </tbody>
              </table>
            </div>
        <?php echo $links; ?>
     
        
        
      </div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>