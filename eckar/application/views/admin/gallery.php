<form method = "POST" action="<?php echo base_url()?>admin/add_gallery/"  enctype='multipart/form-data'>
<div class ="row">
<div class ="col-md-3"></div>
	
	<div class="row" style="padding-top: 10%; padding-left:40%;padding-right: 30%;">     

	<div class="col-md-9">
        <span class="btn btn-success fileinput-button" style="display:block; background-color:teal; width:250px;height:60px;">
        <span>Upload Gallery Image</span><span><input type="file" name="gallery_latest_app_image[]" id="gallery_latest_app_image" class="file-upload-default"multiple accept="image/jpeg, image/png, image/gif"><br /></span>
        </span>
        
			<output id="Filelist">
		
		
		     </output>
    </div>


	
			<div class="col-md-9">
				<div class="form-group">		 
        <input type="submit" class="btn btn-primary mr-2" id="submit" value="submit" disabled>
					<a href="<?php echo base_url().'admin/show_property'?>"><button class="btn btn-light">Cancel</button></a>
				</div>
			</div>

	</div>
</div>  
</div>                                                               
</form>  

<!------------- Validations--------------->
<script>
$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    // $('input:submit').removeAttr('disabled'); 
                } 
            }
            );
    });

</script>
<!------------- Validations--------------->







<script>

//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);

//To save an array of attachments
var AttachmentArray = [];

//counter for attachment array
var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

function init() {
  //add javascript handlers for the file upload event
  document
    .querySelector("#gallery_latest_app_image")
    .addEventListener("change", handleFileSelect, false);
}

//the handler for file upload event
function handleFileSelect(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function(readerEvt) {
      return function(e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt);

        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt);

        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }
  document
    .getElementById("gallery_latest_app_image ")
    .addEventListener("change", handleFileSelect, false);
}

//To remove attachment once user click on x button
jQuery(function($) {
  $("div").on("click", ".img-wrap .close", function() {
    var id = $(this)
      .closest(".img-wrap")
      .find("img")
      .data("id");

    //to remove the deleted item from array
    var elementPos = AttachmentArray.map(function(x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArray.splice(elementPos, 1);
    }

    //to remove image tag
    $(this)
      .parent()
      .find("img")
      .not()
      .remove();

    //to remove div tag that contain the image
    $(this)
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove div tag that contain caption name
    $(this)
      .parent()
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove li tag
    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
  });
});

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions
  if (CheckFileType(readerEvt.type) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/gif files"
    );
    e.preventDefault();
    return;
  }

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt.size) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
}

//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/gif") {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
  if (fileSize < 300000) {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 9) {
    return false;
  } else {
    return true;
  }
}

//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt) {
  var li = document.createElement("li");
  ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap"> <span class="close">&times;</span>' +
      '<img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/>' + "</div>"
  ].join("");

  var div = document.createElement("div");
  div.className = "FileNameCaptionStyle";
  li.appendChild(div);
  div.innerHTML = [readerEvt.name].join("");
  document.getElementById("Filelist").insertBefore(ul, null);
}

//Fill the array of attachment
function FillAttachmentArray(e, readerEvt) {
  AttachmentArray[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size
  };
  arrCounter = arrCounter + 1;
}

</script>


