<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="_css/global.css">
</head>
<body bgcolor="#C0C0C0" >

<script src="_script/calender.js"></script>

<script language='javascript'>
var nCount=0;
var alrtMsg="";
var i = 0;
var str1;
var EName;
var EId;
var cYear;
var cMon;
var EDept;

function loadData(p1,p2)
{
	var cValue = frmRecEntry.EmpName.value;

	window.frames["iloader"].document.forms["loader"].param1.value = p1;
	window.frames["iloader"].document.forms["loader"].param2.value = EDept;
	window.frames["iloader"].document.forms["loader"].param3.value = EName;
	window.frames["iloader"].document.forms["loader"].param4.value = EId;
	window.frames["iloader"].document.forms["loader"].param5.value = cYear;
	window.frames["iloader"].document.forms["loader"].param6.value = cMon;
	window.frames["iloader"].document.forms["loader"].param7.value = cValue;
	window.frames["iloader"].document.forms["loader"].action = "dataProvider.php";
	window.frames["iloader"].document.forms["loader"].submit();
	return true;
}

function LoadSelectData(data,elementId)
{
	var items = data.split(",");
	var i;
	var element = document.forms["frmRecEntry"].item(elementId);

	for (var i = element.options.length-1; i >= 0; i--)
	{
    		element.options[i] = null;
  	}

	for (i=0; i<items.length-1; i++)
	{
		var option = new Option(items[i],items[i]);
		element.options.add(option);

	}

	return true;
}

function Load_Data(ItemName, elementId)
{
	var cValue = frmRecEntry.EName.value;
}

function setIndex(ItemId)
{

	if(ItemId == "NameList")

		frmRecEntry.EmpId.selectedIndex = frmRecEntry.EmpName.selectedIndex;
	else

		frmRecEntry.EmpName.selectedIndex = frmRecEntry.EmpId.selectedIndex;

	EName = frmRecEntry.EmpName.value;

	EId = frmRecEntry.EmpId.value;

	loadData(ItemId);
}

function DisplayDetails(OptVal)
{
	if(OptVal == '1' || OptVal == '2')
	{
		if(OptVal == '1')
		{
			frmRecEntry.txtEmpName.value = "";
			frmRecEntry.txtEmpId.value = "";
			frmRecEntry.AcNo.value = "";
			frmRecEntry.GrossSalary.value = "";
			frmRecEntry.DOJ.value = "";
			frmRecEntry.Add_Edit.value = 'Add';
		}
		frmRecEntry.txtEmpName.readOnly = false;
		frmRecEntry.txtEmpId.readOnly = false;
		frmRecEntry.AcNo.readOnly = false;
		frmRecEntry.GrossSalary.readOnly = false;

		frmRecEntry.Save.value = 'Save';

		if(OptVal == '2')
			frmRecEntry.Add_Edit.value = 'Edit';
	}
	else if(OptVal == '3')
	{
		frmRecEntry.txtEmpName.readOnly = true;
		frmRecEntry.txtEmpId.readOnly = true;
		frmRecEntry.AcNo.readOnly = true;
		frmRecEntry.GrossSalary.readOnly = true;
		frmRecEntry.Save.value = 'Delete';
		frmRecEntry.Add_Edit.value = 'Delete';
		
	}

}

function DisplayEmpDetails(data)
{
	var items = data.split(",");
	frmRecEntry.txtEmpName.value = items[0];
	frmRecEntry.txtEmpId.value = items[1];
	frmRecEntry.AcNo.value = items[2];
	frmRecEntry.cmbDept.value = items[3];
	frmRecEntry.cmbDsgn.value = items[4];
	frmRecEntry.GrossSalary.value = items[5];
	frmRecEntry.DOJ.value = items[6];

	frmRecEntry.SelectOption(2).checked = true;

	DisplayDetails(3);
}


</script>

