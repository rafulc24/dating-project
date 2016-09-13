<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax File Upload with jQuery and PHP - Demo</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 

		var options = { 
				target:   '#output',   // target element(s) to be updated with server response 
				beforeSubmit:  beforeSubmit,  // pre-submit callback 
				success:       afterSuccess,  // post-submit callback 
				uploadProgress: OnProgress, //upload progress callback
				resetForm: true        // reset the form after successful submit 
			}; 
			
		 $('#MyUploadForm').submit(function() { 
				$(this).ajaxSubmit(options);  			
				// always return false to prevent standard browser submit and page navigation 
				return false; 
			}); 
			

	//function after succesful file upload (when server response)
	function afterSuccess()
	{
		$('#submit-btn').show(); //hide submit button
		$('#loading-img').hide(); //hide submit button
		$('#progressbox').delay( 2000 ).fadeOut(); //hide progress bar

	}

	//function to check file size before uploading.
	function beforeSubmit(){
	    //check whether browser fully supports all File API
	   if (window.File && window.FileReader && window.FileList && window.Blob)
		{
			
			if( !$('#FileInput').val()) //check empty input filed
			{
				$("#output").html("No such File has selected");
				return false
			}
			
			var fsize = $('#FileInput')[0].files[0].size; //get file size
			var ftype = $('#FileInput')[0].files[0].type; // get file type
			

			//allow file types 
			switch(ftype)
	        {
	            case 'image/png': 
				case 'image/gif': 
				case 'image/jpeg': 
				case 'image/pjpeg':
				// case 'text/plain':
				// case 'text/html':
				// case 'application/x-zip-compressed':
				// case 'application/pdf':
				// case 'application/msword':
				// case 'application/vnd.ms-excel':
				// case 'video/mp4':
	                break;
	            default:
	                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
					return false
	        }
			
			//Allowed file size is less than 5 MB (5242880)

			if(fsize>5242880)  // 5242880 bytes is 5MB  (NO bits)
			{
				$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
				return false
			}
					
			$('#submit-btn').hide(); //hide submit button
			$('#loading-img').show(); //hide submit button
			$("#output").html("");  
		}
		else
		{
			//Output error to older unsupported browsers that doesn't support HTML5 File API
			$("#output").html("Please upgrade your browser, because your current browser lacks some new features");
			return false;
		}
	}

	//progress bar function
	function OnProgress(event, position, total, percentComplete)
	{
	    //Progress bar
		$('#progressbox').show();
	    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
	    $('#statustxt').html(percentComplete + '%'); //update status text
	    if(percentComplete>50)
	        {
	            $('#statustxt').css('color','#000'); //change status text to white after 50%
	        }
	}

	//function to format bites bit.ly/19yoIPO
	function bytesToSize(bytes) {
	   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	   if (bytes == 0) return '0 Bytes';
	   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

}); 

function display_file_name(){

	var FileInput= document.getElementById("FileInput").value;

	$("#output").html(FileInput);

}

</script>
<link href="css/upload_image.css" rel="stylesheet" type="text/css">
</head>

<?php

	//header("Location: dating_project1 - Copy.php"); /* Redirect browser */

		//session_start(); 

		// if(isset($_SESSION['come_from']) )
		// 	//&& $_SESSION['come_from'] =='processupload' )

		// 	header("Location: dating_project1 - Copy.php"); /* Redirect browser */

		// else
		// 	die('didnt get _SESSION ');



?>

<body style="background-color:#CD5C5C">

<div style="vertical-align: center; text-align: center;">

	<div  id="upload-wrapper">


			<h3>Image Profile</h3>
			<form action="processupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
				<input name="FileInput" id="FileInput" type="file" onchange="display_file_name()" />
			    <!--<input type="hidden"  value="<?php echo $user_id ?>"  name="user_id" /> -->
				<div id="small_x_space"> 
				</div>
				<input type="submit"  id="submit-btn" value="Upload" />
				<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
			</form>
			<div style="height: 15px"> 
			</div>
			<div id="output">
				
			</div>
			<div id="progressbox" >

				<div id="progressbar">
				</div>
				<div id="statustxt">
					0%
				</div>
				
			</div>



	</div>

</div>

</body>
</html>