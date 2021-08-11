<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
	<meta name="robots" content="index,follow">
	
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
</head>
<body>
	<div id="logindiv">
		<h2>Bejelentkezés</h2>
		<form id="loginform" method="POST">
            <input type="hidden" name="event" value="do_login">
			<div>Felhasználónév</div>
			<div>
<!--todo remove loginname default values-->
<!--				<input type="text" id="loginname" name="loginname" value="admin">-->
				<input type="text" id="loginname" name="loginname" >
			</div>

			<div>Jelszó</div>
			<div>
<!--todo remove password default values-->
<!--				<input type="password" id="pwd" name="pwd" value="teszt">-->
				<input type="password" id="pwd" name="pwd">
			</div>
			
			<div></div>
			<div>
				<input type="submit" value="Belépés">
			</div>
		</form>
	</div>
</body>
</html>