<?PHP
	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];

	$socket = mysql_connect('localhost', $user, $pass);
	if (! $socket)
		die ("Could not connect to MySql Server");
	//else
	//	echo "Connected";

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error() );
?>
<iframe id="iloader" name="iloader" width="0" height="0" border="0" src="dataCaller.php">
	Not support for iframe...
 </iframe>

 <form name = 'frmRecEntry' action = "NewEmployee.php" method = "post">
 <div align="center">
  <center>
  <table border="1" cellspacing="0" width="85%" bordercolorlight="#004848" bordercolordark="#FFFFFF" height="194">
    <tr>
    	<td class=header width="25%" height="190" align="right" bgcolor="#E0E0E0" rowspan="7">
        <table border="0" cellpadding="2" cellspacing="0" width="249" style="left: 0; top: 0; position: relative" height="362">
          <tr>
            <td width="238" valign="middle" colspan="3" height="177" align="center">
              <p align="center"><img border="0" src="img/Pay.gif" width="237" height="175"></p>
            </td>
          </tr>
          <tr>
            <td width="39" valign="middle" height="21"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
            <td class=header width="1" valign="middle" height="21">
              <p align="left"><b><font color="#000000">Options</font></b></td>
            <td  width="229" valign="top" height="21"></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">

                <li><a class = header href = "AddEmp.php"><font color="#000000">Add/Update Employee Details</font></a></li>
              </ul>
            </td>
          </tr>
	<tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowPaySlip.php"><font color="#000000">Pay Slip</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ChangePass.php"><font color="#000000">Change Password</font></a></li>
              </ul></td>
          </tr>

	<tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">
	<?php
	if($Company == "M")
	{
	?>
                <li><a class = header href = "Mel_Report.php"><font color="#000000">Index</font></a></li>
	<?php
	}
	else
	{
	?>
		<li><a class = header href = "Avi_Report.php"><font color="#000000">Index</font></a></li>
	<?php
	}
	?>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowBankReport.php"><font color="#000000">Bank Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowMonthlyReport.php"><font color="#000000">Monthly Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "FilterBy.php"><font color="#000000">Salary
              Details</font></a></li>
              </ul>
            </td>
          </tr>

	<tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>
        <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>
        <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>

        </table>
        </td>
    	<td class=header width="47%" height="1" align="right" bgcolor="#E0E0E0">
        <div align="left">
          <table border="0" cellpadding="0" cellspacing="0" width="700">
            <tr>
    	<td class=header width="1%" height="25" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header width="71%" align="right" bgcolor="#E0E0E0">
      	<p align="left"><b><font color="#000000">Search Employee</font></b></td>
            </tr>
          </table>
        </div>
        </td>
    </tr>
  </center>
    <tr class=header>
    	<td class=header width="47%" height="0" align="right" bgcolor="#EEEEEE">
        <div align="left">
          <table border="0" cellpadding="4" cellspacing="0" width="697">
     <tr>
    <td class = bodytext width="201" height="19" align="right" bgcolor="#EEEEEE">Filter By Department</td>
    <td class = bodytext width="494" height="19" bgcolor="#EEEEEE" colspan="5"><select class = 'input' size="1" name="Dept" onchange = "EDept = this.value;loadData('SelDept');">
        <option value = " ">Select the Department</option>
<?php	
	mysql_free_result($result);
 
	$query = "select * from DEPARTMENT where COMPANY = '$Company'";

	$result = mysql_query($query);
	
	if(!$result)
		die("No records");
	
	while ($rows = mysql_fetch_array($result))
	{
		echo("<OPTION VALUE = ${rows[0]}>".$rows[0]."</option>");						
	}
	mysql_free_result($result);
		
?>     
        </select></td>
      </tr>
          <tr>

              <td width="201" class = bodytext>
                 <p align="right" id = 'lblText'>Employee Name</td>
		<td width="225"><select class = 'input' size="1" name="EmpName" onclick = "EName = this.value;setIndex('NameList');">
        <option value = " "></option>
<?php	
	mysql_free_result($result);

	$query = "select * from employee where COMPANY = '$Company'";

	$result = mysql_query($query);
	
	if(!$result)
		die("No records");
		
	while ($rows = mysql_fetch_array($result))
	{
		echo("<OPTION VALUE = ${rows[0]}>".$rows[0]."</option>");						
	}
	mysql_free_result($result);
		
