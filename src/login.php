<html>
<head>
<link rel="stylesheet" href="css/main.css" type="text/css">
<script type="text/javascript" src="js/login.js"></script>    
<title>Login-Page</title>
</head>
<body bgcolor="EEEEEE">
<form action="checklogin.php" method="POST" >

<fieldset id="fieldset">
<legend id="legend">Login Here</legend><br>
Username <input type="text" id="txt" name="uname"value="User Name"onfocus="clearText(this)" 
onblur="restoreText(this)"><br><br>

Password <input type="password" id="txt" name="upass"value="password"onfocus="clearText(this)" 
onblur="restoreText(this)"><br><br>

<input type="submit" value="Login">
<a href="registration.php"><strong>Create an Account</strong></a>
</fieldset>
</form> 
</body>
</html>