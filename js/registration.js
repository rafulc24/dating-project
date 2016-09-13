
function check_password(){



	var password= document.getElementById("password").value;
	var confirm_password= document.getElementById("confirm_password").value;

	if (password.length<4 ){
		document.getElementById("error_message").innerHTML = "you must type minimum 4 charachter in the password field";
		return false;

	} 

	if (password.length>20 ){
		document.getElementById("error_message").innerHTML = "you must type maximum 20 charachter in the password field";
		return false;

	} 

	if (confirm_password.length<4 ){
		document.getElementById("error_message").innerHTML = "you must type minimum 4 charachter in the confirm_password field";
		return false;

	} 

	if (confirm_password.length>20 ){
		document.getElementById("error_message").innerHTML = "you must type maximum 20 charachter in the confirm_password field";
		return false;

	} 


	// if (!password.match(/^[0-9a-z]+$/)){

	// 	document.getElementById("error_message").innerHTML = "you must type only letters or numbers in the password field";
	// 	return false;
	// }


	// if (!confirm_password.match(/^[0-9a-z]+$/)){

	// 	document.getElementById("error_message").innerHTML = "you must type only letters or numbers in the confirm_password field";
	// 	return false;
	// }

	if (password!==confirm_password){

		document.getElementById("error_message").innerHTML = "password and confirm password not euqal";
		return false;
	}

	return true;


  }

function check_error_focus(){

	var error_message= document.getElementById("error_message").value;

	if (error_message!=null && error_message!=''){

	    document.getElementById( 'error_message' ).scrollIntoView();
    	window.setTimeout( function () { top(); }, 2000 );
	}

}

function my_func(){
	  
	  //alert('Hello world!');

	var my_file= document.getElementById("my_file").value;


	document.getElementById("file_name").value= my_file;
}

