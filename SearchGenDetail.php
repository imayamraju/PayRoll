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
	//include 'ServerDetail.php';

	//session_start();
	//$Company = $_SESSION['company'];
	
	
		
		$i=0;
		$Count=1;

		$Mon = $_GET['cMon'];
		$Yr = $_GET['cYear'];

		$DaysInMonth=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		
		if ((Yr%4)==0)
		{
			if ((Yr%100==0) && (Yr%400)!=0)
				$DaysInMonth[1]=29;

			else
				$DaysInMonth[1]=28;

		}

		$socket = mysql_connect('localhost', $user, $pass);

		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
		
		if ($Mon == 0)
		{
			$P_Yr = $Yr-1;
			$P_Mon = 11;
		}
		else
		{
			$P_Mon = $Mon-1;		
			$P_Yr = $Yr;
		}

		$query = "select * from paydetails1 where `MONTH`= '$P_Mon' AND `YEAR`= '$P_Yr' AND COMPANY = '$Company'";
		
		$result = mysql_query($query);

		if(!$result)
			die("No records");
		
		while ($rows = mysql_fetch_array($result))
		{	
			$Name = $rows[0];
			$Id = $rows[1];
			$W_Days = $DaysInMonth[$Mon];
			$P_Days = $DaysInMonth[$Mon];
			$E_Sal = $rows[6];
			$Basic = $rows[7];
			$lta = $rows[8];
			$HRA = $rows[9];
			$CCA = $rows[10];
			$specialallow = $rows[11];
			$Sal_Tot = $rows[12];
			$PT = $rows[13];
			$PF = $rows[14];
			$tds = $rows[15];
			$Others = $rows[16];
			$Ded_Tot = $rows[17];
			$Net_Sal = $rows[18];
			$Gross = $rows[19];
			$Adv = $rows[20];
			$ESI = $rows[21];
			$Details = $rows[22];
			$Net_Text = $rows[23];
			$ESI_Cmp= $rows[24];
			$mra=$rows[25];
			$pfcom=$rows[26];
			$IT_Acum= $rows[27]+$rows[13];
			$PF_Acum = $rows[28]+$rows[14];
			//$com=$rows[29];
			//$Cmp = $rows[26];
			//echo $Name;
			echo"windows.alert($row[0]);";
			$sel_query = "select * from paydetails1 where COMPANY = '$Company' and MONTH = $Mon and YEAR = $Yr and EMP_NO = '$Id' and NAME = '$Name'"; 

			$sel_result = mysql_query($sel_query);

			$res = mysql_fetch_array($sel_result);
	
			if($res)
			{
				$query1 ="UPDATE paydetails1 SET NAME='$Name',EMP_NO='$Id',MONTH=$Mon, YEAR=$Yr,WORKING_DAYS=$W_Days,PRESENT_DAYS=$P_Days,EARNED_SALARY=$E_Sal,BASIC=$Basic,LTA=$lta,HRA=$HRA,CCA=$CCA,SPECIALALLOW=$specialallow,SAL_TOTAL=$Sal_Tot,PRO_TAX=$PT,PF=$PF,TDS=$tds,OTHERS=$Others,DEDUCT_TOTAL=$Ded_Tot,NET_SAL=$Net_Sal,GROSS_SALARY=$Gross,ADVANCE=$Adv,ESI=$ESI,DETAILS='$Details',NET_TEXT='$Net_Text',ESI_CMP=$ESI_Cmp,MR=$mra,PFCOM=$pfcom,IT_ACCUMULATION1=$IT_Acum,PF_ACCUMULATION1=$PF_Acum where EMP_NO='$EId' AND`MONTH`=$Mon AND `YEAR`=$Yr AND COMPANY='$Company'";

			}
			else
			{
				$query1 = "INSERT into paydetails1(NAME,EMP_NO,MONTH,YEAR,WORKING_DAYS,PRESENT_DAYS,EARNED_SALARY,BASIC,LTA,HRA,CCA,SPECIALALLOW,SAL_TOTAL,PRO_TAX,PF,TDS,OTHERS,DEDUCT_TOTAL,NET_SAL,GROSS_SALARY,ADVANCE,ESI,DETAILS,NET_TEXT,ESI_CMP,MR,PFCOM,IT_ACCUMULATION1,PF_ACCUMULATION1,COMPANY) values('$Name','$Id',$Mon,$Yr,$W_Days,$P_Days,$E_Sal,$Basic,$lta,$HRA,$CCA,$specialallow,$Sal_Tot,$PT,$PF,$tds,$Others,$Ded_Tot,$Net_Sal,$Gross,$Adv,$ESI,'$Details','$Net_Text',$ESI_Cmp,$mra,$pfcom,$IT_Acum,$PF_Acum,'$Company')";

			}
			
			$result1 = mysql_query($query1);		

		}

		mysql_free_result($result1);			

		mysql_free_result($res);

		mysql_free_result($result);


	?>
</DIV>
</FORM>
</BODY>
</HTML>
