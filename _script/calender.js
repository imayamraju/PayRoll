//for calender display
var curdata = new Date();
var todayDate = curdata.getDate();
var todayMon = curdata.getMonth();
var year = curdata.getFullYear();
var todayYear = year;
var selDate = "";
var selMon = "";
var selYear = "";
var storeValue = "";
var position=0;

function getpos(objname)
{
	cal.style.pixelLeft = window.event.clientX + document.body.scrollLeft - cal.style.pixelWidth;
	cal.style.pixelTop = window.event.clientY + document.body.scrollTop + 2;
}
function showcal(txtname,objname)
{
	getpos(txtname);
	storeValue = txtname;
	cal.style.visibility = "visible";
	mon = month.selectedIndex = todayMon;
	year = todayYear;
	mon--;
	var cellValue = "<p class=label>" + todayYear + "</p>"
	document.all.mon_year.rows(0).cells(1).innerHTML = cellValue;
	document.all.dates.rows(6).cells(1).innerText = "Today's Date : " + todayDate + "-" + (todayMon+1) + "-" + year;
	showdates();
}
function addYear()
{
	var cellValue = "<p class=label>" + year + "</p>"
	document.all.mon_year.rows(0).cells(1).innerHTML = cellValue;
}
function subYear()
{
	var cellValue = "<p class=label>" + year + "</p>"
	document.all.mon_year.rows(0).cells(1).innerHTML = cellValue;
}
function setvalue(date)
{
	if(month.value<10 && date<10 )
	
		//var retValue =year+ "-" + "0" + (month.value)  + "-0" + date ;
		var retValue ="0" +date + "-0" + (month.value)  + "-" + year;
	else if(month.value<10 || date<10 )
	{
		if(date<10)
		{
		//var retValue = year+ "-" + (month.value)  + "-0" + date;
		var retValue ="0" +date + "-" + (month.value)  + "-" + year;
		}
		if(month.value<10)
		{
		//var retValue =year+ "-" + "0"+ (month.value)  + "-" + date;
		var retValue =date + "-0" + (month.value)  + "-" + year;
		}
		
	}
	
	else
		//var retValue = year + "-" + (month.value)+"-" +date  ;
		var retValue =date + "-" + (month.value)  + "-" + year;

	selDate = date;
	selMon = month.value-1;
	selYear = year;
	
	cal.style.visibility = "hidden";
	
	storeValue.value = retValue;
}

