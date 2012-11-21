<?php
extract($_REQUEST);

$host     = "localhost";
$user     = "root";
$password = "passwordx";
$database = "twitter";

mysql_connect($host, $user, $password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

$usersRec = mysql_query("SELECT * FROM Users");

if( $TwitterHandle == 0 ) {
	$tweetsRec = mysql_query("select * from users join tweets on usersId=idUsers where tweet like '%".$TextSearch."%'");
} else {
	$tweetsRec = mysql_query("select * from users join tweets on usersId=idUsers where idUsers=".$TwitterHandle." and tweet like '%".$TextSearch."%'");
}

?>
<html>
<body>

<form action=select.php>

	Pick-in <select name=TwitterHandle>
			<?php
				if( $TwitterHandle==0 ) {
			?>
				<option value=0 selected>any</option>
			<?php
				} else {
			?>
				<option value=0 >any</option>
			<?php
				}
			?>
		<?php
			while( $row = mysql_fetch_assoc($usersRec) ) {
				if( $TwitterHandle == $row['idUsers'] ) {
					print "<option value=\"" . $row['idUsers'] . "\" selected>".$row['handle']."</option>";
				} else {
					print "<option value=\"" . $row['idUsers'] . "\">".$row['handle']."</option>";
				}
			}
		?>
	</select>

	Search <input type=text name=TextSearch value=<?=$TextSearch?>>
	<input type=submit>
</form>
<hr/>

<?php
$x = 0;
if( mysql_num_rows( $tweetsRec ) > 0 ) {
	print "<table border=1>";
	print "<tr><td>handle</td><td>tweet</td></tr>";
	while ( $row = mysql_fetch_assoc($tweetsRec) ) {
		if( $x % 2 == 0 ) {
		print "<tr bgcolor=grey>";
		} else {
		print "<tr>";
		}
		print "<td>".$row['handle']."</td>";
		print "<td>".$row['tweet']."</td>";
		print "</tr>";
		$x = $x + 1;
	}
	print "</table>";
} else {
	print "What are you searching for?";
}

?>

</body>
</html>