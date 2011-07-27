<?PHP
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
<body bgcolor="#C0C0C0" onload = "FillYear();">

<script>

var cYear;
var cMon;
var Cat;

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
		frmRecEntry.FilterYear.add(oOption);
	}
	frmRecEntry.FilterYear.value = y;
	frmRecEntry.FilterMonth.value = m;

}

function loadData()
{
	cMon = frmRecEntry.FilterMonth.value;
	cYear = frmRecEntry.FilterYear.value;
	Cat = frmRecEntry.SelCat.value;

	window.frames["iloader"].document.location = "SearchConsReportDetail.php?cMon=" + cMon + "&cYer=" + cYear + "&Cat=" + Cat;
	return true;
}

function PreviewData()
{
	cMon = frmRecEntry.FilterMonth.value;
	cYear = frmRecEntry.FilterYear.value;
	Cat = frmRecEntry.SelCat.value;

	window.navigate("ConsReport.php?cMon=" + cMon + "&cYer=" + cYear + "&Cat=" + Cat);
}


</script>
 <form name = 'frmRecEntry' >
 <div align="center" >
  <center>


<input name ='FilterMon' type = 'hidden' value="">

<input name ='Filter' type = 'hidden' value="">


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
    	<td class=header height="1" align="right" bgcolor="#E0E0E0" width="691">
        <table border="0" cellpadding="2" cellspacing="0" width="693">
          <tr>
    	<td class=header width="23" height="37" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header align="right" bgcolor="#E0E0E0" width="658">
        <p align="left"><b><font color="#000000">Consolidated Report Details</font></b></td>
		
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
        <table border="0" cellpadding="2" cellspacing="0" width="693">

          <tr>
    	<td class=header width="23" height="37" align="right" bgcolor="#EEEEEE">&nbsp;
        </td>
	  </center>

    	<td class=header align="right" bgcolor="#EEEEEE">
        <p align="left"><b><font color="#000000">Filter By :<select size="1" name="FilterMonth" onchange = "loadData();" onclick = "loadData();">
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
        </select>
<select size="1" name="FilterYear" onchange = "loadData();" onclick = "loadData();"></select>
<select size="1" name="SelCat" onchange = "loadData();" onclick = "loadData();">
                <option value = "1">Pro. Tax</option>
                <option value = "2">PF</option>
                <option value = "3">ESI</option>
                <option value = "4">IT/TDS</option>
                <option value = "5">PF_FULL</option>
                <option value = "6">PF_CMP</option>
               <option value = "7">ESI_CMP</option>
	     </select></font></b></td>
          </tr>
        </table>
        </td>
    </tr>
    <tr>
    	<td valign="top" align="left" bgcolor="#EEEEEE" height="410" width="691">
      <!--  <div style="align: left; width: 695; height: 515; overflow: scroll" id = 'List'name='List'>
          
        </div> -->

<iframe id="iloader" name="iloader" width="695" height="420" border="0" src="SearchConsReportDetail.php?msg='Successfully Connection'">
	Not support for iframe...
 </iframe>
    </td>
    </tr>
   <tr>
    <td class=header width="691" height="40" align="right" bgcolor="#E0E0E0" nowrap>
      <p align="center">
      <input type="button" value="Print Preview" onclick = 'PreviewData();'>
      </p>
    </td>
    </tr>
  </table>

  </div>
<TEXTAREA  name=EmpList rows=1000 col=50 style= display:'none' height:100px></TEXTAREA>

</form>

</body>

</html>

