<?php
	include 'utils.php';

	function check_login_session(){

		session_start(); 


		if (!isset($_SESSION['token'] ) ){
			return false;
		}

		return true;
	}

	function check_login_user_outside(){


		if (check_login_session()===false){
			return;
		}

		header("Location: main_page.php"); /* Redirect browser */

		//die ( json_encode( $first_row['user_id']) );

		//die($link->lastInsertId() );

	}

	function check_login_user_inside(){


		if (check_login_session()===false){

			header("Location: dating_project1 - Copy.php"); /* Redirect browser */
			return;
		}

		return true;

		//header("Location: main_page.php"); /* Redirect browser */

		//die ( json_encode( $first_row['user_id']) );

		//die($link->lastInsertId() );

	}


	function  get_user_id(){

		//check_login_user_inside();

		if (check_login_session()===false){
			return;
		}

		$link= get_db_link();

		$stmt= $link->prepare("select user_id from users where token  = ? ");

		$stmt->execute ( array($_SESSION['token'])  ) ;

		//$stmt->execute ( array('fdsfsdf')  ) ;

		$first_row = $stmt->fetch(); 

		if ($first_row ==null)
			return;

		return $first_row['user_id'];

	}



	function log_in(){

		$email = $_POST['email'];
		$password = $_POST['password'];

	}

	function log_out(){


	}
?>