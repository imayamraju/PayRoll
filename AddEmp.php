<?PHP
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
<link rel="stylesheet" type="text/css" href="_css/global.css">
</head>
<body bgcolor="#C0C0C0" >

<script src="_script/calender.js"></script>

<script language='javascript'>

var nCount=0;
var i = 0;
var EName;
var EId;
var cYear;
var cMon;
var EDept;

function IsLeapYear(Year)
{
	if ((Year%4)==0)
	{
		if ((Year%100==0) && (Year%400)!=0)
			return false;
		else
			return true;
	}
	else
		return false;
}

function FillYear()
{
	var d,m,y;

	d = new Date();
  	m = d.getMonth();
  	y = d.getYear();

	for(i=2000;i<= y;i++)
	{
		var oOption = document.createElement("OPTION");
		oOption.text = i;
		oOption.value = i;
		frmRecEntry.Dear.add(oOption);
	}
	
	 cYear = y;
	cMon = m;

	//GetWorkingDay();
	
}


function loadData(p1,p2)
{
	var cValue = frmRecEntry.EmpName.value;
	var Inc = parseFloat(frmRecEntry.Inc.value);

	window.frames["iloader"].document.forms["loader"].param1.value = p1;
	window.frames["iloader"].document.forms["loader"].param2.value = EDept;
	window.frames["iloader"].document.forms["loader"].param3.value = EName;
	window.frames["iloader"].document.forms["loader"].param4.value = EId;
	window.frames["iloader"].document.forms["loader"].param5.value = cYear;
	window.frames["iloader"].document.forms["loader"].param9.value = Inc;
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
			frmRecEntry.DOR.value = "";
			frmRecEntry.txtPFNo.value = "";
			frmRecEntry.txtESINo.value = "";
			frmRecEntry.Chk.checked = false;
			frmRecEntry.SelCat.value="";
			frmRecEntry.cmbDept.value="";
			frmRecEntry.Basic.value="";
			frmRecEntry.HRA.value="";
			frmRecEntry.CCA.value="";
			frmRecEntry.mra.value="";
			frmRecEntry.specialallow.value="";
			frmRecEntry.lta.value="";
			frmRecEntry.Salary_Total.value="";
			frmRecEntry.PF.value="";
			frmRecEntry.esi.value="";
			frmRecEntry.Pro_Tax.value="";
			frmRecEntry.tds.value="";
			frmRecEntry.cmbDsgn.value="";
			frmRecEntry.Deduct_Total.value="";
			frmRecEntry.Net_Salary.value="";
			frmRecEntry.Annum_Salary.value="";
			frmRecEntry.pfoff.value="";
			frmRecEntry.esioff.value="";
			frmRecEntry.Inc.value="0";
			frmRecEntry.Add_Edit.value = 'Add';
			//calculateSalary();
		}
		
		frmRecEntry.txtEmpName.readOnly = false;
		frmRecEntry.txtEmpId.readOnly = false;
		frmRecEntry.AcNo.readOnly = false;
		frmRecEntry.GrossSalary.readOnly = false;
		frmRecEntry.Inc.value="0";
		frmRecEntry.txtPFNo.readOnly = false;
		frmRecEntry.txtESINo.readOnly = false;
		
		frmRecEntry.Save.value = 'Save';

		if(OptVal == '2')
		{
			frmRecEntry.Add_Edit.value = 'Edit';
		}
	}
		else if(OptVal == '3')
		{
		frmRecEntry.txtEmpName.readOnly = true;
		frmRecEntry.txtEmpId.readOnly = true;
		frmRecEntry.AcNo.readOnly = true;
		frmRecEntry.GrossSalary.readOnly = true;
		frmRecEntry.txtPFNo.readOnly = true;
		frmRecEntry.txtESINo.readOnly = true;
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
	frmRecEntry.SelCat.value = items[9];
	frmRecEntry.DOR.value = items[10];
	frmRecEntry.txtPFNo.value = items[11];
	frmRecEntry.txtESINo.value = items[12];
	frmRecEntry.Basic.value=items[13];
	frmRecEntry.HRA.value=items[14];
	frmRecEntry.lta.value=items[15];
	frmRecEntry.CCA.value=items[16];
	frmRecEntry.specialallow.value=items[17];
	frmRecEntry.mra.value=items[18];
	frmRecEntry.Salary_Total.value=items[19];
	frmRecEntry.PF.value=items[20];
	frmRecEntry.esi.value=items[21];
	frmRecEntry.Pro_Tax.value=items[22];
	frmRecEntry.tds.value=items[23];
	frmRecEntry.Deduct_Total.value=items[24];
	frmRecEntry.Net_Salary.value=items[25];
	frmRecEntry.Annum_Salary.value=items[26];
	
	
	document.getElementById('CatStatus').innerHTML = items[9];
	frmRecEntry.SelectOption(2).checked = true;
	
	if((items[4] == "Director")|| (items[4] == "Managing Director"))
	{
		frmRecEntry.Chk.checked = true;
		}
	else{
		frmRecEntry.Chk.checked = false;
		}

	DisplayDetails(3);
	
}


