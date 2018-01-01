<?php
$this->load->view('admin/vwHeader');
?>
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>tinymce/tinymce.min.js"></script>
 <script>

    tinymce.init({selector: 'textarea',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false,
         

    height: "300",
    width:900
    });
</script>
<script src="<?php echo ADMIN_HTTP_JS_PATH; ?>jquery.js"></script>
 <script src="<?php echo ADMIN_HTTP_JS_PATH; ?>script_category.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_HTTP_CSS_PATH; ?>style.css">

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Update Category <small>Edit setting</small></h1>
         
             <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/category"><i class="icon-dashboard"></i>Categories</a></li>
                <li class="active"><i class="icon-file-alt"></i>update category</li>        


            </ol>
        </div>
    </div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                 <?php echo $this->session->flashdata('msg'); ?>
                <?php //$attributes = array("name" => "registrationform");
                //echo form_open("users/add_user", $attributes);?>
                 <form class="form-signin panel" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/category/update_category">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="hidden" value="<?php echo isset($categories[0]['category_id']) && !empty($categories[0]['category_id']) ? $categories[0]['category_id'] : '';?>" name="category_id"> 
                    <input class="form-control" name="title" placeholder="Category Name" type="text" value="<?php echo isset($categories[0]['title']) && !empty($categories[0]['title']) ? $categories[0]['title'] : ''; ?>" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="name">Description</label>
                      <textarea name="description"><?php echo isset($categories[0]['description']) && !empty($categories[0]['description']) ? $categories[0]['description'] : '';     
                    ?></textarea>
                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                </div>
				
				<?php if($categories[0]['image_path']!='') {  ?>
				
			
				
				<div class="bsform-group" id="bsfilediv">
                                   <label for="name">Image &amp; Image Title <small>(850x550)</small></label>
                                 
									
                                   <div class="bsabcd" id="bsabcd1"><img src="<?php echo base_url() . 'uploads/thumbnail/' . $categories[0]['image_path']; ?>" id="bspreviewimg1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="bsimg" title="delete" src="<?php echo base_url(); ?>assets/backend/images/x.png" alt="delete" onClick="deleteImg(<?php echo $categories[0]['category_id']; ?>);"></div>
                                  
                               </div>
							   
							
							   
				<?php } else { ?>	
				
				
				 <div id="filediv" class="form-group">
                                      <label for="subject">Category Image</label>
                                   <input name="file[]" type="file" id="file"/>
                                <span class="text-danger" id="img_upload"></span>
                                  <span class="text-danger"> <?php echo form_error('file[]'); ?></span><b>Please Note:</b> Height and Width must up to 350*250.
                               </div>
				<?php } ?>
                     
                 <div class="form-group">
                    <label for="name">Image Path</label>
                    <input class="form-control" name="image_path" placeholder="" type="text" value="<?php echo isset($categories[0]['image_path']) && !empty($categories[0]['image_path']) ? $categories[0]['image_path'] : ''; ?>" />
                    <span class="text-danger"><?php echo form_error('image_path'); ?></span>                </div>
                
                
                <div class="form-group">
                    <label for="username">Status</label>
                    <select name="status" class="form-control">
                             <option value="1" <?php echo $categories[0]['status']==1?'selected="selected"':''; ?>>Active</option>
                             <option value="0" <?php echo $categories[0]['status']==0?'selected="selected"':''; ?>>Inactive</option>
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

<script>
 function deleteImg(image_id)
    {
	$.ajax({//starting ajax request
            type: "POST",
            url: "<?php echo base_url()?>admin/category/delete_image",
            data: {"image_id": image_id},
            success: function (count) {
			
			 window.location = "<?php echo base_url() . 'admin/category/edit_category/'; ?>"+image_id;
               // $("#bsfilediv" + counter).html('Image has been deleted');
            }
        });
	}

</script>

<?php
$this->load->view('admin/vwFooter');
?>