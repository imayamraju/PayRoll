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
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body bgcolor="#C0C0C0" onload = "FillYear1();FillYear2();">

<script>

var Mon1,Mon2,Yr1,Yr2,EName,Cat;

function FillYear1()
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
		frmRecEntry.FilterYr1.add(oOption);
	}

	frmRecEntry.FilterYr1.value = y;
	frmRecEntry.FilterMon1.value = m;
}

function FillYear2()
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
		frmRecEntry.FilterYr2.add(oOption);
	}

	frmRecEntry.FilterYr2.value = y;
	frmRecEntry.FilterMon2.value = m;
}

function Validate()
{
	Mon1 = frmRecEntry.FilterMon1.value;
	Mon2 = frmRecEntry.FilterMon2.value;
	Yr1 = frmRecEntry.FilterYr1.value;
	Yr2 = frmRecEntry.FilterYr2.value;
	
	if((Yr1 == Yr2) && (Mon1 == Mon2))
	{
		alert("To Field Year or Month should be greater than From Field");
		return;
	}
	if(Yr1 == Yr2)
	{
		if(Mon2 < Mon1)
		{
			alert("To Field Month should be greater than From Field");
			return;
		}
	}
	if(Mon1 == Mon2)
	{
		if(Yr2 < Yr1)
		{
			alert("To Field Year should be greater than From Field");
			return;
		}
	}
	return;	
}

function DisplayData()
{
	Mon1 = frmRecEntry.FilterMon1.value;
	Mon2 = frmRecEntry.FilterMon2.value;
	Yr1 = frmRecEntry.FilterYr1.value;
	Yr2 = frmRecEntry.FilterYr2.value;
	EName = frmRecEntry.EName.value;
	Cat = frmRecEntry.SelCat.value;

	window.frames["iloader1"].document.location = "SearchYearlyReportDetail.php?Mon1=" + Mon1+ "&Yr1=" + Yr1+ "&Mon2=" + Mon2+ "&Yr2=" + Yr2+ "&Name=" + EName+ "&Cat=" + Cat;
	return true;
}