</script>

<?PHP
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

 <form name = 'frmRecEntry' action = "NewEmployee.php?msg='Successfully Connection'" method = "post">
 <div align="center">
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
	<tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
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
          <table border="0" cellpadding="0" cellspacing="0" width="100%"><!--700-->
            <tr>
    	<td class=header width="1%" height="25" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header width="71%" align="right" bgcolor="#E0E0E0">
      	<p align="left"><b><font color="#000000">Search Employee</font></b></td>
		
			<td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="">
                <a class = header href = "logout.php?msg='Successfully Connection'"><font color="">Logout</font></a>
              </ul>
            </td>
			
              <td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Mel_Report.php?msg='Successfully Connection'"><font color="#000000">MSPL</font></a></li>
              </ul>
            </td>
              <td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "MIPL_Report.php?msg='Successfully Connection'"><font color="#000000">MIPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Avi_Report.php?msg='Successfully Connection'"><font color="#000000">ASPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center" height="15">
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
          <table border="0" cellpadding="4" cellspacing="0" width="100%"><!--697-->
     <tr>
    <td class = bodytext width="201" height="19" align="right" bgcolor="#EEEEEE">Filter By Department</td>
    <td class = bodytext width="494" height="19" bgcolor="#EEEEEE" colspan="5"><select class = 'input' size="1" name="Dept" onchange = "EDept = this.value;loadData('SelDept');">
        <option>Select the Department</option>
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
		<td width="225"><select class = 'input' size="1" name="EmpName" onchange = "EName = this.value;setIndex('NameList');" onclick = "EName = this.value;setIndex('NameList');">
        <option value="">Select EName</option>
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
		<td width="466"><select class = 'input' size="1" name="EmpId" onchange = "EId = this.value;setIndex('IdList');" onclick = "EId = this.value;setIndex('IdList');">
        <option vlue=" ">Select EID</option>
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
          <table border="0" cellpadding="0" cellspacing="0" width="100%"><!--700-->
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
         	
    <table border="0" cellpadding="4" cellspacing="0" width="100%" class = bodytext><!--699-->
      <tr>
    <td bgcolor="#EEEEEE" valign="top" align="left" width="112">
      
      <p align="right">
      
      Select the option</p>    </td>
  <center>
  <center>
    <td height="19" bgcolor="#EEEEEE" colspan="3">
      <table border="1" cellpadding="0" cellspacing="0" width="207">
        <tr>
          <td width="533">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class = bodytext><!--209-->
              <tr>
    <td width="1" height="19" bgcolor="#EEEEEE"><input type="radio" value="1"  name="SelectOption" onclick = "DisplayDetails('1')">Add</td>
    <td width="45" height="19" bgcolor="#EEEEEE"><input type="radio" value="2" name="SelectOption"  onclick = "DisplayDetails('2')">Edit</td>
    <td width="1" height="19" bgcolor="#EEEEEE"><input type="radio" value="3" name="SelectOption"  onclick = "DisplayDetails('3');">Delete</td>
              </tr>
            </table>          </td>
        </tr>
      </table>    </td>
      </tr>
      <tr>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">Department&nbsp;</td>
    <td height="19" bgcolor="#EEEEEE" colspan="3"><select class = 'input' size="1" name="cmbDept">
     <option>Select Dept</option> 
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
	<td width="112" height="19" align="right" bgcolor="#EEEEEE">Employee
      Id</td>
    <td height="19" bgcolor="#EEEEEE" colspan="3"><input class = 'input' type="text" name="txtEmpId" size="20"></td>
	    <td width="24%" bgcolor="#EEEEEE" align="right">Basic+DA</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="Basic" size="20" ></td>
          <td width="24%" bgcolor="#EEEEEE" align="right">LTA</td>
    <td width="30%" bgcolor="#EEEEEE"><input type="text" name="lta" size="20" readonly></td>
  </tr>
  <tr class=bodytext>
	<td width="112" height="19" align="right" bgcolor="#EEEEEE">Employee
      Name</td>
    <td height="19" bgcolor="#EEEEEE" colspan="3"><input class = 'input' type="text" name="txtEmpName" size="20"></td>
	    <td width="24%" bgcolor="#EEEEEE" align="right">HRA</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="HRA" size="20" ></td>
          <td width="19%" bgcolor="#EEEEEE" align="right">CCA</td>
          <td width="33%" bgcolor="#EEEEEE"><input type="text" name="CCA" size="20" ></td>
  </tr>
 <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">Account No</td>
    <td height="19" bgcolor="#EEEEEE" colspan="3"><input class = 'input' type="text" name="AcNo" size="20"></td>
	<td width="24%" bgcolor="#EEEEEE" align="right">Special_Allow</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="specialallow" size="20" readonly></td>
          <td width="19%" bgcolor="#EEEEEE" align="right">M R</td>
          <td width="33%" bgcolor="#EEEEEE"><input type="text" name="mra" size="20" ></td>
  </tr> 
  <tr class=bodytext>
  
  <td width="112" height="19" align="right" bgcolor="#EEEEEE">Gross
      Salary/Increment</td>
    <td  height="19" bgcolor="#EEEEEE" colspan="3"><input class='input' type="text" name="GrossSalary" size="9" readonly><input class='input' type="text" name="Inc" size="7"></td>
  
   
	
	<td width="19%" bgcolor="#EEEEEE" align="right">Total</td>
    <td width="33%" bgcolor="#EEEEEE"><input type="text" name="Salary_Total" size="20" readonly></td>
    <td><td width="33%" align="center" bgcolor="#EEEEEE"><input class = 'input' type="button" value="Update" name="B2" style ="width:70;" onclick = "upbasic();"></td>    
  </tr>
      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE"> Designation</td>
    <td width="191" height="19" bgcolor="#EEEEEE"><select class = 'input' size="1" name="cmbDsgn">
     <option>Select the Desig</option>          
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
      </select>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type='checkbox' name='Chk'> </td>
      
     
          <td width="118" height="19" bgcolor="#EEEEEE">Director </td>
          <TD width="32" bgColor="#eeeeee" height="19">&nbsp;</TD>
          
		  <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	<td bgcolor="#EEEEEE" width="32" height="25">&nbsp;
	<span id="CatStatus"  style="color:#FF3399;font-weight:900;"></td>
