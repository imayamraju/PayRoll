<?php

	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];
	//echo $Company; 

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
<BODY bgcolor='#C0C0C0'>

<?php

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$MonthName=array("January","Feburary","March","April","May","June","July","August","September","October","November","December");

		if($Company == 'A')
		{
			echo "<p align='center' class=header>AVITRONICS SYSTEMTECH(I) PVT LTD SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
		else if($Company == 'M')
		{
			echo "<p align='center' class=header>MELTRONICS SYSTEMTECH PVT LTD SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
		else if($Company == 'I')
		{
			echo "<p align='center' class=header>MELTRONICS INFOTECH PVT LTD SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
		else
		{
			echo "<p align='center' class=header>MELTRONICS BUSINESS  STRATEGIES SALARY FOR THE MONTH OF $MonthName[$cMon] $cYer</p>";
		}
?>

<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 	<?php
	function InsertHeader($RowCnt)
	{
		if($RowCnt != 0)
			echo "<br>";
		echo "</Table><table border='1' width='1050' cellspacing='0' cellpadding='4' align = 'center' bgcolor='#FFFFFF'>";
              	echo "<tr class=header>";
                echo "<td width='120' valign='middle' bgcolor='#C0C0C0'>";
                  echo "<p align='center'>Emp Name</p>";
                echo "</td>";
				echo "<td width='120' valign='middle' bgcolor='#C0C0C0'>";
                  echo "<p align='center'>Emp ID</p>";
                echo "</td>";
                echo "<td width='400' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>DOJ</p>";
                echo "</td>";
                echo "<td width='80' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Inc. Amt</p>";
                echo "</td>";
                echo "<td width='400' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>DOI</p>";
                echo "</td>";
                 echo "<td width='40' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Total Days</p>";
                echo "</td>";
                echo "<td width='40' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Days prtd</p>";
                echo "</td>";
                echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Basic+DA</p>";
                echo "</td>";
                echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>LTA</p>";
                echo "</td>";
                echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>HRA</p>";
                echo "</td>";
                echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>CCA</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>SPECIALW</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>M.R</p>";
                echo "</td>";
                
                echo "<td width='80' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Earned Salary</p>";
                echo "</td>";
                echo "<td width='80' bgcolor='#C0C0C0' valign='middle'>";
	        echo "<p align='center'>PF</p>";
       		echo "</td>";
			echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>ESI</p>";
                echo "</td>";
               echo "<td width='80' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>ProTax</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>TDS</p>";
                echo "</td>";
                echo "<td width='60' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Others</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Advan</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Adv.</p>";
                echo "</td>";
				echo "<td width='70' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Deduct_Sal</p>";
                echo "</td>";
                echo "<td width='80' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>Net Salary</p>";
                echo "</td>";
                echo "<td width='100' bgcolor='#C0C0C0' valign='middle'>";
                  echo "<p align='center'>A/C No.</p>";
                echo "</td>";
            	echo "</tr>";
	}
		
		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );

		//$query = "select * from department where DEPARTMENT != 'Operations' AND COMPANY = '".$Company."'";
		
		$query = "select * from department where COMPANY = '".$Company."'";
		
		$dept_result = mysql_query($query);

		$RowCnt = 0;

		while ($row = mysql_fetch_array($dept_result))
		{
			if($RowCnt % 40 == 0) InsertHeader($RowCnt);
			$RowCnt++;
			echo("<tr class = header>");
			if(($Company == 'A') ||($Company == 'I') || ($Company == 'B'))echo("<td width='44' colspan  = 21 bgcolor='#C0C0C0' align = 'center' valign='middle'>$row[0]</td>");
			echo("</tr>");

			if(($Company == 'A') ||($Company == 'I') || ($Company == 'B'))
			{
				$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.ESI,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where e.DEPT = '$row[0]' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
				$query = "select e.DATE_OF_JOINING,i.AMOUNT,p.NAME,p.WORKING_DAYS,p.PRESENT_DAYS,p.BASIC,p.DA,p.HRA,p.CCA,p.GROSS_SALARY,p.EARNED_SALARY,p.PRO_TAX,p.PF,p.IT,p.OTHERS,p.FLEXI_ALLOW,p.ADVANCE,p.NET_SAL,e.ACNO,i.MONTH,i.YEAR from employee e,incrementdetails i, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND e.EMP_NO = i.EMP_NO AND p.COMPANY = '$Company'";				
			}

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			
			while ($rows = mysql_fetch_array($result))
			{
				$subyear = substr($rows[20], -2);

				$MonName = str_pad($rows[19] +1, 2, "0", STR_PAD_LEFT);	
			
				$Emp_DOJ = substr($rows[0], 0, 6);

				$Emp_DOJ = $Emp_DOJ.substr($rows[0], -2, 2);		

				echo("<tr class = bodytext>");
				echo("<td width='120' bgcolor='#C0C0C0' >$rows[2]</td>");
				echo("<td width='400' bgcolor='#C0C0C0' >$Emp_DOJ</td>");

				if($rows[1] == 0)
					echo("<td width='44' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='44' bgcolor='#C0C0C0' >$rows[1]</td>");
				if($rows[20] == 0)
					echo("<td width='400' bgcolor='#C0C0C0' >NIL</td>");
				else
					echo("<td width='400' bgcolor='#C0C0C0' >01-${MonName}-${subyear}</td>");	
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
	
			if(($Company == 'A') ||($Company == 'I') || ($Company == 'B'))
			{
				$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.ESI),sum(p.ADVANCE),sum(p.NET_SAL,sum(p.ESI_CMP) from employee e, paydetails1 p where e.DEPT = '$row[0]' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}
			else
			{
				$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.FLEXI_ALLOW),sum(p.ADVANCE),sum(p.NET_SAL) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
			}

			$result = mysql_query($query);
		
			while ($rows = mysql_fetch_array($result))
			{
				//if($RowCnt % 40 == 0) InsertHeader($RowCnt);
				//$RowCnt++;

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
				echo("</tr>");
			}		
			mysql_free_result($result);
			
			if($Company == "M")
			{
			
				$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.FLEXI_ALLOW),sum(p.ADVANCE),sum(p.NET_SAL) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
				$result = mysql_query($query);
				$rows =mysql_fetch_array($result);
				break;
			}
		}
		if(($Company == 'A') ||($Company == 'I') || ($Company == 'B'))
		{
			$query = "select sum(p.BASIC),sum(p.DA),sum(p.GROSS_SALARY),sum(p.EARNED_SALARY),sum(p.PF),sum(p.IT),sum(p.OTHERS),sum(p.PRO_TAX),sum(p.ESI),sum(p.ADVANCE),sum(p.NET_SAL),sum(p.ESI_CMP) from employee e, paydetails1 p where p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
			$result = mysql_query($query);
		
			$rows =mysql_fetch_array($result);
		
			//if($RowCnt % 40 == 0) InsertHeader($RowCnt);
			//$RowCnt++;

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
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[6]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[7]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[8]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[9]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>$rows[10]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' valign='middle'>&nbsp;</td>");
			echo("</tr>");
		}

			mysql_free_result($dept_result);
	
		mysql_close($socket);

	?>
        </table>

<BR>

<?php
	if($Company == "M")
	{

		echo "<table border='1' width='250' cellspacing='0' cellpadding='4' align = 'center'>";

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;Total &nbsp; Salary&nbsp;=&nbsp;Rs. $rows[2]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Earned Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[3]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PF&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[4]</td>");
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
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flexi.Allow&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[8]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[9]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[10]</td>");
		echo("</tr>");

		echo "</table>";

	}
?>

<?php
if(($Company == 'A') ||($Company == 'I') || ($Company == 'B'))
{
?>

<table border="0" width="1020" cellspacing="0" cellpadding="4" align = 'Center'>
<tr>
<td align = 'left' valign = 'top' width = 520>
	<table border="1" width="300" cellspacing="0" cellpadding="4" align = 'center'>
	<?php
	
		$Total12 = ceil($rows[4]);
	
		$Total367 = ceil(((($rows[4])/12) * 3.67));

		$Total833 = ceil(((($rows[4])/12) * 8.33));

		$Total110 = ceil(((($rows[4])/12) * 1.10));

		$Total050 = ceil(((($rows[4])/12) * 0.5));

		$Total001 = ceil(((($rows[4])/12) * 0.01));


		$Total = $Total12 + $Total367 + $Total833 +$Total110 + $Total050 + $Total001;

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;12%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total12</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;3.67%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total367</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.10&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;8.33%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total833</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;1.10%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total110</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.21&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;0.50%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total050</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>PF A/C No.22&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;0.01%&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total001</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $Total</td>");
		echo("</tr>");

		echo "</table></td><td>";

//-----------------------------------

		echo "<table border='1' width='300' cellspacing='0' cellpadding='4' align = 'left'>";

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;Total &nbsp; Salary&nbsp;=&nbsp;Rs. $rows[2]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>Earned Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[3]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PF&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[4]</td>");
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
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESI&nbsp;&nbsp;=&nbsp;&nbsp;Rs. $rows[8]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[9]</td>");
		echo("</tr>");

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Salary&nbsp;&nbsp;=&nbsp;&nbsp;Rs.  $rows[10]</td>");
		echo("</tr>");

		echo "</table></td>";


//-------------------------------------

		echo "</tr><tr>";

		echo "<td align = 'center' valign = 'top'><table border='1' width='300' cellspacing='0' cellpadding='4' align = 'center'>";

		echo("<tr class=header>");
        		echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employee's Contribution = Rs. $rows[8]</td>");
		echo("</tr>");
		echo("<tr class=header>");
        	echo("<td valign='middle' bgcolor='#C0C0C0'>ESI Employer's Contribution = Rs. $rows[11]</td>");
		echo("</tr></table>");
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
