<?php

print($_REQUEST['CRUD']);

$host     = "localhost";
$user     = "root";
$password = "passwordx";
$database = "twitter";

mysql_connect($host, $user, $password) or die(mysql_error());
print "Connected to '$host' as '$user', password '$password'<hr>";

mysql_select_db($database) or die(mysql_error());
print "Selected database '$database'<hr>";

$usersRec = mysql_query("SELECT * FROM Users");
//print "<table>\n";
//        while($row = mysql_fetch_row($rec)){
//
//
//                	print "<tr bgcolor=white>";
//
//                print "<td>" . $row[0] . "</td>";
//                print "<td>" . $row[1] . "</td>";
//                print "<td>" . $row[2] . "</td>";
//                print "</tr>\n";
//
//        }
//        print "</table>\n";
?>


<html>
<body>

<h1>Our First Website: Form Input</h1>

<form action="CRUD.php">

<select name=handle>
<?php
while($row = mysql_fetch_assoc($usersRec)) {
	print("<option value=".$row['idUsers'].">" . $row['handle'] . "</option>");
}



?>
</select>


<input type=submit name="CRUD" value="Read">



</form>


</body>
</html>