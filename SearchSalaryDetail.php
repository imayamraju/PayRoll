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
<BODY>
<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<?php
		
		$EmpName = $_GET['DisplayName'];

		$DispField = $_GET['DisplayField'];

		$DispID = $_GET['DisplayId'];

		$DispNames = $_GET['DisplayDept'];

		$But_Value = $_GET['DispSearch'];

		$start = $_GET['Sal_Start'];
		
		$end = $_GET['Sal_End'];

		$socket = mysql_connect('localhost', $user, $pass);

		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
	?>
<?php
	if($But_Value == "Search")
{
?>
	<table border="0" width="700" cellspacing="1" cellpadding="4">
              <tr class=header>
			  <td width="75" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Emp Name</p>
                </td>
	       <td width="80" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
                </td>
                <td width="40" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Account No</p>
                </td>
               <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Department</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Designation</p>
                </td>
                <td width="45" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
                </td>
                <td width="100" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Date of Joining</td>

 	<?php
//		$query = "select * from employee";
		
		$query = "select * from employee where GROSS_SALARY >= '$start' AND GROSS_SALARY <= '$end'";

		$result = mysql_query($query);

//		if(!$result)
//			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");

			echo("<td width='80' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='75' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("<td width='60' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("<td width='60' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
			echo("<td width='100' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");

			echo("</tr>");
		}

		mysql_free_result($result);
	
		mysql_close($socket);
	?>
            </table>
<?php
}
else
{
?>
	<table border="0" width="1239" cellspacing="1" cellpadding="4">
              <tr class=header>
			  <td width="150" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Emp Id</p>
                </td>
	       <td width="170" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Name</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
               <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Working Days</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Present days</p>
                </td>
                <td width="150" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Earned Salary</td>
                <td width="65" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Basic+DA</p>
                </td>
                <td width="44" bgcolor="#C0C0C0" align = "center" valign="middle">
                  <p align="center">LTA</p>
                </td>
					<td width="62" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">HRA</p>
                </td>
				<td width="66" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">CCA</p>
                </td>
				
				<td width="70" bgcolor="#COCOCO" valign="middle">
					<p align="center">Special Allow</p>
					</td>
				<td width="78" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">M.R</p>
                </td>
				
				<td width="35" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Salary Total</p>
                </td>
								<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">PF</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">ESI</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Prof Tax</p>
                </td>
				
				<td width="33" bgcolor="#COCOCO" valign="middle">
				  <p align="center">TDS</p>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Details</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Advance</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Dedution Total</p>
				</td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Net Salary</p>
                </td>
	
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">IT-Acc</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">PF-Acc</p>
                </td>

              </tr>
	<?php

		if($EmpName == "NAMES")		
		{
			$query = "select * from paydetails1 where NAME = '$DispField' AND EMP_NO = '$DispID'";
		}
		else if($DispField == "DEPART")
		{
			$query = "select * from paydetails1 where NAME = '$DispNames'";
		}
		$result = mysql_query($query);
		if(!$result)
			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");
			
			echo("<td width='44' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='150'bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[7]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[8]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[9]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[10]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[11]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[25]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[12]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[14]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[21]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[13]</td>");
			
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[15]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[16]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[22]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[20]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[17]</td>");
			
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[19]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[18]</td>");
			//echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[23]</td>");
			//echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[24]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[27]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[28]</td>");
			echo("</tr>");
		}

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
