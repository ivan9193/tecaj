<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
</head>

<body>
<p>User: <?php echo $this->session->userdata('user'); ?> </p>
<p><a href="/tecaj/index.php/tecaj/logout">Log out</a></p>
<form action="/tecaj/index.php/tecaj/api" method="POST">
	<label>Valuta: </label>
	<input type="text" name="valuta" id="valuta"/><br><br>
	<label>Datum od(YYYY-MM-DD): </label>
	<input type="text" name="datum1" id="datum1"/><br><br>
	<label>Datum do(YYYY-MM-DD): </label>
	<input type="text" name="datum2" id="datum2"/><br><br>
	<input type="submit" name="submit" id="submit" value="Traži"/>
</form>
	
</body>

</html>