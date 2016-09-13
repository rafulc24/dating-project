<!DOCTYPE html>
<head>
<meta charset="utf-8">

<link rel="Stylesheet" type="text/css" href="css/login.css" />


<style>


</style>

<script type="text/javascript" src="js/jquery-2.2.3.js">
</script>


<script type="text/javascript"  src="js/login.js">
</script>



</head>
<title> date :) </title>

<body style=" background-color:#CD5C5C">


<?php



	//check_fill_fields() has to check the first validation
	//  BEFORE it submit the form and go to function validation_login
	//that makes the whole validation

	if  ( !check_fill_fields() || isset($_POST["error_message"]) && !empty($_POST["error_message"] )  )  
	{


			if (isset($_POST["error_message"])) 
				$error_message= $_POST["error_message"];

			else
				$error_message='';
?>
		
		<br> 

		<div style="vertical-align: center; text-align: center;">
			
			<div style="display: inline-block; width: 550px; height: 400px;  background-color:#CD557C" >

				<h1> Login  </h1>

				<center>

				<div style="border: 1px solid burlywood; width: 50%">

					<FORM onsubmit="return check_password()" METHOD="POST" id="rafform" ACTION="login_like_reg.php">

						<table id="registration_table"> 


							<tr> 

								<td></td>
								<td > <span>  <div class="small_font_size"> Email </div> </span>  </td>
								<td></td>
								<td colspan="2">  <input type="text" name="email" id="email" required pattern="^\.*{8,40}$"  title="מינימום 8 ומקסימום 40 מספרים או אותיות באנגלית" /> </td> 

							</tr>

							<tr> 
								<td></td>
								<td > <span> password  </span>   </td>
								<td></td>
								<td colspan="2">  <input type="password" name="password" id="password" required pattern="^\w{6,20}$"  title="מינימום 6 ומקסימום 20 מספרים או אותיות באנגלית" /> </td> 

							</tr>

							<tr style="height: 10px;">  </tr>

							<tr> 
								<td></td>
								<td >   </td>
								<td></td>
								<td>  <INPUT TYPE=SUBMIT VALUE="submit"/>  </td> 
								<td></td>

							</tr>


						</table>
							
					</FORM>

					<div id="forget_password" > 
						<div style="background-color: fuchsia; width:110px;">
							<p> <a href="forget_password.php">  forget password? </a> </p>
						</div>
				  	</div>

				</div>


				<div> 
					<span  style="color:green" id="error_message"> <p> <?php echo $error_message?> </p>  </span>
				</div>

				<br><br><br><br>

			  	<p> <a href="dating_project1 - Copy.php"> click her to back to menu </a> </p>		


			</div>

		</div>



			
<?php 

	
	}

	else
	{


		if(!validation_login())
		{
			error_form_message();
		}

		else
		{
			include 'utils.php';

			//$link = mysql_connect ("localhost", "pma__recent@localhost","");

			try {


				$randomString= get_token(); //from utils file

				$link= get_db_link();

				$options = get_options();

				session_start(); 

				$stmt= $link->prepare("select password,token from users where email  = ? ");


				$stmt->execute ( array($_POST['email'] )  ) ;


				//$stmt->execute ( array($_SESSION['token'])  ) ;

				//$stmt->execute ( array('fdsfsdf')  ) ;

				$first_row = $stmt->fetch(); 

				if ($first_row === false)
					return;


				if (!password_verify( $_POST['password']  , $first_row['password'])) 
					return;


				$stmt= $link->prepare("update users set token = ? where email  = ? ");

				$stmt->execute ( array($randomString, $_POST['email'] )  ) ;

				$_SESSION['token'] = $randomString;


				header("Location: user_status.php"); /* Redirect browser */


			} catch (Exception $e) {
				
			  	//error_form_message();
			  	die ($e->getMessage());

			}

			finally{

			    session_unset();
			    session_destroy();


				// $stmt->closeCursor();
				// $_POST = array();

				//  unset all the variables 
				// $vars = array_keys(get_defined_vars());
				//die(json_encode($vars));

				// for ($i = 0; $i < sizeOf($vars); $i++) {
				//     unset($$vars[$i]);
				// }
				// unset($vars,$i);

			}


	  }


	}

	function validation_favorite($field){


		if (!is_numeric($field))
			return false;
			

		$field= number_format($field);


		if($field<0 || $field>5)
			return false;


		return true;

	}

	function check_fill_fields(){


		if ( !isset($_POST['password'] ) || empty($_POST['password']) || !isset($_POST['email'] ) || empty($_POST['email'])   )

			return false;

		return true;
	}


	function validation_login(){

		try{

			if (!check_fill_fields())
				return false;

			$password=  $_POST['password'] ;
		    $email = $_POST["email"];


			//die('by');

			//ctype_alnum is check if theare are only alphnumeric chracters
			if (!ctype_alnum($password) )  
				return false;


		    // check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailErr = "Invalid email format"; 
		      return false;
		    }
			  
			//die('by');

			return true;

		}

		//catch exception
		catch(Exception $e) {
		  // echo 'Message: ' .$e->getMessage();
		  // die('Exception');
			return false;
		}


	}

	function error_form_message(){

		// $specific_error_message= 'bla bla';
		//die("ha");

		?>

		<form id="form2" action="registration.php" method="post">
	    <input type="hidden"  value="<?php echo $specific_error_message ?>"  name="error_message" />
		</form> 

		<script type="text/javascript">
			// document.getElementById("error_message").innerHTML = "sorry some error eccure!";
			document.getElementById("form2").submit(); // SUBMIT FORM
		</script> 


		<?php

	}

	
?>
	
	    
	<br><br>

</body>
</html>