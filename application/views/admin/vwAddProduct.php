
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
 <script src="<?php echo ADMIN_HTTP_JS_PATH; ?>script.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_HTTP_CSS_PATH; ?>style.css">
 
 
<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1>Add Post </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/products"><i class="icon-dashboard"></i>Post</a></li>
                <li class="active"><i class="icon-file-alt"></i>create post</li>        


            </ol>
        </div>
    </div><!-- /.row -->

    
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                 <?php echo $this->session->flashdata('msg'); ?>
                <?php //$attributes = array("name" => "registrationform");
                //echo form_open("users/add_user", $attributes);?>
                
             
           
                                 <div id="maindiv">

                       <div id="formdiv">
                           
                           <form enctype="multipart/form-data" action="" method="post">
                                <div class="form-group">
                    <label for="name">Post Name</label>
                    <input class="form-control" name="title" id="post_title" placeholder="Post Title" type="text" value="<?php echo set_value('title'); ?>" />
                    <span class="text-danger" id="p_title"><?php echo form_error('title'); ?></span>
                </div>
                    
                     <div class="form-group">
                    <label for="name">Category Name</label>
                    <select name="category" class="form-control" id="category">
                        <option value="">Please Select</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category['category_id']; ?>" <?php echo set_value('category')==$category['category_id']?'selected="selected"':''; ?>><?php echo $category['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="text-danger" id="c_title"><?php echo form_error('category'); ?></span>
                </div>
                         
               <div class="form-group">
                    <label for="name">Hyperlink</label>
                    <input class="form-control" name="hyperlink" id="hyperlink" placeholder="Hyperlink" type="text" value="<?php echo set_value('hyperlink'); ?>" />
                    <span class="text-danger" id="h_title"><?php echo form_error('hyperlink'); ?></span>
                </div>
                            
                               <div id="filediv" class="form-group">
                                   <label for="name">Image & Image Title <small>(850x550)</small></label>
                                   <input type="text" name="img_title[]" id="img_title" class="form-control" placeholder="Image Title" >
                                   <input name="file[]" type="file" id="file"/> 
                                  <span class="text-danger" id="img_upload"></span>
                               </div>
                              
                               <div class="form-group">
                                 <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                </div>
                               
                                <div class="form-group">
                                <label for="name">Description</label>
                                 <textarea name="description"><?php echo set_value('description'); ?></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>

                               <br>
                                 <div class="form-group">
                               <input type="submit" value="Create Post" name="submit" id="upload" class="upload"/>
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