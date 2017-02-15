<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
	<title>Register</title>
</head>

<body>

<form action="/tecaj/index.php/tecaj/register_model" method="POST">
	<label>Username: </label>
	<input type="text" name="username" id="username"/><br><br>
	<label>Password: </label>
	<input type="password" name="password" id="password"/><br><br>
	<label>Confirm password: </label>
	<input type="password" name="password2" id="password2"/><br><br>
	<input type="submit" name="register" id="register" value="Register"/>
</form>

<script>

var username = document.getElementById("username");
var password = document.getElementById("password");
var password2 = document.getElementById("password2");
var register = document.getElementById("register");

register.addEventListener("click", function(e)
{
	if (password.value != password2.value)
	{
		alert("Confirm password");
		e.preventDefault();
	}
	else if (password.value.length < 6)
	{
		alert("Less than 6 characters");
		e.preventDefault();
	}
	else
	{
		alert("Registration successful");
	}
});

</script>
	
</body>

</html>