?>
        </select></td>
              <td width="71" class = bodytext>
                <p align="right">Employee Id</td>
		<td width="466"><select class = 'input' size="1" name="EmpId" onclick = "EId = this.value;setIndex('IdList');">
        <option value = " "></option>
<?php	
	mysql_free_result($result);

	$query = "select * from employee where COMPANY = '$Company'";

	$result = mysql_query($query);
	
	if(!$result)
		die("No records");
		
	while ($rows = mysql_fetch_array($result))
	{
		echo("<OPTION VALUE = ${rows[1]}>".$rows[1]."</option>");						
	}
	mysql_free_result($result);
		
?>
        </select></td>
            </tr>
          </table>
        </div>
        </td>
    </tr>
    <tr>
    	<td class=header width="47%" height="0" align="right" bgcolor="#E0E0E0">
        <div align="left">
          <table border="0" cellpadding="0" cellspacing="0" width="700">
            <tr>
    	<td class=header width="1%" height="25" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header width="71%" align="right" bgcolor="#E0E0E0">
      	<p align="left"><b><font color="#000000">&nbsp;Employee Details</font></b></td>
            </tr>
          </table>
        </div>
        </td>
    </tr>
    <tr>
    	<td width="73%" valign="top" align="left" bgcolor="#EEEEEE" height="175">
         	
    <table border="0" cellpadding="4" cellspacing="0" width="699" class = bodytext>
      <tr>
    <td bgcolor="#EEEEEE" valign="top" align="left">
      
      <p align="right">
      
      Select the option</p>
    </td>
  <center>
  <center>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5">
      <table border="1" cellpadding="0" cellspacing="0" width="207">
        <tr>
          <td width="533">
            <table border="0" cellpadding="0" cellspacing="0" width="209" class = bodytext>
              <tr>
    <td width="1" height="19" bgcolor="#EEEEEE"><input type="radio" value="1"  name="SelectOption" onclick = "DisplayDetails('1')">Add</td>
    <td width="45" height="19" bgcolor="#EEEEEE"><input type="radio" name="SelectOption" value="2" onclick = "DisplayDetails('2')">Edit</td>
    <td width="1" height="19" bgcolor="#EEEEEE"><input type="radio" name="SelectOption" value="3" onclick = "DisplayDetails('3');">Delete</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
      </tr>
      <tr>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Department&nbsp;</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5"><select class = 'input' size="1" name="cmbDept">
        <option value = " "></option>
       
<?php	
	mysql_free_result($result);

	$query = "select * from DEPARTMENT where COMPANY = '$Company'";

	$result = mysql_query($query);
	
	if(!$result)
		die("No records");
	
	while ($rows = mysql_fetch_array($result))
	{
		echo("<OPTION VALUE = ${rows[0]}>".$rows[0]."</option>");						
	}
	mysql_free_result($result);
		
?>
        </select></td>
      </tr>

 <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Employee
      Name</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5"><input class = 'input' type="text" name="txtEmpName" size="20"></td>
  </tr>
  <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Employee
      Id</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5"><input class = 'input' type="text" name="txtEmpId" size="20"></td>
  </tr>
  <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Account No</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5"><input class = 'input' type="text" name="AcNo" size="20"></td>
  </tr>
  <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Gross Salary</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="5"><input class = 'input' type="text" name="GrossSalary" size="20"></td>
  </tr>
      <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE"> Designation</td>
    <td width="124" height="19" bgcolor="#EEEEEE" colspan="5"><select class = 'input' size="1" name="cmbDsgn">
              
<?php	
	mysql_free_result($result);

	$query = "select * from DESIGNATION";

	$result = mysql_query($query);
	
	if(!$result)
		die("No records");
		
	while ($rows = mysql_fetch_array($result))
	{
		echo "<option value = '${rows[0]}'>${rows[0]}</option>";						
	}
	mysql_free_result($result);
		