function PreviewData()
{
	Mon1 = frmRecEntry.FilterMon1.value;
	Mon2 = frmRecEntry.FilterMon2.value;
	Yr1 = frmRecEntry.FilterYr1.value;
	Yr2 = frmRecEntry.FilterYr2.value;
	EName = frmRecEntry.EName.value;
	Cat = frmRecEntry.SelCat.value;

	window.navigate("YearlyReport.php?Mon1=" + Mon1+ "&Yr1=" + Yr1+ "&Mon2=" + Mon2+ "&Yr2=" + Yr2+ "&Name=" + EName+ "&Cat=" + Cat);

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
 
 <form name = 'frmRecEntry' >
 <div align="center" >
  <center>
  <table border="1" cellspacing="0" width="265" bordercolorlight="#004848" bordercolordark="#FFFFFF" height="30">
    <tr>
    	<td class=header width="260" height="50" valign="top" align="right" bgcolor="#E0E0E0" rowspan="3">
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

                <li><a class = header href = "ShowPaySlip.php?Connection"><font color="#000000">Pay Slip</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ChangePass.php?Connection"><font color="#000000">Change Password</font></a></li>
              </ul></td>
          </tr>

	<tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

	<?php
	if($Company == "M")
	{
	?>
                <li><a class = header href = "Mel_Report.php?Connection"><font color="#000000">Index</font></a></li>
	<?php
	}
	else if($Company == "A")
	{
	?>
		<li><a class = header href = "Avi_Report.php?Connection"><font color="#000000">Index</font></a></li>
	<?php
	}
	else if($Company == "I")
	{
	?>
		<li><a class = header href = "MIPL_Report.php?Connection"><font color="#000000">Index</font></a></li>
	<?php
	}
	else
	{
	?>
		<li><a class = header href = "MBS_Report.php?Connection"><font color="#000000">Index</font></a></li>
	<?php
	}
	?>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowBankReport.php?Connection"><font color="#000000">Bank Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"><ul style="color: #D99548" type="square">

                <li><a class = header href = "ShowMonthlyReport.php?Connection"><font color="#000000">Monthly Report</font></a></li>
              </ul></td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "FilterBy.php?Connection"><font color="#000000">Salary
              Details</font></a></li>
              </ul>
            </td>
          </tr>
         
          </tr>		   
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "ShowConsReport.php?Connection"><font color="#000000">Consolidated Reports</font></a></li>
              </ul>
            </td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="21">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "ShowYearlyReport.php?Connection"><font color="#000000">Yearly Reports</font></a></li>
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
      	<p align="left"><b><font color="#000000">Yearly Report Details</font></b></td>
		
			<td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="">
                <a class = header href = "logout.php"><font color="">Logout</font></a>
              </ul>
            </td>
			
              <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Mel_Report.php?Connection"><font color="#000000">MSPL</font></a></li>
              </ul>
            </td>
              <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "MIPL_Report.php?Connection"><font color="#000000">MIPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "Avi_Report.php?Connection"><font color="#000000">ASPL</font></a></li>
              </ul>
            </td>

            <td width="38" valign="center">
              <ul style="color: #D99548" type="square">
                <li><a class = header href = "MBS_Report.php?Connection"><font color="#000000">MBS</font></a></li>
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
              <td class="bodytext" width="41" height="19" align="right" bgcolor="#EEEEEE">From</td>
              <td class="bodytext" width="178" height="19" bgcolor="#EEEEEE" colspan="2">
			<select class="input" size="1" name="FilterMon1">
                  <option value="0">January</option>
                  <option value="1">February</option>
                  <option value="2">March</option>
                  <option value="3">April</option>
                  <option value="4">May</option>
                  <option value="5">June</option>
                  <option value="6">July</option>
                  <option value="7">August</option>
                  <option value="8">September</option>
                  <option value="9">October</option>
                  <option value="10">November</option>
                  <option value="11">December</option>
                </select><select class="input" size="1" name="FilterYr1">
                </select></td>
              <td class="bodytext" width="23" height="19" bgcolor="#EEEEEE">To</td>
              <td class="bodytext" width="144" height="19" bgcolor="#EEEEEE">
		<select class="input" size="1" name="FilterMon2">
                  <option value="0">January</option>
                  <option value="1">February</option>
                  <option value="2">March</option>
                  <option value="3">April</option>
                  <option value="4">May</option>
                  <option value="5">June</option>
                  <option value="6">July</option>
                  <option value="7">August</option>
                  <option value="8">September</option>
                  <option value="9">October</option>
                  <option value="10">November</option>
                  <option value="11">December</option>
                </select><select class="input" size="1" name="FilterYr2">
                </select></td>
              <td class="bodytext" width="217" height="19" bgcolor="#EEEEEE" colspan="3">&nbsp;</td>
              <td class="bodytext" width="29" height="19" bgcolor="#EEEEEE">&nbsp;</td>
              <td class="bodytext" width="2" height="19" align="right" bgcolor="#EEEEEE">&nbsp;</td>
              <td class="bodytext" width="7" height="19" bgcolor="#EEEEEE">&nbsp;</td>
              <td class="bodytext" width="7" height="19" bgcolor="#EEEEEE">&nbsp;</td>
            </tr>
            <tr>
			  
              <td class="bodytext" width="80" height="19" align="right" bgcolor="#EEEEEE">Emp Name</td>
              <td width="177"><select class="input" size="1" name="EName">
		<?php

			$socket = mysql_connect('localhost', $user, $pass);
			if (! $socket)
				die ("Could not connect to MySql Server");
			mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );

			$query = "select * from employee where COMPANY = '".$Company."'";
	
			$result = mysql_query($query);

			if(!$result)
				die("No records");
			while ($rows = mysql_fetch_array($result))
			{
				echo("<OPTION VALUE = '${rows[0]}'>".$rows[0]."</option>");						
			}
			mysql_free_result($result);
		?>                </select></td>
              <td width="24" class="bodytext" colspan="2">Cat</td>
              <td width="144" class="bodytext" colspan="2"><select class="input" size="1" name="SelCat">
                  <option value="1">PF</option>
                  <option value="2">ESI</option>
                  <option value="3">TDS</option>
                  <option value="4">Loan</option>
                  <option value="5">Others</option>
                </select></td>
              <td width="98"><input type="button" value="Generate" onclick="Validate();DisplayData();"></td>
              <td width="109"><input type="button" value="Print Preview" onclick="PreviewData();"></td>
            </tr>
     </table>
<tr class=header>
    	<td class=header width="47%" height="0" valign = 'top' align="left" bgcolor="#EEEEEE">
<iframe id="iloader1" name="iloader1" width="700" height="420" border="0" src="SearchYearlyReportDetail.php?Connection">
	Not support for iframe...
 </iframe>
</td>
</tr>

    </td>
    </tr>

  </table>

  </div>
<TEXTAREA  name=EmpList rows=1000 col=50 style= display:'none' height:100px></TEXTAREA>

</form>

</body>

</html>
    

  
