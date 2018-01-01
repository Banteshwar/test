
<?php
$this->load->view('admin/vwHeader');
?>
<link href="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/style.css" rel="stylesheet" type="text/css">


<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1>Add Product </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>admin/products"><i class="icon-dashboard"></i>Products</a></li>
                <li class="active"><i class="icon-file-alt"></i>create product</li>        


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
                
              
                <div class="form-group">
                    <input class="form-control" name="post_id" id="post_id" type="hidden" value="<?php echo $post_id; ?>" readonly="readonly"/>
                    
                </div>

                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <div class="upload-wrapper">
                     <!--<div id="error_output"></div>-->
                            
                        <div id="dropzone">
                            <i>Drop files here</i>
                            <!-- upload button -->
                            <span class="button btn-blue input-file">
                                Browse Files <input id="fileupload" type="file" name="files[]" multiple>
                            </span>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files"></div>
                    </div>
                    
                </div>
                     
                
               
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/load-image.all.min.js"></script> 
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.iframe-transport.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload-image.js"></script>
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload-video.js"></script>
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload-audio.js"></script>
<script src="<?php echo ADMIN_HTTP_ASSETS_PATH_ADMIN; ?>multi-image/js/jquery.fileupload-validate.js"></script>
<script language="javascript">
$(function(){
	'use strict';
	var fi = $('#fileupload'); //file input 
        var post_id = $("#post_id").val();
	var process_url = '<?php echo base_url(); ?>admin/products/upload/' + post_id; //PHP script
	var progressBar = $('<div/>').addClass('progress').append($('<div/>').addClass('progress-bar')); //progress bar
	var uploadButton = $('<button/>').addClass('button btn-blue upload').text('Upload');	//upload button
	
	uploadButton.on('click', function () {  
               //  $(".product-danger").html('');
		var $this = $(this), data = $this.data();
		data.submit().always(function () {
				$this.parent().find('.progress').show();
				$this.parent().find('.remove').remove();
				$this.remove();
                  });
              
	});

	//initialize blueimp fileupload plugin
	fi.fileupload({
		url: process_url,
		dataType: 'json',
		autoUpload: false,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp4|mp3|WMV)$/i,
		maxFileSize: 5048576, //1MB
		// Enable image resizing, except for Android and Opera,
		// which actually support image resizing, but fail to
		// send Blob objects via XHR requests:
		disableImageResize: /Android(?!.*Chrome)|Opera/ 
		.test(window.navigator.userAgent),
		previewMaxWidth: 50,
		previewMaxHeight: 50,
		previewCrop: true,
		dropZone: $('#dropzone')
	});
	
	fi.on('fileuploadadd', function (e, data) {
			data.context = $('<div/>').addClass('file-wrapper').appendTo('#files');
			$.each(data.files, function (index, file){	
			var node = $('<div/>').addClass('file-row');
			var removeBtn  = $('<button/>').addClass('button btn-red remove').text('Remove');
			removeBtn.on('click', function(e, data){
				$(this).parent().parent().remove();
			});
			
			var file_txt = $('<div/>').addClass('file-row-text').append('<span>'+file.name + ' (' +format_size(file.size) + ')' + '</span>');
			
			file_txt.append(removeBtn);
			file_txt.prependTo(node).append(uploadButton.clone(true).data(data));
			progressBar.clone().appendTo(file_txt);
			if (!index){
				node.prepend(file.preview);
			}
			
			node.appendTo(data.context);
		});
	});

	fi.on('fileuploadprocessalways', function (e, data) {
		var index = data.index,
			file = data.files[index],
			node = $(data.context.children()[index]);
			if (file.preview) {
				node .prepend(file.preview);
			}
			if (file.error) {
				node.append($('<span class="text-danger"/>').text(file.error));
			}
			if (index + 1 === data.files.length) {
				data.context.find('button.upload').prop('disabled', !!data.files.error);
			}
	});
	
	fi.on('fileuploadprogress', function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);
		if (data.context) {
			data.context.each(function () {
				$(this).find('.progress').attr('aria-valuenow', progress).children().first().css('width',progress + '%').text(progress + '%');
			});
		}
	});

	fi.on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>') .attr('target', '_blank') .prop('href', file.url);
				$(data.context.children()[index]).addClass('file-uploaded');
				$(data.context.children()[index]).find('canvas').wrap(link);
				$(data.context.children()[index]).find('.file-remove').hide(); 
				var done = $('<span class="text-success"/>').text('Uploaded!');
				$(data.context.children()[index]).append(done);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index]).append(error);
            }
        });
    });
	
	fi.on('fileuploadfail', function (e, data) {
   	 $('#error_output').html(data.jqXHR.responseText);
	});
	
	function format_size(bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }
            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }
            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }
            return (bytes / 1000).toFixed(2) + ' KB';
        }
});
</script>
<?php
$this->load->view('admin/vwFooter');
?>