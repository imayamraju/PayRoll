<?php
			include 'ServerDetail.php';
			session_start();
			$_SESSION['company'] = "M";
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>

<script language='javascript' Src="_script/digittowordconverter.js"></script>

<script language='javascript'>

var EName;
var EId;
var cYear;
var cMon;
var EDept;
var OtherDetails;
var ITAcc;
var MonthStr;
var YearStr;
var SearchMonth;
var esioff;
var Basic1;
var HRA1;
var CCA1;
var mra1;
var Cur_IT;


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

function GetWorkingDay()
{
	var DaysInMonth=[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

	if (IsLeapYear(cYear))
	{
		DaysInMonth[1]=29;
	}

	frmRecEntry.W_Days.value = DaysInMonth[cMon];
	frmRecEntry.P_Days.value =DaysInMonth[cMon];
	//frmRecEntry.P_Days.value = 0;

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
	
	frmRecEntry.Dear.value = cYear = y;
	frmRecEntry.Month.value = cMon = m;

	GetWorkingDay();
	
}


function LoadDetail(data)
{
	var items = data.split(",");

	frmRecEntry.W_Days.value        = items[0];

	frmRecEntry.P_Days.value        = items[1];

	frmRecEntry.Earned_Salary.value = items[2];
	
	frmRecEntry.Basic.value         = items[3];
	
	frmRecEntry.lta.value           = items[8];
	
	frmRecEntry.HRA.value           = items[4];

	frmRecEntry.CCA.value           = items[5];
	
	frmRecEntry.specialallow.value  = items[6];
	
	frmRecEntry.mra.value           = items[7];
	
	frmRecEntry.Salary_Total.value  = items[9];
	
	frmRecEntry.PF.value            = items[10];
	
	frmRecEntry.esi.value           = items[11];
	
	frmRecEntry.Pro_Tax.value       = items[12];

	frmRecEntry.tds.value            = items[13];
	
	frmRecEntry.Advance.value       = items[14];

	frmRecEntry.Others.value        = items[15];
	
	frmRecEntry.Deduct_Total.value  = items[16];

	frmRecEntry.Net_Salary.value    = items[17];

	frmRecEntry.Gross_Salary.value  =  items[18];

	frmRecEntry.Rupees.value       = items[19];

	GetWorkingDay();
}

function LoadEmpDetail(data)
{
	var items = data.split(",");//Data returive form Employee table and paydetails1 tabkle
	
	frmRecEntry.AcNo.value 		= items[0];	

	frmRecEntry.Dsgn.value 		= items[1];

	frmRecEntry.Gross_Salary.value 	= items[2];

	frmRecEntry.W_Days.value        = items[3];

	frmRecEntry.P_Days.value        = items[4];

	frmRecEntry.Earned_Salary.value = items[5];

	frmRecEntry.Basic.value         = items[6];
	
	frmRecEntry.lta.value           = items[7];
	
	frmRecEntry.HRA.value           = items[8];

	frmRecEntry.CCA.value           = items[9];
	
	frmRecEntry.specialallow.value  = items[10];
	
	frmRecEntry.Salary_Total.value  = items[11];
	
	frmRecEntry.Pro_Tax.value       = items[12];
	
	frmRecEntry.PF.value            = items[13];
	
	frmRecEntry.tds.value           = items[14];
	
	frmRecEntry.Others.value        = items[15];
	
	frmRecEntry.Deduct_Total.value  = items[16];
	
	frmRecEntry.Net_Salary.value    = items[17];
	
	frmRecEntry.Advance.value       = items[18];
	
	frmRecEntry.esi.value 		    = items[19];
	
	frmRecEntry.Rupees.value        = items[20];
	
	frmRecEntry.mra.value           = items[21];
		
document.getElementById('category').innerHTML =items[22];



	if(items[3] == "")
	{
		GetWorkingDay();

		onload_calculateSalary();
	}
	
	
}

function LoadSalDetails(data)

{

	var items = data.split(",");

/*
	Basic1=frmRecEntry.Basic.value         = items[0];
	HRA1=frmRecEntry.HRA.value           = items[1];
	CCA1=frmRecEntry.CCA.value           = items[2];
	frmRecEntry.specialallow.value  = items[3];
	mra1=frmRecEntry.mra.value           = items[4];
	frmRecEntry.lta.value           = items[5];
	frmRecEntry.Salary_Total.value	= items[6];
	frmRecEntry.PF.value			= items[7];
	frmRecEntry.esi.value			= items[8];
	frmRecEntry.Pro_Tax.value		= items[9];
	frmRecEntry.tds.value			= items[10];
	frmRecEntry.Deduct_Total.value	= items[11];
	*/	
	
	Basic1= items[0];
	HRA1= items[1];
	CCA1= items[2];
	mra1= items[4];
	frmRecEntry.tds.value			= items[10];
	calculateSalary();
	
	//window.alert(Basic1);window.alert(HRA1);window.alert(CCA1);window.alert(mra1);
}

function setIndex(ItemId)
{

	if(ItemId == "EmpName")

		frmRecEntry.EmpId.selectedIndex = frmRecEntry.EmpName.selectedIndex;
	else

		frmRecEntry.EmpName.selectedIndex = frmRecEntry.EmpId.selectedIndex;

	EName = frmRecEntry.EmpName.value;

	EId = frmRecEntry.EmpId.value;

	loadData(ItemId);
}

function loadData(p1,p2)
{
	var cYear = frmRecEntry.Dear.value;
	cMon = frmRecEntry.Month.value;

	var Pro_Tax = parseFloat(frmRecEntry.Pro_Tax.value);
	//var Inc = parseFloat(frmRecEntry.Inc.value);
	var PF = parseFloat(frmRecEntry.PF.value);
	var esioff = parseFloat(frmRecEntry.esioff.value);
	Cur_PF = PF;

	window.frames["iloader"].document.forms["loader"].param1.value = p1;
	window.frames["iloader"].document.forms["loader"].param2.value = EDept;
	window.frames["iloader"].document.forms["loader"].param3.value = EName;
	window.frames["iloader"].document.forms["loader"].param4.value = EId;
	window.frames["iloader"].document.forms["loader"].param5.value = cYear;
	window.frames["iloader"].document.forms["loader"].param6.value = cMon;
	window.frames["iloader"].document.forms["loader"].param7.value = p2;
	window.frames["iloader"].document.forms["loader"].param8.value = Pro_Tax;
	//window.frames["iloader"].document.forms["loader"].param9.value = Inc;
	window.frames["iloader"].document.forms["loader"].param10.value = Cur_PF;
	window.frames["iloader"].document.forms["loader"].param11.value = esioff;

	window.frames["iloader"].document.forms["loader"].action = "dataProvider.php";

	window.frames["iloader"].document.forms["loader"].submit();

	Detail.value = "";
	
	return true;
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



function ValidateData(Data)
{
	if(isNaN(Data.value))
	{
		alert("Select EmployeeID Only");
		Data.select();
		Data.focus();	

		return false;
	}

	return true;
}


function ValidateDiv()
{

	var Others = Detail.value;	

	for(i=0; i < Others.length; i++)
	{
		KeyCode = Others.charCodeAt(i);
		
	       	if (!(( KeyCode >= 48 && KeyCode <= 57) ||
		    ( KeyCode >= 65 && KeyCode <= 90) ||
		    ( KeyCode >= 97 && KeyCode <= 122)||
		    ( KeyCode == 44 || KeyCode == 45 )|| 
		    (KeyCode == 38 || KeyCode == 32)))

		{
			DivObj.style.display = '';
			alert("Special Char not Allowed here!");		
			Detail.focus();
			Detail.select();
			return;		
		}        	
	}
	OtherDetails = Detail.value; 
	DivObj.style.display = 'none';	
}




function calculateSalary()
{
	var ESal,GrossA;
	var EarnTotal;
	var Gross = parseFloat(frmRecEntry.Gross_Salary.value);
	var workingDays = parseFloat(frmRecEntry.W_Days.value);
	var Present = parseFloat(frmRecEntry.P_Days.value);
	//var Basic1 = parseFloat(frmRecEntry.Basic.value);
	//var HRA1 = parseFloat(frmRecEntry.HRA.value);
	//var CCA1 = parseFloat(frmRecEntry.CCA.value);
	//var mra1 = parseFloat(frmRecEntry.mra.value);
	var PF = parseFloat(frmRecEntry.PF.value);
	var esi = parseFloat(frmRecEntry.esi.value);
	var Others = parseFloat(frmRecEntry.Others.value);
	var Advance = parseFloat(frmRecEntry.Advance.value);
	var tds = parseFloat(frmRecEntry.tds.value);
	//var Inc = parseFloat(frmRecEntry.Inc.value);
	var Dsgn=frmRecEntry.Dsgn.value;
	var Dsgn1="Director";
	
	
	
	var Basic,HRA,CCA,specialallow,mra,lta,Pro_Tax,PF,esi,pfoff,esioff;
	var Total_Deduction,Net_Salary,Rupees;
	
	if(isNaN(Advance)) Advance = 0;
	if(isNaN(Others)) Others = 0;
	//if(isNaN(Inc)) Inc = 0;
	if(isNaN(tds))tds=0;
	
	
	GrossA = Math.ceil(Gross );
	ESal = Math.ceil((GrossA * Present)/workingDays);
	
	
	Basic=Math.ceil((Basic1 * Present)/workingDays);
	HRA=Math.ceil((HRA1 * Present)/workingDays);
	
	lta=Math.ceil(Basic/12);
	CCA=Math.ceil((CCA1 * Present)/workingDays);
	mra=Math.ceil((mra1 * Present)/workingDays);
	
	if(Present<0|| Present==0)
	{
	ESal=0;
	//Inc=0;
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
	Advance = 0;
	Others = 0;
	pfoff=0;
	esioff=0;
	}
	else{
	if(GrossA>0 && GrossA<10000)
	{
	Pro_Tax=0;
	
	}
	else if(GrossA>9999 && GrossA<15000)
	{
	Pro_Tax=150;
	
	}
	else{
	Pro_Tax=200;
	
	}
	if(GrossA>0 && GrossA<15000)
	{
	esi=Math.ceil(Basic*0.0175);
	esioff=Math.ceil(Basic*0.0475);
	}
	else
	{
	esi=0;
	esioff=0;
	
	}
	if(Dsgn.match(Dsgn1)=="Director")
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
	
	specialallow=Math.ceil(ESal-(Basic+HRA+CCA+mra+lta));
	
	EarnTotal=Math.ceil(Basic+HRA+CCA+mra+lta+specialallow);
	
	Total_Deduction = Math.ceil(PF + Pro_Tax + esi + tds + Advance + Others);
	
	Net_Salary = Math.ceil(EarnTotal - Total_Deduction);
	
	
	
	frmRecEntry.Basic.value = Basic;
	//frmRecEntry.DA.value = DA;
	frmRecEntry.HRA.value = HRA;
	frmRecEntry.CCA.value = CCA;
	frmRecEntry.specialallow.value = specialallow;
	frmRecEntry.mra.value = mra;
	frmRecEntry.lta.value = lta;
	frmRecEntry.Salary_Total.value=EarnTotal;
	frmRecEntry.PF.value = PF;
	frmRecEntry.esi.value = esi;
	frmRecEntry.Pro_Tax.value = Pro_Tax;
	frmRecEntry.tds.value = tds;
	frmRecEntry.Deduct_Total.value = Total_Deduction;
	//frmRecEntry.Salary_Total.value = EarnTotal;
	frmRecEntry.Earned_Salary.value = ESal;
	frmRecEntry.Others.value = Others;
	frmRecEntry.Advance.value = Advance;
	frmRecEntry.Net_Salary.value = Net_Salary;
	
	frmRecEntry.pfoff.value = pfoff;
	frmRecEntry.esioff.value = esioff;

	validateWord(document.frmRecEntry.Net_Salary,document.frmRecEntry.Rupees);
}

function onload_calculateSalary()
{

var ESal,GrossA;
	var EarnTotal;
	var Gross = parseFloat(frmRecEntry.Gross_Salary.value);
	var workingDays = parseFloat(frmRecEntry.W_Days.value);
	var Present = parseFloat(frmRecEntry.P_Days.value);
	//var Basic1 = parseFloat(frmRecEntry.Basic.value);
	//var HRA1 = parseFloat(frmRecEntry.HRA.value);
	//var CCA1 = parseFloat(frmRecEntry.CCA.value);
	//var mra1 = parseFloat(frmRecEntry.mra.value);
	var PF = parseFloat(frmRecEntry.PF.value);
	var esi = parseFloat(frmRecEntry.esi.value);
	var Others = parseFloat(frmRecEntry.Others.value);
	var Advance = parseFloat(frmRecEntry.Advance.value);
	var tds = parseFloat(frmRecEntry.tds.value);
	var Inc = parseFloat(frmRecEntry.Inc.value);
	var Dsgn=frmRecEntry.Dsgn.value;
	var Dsgn1="Director";
	
	
	
	var Basic,HRA,CCA,specialallow,mra,lta,Pro_Tax,PF,esi,pfoff,esioff;
	var Total_Deduction,Net_Salary,Rupees;
	
	if(isNaN(Advance)) Advance = 0;
	if(isNaN(Others)) Others = 0;
	//if(isNaN(Inc)) Inc = 0;
	if(isNaN(tds))tds=0;
	
	
	GrossA = Math.ceil(Gross );
	ESal = Math.ceil((GrossA * Present)/workingDays);
	
	
	
		
	Basic=Math.ceil((Basic1 * Present)/workingDays);
	HRA=Math.ceil((HRA1 * Present)/workingDays);
	
	lta=Math.ceil(Basic/12);
	CCA=Math.ceil((CCA1 * Present)/workingDays);
	mra=Math.ceil((mra1 * Present)/workingDays);
	
	
	if(Present<0|| Present==0)
	{
	ESal=0;
	//Inc=0;
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
	Advance = 0;
	Others = 0;
	pfoff=0;
	esioff=0;
	}
	else{
	
	if(GrossA>0 && GrossA<10000)
	{
	Pro_Tax=0;
	
	}
	else if(GrossA>9999 && GrossA<15000)
	{
	Pro_Tax=150;
	
	}
	else{
	Pro_Tax=200;
	
	}
	if(GrossA>0 && GrossA<15000)
	{
	esi=Math.ceil(Basic*0.0175);
	esioff=Math.ceil(Basic*0.0475);
	}
	else
	{
	esi=0;
	esioff=0;
	
	}
	if(Dsgn.match(Dsgn1)=="Director")
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
	specialallow=Math.ceil(ESal-(Basic+HRA+CCA+mra+lta));
	
	EarnTotal=Math.ceil(Basic+HRA+CCA+mra+lta+specialallow);
	
	Total_Deduction = Math.ceil(PF + Pro_Tax + esi + tds + Advance + Others);
	
	Net_Salary = Math.ceil(EarnTotal - Total_Deduction);
	
	
	
	frmRecEntry.Basic.value = Basic;
	//frmRecEntry.DA.value = DA;
	frmRecEntry.HRA.value = HRA;
	frmRecEntry.CCA.value = CCA;
	frmRecEntry.specialallow.value = specialallow;
	frmRecEntry.mra.value = mra;
	frmRecEntry.lta.value = lta;
	frmRecEntry.Salary_Total.value=EarnTotal;
	frmRecEntry.PF.value = PF;
	frmRecEntry.esi.value = esi;
	frmRecEntry.Pro_Tax.value = Pro_Tax;
	frmRecEntry.tds.value = tds;
	frmRecEntry.Deduct_Total.value = Total_Deduction;
	//frmRecEntry.Salary_Total.value = EarnTotal;
	frmRecEntry.Earned_Salary.value = ESal;
	frmRecEntry.Others.value = Others;
	frmRecEntry.Advance.value = Advance;
	frmRecEntry.Net_Salary.value = Net_Salary;
	
	frmRecEntry.pfoff.value = pfoff;
	frmRecEntry.esioff.value = esioff;

	validateWord(document.frmRecEntry.Net_Salary,document.frmRecEntry.Rupees);	
	
}

function ShowDetail()
{
	DivObj.style.position = "absolute";
	DivObj.style.top = 500;
	DivObj.style.left = 500;
	DivObj.style.width = 200;
	DivObj.style.height = 60;
	DivObj.style.zorder = 50;
	DivObj.style.backgroundColor = "#C0C0C0";
	DivObj.style.borderLeft = "#ffffff";
	DivObj.style.borderRight = "#ffffff";
	DivObj.style.borderTop = "#ffffff";
	DivObj.style.borderBottom = "#ffffff";
	//DivObj.style.borderStyle = 'groove';
	DivObj.style.display = '';
	Detail.focus();
}

function SaveSalDetail()
{
	//var Inc;
	//Inc = parseFloat(frmRecEntry.Inc.value);

	if(Detail.value == "")
	{
		OtherDetails = "Others";
	}
	
	var workingDays = parseFloat(frmRecEntry.W_Days.value);
	var Present = parseFloat(frmRecEntry.P_Days.value);
	var Others = parseFloat(frmRecEntry.Others.value);
	var Advance = parseFloat(frmRecEntry.Advance.value);
	var tds = parseFloat(frmRecEntry.tds.value);
	var Pro_Tax = parseFloat(frmRecEntry.Pro_Tax.value);
	var cYear = frmRecEntry.Dear.value;
	var Data="";
	Cur_IT = Pro_Tax;

	//if(isNaN(Inc)) Inc = 0;
	if(isNaN(Advance)) Advance = 0;
	if(isNaN(Others)) Others = 0;
	//if(isNaN(IT)) IT = 0;
	

 	Data += "'" + EName + "',";
 	Data += "'" + EId + "',";
 	Data += "'" + cMon + "',";
 	Data += "'" + cYear + "',";
 	Data += workingDays + ",";
	Data += Present + ",";
	Data += parseFloat(frmRecEntry.Earned_Salary.value) + ",";
 	Data += parseFloat(frmRecEntry.Basic.value) + ",";
	Data += parseFloat(frmRecEntry.lta.value) + ",";
	Data += parseFloat(frmRecEntry.HRA.value) + ",";
	Data += parseFloat(frmRecEntry.CCA.value) + ",";
	Data += parseFloat(frmRecEntry.specialallow.value) + ",";
	Data += parseFloat(frmRecEntry.Salary_Total.value) + ",";
	Data += parseFloat(frmRecEntry.Pro_Tax.value) + ",";
	Data += parseFloat(frmRecEntry.PF.value) + ",";
	Data += parseFloat(frmRecEntry.tds.value) + ",";
	Data += Others + ",";
	Data += parseFloat(frmRecEntry.Deduct_Total.value) + ",";
	Data += parseFloat(frmRecEntry.Net_Salary.value) + ",";
	Data += parseFloat(frmRecEntry.Gross_Salary.value) +",";
	Data += Advance + ",";
	Data += parseFloat(frmRecEntry.esi.value) + ",";
	Data += "'" + OtherDetails + "'"+ ",";
	Data += "'" + frmRecEntry.Rupees.value + "',";
	Data += parseFloat(frmRecEntry.esioff.value) + ",";
	Data += parseFloat(frmRecEntry.mra.value) + ",";
	Data += parseFloat(frmRecEntry.pfoff.value) + "";
	
	//window.alert(Data);

	loadData("Save",Data);
	
}

function validate()
{
	var Working = parseFloat(frmRecEntry.W_Days.value);
	var Present = parseFloat(frmRecEntry.P_Days.value);
	
	if(Present > Working)
	{
		frmRecEntry.P_Days.focus();
		alert("Present days should not exceed working days!!");
		return;
	}
//	frmRecEntry.submit();
	
}
function CheckEsc()
{

	if(window.event.keyCode == 27)
		DivObj.style.display = 'none';
}

function GenerateAll_Detail()
{
	var cYear = frmRecEntry.Dear.value;
	var cMon = frmRecEntry.Month.value;
	
	
			//window.frames["iloader"].document.location = "SearchMonthlyReport.php?cMon=" + cMon + "&cYer=" + cYear;
	//*window.frames["iloader"].document.location = "SearchGenDetail.php?cMon=" + cMon + "&cYear=" + cYear;
		//window.alert(cYear);
		//window.alert(cMon);
	return true;
	
}


document.onkeypress = CheckEsc;


</script>
<?php
require("dup.php");
?>

<body bgcolor="#C0C0C0" onload = "FillYear();">
 <iframe id="iloader" name="iloader" width="00" height="00" border="0" src="dataCaller.php">
	Not support for iframe...
 </iframe>
<div id ='DivObj' name = 'DivObj' style = "top:0;left:0;height:0;width:0;display:'None';" onblur="this.style.display='none'">
	<table border="0" cellpadding="4" width="100%" bordercolorlight="#004848" bordercolordark="#FFFFFF">
	<tr><td>Others Details</td></tr>
	<tr><td bgcolor="#EEEEEE">Enter the Details<BR>
	<input name = "Detail" width = 70 >
	<input Type = 'button' value = "OK" onclick = "ValidateDiv();"></td></tr>
</table>

</div>

<form name = 'frmRecEntry' action = "Main.php?msg='Successfully Connection'" method = "post" >
 <div align="center" >
  <center>
  <table border="1" cellspacing="0" width="265" bordercolorlight="#004848" bordercolordark="#FFFFFF" height="30">

    <tr>
    	<td class=header width="25%" height="300%" align="right" bgcolor="#E0E0E0" rowspan="8">
        <table border="0" cellpadding="2" cellspacing="0" width="249" style="left: 0; top: 0; position: relative" height="548">
          <tr>
            <td width="238" valign="middle" colspan="3" height="177" align="center">
              <p align="center"><img border="0" src="img/Pay.gif" width="237" height="175"></p>
            </td>
          </tr>
          <tr>
            <td width="39" valign="middle" height="16"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
            <td class=header width="1" valign="middle" height="16">
              <p align="left"><b><font color="#000000">Options</font></b></td>
            <td  width="229" valign="top" height="16"></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
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

                <li><a class = header href = "ShowBankReport.php?msg='Successfully Connection'"><font color="#000000">Bank Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowMonthlyReport.php?msg='Successfully Connection'"><font color="#000000">Monthly Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
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
 
        </table>
        </td>
    	<td class=header width="46%" height="37" align="right" bgcolor="#E0E0E0">
        <table border="0" cellpadding="2" cellspacing="0" width="100%">
          <tr>
    	<td class=header width="1%" height="37" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header width="71%" align="right" bgcolor="#E0E0E0">
      	<p align="left"><b><font color="#000000">Employee Details</font></b></td>
			<td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="">
                <a class = header href = "logout.php?msg='Successfully Connection'"><font color="">Logout</font></a>
              </ul>
            </td>
              <td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="square">
                <li><a class = 'header' href = "MIPL_Report.php?msg='Successfully Connection'" ><font color="#000000">MIPL</font></a></li>
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
        </td>
    </tr>
    <tr>
    	<td width="72%" height="145" align="right">
         <table class=bodytext border="0" width="100%" cellspacing="0" cellpadding="5" >

	<tr>
    		<td width="18%" height="19" align="right" bgcolor="#EEEEEE">Department&nbsp;</td>
		<td width="23%" height="19" bgcolor="#EEEEEE">
		<select size="1" name="Dept" onChange="EDept = this.value;loadData('Dept');" >
		<option value='Select Department'>Select the department..</option>
		<?php
				
			$Desg = "";
			$GSal = "";
			$ESal = "";
			$AcNo = "";

			$socket = mysql_connect('localhost', $user, $pass);
			if (! $socket)
				die ("Could not connect to MySql Server");
			mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );

			$query = "select * from DEPARTMENT where COMPANY = 'M' ";
	
			$result = mysql_query($query);

			if(!$result)
				die("No records");
			while ($rows = mysql_fetch_array($result))
			{
				echo("<OPTION VALUE = ${rows[0]}>".$rows[0]."</option>");						
			}
			mysql_free_result($result);
		?>
        	</select>
    		</td>

		<td width="18%" height="19" align="right" bgcolor="#EEEEEE">&nbsp;</td>
		<td width="18%" height="19" align="right" bgcolor="#EEEEEE">&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<span id="category"  style="color:#FF3399;font-weight:900;"></span>
</td>
	</tr>

	<tr>
		<td width="20%" height="19" align="right" bgcolor="#EEEEEE">Employee
      					Name&nbsp;</td>
    		<td width="11%" height="19" bgcolor="#EEEEEE"><select size="1" name="EmpName"  onChange = "EName = this.value;setIndex('EmpName');" onclick = "EName = this.value;setIndex('EmpName');">
		<option value='Select Employee'>Select Employee Name..</option>

      		</select></td>

		<td width="20%" height="19" align="right" bgcolor="#EEEEEE">Employee
		Id&nbsp;</td>

    		<td width="11%" height="19" bgcolor="#EEEEEE"><select size="1" name="EmpId" id ="EmpId" onChange = "EId = this.value;setIndex('EmpId');" onclick = "EId = this.value;setIndex('EmpId');">
		<option value='Select Employee ID'>Select Employee ID....&nbsp;&nbsp;&nbsp;</option>
		</select></td>
</td>

	</tr>
   
       	<tr>
    		<td width="20%" height="31" align="right" bgcolor="#EEEEEE">Pay Slip for the month of</td>
    		<td width="11%" height="31" bgcolor="#EEEEEE">
        	<p><select size="1" name="Month" onchange = "cMon = this.value;GetWorkingDay();loadData('Month');">
        		<option value = 0>January</option>
       			<option value = 1>February</option>
        		<option value = 2>March</option>
        		<option value = 3>April</option>
        		<option value = 4>May</option>
        		<option value = 5>June</option>
        		<option value = 6>July</option>
        		<option value = 7>August</option>
        		<option value = 8>September</option>
        		<option value = 9>October</option>
        		<option value = 10>November</option>
        		<option value = 11>December</option>
        		&nbsp;
        	</select></p>
    		</td>
    		<td width="18%" height="19" align="right" bgcolor="#EEEEEE">Year&nbsp;</td>
    		<td width="23%" height="19" bgcolor="#EEEEEE"><select size="1" name="Dear" onchange = "CYear = this.value;loadData('Dear');">
		</select></td>
        </tr>

        <tr>
    		<td width="20%" height="19" align="right" bgcolor="#EEEEEE">Account No&nbsp;</td>
    		<td width="11%" height="19" bgcolor="#EEEEEE"><input type="text" name="AcNo" size="20" readonly></td>
    		<td width="18%" height="19" align="right" bgcolor="#EEEEEE">Designation&nbsp;</td>
    		<td width="23%" height="19" bgcolor="#EEEEEE"><input type="text" name="Dsgn" size="20" readonly></td>
        </tr>
     
	<tr>

    <td width="20%" height="19" align="right" bgcolor="#EEEEEE">Working
      Days&nbsp;</td>

    <td width="11%" height="19" bgcolor="#EEEEEE"><input type="text" name="W_Days" size="20" readonly></td>

    <td width="18%" height="19" align="right" bgcolor="#EEEEEE">Present
      Days&nbsp;</td>

    <td width="23%" height="19" bgcolor="#EEEEEE"><input type="text" name="P_Days" size="20"></td>
       </tr>

        <tr>
    <td width="20%" height="19" align="right" bgcolor="#EEEEEE">Gross
      Salary</td>
    <td width="11%" height="19" bgcolor="#EEEEEE"><input type="text" name="Gross_Salary" size="20" readonly></td>

    <td width="10%" height="19" align="right" bgcolor="#EEEEEE">Earned
      Salary&nbsp;</td>
    <td width="10%" height="19" bgcolor="#EEEEEE"><input type="text" name="Earned_Salary" size="20" readonly></td>
        </tr>
      </table>
    </td>
    </tr>
    <tr>
    <td class=header width="46%" height="33" align="right" bgcolor="#E0E0E0">
      <table border="0" cellpadding="2" cellspacing="0" width="100%">
        <tr>
    <td class=header width="1%" height="33" align="right" bgcolor="#E0E0E0">
      <p align="left"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    <td class=header width="71%" align="right" bgcolor="#E0E0E0">
      <p align="left"><b><font color="#000000">Salary Details</font></b></td>
        </tr>

      </table>
    </td>
    </tr>
    <tr>
    <td width="72%" height="76" align="right">
      <table class=bodytext border="0" cellpadding="5" cellspacing="0" width="100%">
        <tr>
          <td width="24%" bgcolor="#EEEEEE" align="right">Basic+DA</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="Basic" size="20" readonly></td>
          <td width="19%" bgcolor="#EEEEEE" align="right">LTA</td>
          <td width="33%" bgcolor="#EEEEEE"><input type="text" name="lta" size="20" readonly></td>
        </tr>
        <tr>
          <td width="24%" bgcolor="#EEEEEE" align="right">HRA</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="HRA" size="20" readonly></td>
          <td width="19%" bgcolor="#EEEEEE" align="right">CCA</td>
          <td width="33%" bgcolor="#EEEEEE"><input type="text" name="CCA" size="20" readonly></td>
        </tr>
        <tr>
          <td width="24%" bgcolor="#EEEEEE" align="right">Special Allow</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="specialallow" size="20" readonly></td>
		  <td width="24%" bgcolor="#EEEEEE" align="right">M.R</td>
          <td width="30%" bgcolor="#EEEEEE"><input type="text" name="mra" size="20" readonly></td>
		</tr>
		<tr>
          
		  <td width="19%" bgcolor="#EEEEEE" align="right">Salary Total</td>
          <td width="33%" bgcolor="#EEEEEE"><input type="text" name="Salary_Total" size="20" readonly></td>
		  <td width="19%" bgcolor="#EEEEEE" align="right"></td>
          <td width="33%" bgcolor="#EEEEEE"></td>
        </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td class=header width="46%" height="33" align="right" bgcolor="#E0E0E0">
      <table border="0" cellpadding="2" cellspacing="0" width="100%">
        <tr>
    <td class=header width="1%" height="33" align="right" bgcolor="#E0E0E0">
      <p align="left"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    <td class=header width="69%" align="right" bgcolor="#E0E0E0">
      <p align="left"><b><font color="#000000">Deduction Details</font></b></td>
        </tr>
      </table>
    </td>
    </tr>
    <tr>
    <td width="72%" height="95" align="right">
      <table class=bodytext border="0" cellpadding="5" cellspacing="0" width="100%">
        <tr>
    
	
    <td width="17%" height="19" align="right" bgcolor="#EEEEEE">PF</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="PF" size="20" readonly></td>
	<td width="19%" height="19" align="right" bgcolor="#EEEEEE">ESI</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="esi" size="20" readonly></td>
        </tr>
        <tr>
    <td width="19%" height="19" align="right" bgcolor="#EEEEEE">Prof Tax</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Pro_Tax" size="20" ></td>
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">TDS</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="tds" size="20" ></td>
    
        </tr>
        <tr>
		
    <td width="19%" height="19" align="right" bgcolor="#EEEEEE">Advance</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Advance" size="20"></td>
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">Others</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="Others" size="18"><input  title="Click here to enter Others Details"  id = 'RowTtl' type = button onclick = "ShowDetail();"></td>

        </tr>
        <tr>
    <td width="19%" height="19" align="right" bgcolor="#EEEEEE">Net Salary</td>
    <td width="15%" height="19" bgcolor="#EEEEEE"><input type="text" name="Net_Salary" size="20" readonly></td>
	<td width="17%" height="19" align="right" bgcolor="#EEEEEE">Deduct Total</td>
    <td width="22%" height="19" bgcolor="#EEEEEE"><input type="text" name="Deduct_Total" size="20" readonly></td>
    
        </tr>
      </table>
    </td>
    </tr>
   <tr>
<td>

<table border="0" cellpadding="5" cellspacing="0">

	<td class=header width="1%" height="33" align="left" bgcolor="#E0E0E0">
      <p align="left"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
     
	<td class=header width="2%" height="33" align="left" bgcolor="#E0E0E0">
      <p align="left"><b>Amount : </b></td>
</td>
	<td class=header height="33" align="left" bgcolor="#E0E0E0">
      <input type="label" name="Rupees" size="76" readonly></td>
</table>
</td>

    </tr>
   <tr>
    <td class=header width="181%" height="33" align="right" bgcolor="#E0E0E0">
      <p align="center">

	<input type="button" value="Calculate" name="B1" style ="width:90;" onclick = "calculateSalary();validate();">
	<input type="button" value="Save" name="Save" style ="width:90;" onclick = "SaveSalDetail();">
	<input type="button" value="GenerateAll" name="Generate" style ="width:90;" onclick = "GenerateAll_Detail();">


</p>
    </td>
    </tr>
  </table>
  </center>
   </div>
	<input name ='pfoff' type = 'hidden' value="">
	<input name ='esioff' type = 'hidden' value="">
	<input name ='Inc' type = 'hidden' value="">
</form>

</body>

</html>
