<?php


	$host     = "localhost";
	$user     = "root";
	$password = "passwordx";
	$database = "twitter";

	mysql_connect($host, $user, $password) or die(mysql_error());
	mysql_select_db($database)             or die(mysql_error());

	extract($_REQUEST);

	if(isset($id, $password)) {
		$recordset = mysql_query("SELECT * FROM accounts");

		if($recordset == false) {die(mysql_error());}

		$success="no";

		while($row = mysql_fetch_assoc($recordset)) {
			//print "hi";
			if(($id==$row["login"]) && ($password==$row["password"])) {
				header('Location: http://localhost/tweet/CRUD.php');
			}
		}

		if($success == "no")
		{
			print("Login Failed");
		}
	}

?>

<html>
<head>
	<title> Login Page </title>
</head>
<body>
<h1> Login </h1>
<form action="login.php" method="post">
<table>
<tr>
<td>Login ID: <input type=text name="id"></td>

</tr>
<tr>
<td>Password: <input type=password name="password"></td>

</tr>
<tr>
<td><input type=submit value="Login"></td>

</tr>
</table>
</form>


<a href=register.php>Register</a>

</body>
</html>
