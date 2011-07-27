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
<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<table border="0" width="1200" cellspacing="1" cellpadding="4" align = 'center'>
              <tr class=header>
                <td width="120" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="200" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">DOJ</p>
                </td>
                <td width="50" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Inc. Amt</p>
                </td>
                <td width="200" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">DOI</p>
                </td>
                 <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Total Days</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Days present</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Basic</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">DA</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">HRA</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">CCA</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Total Gross</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Earned Salary</p>
                </td>
                <td width='80' bgcolor='#C0C0C0' valign='middle'>
	        <p align='center'>PF</p>
        	</td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">IT</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Pro.Tax</p>
                </td>
               	<td width='80' bgcolor='#C0C0C0' valign='middle'>
	        <p align='center'>ESI</p>
        	</td>
              <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Adv.</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Net Salary</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">A/C No.</p>
                </td>
              </tr>

	<?php

	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );

		//$DOI_Query = "select `MONTH`,`YEAR` from incrementdetails ";

		$query = "select * from department where COMPANY = '".$Company."'";
		
		$dept_result = mysql_query($query);

		while ($row = mysql_fetch_array($dept_result))
		{
			echo("<tr class = header>");
			if($Company == "A")echo("<td width='44' colspan  = 20 bgcolor='#C0C0C0' align = 'center' valign='middle'>$row[0]</td>");
			echo("</tr>");

			if($Company == "A")
			{
				$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.ESI,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails p where e.DEPT = '$row[0]' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
				$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.ESI,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";				
			}

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			

			while ($rows = mysql_fetch_array($result))
			{
				$subyear = substr($rows[20], -2);
				
				$MonName = str_pad($rows[19] +1, 2, "0", STR_PAD_LEFT);

				echo("<tr class = bodytext>");
				echo("<td width='120' bgcolor='#C0C0C0' >$rows[2]</td>");
				echo("<td width='65' bgcolor='#C0C0C0' >$rows[0]</td>");
				if($rows[1] == 0)
					echo("<td width='44' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='44' bgcolor='#C0C0C0' >$rows[1]</td>");
				if($rows[20] == 0)
					echo("<td width='65' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='65' bgcolor='#C0C0C0' >01-${MonName}-${subyear}</td>");	
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[3]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[4]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[5]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[6]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[7]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[8]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[9]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[10]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[12]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[13]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[14]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[11]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[15]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[16]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[17]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[18]</td>");				
				echo("</tr>");

			}
			mysql_free_result($result);
	
			if($Company == "A")
			{
				$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.PRO_TAX),sum(p.ESI),sum(p.NET_SAL) from employee e, paydetails p where e.DEPT = '$row[0]' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
				$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.PRO_TAX),sum(p.ESI),sum(p.NET_SAL) from employee e, paydetails p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}

			$result = mysql_query($query);
		
			while ($rows = mysql_fetch_array($result))
			{
				echo("<tr class = header>");
				echo("<td width='44' bgcolor='#C0C0C0' colspan  = 6  valign='middle'>Total</td>");
				if($rows[0] == "") $rows[0] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[0]</td>");
				if($rows[1] == "") $rows[1] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[1]</td>");

				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

				if($rows[2] == "") $rows[2] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[2]</td>");
				if($rows[3] == "") $rows[3] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[3]</td>");
				if($rows[4] == "") $rows[4] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[4]</td>");
				if($rows[5] == "") $rows[5] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[5]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
				if($rows[6] == "") $rows[6] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");
				if($rows[7] == "") $rows[7] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
				if($rows[8] == "") $rows[8] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

				echo("</tr>");
			}		
			mysql_free_result($result);
			
			if($Company == "M") break;

		}
		if($Company == "A")
		{
			$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.PRO_TAX),sum(p.ESI),sum(p.NET_SAL) from employee e, paydetails p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='44' bgcolor='#C0C0C0' colspan  = 6  valign='middle'>Total</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[0]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[1]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[2]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[3]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[4]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[5]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

			echo("</tr>");
		}

			mysql_free_result($dept_result);
	
		mysql_close($socket);

	?>
        </table>

<BR><BR><BR>
<?php
if($Company == "A")
{
?>

<table border="0" width="1020" cellspacing="0" cellpadding="4" align = 'Center'>
<tr>
<td align = 'left' valign = 'top' width = 520>
	<table border="1" width="300" cellspacing="0" cellpadding="4" align = 'right'>
	<?php
	
		$Total12 = ceil($rows[0] + $rows[1]);
	
		$Total367 = ceil((($rows[0] + $rows[1]) * 0.0367));

		$Total833 = ceil((($rows[0] + $rows[1]) * 0.0833));

		$Total110 = ceil((($rows[0] + $rows[1]) * 0.0110));

		$Total050 = ceil((($rows[0] + $rows[1]) * 0.0050));

		$Total001 = ceil((($rows[0] + $rows[1]) * 0.0001));

		$Total = $Total12 + $Total367 + $Total833 +$Total110 + $Total050 + $Total001;

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;12%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total12</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;3.67%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total367</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.10&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;8.33%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total833</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;1.10%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total110</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.21&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;0.50%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total050</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.22&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;0.01%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total001</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.$Total</td>");
		echo("</tr>");

		echo "</table></td>";
		
		echo "<td align = 'Right' valign = 'top'><table border='1' width='300' cellspacing='0' cellpadding='4' align = 'left'>";

		$ESI = ceil((($rows[7] / 1.75) * 4.75));

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employee's Contribution = Rs.$rows[7]</td>");
		echo("</tr>");
		echo("<tr class=header>");
        	echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employer's Contribution = Rs.$ESI</td>");
		echo("</tr>");
	?>

</table>
</td>
</tr>
</table>

<?php
}
?>

</DIV>
</FORM>
</BODY>
</HTML>
