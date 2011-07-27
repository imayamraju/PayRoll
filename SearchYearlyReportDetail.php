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
		$MonthName=array("January","Feburary","March","April","May","June","July","August","September","October","November","December");
		$Month;
		
		$Mon1 = $_GET['Mon1'];
		$Mon2 = $_GET['Mon2'];
		$Yr1 = $_GET['Yr1'];
		$Yr2 = $_GET['Yr2'];
		$Name = $_GET['Name'];
		$Cat = $_GET['Cat'];

		$Total = 0;
		$TotalPF = 0;
		$GrTot_PF = 0;
		$Share_PF = 0;

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
                <td width="70" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="30" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">PF No</p>
                </td>
                <td width="40" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp PF</p>
                </td>
                <td width="50" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Comp PF</p>
                </td>
                <td width="50" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Total PF</p>
                </td>
               </tr>

	<?php
		
		if($Yr1 == $Yr2)
		{
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.PFNO,p.PF,p.PFCOM from employee e, paydetails1 p where e.NAME = '".$Name."' AND p.PF != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
			//echo $query;
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];
				$TotalPF = $rows[5]+ $rows[6];
	
				echo("<tr class = bodytext>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='70' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");	
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalPF</td>");				
				echo("</tr>");

			}
			mysql_free_result($result);
			
			$query = "select sum(p.PF),sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.PF != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";		

			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
			$GrdTot_PF = $rows[0]+$rows[1];
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 5  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_PF</td>");
			echo("</tr>");

			mysql_free_result($result);

		}
		else
		{
			if($Yr1 < $Yr2)
			{
				$TotalPF = 0;
				$GrdTot_PF = 0;
				$StMon = $Mon1;
				//echo $StMon;

				do
				{
				$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.PFNO,p.PF,p.PFCOM from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				 p.PF != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
				//echo $query;

				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{
					$Month = $rows[2];
					$TotalPF = $rows[5]+ $rows[6];

					echo("<tr class = bodytext>");
					echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
					echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalPF</td>");					echo("</tr>");

				}
				mysql_free_result($result);
				
				$query = "select sum(p.PF),sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.PF != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";		
				//echo $query;

				$result = mysql_query($query);
		
				$rows = mysql_fetch_array($result);
				
				$GrdTot_PF +=($rows[0]+$rows[1]);
				$Share_PF += $rows[0];
				$pfcom += $rows[1];

				mysql_free_result($result);
				
				$StMon = 0;
				$Yr1++;

				}
				while($Yr1 != $Yr2);
				
				mysql_free_result($result);

			}
			$TotalPF = 0;

			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.PFNO,p.PF,p.PFCOM from employee e, paydetails1 p where e.NAME = '".$Name."' AND
			 p.PF != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
			//echo $query;

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];
				$TotalPF = $rows[5] + $rows[6];

				echo("<tr class = bodytext>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
				echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
				echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalPF</td>");
				echo("</tr>");
			}
			mysql_free_result($result);

			$query = "select sum(p.PF),sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.PF != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
			$result = mysql_query($query);			

			$rows = mysql_fetch_array($result);

			$GrdTot_PF += ($rows[0] + $rows[1]);
			$Share_PF += $rows[0];
			$pfcom += $rows[1];

			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 5  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Share_PF</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$pfcom</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_PF</td>");
			echo("</tr>");
			
			mysql_free_result($result);			

		}
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
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="45" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">ESI No</p>
                </td>
                <td width="50" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ESI</p>
                </td>
                <td width="55" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Comp ESI</p>
                </td>
                <td width="50" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Total ESI</p>
                </td>
               </tr>

	<?php
		
		if($Yr1 == $Yr2)
		{
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.ESINO,p.ESI,p.ESI_CMP from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.ESI != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];
				$TotI_ESI = $rows[5];				
				$TotC_ESI = $rows[6];
				$Total_ESI = $TotI_ESI + $TotC_ESI;

				echo("<tr class = bodytext>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotI_ESI</td>");
				echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotC_ESI</td>");
				echo("<td width='35' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total_ESI</td>");
				echo("</tr>");
			}
			mysql_free_result($result);

			$query = "select sum(p.ESI),sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.ESI != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);

			$GrdTotI_ESI = $rows[0];
			$GrdTotC_ESI = $rows[1];
			$GrdTot_ESI = $GrdTotI_ESI + $GrdTotC_ESI;

			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 5  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTotI_ESI</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTotC_ESI</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_ESI</td>");
			echo("</tr>");
			
			mysql_free_result($result);

		}
		else
		{
			if($Yr1 < $Yr2)
			{
				$TotI_ESI = 0;				
				$TotC_ESI = 0;
				$TotalESI = 0;

				$GrdTotI_ESI = 0;
				$GrdTotC_ESI = 0;
				$GrdTot_ESI = 0;

				$StMon = $Mon1;
				do
				{
				$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.ESINO,p.ESI,p.ESI_CMP from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.ESI != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{
					$Month = $rows[2];
					$TotI_ESI = $rows[5];				
					$TotC_ESI = $rows[6];
					$Total_ESI = $TotI_ESI + $TotC_ESI;

					echo("<tr class = bodytext>");
					echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
					echo("<td width='70' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
					echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
					echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotI_ESI</td>");
					echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotC_ESI</td>");
					echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total_ESI</td>");
					echo("</tr>");

				}
				mysql_free_result($result);
				
				$query = "select sum(p.ESI),sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.ESI != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
				$result = mysql_query($query);
		
				$rows = mysql_fetch_array($result);
				
				$GrdTotI_ESI = $rows[0];
				$GrdTotC_ESI = $rows[1];
				$ShareI_ESI += $GrdTotI_ESI;
				$ShareC_ESI += $GrdTotC_ESI;

				$GrdTot_ESI += $GrdTotI_ESI + $GrdTotC_ESI;

				mysql_free_result($result);
				
				$Yr1++;
				$StMon = 0;				

				}while($Yr1 != $Yr2);

			}
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,e.ESINO,p.ESI,p.ESI_CMP from employee e, paydetails1 p where e.NAME = '".$Name."' AND
			p.ESI != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];
				$TotI_ESI = $rows[5];				
				$TotC_ESI = $rows[6];
				$Total_ESI = $TotI_ESI + $TotC_ESI;

				echo("<tr class = bodytext>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='65' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");				
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("<td width='45' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotI_ESI</td>");
				echo("<td width='55' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotC_ESI</td>");
				echo("<td width='35' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total_ESI</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.ESI),sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.ESI != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);

			$GrdTotI_ESI = $rows[0];
			$GrdTotC_ESI = $rows[1];
			$ShareI_ESI += $GrdTotI_ESI;
			$ShareC_ESI += $GrdTotC_ESI;

			$GrdTot_ESI += $GrdTotI_ESI + $GrdTotC_ESI;

			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 5  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$ShareI_ESI</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$ShareC_ESI </td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_ESI</td>");
			echo("</tr>");

			mysql_free_result($result);
		
		}
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
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="55" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">TDS Amt.</p>
                </td>
               </tr>

	<?php
		
		if($Yr1 == $Yr2)
		{
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.TDS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.TDS != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");	
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("</tr>");
			}
			mysql_free_result($result);

			$query = "select sum(p.TDS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.TDS != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");
			
			mysql_free_result($result);

		}
		else
		{
			if($Yr1 < $Yr2)
			{
				$Total = 0;
				$StMon = $Mon1;
				do
				{
				$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.TDS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.TDS != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{
					$Month = $rows[2];

					echo("<tr class = bodytext>");
					echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
					echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
					echo("</tr>");

				}
				mysql_free_result($result);

				$query = "select sum(p.TDS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.TDS != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
				$result = mysql_query($query);
		
				$rows = mysql_fetch_array($result);
		
				$Total += $rows[0];
				$Yr1++;
				$StMon = 0;			

				mysql_free_result($result);

				}while($Yr1 != $Yr2);

			}
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.TDS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
			p.TDS != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
//echo $query;

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("</tr>");

			}
			mysql_free_result($result);

			$query = "select sum(p.TDS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.TDS != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
		
			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);

			$Total += $rows[0];		
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total</td>");
			echo("</tr>");
			
			mysql_free_result($result);
			
		}
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
			   <td width="130" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
                </td>
                <td width="130" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="25" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Loan</p>
                </td>
               </tr>

	<?php
		
		if($Yr1 == $Yr2)
		{
			$query = "select e.NAME,e.LOAN,p.MONTH,p.YEAR from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				e.LOAN != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("</tr>");
			}
			mysql_free_result($result);
			
			$query = "select sum(e.LOAN) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				e.LOAN != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");
			
			mysql_free_result($result);

		}
		else
		{
			if($Yr1 < $Yr2)
			{
				$Total = 0;
				$StMon = $Mon1;
				do
				{
				$query = "select e.NAME,e.LOAN,p.MONTH,p.YEAR from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				e.LOAN != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{
					$Month = $rows[2];

					echo("<tr class = bodytext>");
					echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
					echo("</tr>");

				}
				mysql_free_result($result);
				
				$query = "select sum(e.LOAN) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				e.LOAN != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

				$result = mysql_query($query);
		
				$rows = mysql_fetch_array($result);

				$Total += $rows[0];
				$Yr1++;
				$StMon = 0;
	
				mysql_free_result($result);		

				}while($Yr1 != $Yr2);

			}
			$query = "select e.NAME,e.LOAN,p.MONTH,p.YEAR from employee e, paydetails1 p where e.NAME = '".$Name."' AND
			e.LOAN != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("</tr>");

			}
			mysql_free_result($result);
			
			$query = "select sum(e.LOAN) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				e.LOAN != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);

			$Total += $rows[0];		
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total</td>");
			echo("</tr>");
			
			mysql_free_result($result);

		
		}
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
			   <td width="100" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp Name</p>
                </td>
                <td width="70" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Emp ID</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Month</p>
                </td>
                <td width="25" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Year</p>
                </td>
                <td width="25" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Others</p>
                </td>
               </tr>

	<?php
		
		if($Yr1 == $Yr2)
		{
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.OTHERS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.OTHERS != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
				echo("<td width='130' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");	
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("</tr>");
			}
			mysql_free_result($result);
			
			$query = "select sum(p.OTHERS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.OTHERS != '0' AND p.MONTH >= $Mon1 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
			echo("</tr>");
			
			mysql_free_result($result);

		}
		else
		{
			if($Yr1 < $Yr2)
			{
				$Total = 0;
				$StMon = $Mon1;
				do
				{
				$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.OTHERS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.OTHERS != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";
				
				$result = mysql_query($query);

				if(!$result)
					die("No records");

				while ($rows = mysql_fetch_array($result))
				{
					$Month = $rows[2];

					echo("<tr class = bodytext>");
					echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");	
					echo("<td width='70' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
					echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
					echo("</tr>");

				}
				mysql_free_result($result);
			
				$query = "select sum(p.OTHERS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.OTHERS != '0' AND p.MONTH >= $StMon AND p.MONTH <= 11 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

				$result = mysql_query($query);
		
				$rows = mysql_fetch_array($result);
	
				$Total += $rows[0];
				$Yr1++;
				$StMon = 0;		
			
				mysql_free_result($result);

				}while($Yr1 != $Yr2);

			}
			$query = "select e.NAME,e.EMP_NO,p.MONTH,p.YEAR,p.OTHERS from employee e, paydetails1 p where e.NAME = '".$Name."' AND
			p.OTHERS != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");

			while ($rows = mysql_fetch_array($result))
			{
				$Month = $rows[2];

				echo("<tr class = bodytext>");
				echo("<td width='100' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='70' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[1]</td>");				
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$MonthName[$Month]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
				echo("</tr>");

			}
			mysql_free_result($result);	
			
			$query = "select sum(p.OTHERS) from employee e, paydetails1 p where e.NAME = '".$Name."' AND
				p.OTHERS != '0' AND p.MONTH >= 0 AND p.MONTH <= $Mon2 AND p.YEAR = '$Yr1' AND e.NAME = p.NAME ";

			$result = mysql_query($query);
		
			$rows = mysql_fetch_array($result);

			$Total += $rows[0];		
		
			echo("<tr class = header>");
			echo("<td width='25' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$Total</td>");
			echo("</tr>");
			
			mysql_free_result($result);
		
		}
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
