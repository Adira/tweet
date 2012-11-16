<html>
<head>
	<title> Register </title>
</head>
<body>
<h1> Register </h1>
<form action="register.php" method="get">
<table>
<tr>
<td>Login ID: <input type=text name="login"></td>

</tr>
<tr>
<td>Password: <input type=text name="password"></td>

</tr>
<tr>
<td>

	<input type="radio" name="crud" value="create">Create<br>
	<input type="radio" name="crud" value="read">Read<br>
	<input type="radio" name="crud" value="update">Update<br>
	<input type="radio" name="crud" value="delete">Delete<br>
</td>

</tr>
<tr>
<td><input type=submit value="Register"></td>

</tr>
</table>
</form>

<?php
	$host     = "localhost";
	$user     = "root";
	$password = "passwordx";
	$database = "twitter";

	mysql_connect($host, $user, $password) or die(mysql_error());
	mysql_select_db($database)             or die(mysql_error());

	extract($_REQUEST);

print $crud;
if($crud=="create")
{
	$queryRegister = "insert into accounts(login, password, c, r, u, d) values('$login', '$password', 1,0,0,0)";
	mysql_query($queryRegister);
}
else if($crud=="read")
{
	$queryRegister = "insert into accounts(login, password, c, r, u, d) values('$login', '$password', 0,1,0,0)";
	mysql_query($queryRegister);
}
else if($crud=="update")
{
	$queryRegister = "insert into accounts(login, password, c, r, u, d) values('$login', '$password', 0,0,1,0)";
	mysql_query($queryRegister);
}
else if($crud=="delete")
{
	$queryRegister = "insert into accounts(login, password, c, r, u, d) values('$login', '$password', 0,0,0,1)";
	mysql_query($queryRegister);
}

	//$queryRegister = "insert into users(login, password, c, r, u, d) values('$login', '$password', $create, $read, $update, $delete)";
	print $queryRegister;
	//mysql_query($queryRegister);
	print mysql_error();
?>

</body>
</html>
