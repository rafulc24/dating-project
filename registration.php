<!DOCTYPE html>
<head>
<meta charset="utf-8">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



	

<link rel="Stylesheet" type="text/css" href="css/registration.css" />


<style>


</style>

<script type="text/javascript" src="js/jquery-2.2.3.js"></script>

<script type="text/javascript"  src="js/registration.js"> </script>


<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 

		// var options = { 
		// 		target:   '#output',   // target element(s) to be updated with server response 
		// 		beforeSubmit:  beforeSubmit,  // pre-submit callback 
		// 		success:       afterSuccess,  // post-submit callback 
		// 		uploadProgress: OnProgress, //upload progress callback
		// 		resetForm: true        // reset the form after successful submit 
		// 	};



});

</script>

</head>
<title> date :) </title>

<body style=" background-color:#CD5C5C" onload="check_error_focus()">


<?php

	include 'user_status.php';

	check_login_user_outside();
	
	//check_fill_fields() has to check the first validation
	//  BEFORE it submit the form and go to function validation_login
	//that makes the whole validation

	if  ( !check_fill_fields() || isset($_POST["error_message"]) && $_POST["error_message"] !=null  )  
	{


			if (isset($_POST["error_message"])) 
				$error_message= $_POST["error_message"];

			else
				$error_message='';
?>
		
		<br> 

		<div style="vertical-align: center; text-align: center;">
			
			<div style="display: inline-block; width: 450px;  background-color:#CD557C" >

				<h1> registration  </h1>

				<FORM onsubmit="return check_password()" METHOD="POST" id="rafform" ACTION="registration.php">

					<center>
					<table id="registration_table">  
						<tr>
							<td></td>
							<td> <span> first name  </span> </td>  
							<td> </td>
							<td colspan="2" > <input type="text" name="first_name"  maxlength="15" id="first_name" required pattern="^\D{2,15}$"  title="מינימום שני תווי אותיות ומקסימום 15"/> </td> 

						</tr>

						<tr> 
							<td></td>
							<td > <span> last name  </span> </td>    
							<td> </td>
							<td colspan="2"> <input type="text"name="last_name" id="last_name" required pattern="^\D{2,15}$"  title="מינימום שני תווי אותיות ומקסימום 15"/></td> 

						</tr>

						<tr> 
							<td></td>
							<td > <span> age  </span> </td> 
							<td> </td>

							<td colspan="2"> <input type="text"  name="age" id="age" required pattern="^([2-5]\d|1[7-9])$" title="ניתן להרשם לאתר למשתמשים בגילאי 17 עד 59." /> </td> 
					 

						</tr>
					 

						<tr> 
							<td></td>
							<td > <span> password  </span>   </td>
							<td> </td>

							<td colspan="2">  <input type="password" name="password" id="password" required pattern="^\w{6,20}$"  title="מינימום 6 ומקסימום 20 מספרים או אותיות באנגלית" /> </td> 

						</tr>

						<tr> 

							<td></td>
							<td > <span>  <div class="small_font_size"> confirm password </div> </span>  </td>
							<td> </td>

							<td colspan="2">  <input type="password" name="confirm_password" id="confirm_password" required pattern="^\w{6,20}$"  title="מינימום 6 ומקסימום 20 מספרים או אותיות באנגלית" /> </td> 

						</tr>

						<tr> 

							<td></td>
							<td > <span>  <div class="small_font_size"> Email </div> </span>  </td>
							<td> </td>

							<td colspan="2">  <input type="text" name="email" id="email" required pattern="^\.*{8,40}$"  title="מינימום 8 ומקסימום 40 מספרים או אותיות באנגלית" /> </td> 

						</tr>
					 

						<tr>
							<td></td>
							<td> <span> gender  </span>   </td>
							<td> </td>

							<div id="gender_radio">
								<td>  <input type ="radio" id="male" name="gender" value="1" checked="checked"/> <span> male </span>  </td>           
								<td> <input type ="radio" id="female" name="gender" value="2" /> <span> female </span> </td> 
							</div>
						</tr>




					</table>
						

						<br><br><br>
						
		
						<h3> your hobbies</h3>
						
						<table align="center"  style  height="20%" border= "1px" >  <font color= "yellow" size="4" face="david">  
						<tr> <td>
						<text> Politica </text></td>
						<td>
						<select name ="Politica">
						<option selected ="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>

						</select>
						
						</td> </tr>
						
						<tr> <td>
						<text>Sport</text> </td>
						<td>
						<select name ="Sport">
						<option selected ="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>

						</select>
						
						</td>
						</tr>
						

						
						<tr>
						<td>
						<text>Music</text> </td>
						<td>
						<select name ="Music">
						<option selected ="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>

						</select>
						
						</td>
						</tr>
						</table>
						<br><br>
						<INPUT TYPE=SUBMIT VALUE="submit"/>

						<?php

							if (isset($error_message) && $error_message!='' ){

						?>

							<div style="height: 35px;">
							</div>

							<div style="display: flex;"> 

								<div style="width: 25%;">
								</div>
								<div style=" text-align: center; width: 50% ; background-color: orangered; "> 
									<span  style="color:green" id="error_message"> 
										<p> <?php echo $error_message?> </p>  
									</span> 
								</div>


								<div style="width: 25%;">
								</div>

							</div>

							<div style="height: 15px;">
							</div>
						<?php

							}

						?>
						
					<div style="height: 35px;">
					</div>

				  	<p> <a href="dating_project1 - Copy.php"> click her to back to menu </a> </p>		

				</FORM>

			
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

				$first_name= $_POST['first_name'];
				$last_name= $_POST['last_name'];
				//$password= $_POST['password'];
				$age= $_POST['age'];
				$Politica= $_POST['Politica'];
				$Sport= $_POST['Sport'];
				$Music= $_POST['Music'];
				$gender = $_POST['gender'];
				$email = $_POST['email'];

				$randomString= get_token(); //from utils file

				$link= get_db_link();

				//$options = get_options();

				session_start(); 


				$stmt = $link->prepare("insert into users  (first_name,last_name, password, email, gender, age ,Politica,
					Sport,Music,num_photos,token) VALUES 
					( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?  )");


				$stmt->execute(array($first_name , $last_name , password_hash($_POST['password'],PASSWORD_BCRYPT, []) , 
					$email, $gender ,  $age , $Politica , $Sport , $Music, 0 , $randomString ));

				//die($link->lastInsertId() );

				//header("Location: http://ynet.co.il/"); /* Redirect browser */


				$_SESSION['token'] = $randomString;


				header("Location: upload_image.php"); /* Redirect browser */


			} catch (Exception $e) {
				
			  	$specific_error_message= $e->getMessage() ;
				 
				// the needle
				$find = 'Duplicate entry';
				 
				// perform the search
				$position = strpos($specific_error_message, $find);
				 
				// We use ===  below because the needle we are looking for may
				// start the haystack. In that case, the function would
				// return 0 as the position of the first occurrence, but the if
				// statement would treat that 0 as false if we used only ==
				 
				if ($position === false)
				    $specific_error_message= 'sorry some errore occured';

				else
			    	$specific_error_message= 'this mail address is already exist';

			  	error_form_message($specific_error_message);

			}

			finally{

			 //    session_unset();
			 //    session_destroy();

				// $_SESSION['token'] = $randomString;

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


		if (!isset($_POST['first_name'] ) || empty($_POST['first_name']) || !isset($_POST['last_name'] ) || empty($_POST['last_name']) || 
			!isset($_POST['age'] ) || empty($_POST['age'])  ||
			 !isset($_POST['password'] ) || empty($_POST['password']) || !isset($_POST['confirm_password'] ) 
			 || empty($_POST['confirm_password']) || !isset($_POST['email'] ) || empty($_POST['email'])   )

			return false;

		return true;
	}


	function validation_login(){

		try{

			if (!check_fill_fields()){
				error_form_message('you didnt fill all the fields');
				return false;
			}

			$password=  $_POST['password'] ;
			$confirm_password=  $_POST['confirm_password'] ;

			//die('by');

			//ctype_alnum is check if theare are only alphnumeric chracters
			if (!ctype_alnum($password) || !ctype_alnum($confirm_password) || $password!==$confirm_password  ){
				error_form_message('password error');
				return false;
			}



			$Politica=  $_POST['Politica'] ;
			$Sport=  $_POST['Sport'] ;
			$Music=  $_POST['Music'] ;

			$array_fields= array($Politica,$Sport,$Music);

			foreach ($array_fields as $key => $value) {

				if (!validation_favorite($value)){
					error_form_message('problem with choosing politica, sport or music option ');
					return false;
				}

			}

			//die('by');

			$gender = $_POST['gender']; 


			if (!isset($_POST['gender']) || $gender!=1 && $gender!=2) {

				error_form_message('problem with gender option ');
				return false;
			}


			$first_name= $_POST['first_name'] ;
			$last_name= $_POST['last_name'] ;
			$age= $_POST['age'] ;


			// $four_array= array($first_name,$last_name,$age,$address);
			// die(json_encode($four_array));




			// check first name and last name

			//die('by');

			$preg_match_non_english= '[^a-z|^A-Z]';
			$preg_match_non_hebrew= '[^א-ת]';


			if ( strlen($first_name)<2 || strlen($last_name)<2)
				return false;



			if ( preg_match($preg_match_non_english, $first_name) && preg_match($preg_match_non_hebrew, $first_name) 
				|| preg_match($preg_match_non_english, $last_name) && preg_match($preg_match_non_hebrew, $last_name) 
				||strlen($first_name)<2 || strlen($last_name)<2 || 
				strlen($first_name)>15 || strlen($last_name)>15  ){

					error_form_message('problem with first name or last name ');
					return false;

			}	


			//die('by');

			// $white_space_letters='~`;!@#$%^&*()_-=+][}{\\|"/?.><ֻ 	\'';
			// $hebrew_letter='אבגדהוזחטיכלמנסעפצקרשתםןףךץ';

			// if (!ctype_alpha($first_name) || !ctype_alpha($last_name) || strlen($first_name)<2 || strlen($last_name)<2 || 
			// 	strlen($first_name)>15 || strlen($last_name)>15  )

			// 	return false;



			//check age


			if (!is_numeric($age)){

				error_form_message('possible age is between 17 to 59');
				return false;
			}


			$age= number_format($age) ;


			if($age<17 || $age>59){

				error_form_message('possible age is between 17 to 59');
				return false;
			}


		    $email = $_POST["email"];
		    // check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

				error_form_message('Invalid email format');
		      	return false;
		    }
			  
			//die('by');

			return true;

		}

		//catch exception
		catch(Exception $e) {
		  // echo 'Message: ' .$e->getMessage();
		  // die('Exception');

			error_form_message($e->getMessage());

			return false;
		}


	}

	function error_form_message($specific_error_message= null){

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