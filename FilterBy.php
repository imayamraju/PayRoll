<?php 

	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];
//	echo $Company;

?>	

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body bgcolor="#C0C0C0" onload = "loadData()">


<script>

var EName;
var EId;
var cYear;
var cMon;
var EDept;
var OtherDetails;
var DisplayField;
var DisId;
var start;
var end;
var comp;

function DisplayData()
{
	DisplayField = frmRecEntry.Dept.value;
	DispId = frmRecEntry.EmpId.value; 

	if(frmRecEntry.SelFilter.value == '1')
	{
		frmRecEntry.Name.value = 'DEPART';
	
		window.frames["iloader"].document.forms["loader"].param1.value = "DeptName";
		window.frames["iloader"].document.forms["loader"].param2.value = DisplayField;
		window.frames["iloader"].document.forms["loader"].param3.value = DispId;
		window.frames["iloader"].document.forms["loader"].action = "dataProvider.php";
		window.frames["iloader"].document.forms["loader"].submit();
		return true;
	}
	
	window.frames["iloader1"].document.location = "SearchSalaryDetail.php?DisplayField=" + DisplayField + "&DisplayName=" + frmRecEntry.Name.value + "&DisplayId=" + DispId;
	return true;
	
}

function DisplayNames()
{
	DispDept = frmRecEntry.EmpName.value;

	frmRecEntry.Name.value = 'DEPART';

	window.frames["iloader1"].document.location = "SearchSalaryDetail.php?DisplayField=" + frmRecEntry.Name.value + "&DisplayDept=" + DispDept;
	return true;
}