</TR>
      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">Date of Joining</td>
    <td width="191" height="19" bgcolor="#EEEEEE" ><input class = 'input' type="text" name="DOJ" size="20" readonly>
      <img style = 'cursor:hand;' border="0" src="Img/cal.gif" width="16" 	height="16" alt = "Pick a date" onClick="javascript:showcal(DOJ,this);"></td>
    <td bgcolor="#EEEEEE" width="129" height="25">&nbsp;</td>
    <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">PF</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="PF" size="20" ></td>
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">ESI</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="esi" size="20" readonly></td>
	
      </tr>
      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE"> Category</td>
    <td width="191" height="19" bgcolor="#EEEEEE"><select class = 'input' size="1" name="SelCat">
     <option value="Current">Current</option>
     <option value="Contract">Contract</option>
      <option value="Resigned">Resigned</option>

      </select>&nbsp;&nbsp;&nbsp;&nbsp 
	 
     </td>
          <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	<td bgcolor="#EEEEEE" width="129" height="25">&nbsp;
	<span id="CatStatus"  style="color:#FF3399;font-weight:900;"></td>
	<td width="19%" height="19" align="right" bgcolor="#EEEEEE">Prof Tax</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Pro_Tax" size="20" readonly></td>
	<td width="19%" height="19" align="right" bgcolor="#EEEEEE">TDS</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="tds" size="20" ></td>
