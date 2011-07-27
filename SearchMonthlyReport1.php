<?php

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
<form name = 'frmRecEntry'>
<DIV ID = 'list'>

	<table border="0" width="1100" cellspacing="1" cellpadding="4" align = 'center'>
              <tr class=header>
				<td width="150" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="150" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
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
                  <p align="center">LTA</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">HRA</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">CCA</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Spec Allow</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">M.R</p>
                </td>
				
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Earned Salary</p>
                </td>
                <td width='80' bgcolor='#C0C0C0' valign='middle'>
				<p align='center'>PF</p>
				</td>
				<td width='80' bgcolor='#C0C0C0' valign='middle'>
				<p align='center'>ESI</p>
				</td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Prof Tax</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">TDS</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Advan</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Deduct</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
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

		//$query = "select * from department where DEPARTMENT  != 'Operations' AND COMPANY = '".$Company."'";

		//$query = "select * from department where COMPANY = '".$Company."'";

		
		//$dept_result = mysql_query($query);

		//while ($row = mysql_fetch_array($dept_result))
		//{
			//echo("<tr class = header>");
			//if($Company == 'A'||$Company == 'I'||$Company == 'B'||$Company == 'M')
				//echo("<td width='44' colspan  = 21 bgcolor='#C0C0C0' align = 'center' valign='middle'>$row[0]</td>");
			//echo("</tr>");

			if($Company == 'A'||$Company == 'I'||$Company == 'B')
			{
				$query = "select p.NAME,p.EMP_NO,e.DATE_OF_JOINING,i.AMOUNT,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.LTA,p.HRA,p.CCA,p.SPECIALALLOW,p.MR,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.ESI,p.TDS,p.OTHERS,p.ADVANCE,p.DEDUCT_TOTAL,p.GROSS_SALARY,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";
				//$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.ESI,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where e.DEPT = '$row[0]' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
				$query = "select p.NAME,p.EMP_NO,e.DATE_OF_JOINING,i.AMOUNT,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.LTA,p.HRA,p.CCA,p.SPECIALALLOW,p.MR,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.ESI,p.TDS,p.OTHERS,p.ADVANCE,p.DEDUCT_TOTAL,p.GROSS_SALARY,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";
			}

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			

			while ($rows = mysql_fetch_array($result))
			{
				$subyear = substr($rows[24], -2);
				
				$MonName = str_pad($rows[23] +1, 2, "0", STR_PAD_LEFT);		
			
				$Emp_DOJ = substr($rows[2], 0, 6);

				$Emp_DOJ = $Emp_DOJ.substr($rows[2], -2, 2);		

				echo("<tr class = bodytext>");
				echo("<td width='120' bgcolor='#C0C0C0' >$rows[0]</td>");
				echo("<td width='120' bgcolor='#C0C0C0' >$rows[1]</td>");
				echo("<td width='100' bgcolor='#C0C0C0' >$Emp_DOJ</td>");
				if($rows[3] == 0)
					echo("<td width='44' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='44' bgcolor='#C0C0C0' >$rows[3]</td>");
				if($rows[24] == 0)
					echo("<td width='65' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='65' bgcolor='#C0C0C0' >01-${MonName}-${subyear}</td>");	
				//echo("<td width='44' bgcolor='#C0C0C0' >$rows[2]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[4]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[5]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[6]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[7]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[8]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[9]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[10]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[11]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[12]</td>");
				
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[14]</td>");
				
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[15]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[13]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[16]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[17]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[18]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[19]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[20]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[21]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' >$rows[22]</td>");

				echo("</tr>");

			}
			mysql_free_result($result);
	
			if($Company == "A" ||$Company == "I"||$Company == "B"||$Company == "M")
			{
				$query = "select sum(p.BASIC),sum(p.LTA),sum(p.HRA),sum(p.CCA),sum(p.SPECIALALLOW),sum(p.MR),sum(p.EARNED_SALARY),sum(p.PF),sum(p.ESI),sum(p.PRO_TAX),sum(p.TDS),sum(p.OTHERS),sum(p.ADVANCE),sum(p.DEDUCT_TOTAL),sum(p.GROSS_SALARY),sum(p.NET_SAL) from employee e, paydetails1 p where  p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
			
				$query = "select sum(p.BASIC),sum(p.LTA),sum(p.HRA),sum(p.CCA),sum(p.SPECIALALLOW),sum(p.MR),sum(p.EARNED_SALARY),sum(p.PF),sum(p.ESI),sum(p.PRO_TAX),sum(p.TDS),sum(p.OTHERS),sum(p.ADVANCE),sum(p.DEDUCT_TOTAL),sum(p.GROSS_SALARY),sum(p.NET_SAL) from employee e, paydetails1 p where  p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
				//$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.FLEXI_ALLOW),sum(p.ADVANCE),sum(p.NET_SAL) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}

			$result = mysql_query($query);
		
			while ($rows = mysql_fetch_array($result))
			{
				echo("<tr class = header>");
				echo("<td width='44' bgcolor='#C0C0C0' colspan  = 7  valign='middle'>Total</td>");
				if($rows[0] == "") $rows[0] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[0]</td>");
				if($rows[1] == "") $rows[1] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[1]</td>");

				//echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
				//echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

				if($rows[2] == "") $rows[2] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[2]</td>");
				if($rows[3] == "") $rows[3] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[3]</td>");
				if($rows[4] == "") $rows[4] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[4]</td>");
				if($rows[5] == "") $rows[5] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[5]</td>");
				if($rows[6] == "") $rows[6] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");
				if($rows[7] == "") $rows[7] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");
				if($rows[8] == "") $rows[8] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");
				if($rows[9] == "") $rows[9] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[9]</td>");
				if($rows[10] == "") $rows[10] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[10]</td>");
				if($rows[11] == "") $rows[11] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[11]</td>");
				if($rows[12] == "") $rows[12] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[12]</td>");
				if($rows[13] == "") $rows[13] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[13]</td>");
				if($rows[14] == "") $rows[14] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[14]</td>");
				if($rows[15] == "") $rows[15] = 0;
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[15]</td>");
				echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

				echo("</tr>");
			}		
			mysql_free_result($result);
			
			if($Company == "M")
			{
				$query = "select sum(p.BASIC),sum(p.LTA),sum(p.HRA),sum(p.CCA),sum(p.SPECIALALLOW),sum(p.MR),sum(p.EARNED_SALARY),sum(p.PF),sum(p.ESI),sum(p.PRO_TAX),sum(p.TDS),sum(p.OTHERS),sum(p.ADVANCE),sum(p.DEDUCT_TOTAL),sum(p.GROSS_SALARY),sum(p.NET_SAL) from employee e, paydetails1 p where  p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
				//$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.FLEXI_ALLOW),sum(p.ADVANCE),sum(p.NET_SAL) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
				$result = mysql_query($query);
				$rows =mysql_fetch_array($result);
				break;
			}

		//}
	
		if($Company == "A" ||$Company == "I"||$Company == "B")
		{
			$query = "select sum(p.BASIC),sum(p.LTA),sum(p.HRA),sum(p.CCA),sum(p.SPECIALALLOW),sum(p.MR),sum(p.EARNED_SALARY),sum(p.PF),sum(p.ESI),sum(p.PRO_TAX),sum(p.TDS),sum(p.OTHERS),sum(p.ADVANCE),sum(p.DEDUCT_TOTAL),sum(p.GROSS_SALARY),sum(p.NET_SAL) from employee e, paydetails1 p where  p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			//$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.ESI),sum(p.ADVANCE),sum(p.NET_SAL),sum(p.ESI_CMP) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		/*
			echo("<tr class = header>");
			//echo("<td width='44' bgcolor='#C0C0C0' colspan  = 6  valign='middle'>Total</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[0]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[1]</td>");
			//echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			//echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[2]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[3]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[4]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[5]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[9]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[10]</td>");
			
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("</tr>");
			*/
		} 


			//mysql_free_result($dept_result);
	
		mysql_close($socket);

	?>
        </table>

<BR><BR><BR>

<?php

	if($Company == "M")
	{

		echo "<table border='1' width='300' cellspacing='0' cellpadding='4' align = 'center'>";

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;Total &nbsp; Salary&nbsp;=&nbsp;Rs. $rows[14]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Earned Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[6]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PF&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[7]</td>");
		echo("</tr>");
		
		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESI&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[8]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pro Tax&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[9]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[11]</td>");
		echo("</tr>");

		

		

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[12]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[15]</td>");
		echo("</tr>");

		echo "</table></td>";


		
		echo "</table>";

	}
?>

<?php
if($Company == "A" ||$Company == "I"||$Company == "B")
{
?>

<table border="0" width="1020" cellspacing="0" cellpadding="4" align = 'Center'>
<tr>
<td align = 'left' valign = 'top' width = 520>
	<table border="1" width="300" cellspacing="0" cellpadding="4" align = 'center'>
	<?php
	
		

		echo "<table border='1' width='300' cellspacing='0' cellpadding='4' align = 'center'>";

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;Total &nbsp; Salary&nbsp;=&nbsp;Rs. $rows[14]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Earned Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[6]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PF&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[7]</td>");
		echo("</tr>");
		
		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESI&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[8]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pro Tax&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[9]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[11]</td>");
		echo("</tr>");

		

		

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[12]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[15]</td>");
		echo("</tr>");

		echo "</table></td>";

//-------------------------------------
/*
		echo "</tr><tr>";

		echo "<td align = 'center' valign = 'top'><table border='1' width='300' cellspacing='0' cellpadding='4' align = 'center'>";
		
		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employee's Contribution = Rs. $rows[8]</td>");
		echo("</tr>");
		echo("<tr class=header>");
        	echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employer's Contribution = Rs. $rows[11]</td>");
		echo("</tr></table>");
		*/
	?>
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