function loadData()
{
	var cValue = frmRecEntry.Dept.value;

		/*window.frames["iloader"].document.forms["loader"].param1.value = "LoadDept";
		
		frmRecEntry.EmpId.style.display = "";
		lblIdText.innerText = "Emp Id:";

		lblDeptText.innerText = "Department : ";
		frmRecEntry.Dept.style.display = "";
		
		lblNameText.innerText ="Emp Name";
		frmRecEntry.EmpName.style.display = "";

		frmRecEntry.StartSal.style.display = "none";
		frmRecEntry.EndSal.style.display = "none";
		
		frmRecEntry.Search.style.visibility = "hidden";*/

	if(frmRecEntry.SelFilter.value == '1')
	{
		window.frames["iloader"].document.forms["loader"].param1.value = "LoadDept";
		
		frmRecEntry.EmpId.style.display = "";
		lblIdText.innerText = "Emp Id:";
		

		lblDeptText.innerText = "Department : ";
		frmRecEntry.Dept.style.display = "";
		
		lblNameText.innerText ="Emp Name";
		lblNameText.style.display = "";
		frmRecEntry.EmpName.style.display = "";

		frmRecEntry.StartSal.style.display = "none";
		frmRecEntry.EndSal.style.display = "none";
		frmRecEntry.Search.style.display = "none"; 
		

	}
	else if(frmRecEntry.SelFilter.value == '2')
	{
		frmRecEntry.StartSal.style.display = "";
		lblDeptText.innerText = "Start Salary : ";

		frmRecEntry.EndSal.style.display = "";
		lblIdText.innerText = "End Salary";

		frmRecEntry.EmpName.style.display = "none";
		frmRecEntry.EmpId.style.display = "none";
		
		frmRecEntry.Dept.style.display = "none";
		lblNameText.innerText ="";
		lblNameText.style.display = "none";
		frmRecEntry.Search.style.display = ""; 
	}
	
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

function setIndex(ItemId)
{
	if(ItemId == "EmpName")

		frmRecEntry.EmpId.selectedIndex = frmRecEntry.EmpName.selectedIndex;
	else if(ItemId == "EmpId")

		frmRecEntry.EmpName.selectedIndex = frmRecEntry.EmpId.selectedIndex;

	EName = frmRecEntry.EmpName.value;

	EId = frmRecEntry.EmpId.value;

}

function LoadSelectData(data,elementId)
{
	var items = data.split(",");
	var i;
	var element = document.forms["frmRecEntry"].item(elementId);

	for (var i = element.options.length - 1; i >= 0; i--)
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

function DispDetails()
{
	start = frmRecEntry.StartSal.value;
	end = frmRecEntry.EndSal.value;
	
	frmRecEntry.Disp.value = "Search";
	
	window.frames["iloader1"].document.location = "SearchSalaryDetail.php?DispSearch=" + frmRecEntry.Disp.value + "&Sal_Start=" + start + "&Sal_End=" + end;
	return true;
}

</script>
<?php 

	$socket = mysql_connect('localhost', $user, $pass);
	if (! $socket)
		die ("Could not connect to MySql Server");
	//else
	//	echo "Connected";

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error() );

?>
 
<iframe id="iloader" name="iloader" width="0" height="0" border="0" src="dataCaller.php?msg='Successfully Connection'">
	Not support for iframe...
 </iframe>
 <form name = 'frmRecEntry' method = "post">
 <div align="center" >
  <center>
  <table border="1" cellspacing="0" width="265" bordercolorlight="#004848" bordercolordark="#FFFFFF" height="30">

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

                <li><a class = header href = "AddEmp.php?msg='Successfully Connection'"><font color="#000000">Add/Update Employee Details</font></a></li>
              </ul>
            </td>
          </tr>
	<tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">
                <li><a class = header href = "ShowPaySlip.php?msg='Successfully Connection'"><font color="#000000">Pay Slip</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">
                <li><a class = header href = "ChangePass.php?msg='Successfully Connection'"><font color="#000000">Change Password</font></a></li>
              </ul></td>
          </tr>
	<tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">
	<?php
	if($Company == "M")
	{
	?>
                <li><a class = header href = "Mel_Report.php?msg='Successfully Connection'"><font color="#000000">Index</font></a></li>
	<?php
	}
	else if($Company == "A")
	{
	?>
		<li><a class = header href = "Avi_Report.php?msg='Successfully Connection'"><font color="#000000">Index</font></a></li>
	<?php
	}
	else if($Company == "I")
	{
	?>
		<li><a class = header href = "MIPL_Report.php?msg='Successfully Connection'"><font color="#000000">Index</font></a></li>
	<?php
	}
	else
	{
	?>
		<li><a class = header href = "MBS_Report.php?msg='Successfully Connection'"><font color="#000000">Index</font></a></li>
	<?php
	}
	?>

              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowBankReport.php?msg='Successfully Connection'"><font color="#000000">Bank Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowMonthlyReport.php?msg='Successfully Connection'"><font color="#000000">Monthly Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "FilterBy.php?msg='Successfully Connection'"><font color="#000000">Salary
              Details</font></a></li>
              </ul>
            </td>
          </tr>
          
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "ShowConsReport.php?msg='Successfully Connection'"><font color="#000000">Consolidated Reports</font></a></li>
              </ul>
            </td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "ShowYearlyReport.php?msg='Successfully Connection'"><font color="#000000">Yearly Reports</font></a></li>
              </ul>
            </td>
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
      	<p align="left"><b><font color="#000000">Search Employee Salary Details</font></b></td>
		
		<td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="">
                <a class = header href = "logout.php?msg='Successfully Connection'"><font color="">Logout</font></a>
              </ul>
            </td>
			
              <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Mel_Report.php?msg='Successfully Connection'"><font color="#000000">MSPL</font></a></li>
              </ul>
            </td>
              <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "MIPL_Report.php?msg='Successfully Connection'"><font color="#000000">MIPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Avi_Report.php?msg='Successfully Connection'"><font color="#000000">ASPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "MBS_Report.php?msg='Successfully Connection'"><font color="#000000">MBS</font></a></li>
              </ul>
            </td>

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
         <td class = bodytext width="201" height="19" align="right" bgcolor="#EEEEEE">Filter By </td>
         <td class = bodytext width="494" height="19" bgcolor="#EEEEEE" colspan="5">
             <select class = 'input' size="1" name="SelFilter" onchange = "loadData();">
                 <option value = "1">Department</option>
                 <option value = "2">Salary</option> 
             </select>
        </td>
     </tr>
     <tr>
         <td width="201" class = bodytext> <p align="right" id = 'lblDeptText'>Department</td>
	 <td width="494"><input class = 'input' type="text" name="StartSal" size="10">
	     <select class = 'input' size="1" name="Dept" onclick = "EDept = this.value;setIndex('Dept');DisplayData();"> 
                 <option value = " ">Select Department....</option>
	     </select></td>
         <td width="201" class = bodytext> <p align="right" id = 'lblIdText'>Emp Id</td>
	 <td width="494"><input class = 'input' type="text" name="EndSal" size="10">
	     <select class = 'input' size="1" name="EmpId" onclick = "EId = this.value;setIndex('EmpId');DisplayNames();">
                <option value = " ">Select employee ID....</option>
	     </select></td>
         <td width="400" class = bodytext><input type="button" name = "Search" value="Search" onclick = "DispDetails();" style = 'display:none'><p align="right" id = 'lblNameText'>Emp Name</p></td>
         <td width="400"><p align="left">
             <select class = 'input' size="1" name="EmpName" onclick = "EName = this.value;setIndex('EmpName');DisplayNames();">
                <option value = " ">Select employee name....</option>
	     </select></td>
     </tr>
     </table>
<tr class=header>
    	<td class=header width="47%" height="0" valign = 'top' align="left" bgcolor="#EEEEEE">
<iframe id="iloader1" name="iloader1" width="700" height="420" border="0" src="SearchSalaryDetail.php">
	Not support for iframe...
 </iframe>
</td>
</tr>
    </td>
    </tr>
  </table>

  </div>
<TEXTAREA  name=EmpList rows=1000 col=50 style= display:'none' height:100px></TEXTAREA>

<input name ='Name' type = 'hidden' value="">
<input name ='Disp' type = 'hidden' value="">

</form>

</body>

</html>
    
