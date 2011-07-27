<?php
	include 'ServerDetail.php';

session_start();
$Company = $_SESSION['company'];

$Name =  $_POST['txtEmpName'];
$EmpId =  $_POST['txtEmpId'];
$AcNo = $_POST['AcNo'];
$Gross = $_POST['GrossSalary'];
$DOJ = $_POST['DOJ'];
$Department = $_POST['cmbDept'];
$Designation = $_POST['cmbDsgn']; 

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
	$query = "insert into incrementdetails values('$Name','$EmpId',0,'0','0','$Company')";

	$result = mysql_query($query);

	mysql_free_result($result);

	$query = "insert into employee (NAME, EMP_NO, ACNO, DEPT, DSGN, GROSS_SALARY, DATE_OF_JOINING, COMPANY) values('${Name}','${EmpId}', '${AcNo}', '${Department}', '${Designation}', '${Gross}','${DOJ}','${Company}')";
}

else if($Save_Details == "Details" && $Add_Details == "Edit")
{
	//$query = "update incrementdetails set EMP_NAME = '${Name}',EMP_NO = '${EmpId}',AMOUNT = 0, `MONTH` = '0',`YEAR` = '0', COMPANY = '${Company}' WHERE EMP_NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";

	$query = "update incrementdetails set EMP_NAME = '${Name}',EMP_NO = '${EmpId}', COMPANY = '${Company}' WHERE EMP_NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";

	$result = mysql_query($query);

	$query = "UPDATE employee SET NAME = '${Name}',EMP_NO = '${EmpId}', ACNO = '${AcNo}', DEPT = '${Department}', DSGN = '${Designation}', GROSS_SALARY = '${Gross}', DATE_OF_JOINING = '${DOJ}' ,COMPANY = '${Company}' WHERE NAME='${Sel_EmpName}' AND EMP_NO='${Sel_EmpId}'";

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
		$deptquery = "insert into department values('${Dept}')";
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