</TR>

      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">Date Of Resigning</td>
    <td width="191" height="19" bgcolor="#EEEEEE" >
	<input class = 'input' type="text" name="DOR" size="20" readonly>
      <img style = 'cursor:hand;' border="0" src="Img/cal.gif" width="16" height="16" alt = "Pick a date" onClick="javascript:showcal(DOR,this);"></td>
    <td bgcolor="#EEEEEE" width="129" height="25">&nbsp;</td>
    <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">Total</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="Deduct_Total" size="20" readonly></td>
      </tr>

      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">PF No</td>
    <td width="191" height="19" bgcolor="#EEEEEE" ><input type="text" name="txtPFNo" size="20" >
     </td>
    <td bgcolor="#EEEEEE" width="129" height="25">&nbsp;</td>
    <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	
      </tr>
      <tr class=bodytext>
    <td width="112" height="19" align="right" bgcolor="#EEEEEE">ESI No</td>
    <td width="191" height="19" bgcolor="#EEEEEE" ><input type="text" name="txtESINo" size="20" >
     </td>
    <td bgcolor="#EEEEEE" width="129" height="25">&nbsp;</td>
    <td width="118" height="19" bgcolor="#EEEEEE">&nbsp;</td>
	<td width="19%" height="19" align="right" bgcolor="#EEEEEE">Net Salary</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Net_Salary" size="20" readonly></td>
	<td width="19%" height="19" align="right" bgcolor="#EEEEEE">CTC</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Annum_Salary" size="20" readonly></td>
      </tr>

    </center>
	</table>
	<table>
    <tr>
    <td class=header  align="right" bgcolor="#EEEEEE"></td>
      <p align="center">

	<td><input class = 'input' type="button" value="Calculate" name="B1" style ="width:90;" onclick = "calculateSalary();">
	<input class = 'input' style = 'width:60;' type="button" value="Save" name="Save" onclick = "validate();"></td>
	</p>
	
	  </tr>
    </table>
     </center>
    </center>
    	
    </td>
    </tr>
    <tr>
    	<td width="73%" height="25" align="right" bgcolor="#E0E0E0">
         	
    <table border="0" cellpadding="0" cellspacing="0" width="100%"><!--700-->
      <tr>
        <td width="30"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
        <td class = header width="666" height="20"><b>Add Department/Designation</b></td>
      </tr>
    </table>
         	
    </td>
    </tr>
    <tr>
    	<td width="73%" height="101" align="right" bgcolor="#EEEEEE">
         	
    <table border="0" cellpadding="4" cellspacing="0" width="700" class = bodytext><!--700-->
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
    <td class=header width="51%" height="20" align="right" bgcolor="#E0E0E0" nowrap>&nbsp;
      
    </td>
    </tr>
  </table>
   </div>

<input name ='operation' type = 'hidden' value="">
<input name ='Add_Edit' type = 'hidden' value="">
<input name ='pfoff' type = 'hidden' value="">
<input name ='esioff' type = 'hidden' value="">
</form>

