<?php

	function get_token(){

	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 10; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function get_db_link(){

		$link = new PDO('mysql:host=localhost;dbname=dating_project;charset=utf8mb4', 'root', '');

		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $link;
	}

	function get_options(){

		$options = [
		    'cost' => 13,
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];


		return $options;

	}
?>