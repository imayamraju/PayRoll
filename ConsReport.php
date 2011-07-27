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

		$Count = 1;

		$No = 1;

		$cMon = $_GET['cMon'];

		$cYer = $_GET['cYer'];

		$Cat = $_GET['Cat'];
		
		$CatName=array("","PROFESSIONAL TAX","PF","ESI","IT/TDS","FULL PF","PF CMP","ESI CMP");

		if($Company == 'A')
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>AVITRONICS SYSTEMTECH PVT LTD - $CatName[$Cat] REPORT</p>";
		}
		else if($Company == 'M')

		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS SYSTEMTECH PVT LTD - $CatName[$Cat] REPORT</p>";
		}
		else if($Company == 'I')
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS INFOTECH PVT LTD- $CatName[$Cat] REPORT</p>";
		}

		else
		{
			echo "<BODY bgcolor='#C0C0C0'>";
			echo "<p align='center' class=header>MELTRONICS BUSINESS STRATEGIES - $CatName[$Cat] REPORT</p>";
		}

	?>

<form name = 'frmRecEntry'>
<DIV ID = 'list'>
 
	<table border="1" width="1050" cellspacing="0" cellpadding="4" align = 'center' style = 'border'>              

	<?php
		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );		

		$query = "select e.NAME,e.EMP_NO,p.PRO_TAX from employee e, paydetails1 p where e.NAME = p.NAME AND p.PRO_TAX != '0'AND 
		p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;
		$iRecCount1 = 1;
		
		if($Cat == "1")
		{

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
						echo("<td width='15' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("S.No");
                		echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
                		echo("</td>");
						echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("<td width='20' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Pro_Tax");
                		echo("</td>");
               			echo("</tr>");
			}

		while ($rows = mysql_fetch_array($result))
		 {
			echo("<tr class = bodytext>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'left'>$iRecCount1</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'left'>$rows[0]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[2]</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		 }

		mysql_free_result($result);

		$query = "select sum(p.PRO_TAX) from employee e, paydetails1 p where e.NAME = p.NAME AND p.MONTH = '$cMon' 
		AND p.PRO_TAX != '0'AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='25' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");

		mysql_free_result($result);

		}
		else if($Cat == "2")
		{
		$query = "select e.NAME,e.EMP_NO,e.PFNO,p.PF from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
                		echo("<td width='10' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("S.No");
						echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
						echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("</td>");
                		echo("<td width='40' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("PF No");
                		echo("</td>");
                		echo("<td width='40' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Emp PF");
                		echo("</td>");
           			echo("</tr>");
			}


		while ($rows = mysql_fetch_array($result))
		{

			echo("<tr class = bodytext>");
			echo("<td width='10' bgcolor='#C0C0C0' align = 'center'>$iRecCount1</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[0]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[1]</td>");
			echo("<td width='40' bgcolor='#C0C0C0' >$rows[2]</td>");
			echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		}
		mysql_free_result($result);

		$query = "select sum(p.PF) from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='25' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
		echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");

		mysql_free_result($result);

		}
		else if($Cat == "3")
		{
		$query = "select e.NAME,e.EMP_NO,e.ESINO,p.ESI,p.ESI_CMP from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
						echo("<tr class=header >");
						echo("<td width='10' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("S.No");
                		echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
                		echo("</td>");
						echo("<td width='70' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Emp ID");
                		echo("<td width='50' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("ESI No");
                		echo("</td>");
                		echo("<td width='50' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Emp ESI");
                		echo("</td>");
                		echo("<td width='50' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("CMP ESI");
                		echo("</td>");
                		echo("<td width='60' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Total ESI");
                		echo("</td>");
          			echo("</tr>");
			}

		while ($rows = mysql_fetch_array($result))
		{
			$TotalESI = $rows[3] + $rows[4];

			echo("<tr class = bodytext>");
			echo("<td width='10' bgcolor='#C0C0C0' align = 'center'>$iRecCount1</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[0]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[1]</td>");
			echo("<td width='30' bgcolor='#C0C0C0' >$rows[2]</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalESI</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		}
		$query = "select sum(p.ESI),sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		$GrdTot_ESI = $rows[0] + $rows[1];

		
		echo("<tr class = header>");
		echo("<td width='25' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTot_ESI</td>");
		echo("</tr>");

		mysql_free_result($result);

		}
		else if($Cat == "4")
		{
		$query = "select e.NAME,e.EMP_NO,p.TDS from employee e, paydetails1 p where e.NAME = p.NAME AND p.MONTH = '$cMon' 
		AND p.IT != '0' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
						echo("<td width='10' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("S.No");
						echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
                		echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("</td>");
                		echo("<td width='15' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("TDS");
                		echo("</td>");
          			echo("</tr>");
			}

		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");
			echo("<td width='130' bgcolor='#C0C0C0' align = 'center'>$iRecCount1</td>");
			echo("<td width='130' bgcolor='#C0C0C0' align = 'center'>$rows[0]</td>");
			echo("<td width='130' bgcolor='#C0C0C0' align = 'center'>$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[2]</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		}
		mysql_free_result($result);

		$query = "select sum(p.TDS) from employee e, paydetails1 p where e.NAME = p.NAME AND 
		p.IT != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='25' bgcolor='#C0C0C0' colspan  = 3  valign='middle'>Total</td>");
		echo("<td width='25' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");

		mysql_free_result($result);


		}
		else if($Cat == "5")
		{
		$query = "select e.NAME,e.EMP_NO,e.PFNO,p.PF,p.PFCOM from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
                		echo("<td width='10' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("S.No");
						echo("<td width='70' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp Name");
                		echo("</td>");
						echo("<td width='50' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("<td width='70' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("PFNo");
                		echo("</td>");
                		echo("<td width='40' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Emp PF");
                		echo("</td>");
                		echo("<td width='40' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Com PF");
                		echo("</td>");
                		echo("<td width='40' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Total PF");
                		echo("</td>");
          			echo("</tr>");
			}


		while ($rows = mysql_fetch_array($result))
		{
			$TotalPF = $rows[3]+$rows[4];

			echo("<tr class = bodytext>");
			echo("<td width='10' bgcolor='#C0C0C0' align = 'center'>$iRecCount1</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[0]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[1]</td>");
			echo("<td width='70' bgcolor='#C0C0C0' >$rows[2]</td>");
			echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
			echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$TotalPF</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		}
		mysql_free_result($result);

		$query = "select sum(p.PF),sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = p.NAME 
		AND p.PF != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);

		$GrdTotal_PF = $rows[0]+ $rows[1];
		
		echo("<tr class = header>");
		echo("<td width='30' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
		echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
		echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$GrdTotal_PF</td>");
		echo("</tr>");

		mysql_free_result($result);
		}
		else if($Cat == "6")
		{
			$query = "select p.NAME,e.EMP_NO,e.PFNO,p.PFCOM from paydetails1 p, employee e where	e.NAME = p.NAME AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND p.PF!='0' AND e.EMP_NO = p.EMP_NO AND e.PFNO != '0' AND e.CATEGORY ='Current' AND p.COMPANY = '$Company'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");


			
			$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
        		echo("<td width='10' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
          		echo("S.No.");
        		echo("</td>");
        		echo("<td width='80' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
          		echo("Emp Name");
        		echo("</td>");
        		echo("<td width='50' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
          		echo("Emp ID");
        		echo("</td>");
        		echo("<td width='30' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
          		echo("PF No");
        		echo("</td>");
        		echo("<td width='50' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
          		echo("Comp PF");
        		echo("</tr>");
			}

			while ($rows = mysql_fetch_array($result))
			{
				
				echo("<tr class = bodytext>");
				echo("<td width='10' bgcolor='#C0C0C0' align = 'left' valign='middle'>$iRecCount1</td>");
				echo("<td width='80' bgcolor='#C0C0C0' align = 'left' valign='middle'>$rows[0]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
				echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[2]</td>");
				echo("<td width='50' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[3]</td>");
				echo("</tr>");
				$iRecCount++;
				$iRecCount1++;
				

			}
			mysql_free_result($result);
				
				$query = "select sum(p.PFCOM) from employee e, paydetails1 p where e.NAME = p.NAME AND p.PF!='0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";		

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);

		echo("<tr class = header>");
		echo("<td width='30' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
		echo("<td width='30' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");
			
		}
		else
		{
		$query = "select e.NAME,e.EMP_NO,e.ESINO,p.ESI_CMP from employee e, paydetails1 p where e.NAME = p.NAME AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);

		if(!$result)
			die("No records");

		$iRecCount = 0;

			if(($iRecCount % 40) == 0)
			{			
				echo("<tr class=header >");
                		echo("<td width='10' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("S.No.");
                		echo("</td>");
                		echo("<td width='70' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Emp Name");
                		echo("</td>");
                		echo("<td width='50' valign='middle' bgcolor='#C0C0C0' align = 'center'>");
                  		echo("Emp ID");
                		echo("</td>");
                		echo("<td width='50' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("ESI No");
                		echo("</td>");
                		echo("<td width='60' bgcolor='#C0C0C0' valign='middle' align = 'center'>");
                  		echo("Comp ESI");
                		echo("</tr>");
			}

		while ($rows = mysql_fetch_array($result))
		{
			
			echo("<tr class = bodytext>");
			echo("<td width='10' bgcolor='#C0C0C0' align = 'center'>$iRecCount1</td>");
			echo("<td width='70' bgcolor='#C0C0C0' align = 'center'>$rows[0]</td>");
			echo("<td width='50' bgcolor='#C0C0C0'align = 'center'>$rows[1]</td>");
			echo("<td width='50' bgcolor='#C0C0C0'align = 'center'>$rows[2]</td>");
			echo("<td width='30' bgcolor='#C0C0C0'align = 'center'>$rows[3]</td>");
			echo("</tr>");
			$iRecCount++;
			$iRecCount1++;
		}
		$query = "select sum(p.ESI_CMP) from employee e, paydetails1 p where e.NAME = p.NAME AND p.ESI != '0' AND p.MONTH = '$cMon' AND p.YEAR = '$cYer' AND e.EMP_NO = p.EMP_NO AND p.COMPANY = '$Company'";

		$result = mysql_query($query);
		
		$rows = mysql_fetch_array($result);
		
		echo("<tr class = header>");
		echo("<td width='10' bgcolor='#C0C0C0' colspan  = 4  valign='middle'>Total</td>");
		echo("<td width='40' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[0]</td>");
		echo("</tr>");


		mysql_free_result($result);

		}


		mysql_close($socket);
?>
            </table>

</DIV>


</FORM>
</BODY>
</HTML>
