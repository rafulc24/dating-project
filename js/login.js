
function check_password(){



	var password= document.getElementById("password").value;

	if (password.length<4 ){
		document.getElementById("error_message").innerHTML = "you must type minimum 4 charachter in the password field";
		return false;

	} 

	if (password.length>20 ){
		document.getElementById("error_message").innerHTML = "you must type maximum 20 charachter in the password field";
		return false;

	} 


	// if (!password.match(/^[0-9a-z]+$/)){

	// 	document.getElementById("error_message").innerHTML = "you must type only letters or numbers in the password field";
	// 	return false;
	// }


	return true;


  }