<script>

function calculateSalary()
{
	var Annum_Salary;
	var Gross1 = parseFloat(frmRecEntry.GrossSalary.value);
	var Inc = parseFloat(frmRecEntry.Inc.value);
	var cmbDsgn=frmRecEntry.cmbDsgn.value;
	var cmbDsgn1="Director";
	var tds=parseFloat(frmRecEntry.tds.value);
	var Basic,HRA,specialallow,lta=0,Salary_Total = 0,Pro_Tax=0,PF = 0,esi=0;
	var Deduct_Total,Net_Salary = 0,EarnTotal=0,esioff=0,pfoff=0;
	
	var Gross;
	
	
	if(isNaN(Gross1)) Gross1=0;
	if(isNaN(tds)) tds=0;
	if(isNaN(Inc)) Inc=0;
	Gross=Math.ceil(Gross1+Inc);
	
	 if(Gross<0|| Gross==0)
	{
	Basic=0;
	HRA=0;
	CCA=0;
	mra=0;
	tds=0;
	PF=0;
	esi=0;
	Pro_Tax=0;
	specialallow=0;
	Salary_Total=0;
	EarnTotal=0;
	Total_Deduction=0;
	Net_Salary=0;
	Annum_Salary=0;
	}
	
	else
	{
	Basic=Math.ceil(Gross*0.40);
	HRA=Math.ceil(Gross*0.20);
	//PF=Math.ceil(Basic*0.12);
	//pfoff=Math.ceil(Basic*0.1361);
	lta=Math.ceil(Basic/12);
	CCA=800;
	mra=1250;
	//tds=0;
	
	if(Gross>0 && Gross<10000)
	{
	Pro_Tax=0;
	
	}
	else if(Gross>9999 && Gross<15000)
	{
	Pro_Tax=150;
	
	}
	else{
	Pro_Tax=200;
	
	}
	if(Gross>0 && Gross<15000)
	{
	esi=Math.ceil(Basic*0.0175);
	esioff=Math.ceil(Basic*0.0475);
	
	}
	else
	{
	esi=0;
	}
	if(cmbDsgn.match(cmbDsgn1)=="Director")
	{
	PF=0;
	pfoff=0;
	}
	else
	{
	PF=Math.ceil(Basic*0.12);
	pfoff=Math.ceil(Basic*0.1361);
	}
	}	
	
	specialallow=Math.ceil(Gross-(Basic+HRA+CCA+mra+lta));
	EarnTotal=Math.ceil(Basic+HRA+CCA+mra+lta+specialallow);
	Total_Deduction = Math.ceil(PF + Pro_Tax + esi + tds);
	
	Net_Salary = Math.ceil(EarnTotal - Total_Deduction);
	Annum_Salary=Gross*12;
	
	
	
	
	frmRecEntry.pfoff.value = pfoff;
	frmRecEntry.esioff.value = esioff;
			
	//frmRecEntry.GrossSalary.value=ESal;
	frmRecEntry.Basic.value = Basic;
	//frmRecEntry.DA.value = DA;
	frmRecEntry.HRA.value = HRA;
	frmRecEntry.CCA.value = CCA;
	frmRecEntry.specialallow.value = specialallow;
	frmRecEntry.mra.value = mra;
	frmRecEntry.lta.value = lta;
	frmRecEntry.PF.value = PF;
	frmRecEntry.esi.value = esi;
	frmRecEntry.Pro_Tax.value = Pro_Tax;
	frmRecEntry.tds.value = tds;
	frmRecEntry.Deduct_Total.value = Total_Deduction;
	frmRecEntry.Salary_Total.value = EarnTotal;
	frmRecEntry.Net_Salary.value = Net_Salary;
	frmRecEntry.Annum_Salary.value=Annum_Salary;
	
}

