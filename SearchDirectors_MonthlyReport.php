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
<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<table border="0" width="1200" cellspacing="1" cellpadding="4" align = 'center'>
              <tr class=header>
				<td width="120" valign="middle" bgcolor="#COCOCO">
				<p align="center">Emp ID</p>
				</td>
                <td width="120" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="150" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">DOJ</p>
                </td>
                <td width="50" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Inc. Amt</p>
                </td>
                <td width="200" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">DOI</p>
                </td>
                 <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Working Days</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Present Days</p>
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
				<td width="100" bgcolor="#COCOCO" valign="middle">
				<p align="center">Special Allow</p>
				</td>
				<td width="100" bgcolor="#COCOCO" valign="middle>
				<p align="center">MTA</p>
				</td>
				<td width="100" bgcolor="#COCOCO" valign="middle">
				<p align="center">LTA</p>
				</td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Earned Salary</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
                </td>
                
                <td width='80' bgcolor='#C0C0C0' valign='middle'>
	        <p align='center'>PF</p>
        	</td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">ESI</p>
                </td>
				<td width="100" bgcolor="#COCOCO" valign="middle">
				<p align="center">Prof Tax</p>
				</td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">TDS</p>
                </td>
				<td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Advance</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
                
              
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Net Salary</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">A/C No.</p>
                </td>
              </tr>

	<?php

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );

		$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND e.GRADE = 'Director' AND p.COMPANY = '$Company'";
	//	echo $query;	
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");
			
		while ($rows = mysql_fetch_array($result))
		{
			$subyear = substr($rows[19], -2);
			
			$MonName = str_pad($rows[18] +1, 2, "0", STR_PAD_LEFT);	

			$Emp_DOJ = substr($rows[0], 0, 6);

			$Emp_DOJ = $Emp_DOJ.substr($rows[0], -2, 2);		

			echo("<tr class = bodytext>");

			echo("<td width='120' bgcolor='#C0C0C0' >$rows[2]</td>");

			echo("<td width='450' bgcolor='#C0C0C0' >$Emp_DOJ</td>");

			if($rows[1] == 0)
				echo("<td width='70' bgcolor='#C0C0C0' >NIL</td>");
			else
				echo("<td width='70' bgcolor='#C0C0C0' >$rows[1]</td>");

			if($rows[19] == 0)
				echo("<td width='65' bgcolor='#C0C0C0' >NIL</td>");
			else
				echo("<td width='65' bgcolor='#C0C0C0' >01-${MonName}-${subyear}</td>");	

			echo("<td width='70' bgcolor='#C0C0C0' >$rows[3]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[4]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[5]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[6]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[7]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[8]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[9]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[10]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[12]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[13]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[14]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[11]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[15]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[16]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[17]</td>");
		//	echo("<td width='70' bgcolor='#C0C0C0' >$rows[18]</td>");				
			echo("</tr>");
		}
		mysql_free_result($result);

		$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.ADVANCE),sum(p.NET_SAL) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.GRADE = 'Director' AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		$rows = mysql_fetch_array($result);

		echo("<tr class = header>");

		echo("<td width='70' bgcolor='#C0C0C0' colspan  = 6  valign='middle'>Total</td>");

		if($rows[0] == "") $rows[0] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[0]</td>");

		if($rows[1] == "") $rows[1] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[1]</td>");

		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

		if($rows[2] == "") $rows[2] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[2]</td>");

		if($rows[3] == "") $rows[3] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[3]</td>");

		if($rows[4] == "") $rows[4] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[4]</td>");

		if($rows[5] == "") $rows[5] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[5]</td>");

		if($rows[6] == "") $rows[6] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");

		if($rows[7] == "") $rows[7] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");

		if($rows[8] == "") $rows[8] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");

		if($rows[9] == "") $rows[9] = 0;
		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[9]</td>");

		//if($rows[10] == "") $rows[10] = 0;
		//echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>$rows[10]</td>");

		echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");

		echo("</tr>");
		
		mysql_free_result($result);

		mysql_close($socket);

	?>
        </table>

<BR><BR><BR>

<?php

	echo "<table border='1' width='250' cellspacing='0' cellpadding='4' align = 'center'>";

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;Gross &nbsp; Salary&nbsp;=&nbsp;Rs. $rows[2]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>Earned Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[3]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IT&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[5]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[6]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pro Tax&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[7]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[8]</td>");
	echo("</tr>");

	echo("<tr class=header>");
       		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[9]</td>");
	echo("</tr>");

	echo "</table>";
?>

</DIV>
</FORM>
</BODY>
</HTML>
