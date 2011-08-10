<?php

include_once( 'ServerDetail.php');
session_start(); //Start the current session
session_unset();
session_destroy(); //Destroy it! So we are logged out now
unset($_SESSION);
 header("location:index.php?msg=Successfully Logged out");
//clearsessionscookies(); 
break;
exit();
$socket = mysql_connect('localhost', $user, $pass); 
mysql_close($socket) ; 
?>
