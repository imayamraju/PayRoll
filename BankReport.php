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
<BODY>

	<?php

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$MonthName=array("January","Feburary","March","April","May","June","July","August","September","October","November","December");

		if($Company == 'A')
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>AVITRONICS SYSTEMTECH(I) PVT LTD -  SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
		else if($Company == 'M')
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS SYSTEMTECH PVT LTD - SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
		else if($Company == 'I')
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS INFOTECH PVT LTD - SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}

		else
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS BUSINESS STRATEGIES PVT LTD - SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
	?>

<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<table border="1" width="590" cellspacing="0" cellpadding="4" align = 'center' style = 'border'>
              

	<?php


		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
		
		$query = "select p.NAME,p.EMP_NO,e.ACNO,p.NET_SAL from employee e, paydetails1 p where e.ACNO != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

		while ($rows = mysql_fetch_array($result))
		{
			if(($iRecCount % 40) == 0)
			{
				echo("<tr class=header >");
                		echo("<td width='150' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
                		echo("</td>");
						echo("<td width='150' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("</td>");
                		echo("<td width='70' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Account
						No");
                		echo("</td>");
                		echo("<td width='70' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Amount");
                		echo("</td>");
               			echo("</tr>");
			}
			echo("<tr class = bodytext>");
			echo("<td width='150' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='150' bgcolor='#C0C0C0' >$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("</tr>");
			$iRecCount++;
		}
		mysql_free_result($result);

		$query = "select sum(p.NET_SAL) from employee e, paydetails1 p where e.ACNO != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='70' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
		echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");
	?>

            </table>
	<table border="1" width="590" cellspacing="0" cellpadding="4" align = 'center' style = 'border'>
	
	<?php

		$query = "select e.ACNO,p.NAME,p.NET_SAL from employee e, paydetails1 p where e.ACNO = '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

		while ($rows = mysql_fetch_array($result))
		{
			if(($iRecCount % 40) == 0)
			{	
				echo ("<br style='PAGE-BREAK-BEFORE:always'>");
				//echo ("<p style=\"PAGE-BREAK-BEFORE:alwayas\">\n");

				/*echo ("<DIV CLASS="PAGEBREAK">)
				echo ("</DIV>");*/

				echo("<tr class=header >");
                		echo("<td width='150' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Name");
                		echo("</td>");
                		echo("<td width='10' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("AccountNo");
                		echo("</td>");
                		echo("<td width='10' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Amount");
                		echo("</td>");
               			echo("</tr>");
			}
			echo("<tr class = bodytext>");
			echo("<td width='150' bgcolor='#C0C0C0' >$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >NIL</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("</tr>");
			$iRecCount++;
		}

		mysql_free_result($result);

		if($Company == "A")
		{
			$query = "select sum(p.NET_SAL) from employee e, paydetails1 p where e.ACNO = '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='70' bgcolor='#C0C0C0' colspan  = 2  valign='middle'>Total</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");
		}
		mysql_free_result($result);
	
		mysql_close($socket);


	?>

            </table>

</DIV>
</FORM>
</BODY>
</HTML>
