<?php

	include 'ServerDetail.php';

	session_start();
	$Company = $_SESSION['company'];
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Slip for the month of</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>

<body>

<?php

	$MonthName = array('January','February','March','April','May','June','July','August','September','October','November','December');

	$EmpList = split("#",$_POST['EmpList']);

	$FMonth = intval($_POST['FilterMonth']);
	$FYear = $_POST['FilterYear'];

	$socket = mysql_connect('localhost', $user, $pass);
	if ( ! $socket)
		die ("Could not connect to MySql Server".mysql_error());

	mysql_select_db($db, $socket)
		or die ("Could not connect to database: $db".mysql_error());

	for($EmpCnt = 0;$EmpCnt < Count($EmpList) - 1 ;$EmpCnt++)
	{
		$query = "SELECT * FROM paydetails1 p,employee e where p.MONTH = '$FMonth' AND p.YEAR = '$FYear' AND p.NAME = '$EmpList[$EmpCnt]' AND e.NAME = '$EmpList[$EmpCnt]'";

		$result = mysql_query($query);

		$rows = mysql_fetch_array($result);
		
		if($rows[39])
			$PFNo = $rows[39];
		else
			$PFNo = 'Nil';
	
?>


<p align="left">

<br><BR><BR><BR>
<table border="0" width="100%" cellspacing="0" cellpadding="0" height="35">
  <tr>
<?php

if($Company == 'M')

   echo "<td width='50%' valign='bottom' height='35'><img border='0' src='img/logo.gif' width='123' height='30'></td>";
else if($Company == 'A')
   echo "<td width='50%' valign='bottom' height='35'><img border='0' src='img/avi_logo.gif' width='123' height='30'></td>";
 else if($Company == 'I')
    echo "<td width='50%' valign='bottom' height='35'><img border='0' src='img/logo.gif' width='123' height='30'></td>";
 else 
    echo "<td width='50%' valign='bottom' height='35'><img border='0' src='img/logo.gif' width='123' height='30'></td>";

?>
    <td width="50%" height="35">
<?php
if(!($Company == 'A'))
{
?>
      <p class = header align="right" style="margin-bottom: -6">Email : <a href="mailto:meltronics@meltronicsgroup.com">meltronics@meltronicsgroup.com</a>
      <p class = header align="right">www.meltronicsgroup.com</td>
  </tr>

<?php
}
?>

</table>

<hr>
<BR>
<p class = header align="center">
<font size="2.5">
Pay Slip for the month of <?php echo $MonthName[$FMonth]; echo " $FYear";?></font><p>
<div align="center">
  <center>
          <table border="1" width="550" cellspacing="0" cellpadding="0" height="539">
            <tr>
              <td width="43%" bgcolor="#E0E0E0" colspan="2"  height="1">
                <table border="0" width="100%" cellspacing="1" cellpadding="8"  class = bodytext>
                  <tr>
              <td width="35%" align="right" bgcolor="#EEEEEE">Name :</td>
              <td width="34%" bgcolor="#EEEEEE"><?php echo $rows[0]; ?></td>
                  </tr>
                  <tr>
              <td width="35%" align="right" bgcolor="#EEEEEE">Designation :</td>
              <td width="34%" bgcolor="#EEEEEE"><?php echo $rows[34]; ?></td>
                  </tr>
                  <tr>
              <td width="35%" align="right" bgcolor="#EEEEEE">Department :</td>
              <td width="34%" bgcolor="#EEEEEE"><?php echo $rows[33]; ?></td>
                  </tr>
                  <tr>
              <td width="35%" align="right" bgcolor="#EEEEEE">Working days :</td>
              <td width="34%" bgcolor="#EEEEEE"><?php echo $rows[4]; ?></td>
                  </tr>
                </table>
              </td>
              <td width="57%" bgcolor="#E0E0E0" colspan="2"  height="1">
                <table border="0" width="100%" cellspacing="1" cellpadding="8"  class = bodytext>
                  <tr>
              <td width="27%" align="right" bgcolor="#EEEEEE">Employee No. :</td>
              <td width="23%" bgcolor="#EEEEEE"><?php echo $rows[1]; ?></td>
                  </tr>
                  <tr>
              <td width="27%" align="right" bgcolor="#EEEEEE">Bank Ac. No. :</td>
              <td width="23%" bgcolor="#EEEEEE"><?php echo $rows[32]; ?></td>
                  </tr>
                  <tr>

		<?php
				$Emp_DOJ = substr($rows[34], 0, 6);

				$Emp_DOJ = $Emp_DOJ.substr($rows[34], -2, 2);				



		?>
              <td width="27%" align="right" bgcolor="#EEEEEE">Date of Joining :</td>
              <td width="23%" bgcolor="#EEEEEE"><?php echo $rows[36];?></td>
                  </tr>
                  <tr>
              <td width="27%" align="right" bgcolor="#EEEEEE">Days Payable :</td>
              <td width="23%" bgcolor="#EEEEEE"><?php echo $rows[5]; ?></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr class = header>
              <td width="49%" bgcolor="#E0E0E0" colspan="2" height="19">
                <p align="center">Earnings</td>
              <td width="65%" bgcolor="#E0E0E0" colspan="2" height="19">
                <p align="center">Deductions</td>
            </tr>
            <tr class = header>
              <td width="25%" bgcolor="#E0E0E0" height="19">
                <p align="center">Emoluments</td>
              <td width="24%" bgcolor="#E0E0E0" height="19">
                <p align="left">&nbsp;&nbsp;Rupees</td>
              <td width="27%" bgcolor="#E0E0E0" height="19">
                <p align="center">Deductions</td>
              <td width="38%" bgcolor="#E0E0E0" height="19">
                <p align="left">&nbsp;&nbsp;Rupees</td>
            </tr>
            <tr>
              <td width="49%" bgcolor="#E0E0E0" colspan="2" height="126">
                <table border="0" width="100%" cellspacing="1" cellpadding="8"  class = bodytext>
                  <tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">Basic+DA :</td>
              <td width="23%" bgcolor="#EEEEEE" ><?php echo $rows[7]; ?></td>
                  </tr>
                  
                  <tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">HRA :</td>
              <td width="6%" bgcolor="#EEEEEE"><?php echo ($rows[9]); ?></td>
                  </tr>
                  <tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">CCA :</td>
              <td width="6%" bgcolor="#EEEEEE" ><?php echo $rows[10]; ?></td>
                  </tr>
                <tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">Special Allow :</td>
              <td width="6%" bgcolor="#EEEEEE" ><?php echo $rows[11]; ?></td>
                  </tr>
				<tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">M.R :</td>
              <td width="6%" bgcolor="#EEEEEE" ><?php echo $rows[25]; ?></td>
                  </tr>
				 <tr>
              <td width="24%" bgcolor="#EEEEEE" align="right">LTA :</td>
              <td width="6%" bgcolor="#EEEEEE" ><?php echo $rows[8]; ?></td>
                  </tr>
  
                </table>
              </td>
              <td width="65%" bgcolor="#E0E0E0" colspan="2" height="126">
                <table border="0" width="100%" cellspacing="1" cellpadding="8"  class = bodytext>
                  <tr>
				  <tr>
              <td width="7%" bgcolor="#EEEEEE" align="right">PF :</td>
              <td width="2%" bgcolor="#EEEEEE" >
                <p><?php echo $rows[14] = ($rows[14] == 0) ? "NIL" : $rows[14]; ?></td>
                  </tr>
				   <tr>
              <td width="37%" bgcolor="#EEEEEE" align="right">ESI :</td>
              <td width="32%" bgcolor="#EEEEEE" >
                <p ><?php echo $rows[21] = ($rows[21] == 0) ? "NIL" : $rows[21]; ?></td>
                  </tr>
              <td width="7%" bgcolor="#EEEEEE" align="right">Prof Tax :</td>
              <td width="2%" bgcolor="#EEEEEE">
                <p><?php echo $rows[13] = ($rows[13]==0) ? "NIL" : $rows[13]; ?></td>
                  </tr>
                  
                  <tr>
              <td width="37%" bgcolor="#EEEEEE" align="right">TDS :</td>
              <td width="32%" bgcolor="#EEEEEE" >
                <p ><?php echo $rows[15] = ($rows[15] == 0) ? "NIL" : $rows[15]; ?></td>
                  </tr>
                
                  <tr>
              <td width="37%" bgcolor="#EEEEEE" align="right"><?php echo $rows[22]; ?>Others :</td>
              <td width="32%" bgcolor="#EEEEEE" >
                <p><?php echo $rows[16] = ($rows[16] == 0) ? "NIL" : $rows[16]; ?></td>
                  </tr>
                  <tr>
              <td width="37%" bgcolor="#EEEEEE" align="right">Advance :</td>
              <td width="32%" bgcolor="#EEEEEE">
                <p ><?php echo $rows[20] = ($rows[20] == 0) ? "NIL" : $rows[20]; ?></td>
                  </tr>
				  
                </table>
              </td>
            </tr>
	  </center>
            <tr>
              <td width="49%" bgcolor="#E0E0E0" colspan="2" height="33">
                <table border="0" width="100%" cellspacing="0" cellpadding="2" class = header>
                  <tr>
                    <td width="52%">
                      <p align="right">Gross Earnings (A) :</td>
                    <center>
                    <td width="48%"><?php echo $rows[12]; ?></td>
                    </tr>
                  </table>
                </td>
              </center>
              <td width="65%" bgcolor="#E0E0E0" colspan="2" height="33">
                <table border="0" width="100%" cellspacing="0" cellpadding="6" class = header>
                  <tr>
                    <td width="54%">
                      <p align="right">Total Deduction (B) :</td>
                    <center>
                    <td width="46%"><?php echo $rows[17]; ?></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td width="49%" bgcolor="#E0E0E0" colspan="2" height="29">
                <table border="0" width="100%" cellspacing="0" cellpadding="4" class = header>
                  <tr>
                    <td width="52%">
                      <p align="right">Net Pay (A - B) :</td>
                    <center>
                    <td width="48%"><?php echo $rows[18]; ?></td>
                    </tr>
		         <tr>
				<td width='52%'>
                  <p align='right'>PF No :</td>
                  <center>
        	  <td width='48%'><?php echo $rows[41];?></td></tr>
		
                  </table>
                </center>
              <td width="49%" bgcolor="#E0E0E0" colspan="2" height="29">
                <table border="0" width="100%" cellspacing="0" cellpadding="4" class = header>
                  <tr>
                    <td width="52%">
                      <p align="right">IT Accumulation :</td>
                    <center>
                    <td width="48%"><?php echo $rows[27] = ($rows[27]==0) ? "NIL" : $rows[27]; ?></td>
       
	         <tr><td width='52%'>
                 <p align='right'>PF Accumulation :</td>
                  <center>
        	  <td width='48%'> <?php echo $rows[28] = ($rows[28]==0) ? "NIL" : $rows[28];?></td></tr>
		
                  </table>
                </td>
            <tr>
              <td width="114%" bgcolor="#E0E0E0" colspan="4" height="19" class = header>Amount
                : <?php echo $rows[23]; ?></td>
            </tr>
            <tr>
              <td width="57%" bgcolor="#E0E0E0" colspan="2" height="60" valign="bottom" class = header><center>Authorized
                Signature</center></td>
              <td width="57%" bgcolor="#E0E0E0" colspan="2" height="60" valign="bottom">
                <table border="0" width="100%" cellspacing="0" cellpadding="4"  class = bodytext>
                  <tr>
                    <td width="50%">
                      <p align="right">Place :</td>
                    <center>
                    <td width="50%">Bangalore</td>
                    </tr>
                  </center>
                  <tr>
                    <td width="50%">
                      <p align="right">Date :</td>
                    <center>
                    <td width="50%"><?php echo date("d-m-Y"); ?></td>
                    </tr>
                  </table>
                </td>
            </tr>
          </table>
</div>

<BR><BR><BR>
<HR>
<?php 

if($Company == 'M')
{
	echo "<p class = header align='center' style='margin-bottom: -15'>Meltronics Systemtech Pvt. Ltd.,</p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>625, 1st Main, C Block,AECS Layout, Kundalahalli, Bangalore-560 037<p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>Tel : 91-80-28525400/01/02 Fax : 080-28540787<p>";
	echo "<BR><BR><BR><BR><BR><BR><BR>";
}
else if($Company == 'A')
{
	echo "<p class = header align='center' style='margin-bottom: -15'>Avitronics Systemtech(India) Pvt.Ltd,</p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>#107, Jeevith Gardens, Beside Brookefields,Off. ITPL Road, Kundalahalli, Bangalore-560 037<p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>Tel : 91-80-285495185 Fax : 080-28540787<p>";
	echo "<BR><BR><BR><BR><BR><BR><BR>";
}

else if($Company == 'I')
{
	echo "<p class = header align='center' style='margin-bottom: -15'>Meltronics Systemtech Pvt. Ltd.,</p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>625, 1st Main, C Block,AECS Layout, Kundalahalli, Bangalore-560 037<p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>Tel : 91-80-28525400/01/02 Fax : 080-28540787<p>";
	echo "<BR><BR><BR><BR><BR><BR><BR>";

}

else 
{
	echo "<p class = header align='center' style='margin-bottom: -15'>Meltronics Business strategies,</p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>625, 1st Main, C Block,AECS Layout, Kundalahalli, Bangalore-560 037<p>";
	echo "<p class = bodytext style='margin-bottom: -15' align='center'>Tel : 91-80-28525400/01/02 Fax : 080-28540787<p>";
	echo "<BR><BR><BR><BR><BR><BR><BR>";

}

?>

<?php } ?>

</body>

</html>

