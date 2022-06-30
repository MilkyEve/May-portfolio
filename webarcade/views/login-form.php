<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./views/css/login-style.css" rel="stylesheet" type="text/css" />
	<title>Web Arcade - Login</title>
</head>

<body>
	<div class="login-container">
		<form action="./actions/login.php" method="post" id="frmLogin" onSubmit="return validate();">	
				<h2>Login</h2>

				<?php
					if(isset($_SESSION["errorMessage"])) {
				?>
						<div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
				<?php 
						unset($_SESSION["errorMessage"]);
					}
				?>

				<div>
					<div id="user_name_error" style="margin: 0;"></div>
					<label for="username">Username</label>
				</div>
				<div>
					<input name="user_name" id="user_name" type="text" class="frm-input">
				</div>
				<div>
					<div id="password_error"  style="margin: 0;"></div>
					<label for="password">Password</label>
				</div>
				<div>
					<input name="password" id="password" type="password" class="frm-input">
				</div>
				<div>
					<input type="submit" name="login" value="Login" class="login-btn"></span>
				</div>	
		</form>
	</div>
	<script>
		function validate() 
		{
			userNameError = document.getElementById('user_name_error')
			passwordError = document.getElementById('password_error')

			if (document.getElementById("password").value == "" && document.getElementById("user_name").value == "")
				{

					//iets is mis met u wachtwoord
					userNameError.classList.add("error-message");
					passwordError.classList.add("error-message");

					userNameError.innerHTML = "user name required";
					passwordError.innerHTML = "password required";
					// alert('u wachtwoord en gebruikers naam is verplicht is verplicht')
					return false;
				}
			if (document.getElementById("user_name").value == "")
				{

				//iets is mis met u gebruikers naam
				userNameError.classList.add("error-message");
				passwordError.classList.remove("error-message");

				userNameError.innerHTML = "user name required";
				passwordError.innerHTML = "";
				// alert('u gebruikers naam is verplicht')
				return false;
				}
			if (document.getElementById("password").value == "")
				{

				//iets is mis met u wachtwoord
				// alert('u wachtwoord is verplicht')
				passwordError.classList.add("error-message");
				userNameError.classList.remove("error-message");

				passwordError.innerHTML = "password required";
				userNameError.innerHTML = "";
				return false;
				}
	
			
			return true;
		}
    </script>
</body>
