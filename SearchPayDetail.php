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

function checkAll()
{
	for(i = 1;i < frmRecEntry.Chk.length;i++)
	{
		window.document.all.Chk[i].checked = window.document.all.Chk[0].checked;
	}

}
</script>
<BODY bgcolor="#C0C0C0">



<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
<table border="0" width="1500" cellspacing="1" cellpadding="4" bgcolor="#ffffff">
              <tr class=header>
		<TD  bgcolor="#C0C0C0">
		<input type='checkbox' name='Chk' value = 0 onclick = 'checkAll()'>
		</TD>
                <td width="200" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Emp Name</p>
                </td>
				<td width="192" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
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
                <td width="70" bgcolor="#C0C0C0" align = "center" valign="middle">
                  <p align="center">LTA</p>
                </td>
		<td width="62" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">HRA</p>
                </td>
		<td width="66" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">CCA</p>
                </td>
		<td width="78" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Special Allow</p>
                </td>
		<td width="78" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">M.R</p>
                </td>
		<td width="35" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Salary Total</p>
                </td>
				<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">PF</p>
                </td>
				<td width='70' bgcolor='#C0C0C0' valign='middle'>
                		<p align='center'>ESI</p></td>
						</td>
				<?php /*
			if($Company == 'A')
			{
				echo("<td width='70' bgcolor='#C0C0C0' valign='middle'>");
                		echo("<p align='center'>ESI</p></td>");
			}
		*/?>

		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Prof Tax</p>
                </td>
		
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">TDS</p>
                </td>
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
				<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Details</p>
                </td>
				<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Advance</p>
                </td>
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Dedution Total</p>
                </td>
				<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
                </td>
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Net Salary</p>
                </td>
		
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">IT-Acc</p>
                </td>
		
		<td width="70" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">PF-Acc</p>
               
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
		
		$query = "select * from paydetails1 where `MONTH` = '$cMon' AND `YEAR` = '$cYer' AND COMPANY = '$Company'";
//echo $query;
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");

			echo("<td width='70' bgcolor='#C0C0C0' ><input type='checkbox' name='Chk' value='$rows[0]'></td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='200' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[7]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[8]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[9]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[10]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[11]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[25]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[12]</td>");
			$rows[14] = ($rows[14] == 0) ? "NIL" : $rows[14];
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[14]</td>");
			$rows[21] = ($rows[21] == 0) ? "N/A" : $rows[21];
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[21]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[13]</td>");
			$rows[15] = ($rows[15] == 0) ? "NIL" : $rows[15];
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[15]</td>");
			$rows[16] = ($rows[16] == 0) ? "NIL" : $rows[16];
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[16]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[22]</td>");
			$rows[20] = ($rows[20] == 0) ? "NIL" : $rows[20];
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[20]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[17]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[19]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[18]</td>");
			//echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[24]</td>");
			//echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[26]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[27]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[28]</td>");
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
