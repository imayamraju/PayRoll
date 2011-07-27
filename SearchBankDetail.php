<?php

	include 'ServerDetail.php';
	session_start();
	$Company = $_SESSION['company'];
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>

<script>

</script>
<BODY bgcolor="#C0C0C0">
<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
              <tr class=header>
				<td width="150" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="150" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
                </td>
                <td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Account No</p>
                </td>
                <td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Amount</p>
                </td>
               </tr>

	<?php

		$Desg = "";
		$GSal = "";
		$ESal = "";
		$AcNo = "";

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$socket = mysql_connect('localhost', $user, $pass);

		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
		
		$query = "select p.NAME,p.EMP_NO,e.ACNO,p.NET_SAL from  employee e,paydetails1 p  where e.ACNO != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");

			echo("<td width='150' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='150' bgcolor='#C0C0C0' >$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("</tr>");

		}
		mysql_free_result($result);

		$query = "select sum(p.NET_SAL) from paydetails1 p,employee e where e.ACNO != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='44' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
		echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");
		$query = "select p.NAME,p.EMP_NO,e.ACNO,p.NET_SAL from  employee e,paydetails1 p  where e.ACNO = '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		//$query = "select e.ACNO,p.NAME,p.p.NET_SAL from  paydetails1 p,employee e where e.ACNO = '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");

			echo("<td width='150' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='150' bgcolor='#C0C0C0' >$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("</tr>");
		}
		mysql_free_result($result);

		if($Company == "A")
		{
			$query = "select sum(p.NET_SAL) from  paydetails1 p,employee e where e.ACNO = '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='44' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");
		}
	//	mysql_free_result($result);
		mysql_close($socket);


	?>

            </table>

</DIV>
</FORM>
</BODY>
</HTML>
