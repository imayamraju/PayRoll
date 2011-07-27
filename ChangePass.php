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
<body bgcolor="#C0C0C0">

<script src="_script/calender.js"></script>

<script language='javascript'>

</script>

<?PHP

	$Message = $_GET['Msg'];

	$socket = mysql_connect('localhost', $user, $pass);
	if (! $socket)
		die ("Could not connect to MySql Server");
	//else
	//	echo "Connected";

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error() );



?>
<iframe id="iloader" name="iloader" width="0" height="0" border="0" src="DataCaller.php?msg='Successfully Connection'">
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
        <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>
        <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>

       </table>
        </td>
        <td class="header" width="47%" align="right" bgcolor="#E0E0E0" height="43">
          <div align="left">
            <table border="0" cellpadding="0" cellspacing="0" width="700">
              <tr>
                <td class="header" width="1%" align="right" bgcolor="#E0E0E0">
                  <p align="center"><img border="0" src="img/small_button.png" align="right" width="18"></td>
                <td class="header" width="71%" align="right" bgcolor="#E0E0E0">
                  <p align="left"><b><font color="#000000">Change Password</font></b></td>
				  
				  <td width="38" valign="center" height="15">
              <ul style="color: #D99548" type="">
                <a class = header href = "logout.php?msg='Successfully Connection'"><font color="">Logout</font></a>
              </ul>
            </td>
			
                <td width="38" valign="center">
                  <ul style="color: #D99548" type="square">
                    <li><a class="header" href="Mel_Report.php?msg='Successfully Connection'"><font color="#000000">MSPL</font></a></li>
                  </ul>
                </td>
                <td width="38" valign="center">
                  <ul style="color: #D99548" type="square">
                    <li><a class="header" href="MIPL_Report.php?msg='Successfully Connection'"><font color="#000000">MIPL</font></a></li>
                  </ul>
                </td>
                <td width="38" valign="center">
                  <ul style="color: #D99548" type="square">
                    <li><a class="header" href="Avi_Report.php?msg='Successfully Connection'"><font color="#000000">ASPL</font></a></li>
                  </ul>
                </td>
                <td width="38" valign="center">
                  <ul style="color: #D99548" type="square">
                    <li><a class="header" href="MBS_Report.php?msg='Successfully Connection'"><font color="#000000">MBS</font></a></li>
                  </ul>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </center>
    <tr>
      <td width="73%" valign="top" align="left" bgcolor="#EEEEEE" height="699">
        <table border="0" cellpadding="4" cellspacing="0" width="699" class="bodytext">
          <center>
          <tr>
            <td width="201" height="19" align="right" bgcolor="#EEEEEE">User
              Name</td>
<?php


	$sel_qry = "select * from userinfo";

	$sel_res= mysql_query($sel_qry);

	while($rows = mysql_fetch_array($sel_res))
	{

		$name = $rows[0];
		$pwd = $rows[1];
	}


?>

    <td width="494" height="19" bgcolor="#EEEEEE" colspan="4"><input class = 'input' type="text" name="User" size="20" value="<?php echo $name; ?>"></td>
  </tr>
  
  <tr>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Enter the old passwrod</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="4"><input class = 'input' type=password name="OldPass" size="20"></td>
  </tr>
  <tr>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Enter the new password</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="4"><input class = 'input' type=password name="NewPass" size="20"></td>
  </tr>
  <tr>
    <td width="201" height="19" align="right" bgcolor="#EEEEEE">Confirm password</td>
    <td width="494" height="19" bgcolor="#EEEEEE" colspan="4"><input class = 'input' type=password name="ConPass" size="20"></td>
  </tr>
    <tr>
    	<td width="201" height="19" bgcolor="#EEEEEE">
          <p align="right">&nbsp;</p>
      </td>
    <tr>
    	<td width="201" height="19" bgcolor="#EEEEEE">
          <p align="right">&nbsp;</p>
      </td>

  <center>

	<td width='62' height='19' bgcolor='#EEEEEE'><input class = 'input' style = 'width:60;' type='button' value='Change' name='Change' onclick = 'validate();'>


</td>

	<td width="62" height="19" bgcolor="#EEEEEE">&nbsp;</td>

	<td width="123" height="19" bgcolor="#EEEEEE">&nbsp;</td>

	<td width="247" height="19" bgcolor="#EEEEEE">&nbsp;</td>
      </tr>
    </table>
         	
      </center>
         	
    </center>
         	
    </td>
    </tr>
   <tr>
    <td class=header width="51%" height="10" align="right" bgcolor="#E0E0E0" nowrap>&nbsp;
      
    </td>
    </tr>
  </table>
   </div>


<input name ='operation' type = 'hidden' value="">

<input name ='ChangeMsg' type = 'hidden' value="<?php echo $Message ?>">

<input name ='pwd' type = 'hidden' value="<?php echo $pwd ?>">
<input name ='name' type = 'hidden' value="<?php echo $name ?>">


</form>

<script>

function validate()
{
	frmRecEntry.operation.value = 'ChangePass';
	
	var UserName = frmRecEntry.User.value;
	var OldPassword = frmRecEntry.OldPass.value;
	var NewPassword = frmRecEntry.NewPass.value;
	var ConfirmPass = frmRecEntry.ConPass.value;
	var old_pass    = frmRecEntry.pwd.value;

	if(OldPassword == ""||OldPassword!=old_pass)
	{
		frmRecEntry.OldPass.focus();
		alert("Old Password not valid");
		return;
	}
	else if(NewPassword == "")
	{
		frmRecEntry.NewPass.focus();
		alert("Enter the New Password!");
		return;
	}
	else if(ConfirmPass != NewPassword)
	{
		frmRecEntry.ConPass.focus();
		alert("Confirmation password is not matching with new password!");
		return;
	}

	frmRecEntry.submit();
}

//(frmRecEntry.ChangeMsg.value);


</script>

</body>

</html>
