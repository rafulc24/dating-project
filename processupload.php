<?php

include 'user_status.php';

if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	############ Edit settings ##############

    $UploadDirectory= realpath(dirname(__FILE__)).'/files/'.get_user_id().'/'; //specify upload directory ends with / (slash)

    if (!file_exists($UploadDirectory))
        mkdir($UploadDirectory);

	##########################################
	
	/*
	Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini". 
	Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit 
	and set them adequately, also check "post_max_size".
	*/
	
	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	
	//Is file size is less than allowed size 5mb

	if ($_FILES["FileInput"]["size"] > 5242880) { // 5242880 bytes is 5MB  (NO bits)

		die("File size is too big!");
	}
	
	//allowed file type Server side check
	switch(strtolower($_FILES['FileInput']['type']))
		{
			//allowed file types
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			// case 'text/plain':
			// case 'text/html': //html file
			// case 'application/x-zip-compressed':
			// case 'application/pdf':
			// case 'application/msword':
			// case 'application/vnd.ms-excel':
			// case 'video/mp4':
				break;
			default:
				die('Unsupported File!'); //output error
	}
	
	$File_Name          = strtolower($_FILES['FileInput']['name']);
	$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
	$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
	$NewFileName 		= $Random_Number.$File_Ext; //new file name
	
	if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
   	{

		echo('Success! File Uploaded.');

		// session_start();   // this sets variables in the session  

		// $_SESSION['come_from']='processupload'; 

		//header('Refresh: 0')->with();
		// exit();
		// header("Location: route.php"); /* Redirect browser */

	?>

		<form id="form" action="dating_project1 - Copy.php" method="post">
	    <input type="hidden"  value=""  name="" />
		</form> 

		<script type="text/javascript">
			document.getElementById("form").submit(); // SUBMIT FORM
		</script> 

	<?php

	}else{
		die('error uploading File!');
	}
	
}
else
{
	die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
}