<?php
	include 'ServerDetail.php';

session_start();
$Company = $_SESSION['company'];
echo $Company;

$Name =  $_POST['txtEmpName'];
$EmpId =  $_POST['txtEmpId'];
$AcNo = $_POST['AcNo'];
$Gross1= $_POST['GrossSalary'];
$Increment= $_POST['Inc'];

$Gross = ($Gross1+$Increment);

$Department = $_POST['cmbDept'];
$Designation = $_POST['cmbDsgn'];
$Dir_Grade = $_POST['Chk'];
$Category = $_POST['SelCat'];
$PFNo =  $_POST['txtPFNo'];
$ESINo =  $_POST['txtESINo'];
$Basic = $_POST['Basic'];
$HRA = $_POST['HRA'];
$CCA = $_POST['CCA'];
$specialallow = $_POST['specialallow'];
$lta = $_POST['lta'];
$mr = $_POST['mra'];
$PF = $_POST['PF'];
$esi = $_POST['esi'];
$tds = $_POST['tds'];
$Pro_Tax = $_POST['Pro_Tax'];
$Salary_Total = $_POST['Salary_Total'];
$Deduct_Total = $_POST['Deduct_Total'];
$Net_Salary = $_POST['Net_Salary'];
$Annum_Salary = $_POST['Annum_Salary'];
$pfoff = $_POST['pfoff'];
$esioff = $_POST['esioff'];

$DOJ = $_POST['DOJ'];
$DOR = $_POST['DOR'];

//echo $Category;
//echo $ESINo;
//echo $ESIAmt;

			date_default_timezone_set ("Asia/Calcutta"); 
			$cYear=date("Y");
			$cMon=date("m");


$Dept = $_POST['New_Dept'];
$Dsgn = $_POST['New_Dsgn'];

$Sel_EmpName   = $_POST['EmpName'];
$Sel_EmpId     = $_POST['EmpId'];
$Add_Details   = $_POST['Add_Edit'];
$Save_Details  = $_POST['operation'];
$UserName      = $_POST['User'];
$newpwd        = $_POST['NewPass'];
$Oldname       = $_POST['name'];





$socket = mysql_connect('localhost', $user, $pass);
if (! $socket)
	die ("Could not connect to MySql Server");
//else
//	echo "Connected";

mysql_select_db($db, $socket)
	or die ("Could not connect to database: $db".mysql_error() );

if($Save_Details == "Details" && $Add_Details == "Add")
{
	$Sel_query = "select * from employee where EMP_NO = '$EmpId'";

	$res = mysql_query($Sel_query);

	$rows = mysql_fetch_array($res);

	if(!$rows)
	{

		if($Dir_Grade == "Checked")
			$Dir_Grade = "Director";
		else
			$Dir_Grade = "None";

		
		$query = "insert into incrementdetails values('$Name','$EmpId',0,0,0,'$Company')";	
		
		$result = mysql_query($query);
		
		mysql_free_result($result);
		
		$query = "insert into employee (NAME, EMP_NO, ACNO, DEPT, DSGN, GROSS_SALARY, DATE_OF_JOINING, COMPANY, GRADE , CATEGORY, DATE_OF_RESIGNING, PFNO, ESINO, BASIC, HRA, LTA,CCA, SPECIALALLOW, MR, EARNTOTAL, PF, ESI, PRO_TAX, TDS, DEDUCT_TOTAL, NET_SALARY, ANNUM_SALARY, PFOFF, ESIOFF ) values('${Name}','${EmpId}', '${AcNo}', '${Department}', '${Designation}', '${Gross}','${DOJ}','${Company}', '${Dir_Grade}','${Category}','${DOR}','${PFNo}','${ESINo}','${Basic}','${HRA}','${lta}','${CCA}','${specialallow}','${mr}','${Salary_Total}','${PF}','${esi}','${Pro_Tax}','${tds}','${Deduct_Total}','${Net_Salary}','${Annum_Salary}','${pfoff}','${esioff}')";	
		
		

		
		//$query = "insert into employee (NAME, EMP_NO, ACNO, DEPT, DSGN, GROSS_SALARY, DATE_OF_JOINING, COMPANY, GRADE , CATEGORY, DATE_OF_RESINING, PFNO, ESINO) values('${Name}','${EmpId}', '${AcNo}', '${Department}', '${Designation}', '${Gross}','${DOJ}','${Company}', '${Dir_Grade}','${Category}','${DOR}','${PFNo}','${ESINo}')";
		//$query = "insert into employee values('${Name}','${EmpId}','${AcNo}','${Department}','${Designation}', '${Gross}','${DOJ}','${Company}', '${Dir_Grade}','${Category}','${DOR}','${PFNo}','${ESINo}','${Basic}','${HRA}','${lta}','${CCA}','${specialallow}','${mr}','${Salary_Total}','${PF}','${esi}','${Pro_Tax}','${tds}','${Deduct_Total}','${Net_Salary}','${Annum_Salary}','${pfoff}','${esioff}')";
		//echo $query;
		//exit;
		
	}
	else
	{
		echo "<script>";
		echo "window.alert('Employee Id already exists!!!');";
		echo "</script>";
	}
}

