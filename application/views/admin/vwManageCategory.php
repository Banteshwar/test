<?php
$this->load->view('admin/vwHeader');
?>
    <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Categories <small>Manage Categories</small></h1>
            <ol class="breadcrumb">
            
              <li class="active"><i class="icon-file-alt"></i> Category</li>
            
              
              <a href="<?php echo base_url(); ?>admin/category/add_category"> <button class="btn btn-primary" type="button" style="float:right;">Add New Category</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">Category Name <i class="fa fa-sort"></i></th>
                     <th class="header">Status <i class="fa fa-sort"></i></th>
                    <th class="header">Created <i class="fa fa-sort"></i></th>
                    <th class="header">Last Modify<i class="fa fa-sort"></i></th>
                      <th class="header">Operation <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if($categroies){
                    foreach($categroies as $categroy){ ?>
                  <tr>
                    <td><?php echo $categroy->title; ?></td>
                   
                     <td><?php echo $categroy->status==1?'Active':'Inactive'; ?></td>
                    <td><?php echo $categroy->created_on; ?></td>
                    <td><?php echo $categroy->updated_on; ?></td>
                     <td>
                        <a href="<?php echo base_url(); ?>admin/category/edit_category/<?php echo $categroy->category_id; ?>" class="btn btn-primary btn-xs">Edit</a> |
                     
                    <a class="btn btn-primary btn-xs" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/category/delete_category/'.$categroy->category_id;?>');" deleteConfirm href="#">Delete</a>
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