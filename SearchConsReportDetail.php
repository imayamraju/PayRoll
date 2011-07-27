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
 
	<?php
	
		$Count = 1;
		
		$No = 1;

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$Cat = $_GET['Cat'];

		$socket = mysql_connect('localhost', $user, $pass);

		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
	?>
<?php
	if($Cat == "1")
{
?>

	<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
	<tr class=header>
		<td width="100" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp Name</p>
		</td>
		<td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="25" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Pro.Tax</p>
		</td>
	</tr>

	<?php
		
		$query = "select e.NAME,e.EMP_NO,p.PRO_TAX from employee e, paydetails1 p where e.NAME = p.NAME AND p.MONTH = '$cMon' AND p.PRO_TAX != '0'AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");
			echo("<td width='130' bgcolor='#C0C0C0' align = 'LEFT' valign='middle'>$rows[0]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("</tr>");

		}
		mysql_free_result($result);

		$query = "select sum(p.PRO_TAX) from employee e, paydetails1 p where e.NAME = p.NAME AND p.MONTH = '$cMon' AND p.PRO_TAX != '0'AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='25' bgcolor='#C0C0C0' colspan  = 2  valign='middle'>Total</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");

		mysql_free_result($result);

		mysql_close($socket);

	?>

	</table>
	<?php
	}
	else if($Cat == "2")

	{
	?>
		<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
        <tr class=header>
		<td width="100" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp Name</p>
		</td>
        <td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="80" bgcolor="#C0C0C0" valign="middle">
		<p align="center">PF No</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">PF Amount</p>
		</td>

		</tr>

		<?php
		
			$query = "select e.NAME,e.EMP_NO,e.PFNO,p.PF from employee e, paydetails1 p where e.NAME = p.NAME AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				echo("<tr class = bodytext>");

				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='80' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.PF) from employee e, paydetails1 p where e.NAME = p.NAME AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);

			
			echo("<tr class = header>");
			echo("<td width='40' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align ='center' valign='middle'>$rows[0]</td>");
			//echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");

			mysql_free_result($result);

			mysql_close($socket);

		?>

        </table>
		<?php
		}
		else if($Cat == "3")
		{

		?>

		<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
		<tr class=header>
		<td width="100" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp Name</p>
		</td>
		<td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="75" bgcolor="#C0C0C0" valign="middle">
		<p align="center">ESI No</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Emp ESI</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Com ESI</p>
		</td>
		<td width="70" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Total ESI</p>
		</td>
		</tr>

		<?php
		
			$query = "select e.NAME,e.EMP_NO,e.ESINO,p.ESI,p.ESI_CMP from employee e, paydetails1 p where e.NAME = p.NAME 
			AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$TotalESI = $rows[3] + $rows[4];
				echo("<tr class = bodytext>");

				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalESI</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.ESI),sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = p.NAME 
			AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);
			$GrdTot_ESI = $rows[0] + $rows[1];
			
			echo("<tr class = header>");
			echo("<td width='40' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");

			echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_ESI</td>");
			echo("</tr>");

			mysql_free_result($result);

			mysql_close($socket);

		?>
         </table>
		<?php
		}
		else if($Cat == "4")
		{
		?>

		<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
		<tr class=header>
		<td width="100" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp Name</p>
		</td>
		<td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">TDS Amount</p>
		</td>
		</tr>

		<?php
		
			$query = "select e.NAME,e.EMP_NO,p.TDS from employee e, paydetails1 p where e.NAME = p.NAME AND 	p.TDS != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				echo("<tr class = bodytext>");

				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.TDS) from employee e, paydetails1 p where e.NAME = p.NAME AND 
			p.TDS != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);
			
			echo("<tr class = header>");
			echo("<td width='40' bgcolor='#C0C0C0' colspan  = 2  valign='middle'>Total</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");

			mysql_free_result($result);

			mysql_close($socket);


		?>
		</table>
		<?php
		}
		else if($Cat == "5")
		{
		?>
		<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
		<tr class=header>
		<td width="100" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp Name</p>
		</td>
		<td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="80" bgcolor="#C0C0C0" valign="middle">
		<p align="center">PF No</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Emp PF</p>
		</td>
		<td width="50" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Com PF</p>
		</td>
		<td width="60" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Total PF</p>
		</td>

		</tr>

		<?php
		
			$query = "select e.NAME,e.EMP_NO,e.PFNO,p.PF,p.PFCOM from employee e, paydetails1 p where e.NAME = p.NAME AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$TotalPF = $rows[3]+ $rows[4];
				echo("<tr class = bodytext>");

				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='85' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalPF</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.PF),sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = p.NAME	AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);

			$GrdTotal_PF = $rows[0] + $rows[1];
			
			echo("<tr class = header>");
			echo("<td width='35' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='35' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("<td width='35' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTotal_PF</td>");
			echo("</tr>");

			mysql_free_result($result);

			mysql_close($socket);

		?>

        </table>
		<?php
		}
		else if($Cat == 6)
		{
		?>

		<table border="0" width="1000" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
		<tr class=header> 
		<td width="20" valign="middle" bgcolor="#C0C0C0">
			<p align="center">S.No</p>
			</td>		
		<td width="100" valign="middle" bgcolor="#COCOCO">
		<p align="center">Emp Name</p>
		</td>
		<td width="70" valign="middle" bgcolor="#C0C0C0">
		<p align="center">Emp ID</p>
		</td>
		<td width="80" bgcolor="#C0C0C0" valign="middle">
		<p align="center">PF No</p>
		</td>
		<td width="45" bgcolor="#C0C0C0" valign="middle">
		<p align="center">Comp PF</p>
		</td>
		
		<?php
		
			$query = "select e.NAME,e.EMP_NO,e.PFNO,p.PFCOM from paydetails1 p, employee e where p.PF != '0' AND e.NAME = p.NAME AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.PFNO != '0' AND e.CATEGORY ='Current' AND p.COMPANY = '$Company'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			$No=1;
			while ($rows = mysql_fetch_array($result))
			{
				
				echo("<tr class = bodytext>");
				echo("<td width='20' bgcolor='#C0C0C0' align = 'left' valign='middle'>$No</td>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='80' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("</tr>");
				$No++;

			}
			mysql_free_result($result);

			$query = "select sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = p.NAME	AND p.PF != '0'  AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);

			$GrdTotal_PF = $rows[0] + $rows[1];
			
			echo("<tr class = header>");
			echo("<td width='45' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
			echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			
			echo("</tr>");

			mysql_free_result($result);


			mysql_close($socket);

			?>

			</table>
			<?php
			}
			else 
			{
			?>

			<table border="0" width="690" cellspacing="1" cellpadding="4" align = 'center' bgcolor="#ffffff">
			<tr class=header> 
			<td width="30" valign="middle" bgcolor="#C0C0C0">
			<p align="center">S.No</p>
			</td>			
			<td width="100" valign="middle" bgcolor="#C0C0C0">
			<p align="center">Emp Name</p>
			</td>
			<td width="70" valign="middle" bgcolor="#C0C0C0">
			<p align="center">Emp ID</p>
			</td>
			<td width="80" bgcolor="#C0C0C0" valign="middle">
			<p align="center">ESI No.</p>
			</td>
			
			<td width="50" bgcolor="#C0C0C0" valign="middle">
			<p align="center">Comp ESI</p>
			</td>
			</tr>
			<?php
			
				$Count=1;
		
				$query = "select e.NAME,e.EMP_NO,e.ESINO,p.ESI_CMP from employee e, paydetails1 p where e.NAME = p.NAME AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
				
				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{	
					
					echo("<tr class = bodytext>");
					echo("<td width='20' bgcolor='#C0C0C0' align = 'left' valign='middle'>$Count</td>");
					echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
					echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
					echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					
					
					echo("</tr>");
					$Count++;

				}
				mysql_free_result($result);

			$query = "select sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = p.NAME AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);

			
			echo("<tr class = header>");
			echo("<td width='45' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
			echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			
			echo("</tr>");

			mysql_free_result($result);

			mysql_close($socket);

	?>

    </table>
<?php
		}

?>


</DIV>
</FORM>
</BODY>
</HTML>