else if($Save_Details == "Details" && $Add_Details == "Edit" && ($Increment == 0 || $Increment==" ") )
{
//echo($Increment);
		if($Dir_Grade == "Checked")
			$Dir_Grade = "Director";
		else
			$Dir_Grade = "None";

		if($Category==on || $Category=="Checked")
		{
			$Category = "Resigned";
		}
		else
		{
			//$Category = "Current";
		}
	
	
	$query = "UPDATE employee SET NAME = '${Name}',EMP_NO = '${EmpId}', ACNO = '${AcNo}', DEPT = '${Department}', DSGN = '${Designation}', GROSS_SALARY = '${Gross}', DATE_OF_JOINING = '${DOJ}', COMPANY = '${Company}', GRADE = '${Dir_Grade}' ,CATEGORY = '${Category}', DATE_OF_RESIGNING = '${DOR}',PFNO = '${PFNo}' , ESINO = '${ESINo}',BASIC='${Basic}',HRA='${HRA}',LTA='${lta}',CCA='${CCA}',SPECIALALLOW='${specialallow}',MR='${mr}',EARNTOTAL='${Salary_Total}',PF='${PF}',ESI='${esi}',PRO_TAX='${Pro_Tax}',TDS='${tds}',DEDUCT_TOTAL='${Deduct_Total}',NET_SALARY='${Net_Salary}',ANNUM_SALARY='${Annum_Salary}',PFOFF='${pfoff}',ESIOFF='${esioff}' WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
	
	$result = mysql_query($query);
	
	$query = "UPDATE incrementdetails SET EMP_NAME = '${Name}',EMP_NO = '${EmpId}',COMPANY = '${Company}' WHERE EMP_NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
	
	//  AMOUNT='${Increment}',`MONTH`='${cMon}',`YEAR`='${cYear}',
	
	//echo($Increment);
	
	//$query = "UPDATE employee SET NAME = '${Name}',EMP_NO = '${EmpId}', ACNO = '${AcNo}', DEPT = '${Department}', DSGN = '${Designation}', GROSS_SALARY = '${Gross}', DATE_OF_JOINING = '${DOJ}', COMPANY = '${Company}', GRADE = '${Dir_Grade}' ,CATEGORY = '${Category}', DATE_OF_RESIGNING = '${DOR}',PFNO = '${PFNo}' , ESINO = '${ESINo}' WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
	//$query = "UPDATE employee SET NAME = '${Name}',EMP_NO = '${EmpId}', ACNO = '${AcNo}', DEPT = '${Department}', DSGN = '${Designation}', GROSS_SALARY = '${Gross}', DATE_OF_JOINING = '${DOJ}', COMPANY = '${Company}', GRADE = '${Dir_Grade}' ,CATEGORY = '${Category}',PFNO = '${PFNo}' , ESINO = '${ESINo}' WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";

}