function showdates()
{

	var DaysInMonth=[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	var row=0;
	var col=0;
	var dt=0;
	var mon = month.selectedIndex;
	
	var calDate = new Date(year, mon);
	calDate.setDate(1);
	var firstDay = calDate.getDay();
	var cellValue = "";

	if (IsLeapYear(year))
	{
		DaysInMonth[1]=29;
	}
	for(row=1; row<6; row++)
		for(col=0; col<7; col++)
			document.all.dates.rows(row).cells(col).innerText = "";
	
	for(col=0; col<firstDay; col++)
	{
		document.all.dates.rows(1).cells(col).innerHTML = "&nbsp;";
		/*if(col==0)
			sunday.style.background = "#ffffff"*/
	}
	for(col=firstDay; col<7; col++)
	{
		/*if(col==0)
			sunday.style.background = "#6699ff"*/
		dt++;
		if( dt == todayDate && mon == todayMon && year == todayYear)
			document.all.dates.rows(1).cells(col).innerHTML = "<p class=curdate onclick='setvalue("+dt+");'>" + dt + "</p>";
		else if(dt == selDate && mon == selMon && year == selYear)
			document.all.dates.rows(1).cells(col).innerHTML = "<p class=cursel onclick='setvalue("+dt+");'>" + dt + "</p>";
		else
			document.all.dates.rows(1).cells(col).innerHTML = "<p class=yrpm onclick='setvalue("+dt+");'>" + dt + "</p>";
	}
	for(row=2; row<6; row++)
	{
		for(col=0; col<7; col++)
		{
			dt++;
			if( dt > DaysInMonth[mon])
			{
				/*if(col<=6)
				{
					saturday.style.background = "#ffffff";
				}*/

				break;
			}
			if(dt == todayDate && mon == todayMon && year == todayYear)
				cellValue = "<p class=curdate onclick='setvalue("+dt+")'> " + dt + "</p>";
			else if( dt == selDate && mon == selMon && year == selYear)
				cellValue = "<p class=cursel onclick='setvalue("+dt+");'>" + dt + "</p>";			
			else
				cellValue = "<p class=yrpm onclick='setvalue("+dt+")'> " + dt + "</p>";
							
			document.all.dates.rows(row).cells(col).innerHTML = cellValue;
			/*if(row==5 && col==6)
				saturday.style.background = "#ccccff";*/
		}//end of col for loop
	}//end of row for loop
	for(col=0; col<7; col++)
	{
		if( dt < DaysInMonth[mon])
		{
			/*if(col==0)
				sunday.style.background="#6699ff";*/
			dt++;
			if(dt == todayDate && mon == todayMon && year == todayYear)
				cellValue = "<p class=curdate onclick=\'setvalue(dt)\'> " + dt + "</p>";
			else if(dt == selDate && mon == selMon && year == selYear)
				cellValue = "<p class=cursel onclick='setvalue("+dt+");'>" + dt + "</p>";				
			else
				cellValue = "<p class=yrpm onclick='setvalue("+dt+")'> " + dt + "</p>";
			
			document.all.dates.rows(1).cells(col).innerHTML = cellValue;
		}
	}//end of col for loop
}

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

//end here -->

function CreateCal()
{

var tags;
document.body.insertAdjacentHTML("AfterBegin","<DIV style = 'width:170;height:100;'class=divcal id=cal name='calender' ></div>");
tags = "<TABLE id=mon_year>";
 tags += "<TR>";
	 tags += "<TD colspan=3> ";
		 tags += "<SELECT id=month onchange='showdates();'>";
			 tags += "<OPTION value=1 selected> January </OPTION>";
			 tags += "<OPTION value=2> Feburary </OPTION>";
			 tags += "<OPTION value=3> March </OPTION>";
			 tags += "<OPTION value=4> April </OPTION>";
			 tags += "<OPTION value=5> May </OPTION>";
			 tags += "<OPTION value=6> June </OPTION>";
			 tags += "<OPTION value=7> July </OPTION>";
			 tags += "<OPTION value=8> August </OPTION>";
			 tags += "<OPTION value=9> September </OPTION>";
			 tags += "<OPTION value=10> October </OPTION>";
			 tags += "<OPTION value=11> November </OPTION>";
			 tags += "<OPTION value=12> December </OPTION>";
		 tags += "</SELECT>"; 
	 tags += "</TD>";
	 tags += "<TD>	&nbsp;";
	 tags += "</TD>";
	 tags += "<TD>";
	 tags += "<map name='FPMap0'>";
			 tags += "<area href='javascript:void(0);' onclick='year--; subYear();showdates()' shape='rect' coords='1, 1, 17, 10'>";
			 tags += "<area href='javascript:void(0);' onclick=' year++; addYear();showdates()' shape='rect' coords='1, 10, 17, 20'>";
		 tags += "</map>";
		 tags += "<img border='0' src='Img/scroll.bmp' width='17' height='20' usemap='#FPMap0'></TD>";
  tags += "</TR>";
  tags += "<TR>";
  tags += "</TR>";
 tags += "</TABLE>";
 tags += "<TABLE id=dates  border = 0 width = '170' class = thcal>";

	 tags += "<TR>";
		 tags += "<TD>S</TD>"; 
		 tags += "<TD>M</TD> ";
		 tags += "<TD>T</TD> ";
		 tags += "<TD>W</TD> ";
		 tags += "<TD>T</TD> ";
		 tags += "<TD>F</TD> ";
		 tags += "<TD>S</TD>";
	 tags += "</TR>";
	
	 tags += "<TR>";
		 tags += "<TD id=sunday>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD>";
	 tags += "</TR>";
	
	 tags += "<TR>";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD>";
	 tags += "</TR>";
	
	 tags += "<TR>";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
	 tags += "</TR>";
	
	 tags += "<TR>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD>";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD>";
	 tags += "</TR>";
	
	 tags += "<TR>";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD>&nbsp;</TD> ";
		 tags += "<TD id=saturday >&nbsp;</TD>";
	 tags += "</TR>";

	 tags += "<TR name = 'CurrenDt'>";
		 tags += "<TD class = curdate>&nbsp;</TD>";
		 tags += "<TD colspan = 6></TD> ";
	
	 tags += "</TR>";
 tags += "</TABLE>";

document.all.cal.innerHTML = tags;

}

CreateCal();
