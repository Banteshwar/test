<?php $this->load->view('admin/vwHeader'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Post <small>Manage Post Module</small></h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>admin/products"><i class="icon-dashboard"></i> Post</a></li>
              <li class="active"><i class="icon-file-alt"></i> Post</li>
              
              
              <a href="<?php echo base_url(); ?>admin/products/add_product"> <button class="btn btn-primary" type="button" style="float:right;">Add New Product</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">Post Name <i class="fa fa-sort"></i></th>
                    <th class="header">Category Name <i class="fa fa-sort"></i></th>
                    <th class="header">Status<i class="fa fa-sort"></i></th>
                 <th class="header">Created Date<i class="fa fa-sort"></i></th>
                 <th class="header">Last Modified<i class="fa fa-sort"></i></th>
                 <th class="header">Options<i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                      if($products){
                     foreach($products as $product){ ?>
                  <tr>
                    <td><?php echo $product->title; ?></td>
                   <td><?php echo $product->category_id; ?></td>
                     <td><?php echo $product->status==1?'Active':'Inactive'; ?></td>
                    <td><?php echo $product->created_on; ?></td>
                    <td><?php echo $product->modified_on; ?></td>
                     <td>
                          <a href="<?php echo base_url(); ?>admin/products/upload_view/<?php echo $product->post_id; ?>" class="btn btn-primary btn-xs">Image / Video</a> |
                        <a href="<?php echo base_url(); ?>admin/products/edit_product/<?php echo $product->post_id; ?>" class="btn btn-primary btn-xs">Edit</a> |
                       <a class="btn btn-primary btn-xs" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/products/delete_product/'.$product->post_id;?>');" deleteConfirm href="#">Delete</a>
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