function onload_calculateSalary()
{

	var Annum_Salary;
	var Gross = parseFloat(frmRecEntry.GrossSalary.value);
	var Inc = parseFloat(frmRecEntry.Inc.value);
	var cmbDsgn=frmRecEntry.cmbDsgn.value;
	var cmbDsgn1="Director";
	var tds=parseFloat(frmRecEntry.tds.value);
	var Basic,HRA,specialallow,lta=0,Salary_Total = 0,Pro_Tax=0,PF = 0,esi=0;
	var Deduct_Total,Net_Salary = 0,EarnTotal=0,esioff=0,pfoff=0;
	var Gross;
	
	
	
	
	
	
	if(isNaN(Gross1)) Gross1=0;
	if(isNaN(tds)) tds=0;
	if(isNaN(Inc)) Inc=0;
	
	Gross=Math.ceil(Gross1+Inc);
	
	 if(Gross<0|| Gross==0)
	{
	Basic=0;
	HRA=0;
	CCA=0;
	mra=0;
	tds=0;
	PF=0;
	esi=0;
	Pro_Tax=0;
	specialallow=0;
	Salary_Total=0;
	EarnTotal=0;
	Total_Deduction=0;
	Net_Salary=0;
	Annum_Salary=0;
	}
	
	else
	{
	Basic=Math.ceil(Gross*0.40);
	HRA=Math.ceil(Gross*0.20);
	
	lta=Math.ceil(Basic/12);
	CCA=800;
	mra=1250;
	//tds=0;
	
	if(Gross>0 && Gross<10000)
	{
	Pro_Tax=0;
	
	}
	else if(Gross>9999 && Gross<15000)
	{
	Pro_Tax=150;
	
	}
	else{
	Pro_Tax=200;
	
	}
	if(Gross>0 && Gross<15000)
	{
	esi=Math.ceil(Basic*0.0175);
	esioff=Math.ceil(Basic*0.0475);
	}
	else
	{
	esi=0;
	
	}
	if(cmbDsgn.match(cmbDsgn1)=="Director")
	{
	PF=0;
	pfoff=0;
	}
	else
	{
	PF=Math.ceil(Basic*0.12);
	pfoff=Math.ceil(Basic*0.1361);
	}
	}	
	
	specialallow=Math.ceil(Gross-(Basic+HRA+CCA+mra+lta));
	EarnTotal=Math.ceil(Basic+HRA+CCA+mra+lta+specialallow);
	Total_Deduction = Math.ceil(PF + Pro_Tax + esi + tds);
	
	Net_Salary = Math.ceil(EarnTotal - Total_Deduction);
	Annum_Salary=Gross*12;
	
	
	
	frmRecEntry.pfoff.value = pfoff;
	frmRecEntry.esioff.value = esioff;
			
	//frmRecEntry.GrossSalary.value=ESal;
	frmRecEntry.Basic.value = Basic;
	//frmRecEntry.DA.value = DA;
	frmRecEntry.HRA.value = HRA;
	frmRecEntry.CCA.value = CCA;
	frmRecEntry.specialallow.value = specialallow;
	frmRecEntry.mra.value = mra;
	frmRecEntry.lta.value = lta;
	frmRecEntry.PF.value = PF;
	frmRecEntry.esi.value = esi;
	frmRecEntry.Pro_Tax.value = Pro_Tax;
	frmRecEntry.tds.value = tds;
	frmRecEntry.Deduct_Total.value = Total_Deduction;
	frmRecEntry.Salary_Total.value = EarnTotal;
	frmRecEntry.Net_Salary.value = Net_Salary;
	frmRecEntry.Annum_Salary.value=Annum_Salary;
	
}