else if($Increment != 0 && $Save_Details == "Details" && $Add_Details == "Edit")
		{
		
			date_default_timezone_set ("Asia/Calcutta"); 
			$cYear1=date("Y");
			$cMon1=date("m");
			if($cMon==1){
			$cYear=$cYear1-1;
			$cMon=12;
			}
			else{
			$cYear=$cYear1;
			$cMon=$cMon-1;
			}
			
			
			if($Dir_Grade == "Checked")
			
			$Dir_Grade = "Director";
		else
			$Dir_Grade = "None";

		if($Category==on || $Category=="Checked")
		{
			$Category = "Resigned";
		}
		else
		{
			//$Category = "Current";
		}
				
				//$query = "update incrementdetails set EMP_NAME = '${Name}',EMP_NO = '${EmpId}',COMPANY = '${Company}' WHERE EMP_NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
		$query = "UPDATE incrementdetails SET AMOUNT = $Increment, `MONTH` = '$cMon', `YEAR` = '$cYear' where EMP_NO = '$EmpId' AND COMPANY = '".$Company."'";

				$result = mysql_query($query);
				/*	
				if(!$result)
					die("No records");
			
				//mysql_free_result($result);

				$query = "select GROSS_SALARY from employee where EMP_NO = '$EId' AND DEPT = '".$dept."' AND COMPANY = '".$Company."'";

				$result = mysql_query($query);

				$rows = mysql_fetch_array($result);

				$GROSS_SALARY = $rows[0] + $Increment;
			
				mysql_free_result($result);
				*/

				$query = "UPDATE employee SET NAME = '${Name}',EMP_NO = '${EmpId}', ACNO = '${AcNo}', DEPT = '${Department}', DSGN = '${Designation}', GROSS_SALARY = '${Gross}', DATE_OF_JOINING = '${DOJ}', COMPANY = '${Company}', GRADE = '${Dir_Grade}' ,CATEGORY = '${Category}', DATE_OF_RESIGNING = '${DOR}',PFNO = '${PFNo}' , ESINO = '${ESINo}',BASIC='${Basic}',HRA='${HRA}',LTA='${lta}',CCA='${CCA}',SPECIALALLOW='${specialallow}',MR='${mr}',EARNTOTAL='${Salary_Total}',PF='${PF}',ESI='${esi}',PRO_TAX='${Pro_Tax}',TDS='${tds}',DEDUCT_TOTAL='${Deduct_Total}',NET_SALARY='${Net_Salary}',ANNUM_SALARY='${Annum_Salary}',PFOFF='${pfoff}',ESIOFF='${esioff}' WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
				
				//$query ="UPDATE employee SET GROSS_SALARY=$GROSS_SALARY where EMP_NO = '$EId' AND DEPT = '".$dept."' AND COMPANY = '".$Company."'";

				// *$result = mysql_query($query);
			}




else if($Save_Details == "Details" && $Add_Details == "Delete")
{
	$query = "delete from incrementdetails where EMP_NAME ='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";

	$result = mysql_query($query);

	mysql_free_result($result);

	$query = "DELETE from employee WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";
}

else if($Save_Details == "DeptAdd")
{
	if($Dsgn != "")
	{
		$desnquery = "insert into designation values('${Dsgn}')";
		$desnresult = mysql_query($desnquery);
	}
	if($Dept != "")
	{
		$deptquery = "insert into department values('${Dept}','${Company}')";
		$deptresult = mysql_query($deptquery);
	}

}

else if($Save_Details == "ChangePass")
{

	$changequery = "UPDATE userinfo SET USER_NAME ='${UserName}' ,PASS_WORD = '${newpwd }' WHERE USER_NAME='${Oldname}'";

	$changeresult = mysql_query($changequery);

	echo "<script>";

	if($changeresult)
		echo ("window.alert('Password is changed successfully!!');");
	else
		echo ("window.alert('Password is not changed');");

	echo ("window.navigate('Mel_Report.php');");

	echo "</script>";
}

$result = mysql_query($query);

// Closing connection
mysql_close($socket);

?>

<script>


window.navigate("AddEmp.php");

</script>