?>
      </select></td>
    <td bgcolor="#EEEEEE" width="16" height="25"><input type = "Checkbox">Director</td>
    <td width="247" height="19" bgcolor="#EEEEEE">&nbsp;</td>
       </tr>
      <tr class=bodytext>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Date of Joining</td>
    <td width="124" height="19" bgcolor="#EEEEEE" colspan="2"><input class = 'input' type="text" name="DOJ" size="20" readonly></td>
    <td bgcolor="#EEEEEE" width="16" height="25"><img style = 'cursor:hand;' border="0" src="Img/cal.gif" width="16" 	height="16" alt = "Pick a date"onclick 	="javascript:showcal(DOJ,this);"></td>
    <td width="247" height="19" bgcolor="#EEEEEE">&nbsp;</td>
      </tr>
    </center>
    <tr>
    	<td width="201" height="19" bgcolor="#EEEEEE">
          <p align="right">&nbsp;</p>
      </td>
  <center>
	<td width="62" height="19" bgcolor="#EEEEEE"><input class = 'input' style = 'width:60;' type="button" value="Save" name="Save" onclick = "validate();"></td>
      </tr>
    </table>
     </center>
    </center>
    	
    </td>
    </tr>
    <tr>
    	<td width="73%" height="25" align="right" bgcolor="#E0E0E0">
         	
    <table border="0" cellpadding="0" cellspacing="0" width="700">
      <tr>
        <td width="30"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
        <td class = header width="666" height="20"><b>Add Department/Designation</b></td>
      </tr>
    </table>
         	
    </td>
    </tr>
    <tr>
    	<td width="73%" height="101" align="right" bgcolor="#EEEEEE">
         	
    <table border="0" cellpadding="4" cellspacing="0" width="700" class = bodytext>
      <tr>
        <td width="187">
          <p align="right">Department</td>
  <center>
        <td width="276"><input class = 'input' type="text" name="New_Dept" size="20" class = bodytext></td>
        <td width="231"></td>
      </tr>
      <tr>
        <td width="187">
          <p align="right">Designation</td>
        <td width="276"><input class = 'input' type="text" name="New_Dsgn" size="20" class = bodytext></td>
        <td width="231"></td>
      </tr>
      <tr>
        <td width="187"></td>
        <td width="276">
      <input class = 'input' style = 'width:60;' type="submit" value="Add" name="Add" onclick = "frmRecEntry.operation.value = 'DeptAdd';"></td>
        <td width="231"></td>
      </tr>
      <tr>
        <td width="187"></td>
      </tr>
    </table>
         	
    </center>
         	
    </td>
    </tr>
   <tr>
    <td class=header width="51%" height="20" align="right" bgcolor="#E0E0E0" nowrap>
      &nbsp;
    </td>
    </tr>
  </table>
   </div>

<input name ='operation' type = 'hidden' value="">
<input name ='Add_Edit' type = 'hidden' value="">

</form>

<script>

function add()
{
/*	frmRecEntry.operation.value = 'Details';
	frmRecEntry.submit();
	frmRecEntry.txtEmpName.value="";
	frmRecEntry.txtEmpId.value="";
	frmRecEntry.AcNo.value="";
	frmRecEntry.GrossSalary.value="";
	frmRecEntry.DOJ.value="";*/
}

function validate()
{
	frmRecEntry.operation.value = 'Details';

	var EmpName = frmRecEntry.txtEmpName.value;
	var EmpId = frmRecEntry.txtEmpId.value;
	var AcNo = frmRecEntry.AcNo.value;
	var Gross = frmRecEntry.GrossSalary.value;
	var Date = frmRecEntry.DOJ.value;

	if(EmpName == "")
	{
		frmRecEntry.txtEmpName.focus();
		alert("Enter the Employee Name!");
		return;
	}
	if(EmpId == "")
	{
		frmRecEntry.txtEmpId.focus();
		alert("Enter the Employee Id!");
		return;
	}
	if(AcNo == "")
	{
		frmRecEntry.AcNo.focus();
		alert("Enter the Account No!");
		return;
	}
	if(Gross == "")
	{
		frmRecEntry.GrossSalary.focus();
		alert("Enter the Gross Salary!");
		return;
	}
	if(Date == "")
	{
		frmRecEntry.DOJ.focus();
		alert("Enter the Date of joining!");
		return;
	}
	frmRecEntry.submit();
}

</script>

</body>

</html>