function upbasic()
{
	var Gross = parseFloat(frmRecEntry.GrossSalary.value);
	var Basic=parseFloat(frmRecEntry.Basic.value);	
	var CCA=parseFloat(frmRecEntry.CCA.value);
	var mra=parseFloat(frmRecEntry.mra.value);
	var tds=parseFloat(frmRecEntry.tds.value);
	var HRA=parseFloat(frmRecEntry.HRA.value);
	var Pro_Tax=parseFloat(frmRecEntry.Pro_Tax.value);
	var cmbDsgn=frmRecEntry.cmbDsgn.value;
	var cmbDsgn1="Director";
	
	var PF,lta,pfoff=0,esioff=0,esi=0;
	
	if(isNaN(Gross)) Gross=0;
	if(isNaN(Basic)) Basic=0;
	if(isNaN(HRA)) HRA=0;
	if(isNaN(CCA)) CCA=0;
	if(isNaN(mra)) mra=0;
	if(isNaN(Pro_Tax)) Pro_Tax=0;
	if(isNaN(tds)) tds=0;
	if(isNaN(Pro_Tax)) Pro_Tax=0;
	
	
	lta=Math.ceil(Basic/12);
	
/*	
	if(Gross>0 && Gross<10000)
	{
	Pro_Tax=0;
	
	}
	else if(Gross>9999 && Gross<15000)
	{
	Pro_Tax=150;
	
	}
	else{
	Pro_Tax=200;
	
	}
	
	*/
	if(Gross>0 && Gross<15000)
	{
	esi=Math.ceil(Basic*0.0175);
	esioff=Math.ceil(Basic*0.0475);
	
	}
	else
	{
	esi=0;
	}
	
	if(cmbDsgn.match(cmbDsgn1)=="Director")
	{
	PF=Math.ceil(Basic*0);
	pfoff=Math.ceil(Basic*0);
	}
	else
	{
	PF=Math.ceil(Basic*0.12);
	pfoff=Math.ceil(Basic*0.1361);
	}
	
	specialallow=Math.ceil(Gross - (Basic + HRA + CCA + mra + lta));
	EarnTotal=Math.ceil(Basic + HRA + CCA + mra + lta + specialallow);
	Total_Deduction = Math.ceil(PF + Pro_Tax + esi + tds);
	
	Net_Salary = Math.ceil(EarnTotal - Total_Deduction);
	Annum_Salary=Gross*12;
	
	frmRecEntry.pfoff.value = pfoff;
	frmRecEntry.esioff.value = esioff;	
	
	frmRecEntry.Basic.value = Basic;
	frmRecEntry.HRA.value = HRA;
	frmRecEntry.CCA.value = CCA;
	frmRecEntry.specialallow.value = specialallow;
	frmRecEntry.mra.value = mra;
	frmRecEntry.lta.value = lta;
	frmRecEntry.PF.value = PF;
	frmRecEntry.esi.value = esi;
	frmRecEntry.Pro_Tax.value = Pro_Tax;
	frmRecEntry.tds.value = tds;
	frmRecEntry.Deduct_Total.value = Total_Deduction;
	frmRecEntry.Salary_Total.value = EarnTotal;
	frmRecEntry.Net_Salary.value = Net_Salary;
	frmRecEntry.Annum_Salary.value=Annum_Salary;
}

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
	var Cat = frmRecEntry.SelCat.value;	
	var PFNo = frmRecEntry.txtPFNo.value;
	var ESINo = frmRecEntry.txtESINo.value;
	
	
	/*var Basic = frmRecEntry.Basic.value;
	var HRA= frmRecEntry.HRA.value;
	var specialallow = frmRecEntry.specialallow.value;
	var lta = frmRecEntry.lta.value;
	var mra= frmRecEntry.mra.value;
	var CCA= frmRecEntry.CCA.value;
	var Salary_Total= frmRecEntry.Salary_Total.value;
	var PF= frmRecEntry.PF.value;
	var esi= frmRecEntry.esi.value;
	var Pro_Tax= frmRecEntry.Pro_Tax.value;
	var tds= frmRecEntry.tds.value;*/
	
	
	//window.alert(frmRecEntry.SelCat.value);
	//window.alert(Cat);

	if(frmRecEntry.Chk.checked == true)
		frmRecEntry.Chk.value = "Checked";
	else
		frmRecEntry.Chk.value = "Unchecked";

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
