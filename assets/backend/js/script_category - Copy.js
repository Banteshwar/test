var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append( 
				$("<input/>", {name: 'file[]', type: 'file', id: 'file'}), 				
                $("<br/><br/>")
                ));
    });

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				 
				 
				
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
              
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
								
								
								
								
        var name = $(":file").val();
		var cat_title = $("#cat_title").val();
        if (!name)
        {
          $('#img_upload').html('First Image Must Be Selected');
		  e.preventDefault();
        }else{
			
			/*var fileUpload = document.getElementById("file");
			
		
			
			if (typeof (fileUpload.files) != "undefined") {	
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height < 250 || width < 350) {
					
                    // alert("Height and Width must up to 350*250new.");
					 
					 window.location.replace(document.URL+'/5');
					// window.location.href=document.URL+'/5';
					 
					
					  e.preventDefault();
                    
					 // return false;
                    }
                   // alert("Uploaded image has valid Height and Width.");
                    //return true;
                };
 
            }
        }
			*/
			
			  
			   
			  $('#img_upload').html('');
		}
		if (!cat_title)
        {
          $('#cat_error').html('Please enter category name');
            e.preventDefault();
        }else{
			  $('#cat_error').html('');
		}
		
    });
});