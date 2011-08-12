<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0"><LINK 
href="_CSS/global.css" type=text/css rel=stylesheet>
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Log in</title>
</head>
<script>
function CenterTable()
{
	var DivHeight = parseInt(mytable.style.height);
	var DivWidth = parseInt(mytable.style.width);
	var WindowH = parseInt(document.body.clientHeight);
	var WndWidth = parseInt(document.body.clientWidth);

	DivHeight = parseInt((WindowH / 2) - (DivHeight/2));
	mytable.style.top = parseInt(DivHeight);

	DivWidth = parseInt((WindowH / 2) - (DivWidth/2));
	mytable.style.left = parseInt(DivHeight);

}

function startClock() {
    window.setInterval("Clock_Tick()", 1000);
    Clock_Tick();
}

function Clock_Tick()
{
    var s = Date();
    document.all.MyTime.innerText = s;

}

function SendData()
{

var cLower = lform.user.value;

lform.user.value = cLower.toLowerCase();

	if(lform.user.value == "")
	{
	alert("User field is Empty");
	lform.user.focus();
	return;
	}	
	if(lform.password.value == "")
	{
	alert("Password field is Empty");
	lform.password.focus();
	return;
	}

	lform.action ="Main.php?msg='Successfully Connection'";
	lform.submit();
}

function KeyDownEvent()
{
	if(event.keyCode == 13)
		SendData();
}

document.onkeydown = KeyDownEvent;
window.onresize = CenterTable
</script>

<body  bgcolor="#EDEDED" onload = "CenterTable();startClock();">
<center>
<div align="center" id = "mytable" style="position: absolute; left: -3; top: 39; width: 576; height: 269">

<table border="0" width="576" height="40" cellspacing="0" cellpadding="0">
  <tr>
    <td class=BodyText width="7" height="33" bgcolor="#74A2C6"><IMG height=13 alt="" 
        src="img/glo_bllts_whtonblu.gif" 
        width=10>
    </td>
    <td class=BodyText width="313" height="33" bgcolor="#74A2C6"><font color="#FFFFFF"><b>Employee
      Login</b></font></td>
  </center>
    <td class=BodyText width="313" height="33" colspan="2" bgcolor="#74A2C6">
      <p id = 'MyTime' align="right"></p>
  </td>
  </tr>
  <center>
  <tr>
    <td width="346" height="1" colspan="3"><img src="img/dataentryindia.jpg" width="346" height="178"></td>
    <td width="285" height="1" bgcolor="#ededed">
	  <form action = "Main.php" method="post" name="lform">
      <TABLE style="background-color: #ededed" width="279" height="122">

        <TR>
          <TD style="WHITE-SPACE: nowrap" colSpan=2 height="24" width="265">
            <H3></H3></TD>
		</TR>
      
        <TR>
          <TD vAlign=middle height="25" width="71">
            <p align="right"><font face="Arial" size="1">Username:</font></p>
          </TD>
  
          <TD height="25"><INPUT style="width:150;" maxLength=25 type=text name=user></TD>
		</TR>

		<TR>
          <TD vAlign=middle height="25" width="71">
            <p align="right"><font face="Arial" size="1">Password:</font></p> </TD>

          <TD height="25"> <INPUT style="width:150;" maxLength=25 type=password name=password> </TD>
		</TR>
        	
		<TR>
          <TD vAlign=top height="32" width="71"></TD>
          <TD height="32" width="184" bgcolor="#EDEDED"><IMG style = "cursor:hand;"
            alt=Login src="img/btn_login.gif" border=0 
            name=loginImg width="57" height="20" onclick = "SendData();"></TD>
		</TR>
		</TABLE>
	  </form>       

</td>
  </tr>
  <tr>
    <td width="1" height="29" bgcolor="#DDDDDD" align="center">
      <p align="center">&nbsp;</p>
    </td>
  </center>
    <td width="739" height="29" bgcolor="#DDDDDD" align="center" colspan="3">
      <p align="left"><A class=Legal  
      href="http://www.meltronicsgroup.com" >
	  www.meltronicsgroup.com</A>  <font color="#666666"> |&nbsp;</font><A class=Legal  
      href="http://www.meltronicsgroup.com/about.html" onclick = "alert('Please connect to internet');" 
      >About Us</A>  <font color="#666666">|</font> <A class=Legal  
      href="http://www.meltronicsgroup.com/contact.html" onclick = "alert('Please connect to internet');" 
      >Contact</A></p>
  </td>

  </tr>
  <tr>
    <td class=CopyrightText width="633" height="26" colspan="4" bgcolor="#C6C6C6">
      <p align="right">&copy; 2011 Meltronics Systemtech Pvt. Ltd.,India</td>
  </tr>
</table>

</div>

<script language=javascript>

function setfocus()
{
	lform.user.focus();
}

setfocus();

</script>

</body>

</html>
