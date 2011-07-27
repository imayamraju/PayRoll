<?php
	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];
	
	$data1 = "";
	$data2 = "";

	$opt   = $_POST["param1"];
	$dept  = $_POST["param2"];
	$EName = $_POST["param3"];
	$EId   = $_POST["param4"];
	$cYear = $_POST["param5"];
	$cMon  = $_POST["param6"];
	$Msg   = $_POST["param7"];
	
	$Cur_IT    = $_POST["param8"];
	$Increment = $_POST["param9"];
	$Cur_PF    = $_POST["param10"];
	$ESI_Share = $_POST["param11"];

	$socket = mysql_connect('localhost', $user, $pass);
	if (! $socket)
		die ("Could not connect to MySql Server");

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error() );

	$query = "select * from paydetails1 where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND `MONTH` = '".$cMon."' AND `YEAR` = '".$cYear."'";



	echo "<script>";

	switch($opt)
	{
		case "Dear":

		case "Month":

		case "EmpId":

		case "EmpName":


			$query = "select * from employee where NAME = '".$EName."' AND EMP_NO = '".$EId."'";
			//echo("window.alert($query);");

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			
			$rows = mysql_fetch_array($result);
			
			$data1 = $rows[2].",".$rows[4];

			$GrossSal = $rows[5];
			$category = $rows[9];
			$PFNo = $rows[11];
			
	
			$Basic = $rows[13];
			$HRA = $rows[14];
			$lta = $rows[15];
			$CCA = $rows[16];
			$specialallow = $rows[17];
			$mra = $rows[18];
			$EarnTotal = $rows[19];
			$PF = $rows[20];
			$esi = $rows[21];
			$Pro_Tax = $rows[22];
			$tds = $rows[23];
			$Deduct_Total = $rows[24];
			$Net_Salary = $rows[25];
		
			
			//$status = $rows[10];

			//echo "window.alert($GrossSal);";
			
			mysql_free_result($result);
			
			$query = "select * from paydetails1 where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND `MONTH` = '".$cMon."' AND `YEAR` = '".$cYear."'";
			
			$result = mysql_query($query);
			
			if(!$result)
				die("No records");

			$rows = mysql_fetch_array($result);

			if(mysql_num_rows($result) != 0) 
				$GrossSal = $rows[19];

			$rcnt = mysql_num_rows($result);

			//echo "window.alert($rcnt);";
			
			
			$data1 = $data1.",".$GrossSal.",".$rows[4].",".$rows[5].",".$rows[6].",".$rows[7].",".$rows[8].",".$rows[9].",".$rows[10].",".$rows[11].",".$rows[12].",".$rows[13].",".$rows[14].",".$rows[15].",".$rows[16].",".$rows[17].",".$rows[18].",".$rows[20].",".$rows[21].",".$rows[23].",".$rows[25].",".$category.",".$PFNo;
			echo("window.parent.LoadEmpDetail('${data1}');");
			
			
				//$data1 = $data1.",".$GrossSal.",".$rows[4].",".$rows[5].",".$EarnTotal.",".$Basic.",".$HRA.",".$CCA.",".$specialallow.",".$mra.",".$lta.",".$EarnTotal.",".$PF.",".$esi.",".$Pro_Tax.",".$tds.",".$rows[17].",".$rows[18].",".$Deduct_Total.",".$Net_Salary.",".$rows[21].",".$rows[22].",".$rows[23].",".$category.",".$PFNo;
			//if($rows[19] <= 4999 && $rows[4] == "")
			//{
			
			
				if($cMon == 0)
				{				
					$cMon = 11;
					$cYear = $cYear - 1;
				}
				else
				{
					$cMon = $cMon - 1;
				}

				$query = "select BASIC,LTA,HRA,CCA,SPECIALALLOW,SAL_TOTAL,PRO_TAX,PF,TDS,DEDUCT_TOTAL,ESI,MR from paydetails1 where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND `MONTH` = '".$cMon."' AND `YEAR` = '".$cYear."'";
			
				$result = mysql_query($query);

				if(!$result)
					die("No records");

				$rows = mysql_fetch_array($result);

				if(mysql_num_rows($result) != 0)
					$data1 = $rows[0].",".$rows[1].",".$rows[2].",".$rows[3].",".$rows[4].",".$rows[5].",".$rows[6].",".$rows[7].",".$rows[8].",".$rows[9].",".$rows[10].",".$rows[11];
				else
					$data1 = $Basic.",".$HRA.",".$CCA.",".$specialallow.",".$mra.",".$lta.",".$EarnTotal.",".$PF.",".$esi.",".$Pro_Tax.",".$tds.",".$Deduct_Total;
			
				mysql_free_result($result);

				echo("window.parent.LoadSalDetails('${data1}');");			
			//}

			break;

		case "Dept":


			//$query = "select * from employee where DEPT = '".$dept."' AND COMPANY = '".$Company."'";
			$query = "select * from employee where DEPT = '".$dept."' AND COMPANY = '".$Company."' AND CATEGORY != 'Resigned' ";

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			
			while ($rows = mysql_fetch_array($result))
			{
				$data1 = $data1.$rows[0].",";
				$data2 = $data2.$rows[1].",";		
			}
			mysql_free_result($result);

			echo("window.parent.LoadSelectData('${data1}','EmpName');");

			echo("window.parent.LoadSelectData('${data2}','EmpId');");
			
			break;

		case "Save":

			$It=0;
			$T_month=$cMon-1;
			$T_Year=$cYear;
			
			switch($cMon)
			{
				
				case 3://April
					$It=0;
					break;
				case 0://Jan
					$T_month=11;
					$T_Year=$cYear-1;
				default:

					$query = "select * from paydetails1 where EMP_NO = '$EId' AND `year`='$T_Year' AND `month`='$T_month'"; 
					$result = mysql_query($query);
					$rows = mysql_fetch_array($result);
					$It = $rows[27];	
					
			}
			$query = "select * from paydetails1 where EMP_NO = '$EId' AND `year`='$T_Year' AND `month`='$T_month'"; 
			$result = mysql_query($query);
			
			$rows = mysql_fetch_array($result);
			$Pf = $rows[28];
			
		
			$It = $It + $Cur_IT;
			
			$Pf = $Pf + $Cur_PF;
		
			$Msg = $Msg.",".$It.",".$Pf;
			
			$Msg = $Msg.","."'".$Company."'";
			
			//$Msg = $Msg.","."'".$ESI_Share."'";
			
			$sel_query = "select * from paydetails1 where EMP_NO = '$EId' AND `year`='$cYear' AND `month`='$cMon'"; 
			
			$sel_result = mysql_query($sel_query);

			$res = mysql_fetch_array($sel_result);
			
			if(!$res)
			{
				
				$query = "INSERT into paydetails1 values(".$Msg.")";	
			//$data = split('[,]',$Msg);
			//echo "window.alert($Msg);";	
				
			}
			else
			{
				$data = split('[,]',$Msg);
	
				$query ="UPDATE paydetails1 SET WORKING_DAYS=$data[4],PRESENT_DAYS=$data[5], EARNED_SALARY=$data[6],BASIC=$data[7],LTA=$data[8],HRA=$data[9],CCA=$data[10],SPECIALALLOW=$data[11],SAL_TOTAL=$data[12],PRO_TAX=$data[13],PF=$data[14],TDS=$data[15],OTHERS=$data[16],DEDUCT_TOTAL=$data[17],NET_SAL=$data[18],GROSS_SALARY=$data[19],ADVANCE=$data[20],ESI=$data[21],DETAILS=$data[22],NET_TEXT=$data[23],ESI_CMP=$data[24],MR=$data[25],PFCOM=$data[26],IT_ACCUMULATION1=$data[27],PF_ACCUMULATION1=$data[28] where EMP_NO='$EId' AND`MONTH`=$cMon AND `YEAR`=$cYear AND COMPANY='$Company'";
				
			}
			
			$result = mysql_query($query);
			
			mysql_free_result($result);

			if($Increment != 0)
			{
				
				$query = "UPDATE incrementdetails SET AMOUNT = $Increment, `MONTH` = '$cMon', `YEAR` = '$cYear' where EMP_NO = '$EId' AND COMPANY = '".$Company."'";

				$result = mysql_query($query);
					
				if(!$result)
					die("No records");
			
				//mysql_free_result($result);

				$query = "select GROSS_SALARY from employee where EMP_NO = '$EId' AND DEPT = '".$dept."' AND COMPANY = '".$Company."'";

				$result = mysql_query($query);

				$rows = mysql_fetch_array($result);

				$GROSS_SALARY = $rows[0] + $Increment;
			
				mysql_free_result($result);

				$query ="UPDATE employee SET GROSS_SALARY=$GROSS_SALARY where EMP_NO = '$EId' AND DEPT = '".$dept."' AND COMPANY = '".$Company."'";

				$result = mysql_query($query);
			}
			
			break;

		case "NameList":

			$query = "select * from employee where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND COMPANY = '".$Company."'";
			
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			$rows = mysql_fetch_array($result);

			for($iCol = 0;$iCol < 27;$iCol++)
			{
				$data1 = $data1.$rows[$iCol].",";
			}

			mysql_free_result($result);

			echo("window.parent.DisplayEmpDetails('${data1}');");
			
			

			break;

		case "IdList":
			$query = "select * from employee where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND COMPANY = '".$Company."'";
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			$rows = mysql_fetch_array($result);

			for($iCol = 0;$iCol < 27;$iCol++)
			{
				$data1 = $data1.$rows[$iCol].",";
			}

			mysql_free_result($result);

			echo("window.parent.DisplayEmpDetails('${data1}');");
			
			

			break;

		case "SelDept":
	
			$query = "select * from employee where DEPT = '".$dept."' AND COMPANY = '".$Company."'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");
		
			while ($rows = mysql_fetch_array($result))
			{
				$data1 = $data1.$rows[0].",";
				$data2 = $data2.$rows[1].",";
			}
			mysql_free_result($result);

			echo("window.parent.LoadSelectData('${data1}','EmpName');");

			echo("window.parent.LoadSelectData('${data2}','EmpId');");

			break;

		case "LoadName":
			//$query = "select * from employee where NAME = '".$EName."' AND EMP_NO = '".$EId."' AND COMPANY = '".$Company."'";
			
			$query = "select * from employee";

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			
			while ($rows = mysql_fetch_array($result))
			{
				$data1 = $data1.$rows[0].",";
				$data2 = $data2.$rows[1].",";
			}
			mysql_free_result($result);

			echo("window.parent.LoadSelectData('${data1}','EmpName');");
			echo("window.parent.LoadSelectData('${data2}','EmpId');");

			break;

		case "LoadDept":
			
			$query = "select * from department where COMPANY = '".$Company."'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");
			
			while ($rows = mysql_fetch_array($result))
			{
				$data1 = $data1.$rows[0].",";
			}
			mysql_free_result($result);

			echo("window.parent.LoadSelectData('${data1}','Dept');");

			break;
		case "DeptName":
	
			$query = "select * from employee where DEPT = '".$dept."' AND COMPANY = '".$Company."'";

			$result = mysql_query($query);

			if(!$result)
				die("No records");
		
			while ($rows = mysql_fetch_array($result))
			{
				$data1 = $data1.$rows[0].",";
				$data2 = $data2.$rows[1].",";
			}
			mysql_free_result($result);

			echo("window.parent.LoadSelectData('${data1}','EmpName');");
			echo("window.parent.LoadSelectData('${data2}','EmpId');");
			break;

		case "Name":
			
			$query = "select * from paydetails1 where MONTH = '".$dept."' AND YEAR = '".$EId."'";
			echo $query;
			$result = mysql_query($query);

			if(!$result)
				die("No records");

			$rows = mysql_fetch_array($result);

			for($iCol = 0;$iCol < 4;$iCol++)
			{
				$data1 = $data1.$rows[$iCol].",";
			}

			mysql_free_result($result);

			echo("window.parent.DisplayNameDetails('${data1}');");
			break;

	}
	
	mysql_close($socket);
	
	echo("window.navigate('dataCaller.php');</script> ");

?>
