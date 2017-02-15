<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
	<title>Login</title>
</head>

<body>

<form action="/tecaj/index.php/tecaj/login_model" method="POST">
	<label>Username: </label>
	<input type="text" name="userlogin" id="userlogin"/><br><br>
	<label>Password: </label>
	<input type="password" name="passwordlogin" id="passwordlogin"/><br><br>
	<input type="submit" name="login" id="login" value="Login"/>
</form>
	
</body>

</html>