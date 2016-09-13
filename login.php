

<?php


		//check_login_user_inside();

	// include 'user_status.php';

	// if (!check_login_user_inside())
	// 	return;


	include 'user_status.php';

	check_login_user_outside();

	include 'utils.php';

	$link= get_db_link();

	$options = get_options();


	$stmt= $link->prepare("select token from users where token =! null ? ");

	$stmt->execute ( array( 'fdsf@gfd.com') ) ;



	$first_row = $stmt->fetch(); 

	//die (json_encode($first_row));

	if ($first_row===false)
		return;

	if (password_verify( '111111' , $first_row['password'])) 
		die('fdsf');


	die ($first_row['user_id']);


?>