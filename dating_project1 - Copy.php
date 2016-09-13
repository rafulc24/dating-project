<html>
<title> date :) </title>
<center>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/dating_project1 - Copy.css">

</head>

<?php

	// readline_clear_history();
	// unset($_SESSION);
 //    session_unset();
 //    session_destroy();

	/* unset all the variables*/ 
	//$vars = array_keys(get_defined_vars());
	//die(json_encode($vars));

	include 'user_status.php';

	check_login_user_outside();

?>

<body  style="background-color:#CD5C5C; ">

	
		<div class="main_menu" >

			<a href="registration.php" >

				<img src="pics/registration.png" id="background" />
			</a>

		</div>
		
		<div class="main_menu" >

			<a href="login_like_reg.php" >

				<img src="pics/login.png" id="background" />

			</a>

						
		</div>


</body>
</html> 