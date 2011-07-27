<?php
$user = "root";
$pass = "root";
$db = "mspl_payroll";

	$socket = mysql_connect('localhost', $user, $pass);
	if (!$socket)
		die ("Could not connect to MySql Server");
	//else
	//	echo "Connected";

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error() );


	
?>