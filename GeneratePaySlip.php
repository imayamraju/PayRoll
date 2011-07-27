
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body bgcolor="#C0C0C0">

<script language='javascript'>

</script>

 <form name = 'frmRecEntry' action = "PaySlip.php?msg='Successfully Connection'" method = "post">
 <div align="center">
  <center>
  <table border="1" cellspacing="0" width="265" bordercolorlight="#004848" bordercolordark="#FFFFFF" height="50">
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
                <li><font color="#000000"><a class = BodyCopy>Employee Details</a></font></li>
              </ul>
            </td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">
                <li><a class = BodyCopy>Salary
              Details</a></li>
              </ul>
            </td>
          </tr>
          <tr>
            <td width="238" valign="center" colspan="3" height="35">
              <ul style="color: #D99548" type="square">

                <li><a class = BodyCopy>Add/Update Employee Details</a></li>
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
            <td width="238" valign="top" colspan="3" height="21"></td>
        </tr>
        <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
        </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21"></td>
          </tr>
          <tr>
            <td width="238" valign="top" colspan="3" height="21">&nbsp;</td>
          </tr>
        </table>
        </td>
    	<td class=header height="1" align="right" bgcolor="#E0E0E0" width="691">
        <table border="0" cellpadding="2" cellspacing="0" width="693">
          <tr>
    	<td class=header width="23" height="37" align="right" bgcolor="#E0E0E0">
      	<p align="center"><img border="0" src="img/small_button.png" align="right" width="18" height="14"></td>
    	<td class=header align="right" bgcolor="#E0E0E0" width="658">
        <p align="left"><b><font color="#000000">Employee Pay List</font></b></td>
          </tr>
          <tr>
    	<td class=header width="23" height="37" align="right" bgcolor="#EEEEEE">
        &nbsp;</td>
  </center>
    	<td class=header align="right" bgcolor="#EEEEEE">
        <p align="left"><b><font color="#000000">Filter By :<select size="1" name="Filter">
          <option>Month</option>
        </select><select size="1" name="D1">
          <option>Month</option>
        </select></font></b></td>
          </tr>
        </table>
        </td>
    </tr>
    <tr>
    	<td valign="top" align="right" bgcolor="#EEEEEE" height="519" width="691">
        <div style="align: left; width: 695; height: 515; overflow: scroll">
          
            <table border="0" width="1239" cellspacing="1" cellpadding="4">
              <tr class=header>
                <td width="192" valign="middle" bgcolor="#C0C0C0">
                  <p align="center">Name</p>
                </td>
                <td width="200" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Emp No</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Working Days</p>
                </td>
                <td width="60" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Present days</p>
                </td>
                <td width="150" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Earned Salary</td>
                <td width="65" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Basic</p>
                </td>
                <td width="44" bgcolor="#C0C0C0" align = "center" valign="middle">
                  <p align="center">DA</p>
                </td>
					<td width="62" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">HRA</p>
                </td>
				<td width="66" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">CCA</p>
                </td>
				<td width="78" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Flex-Allow</p>
                </td>
				<td width="35" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Salary Total</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Pro-Tax</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">PF</p>
                </td>
				<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">IT</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Others</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Dedution Total</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Net Salary</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Gross Salary</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Advance</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">Details</p>
                </td>
		<td width="33" bgcolor="#C0C0C0" valign="middle">
                  <p align="center">It-Acc</p>
                </td>

              </tr>

	<?php
		include 'ServerDetail.php';

		$Desg = "";
		$GSal = "";
		$ESal = "";
		$AcNo = "";

		$socket = mysql_connect('localhost', $user, $pass);
		if (! $socket)
			die ("Could not connect to MySql Server");

		mysql_select_db($db, $socket)
			or die ("Could not connect to database: $db".mysql_error() );
		$query = "select * from paydetails1";

		$result = mysql_query($query);

		if(!$result)
			die("No records");
		
		while ($rows = mysql_fetch_array($result))
		{
			echo("<tr class = bodytext>");
			echo("<td width='44' bgcolor='#C0C0C0' >$rows[0]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[1]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[4]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[5]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[6]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[7]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[8]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[9]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[10]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[11]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[12]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[13]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[14]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[15]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[16]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[17]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[18]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[19]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[20]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[21]</td>");
			echo("<td width='44' bgcolor='#C0C0C0' align = 'center' valign='middle'>$rows[23]</td>");
			echo("</tr>");

		}

		mysql_free_result($result);
		
	?>

            </table>
          
        </div>
    </td>
    </tr>
   <tr>
    <td class=header width="691" height="50" align="right" bgcolor="#E0E0E0" nowrap>
      <p align="center">
      <input type="submit" value="Generate Pay Slip" name="Add">
      </p>
    </td>
    </tr>
  </table>
   </div>
</form>

</body>

</html>
    
