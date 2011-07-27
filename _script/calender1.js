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


function getpos()
{
var position=0;
position=this.window.event.y;
alert(position);
showcal(position);
return (position);
}

function showcal(Pixel)
{


		cal.style.top = TblDetails.offsetTop + document.all[Pixel].offsetTop + 26 + "px";
		cal.style.left = "163px";//frmRecEntry.calstbut.style.left + 0;
		cal.style.visibility = "visible";
		mon = month.selectedIndex = todayMon;
		year = todayYear;
		mon--;
		var cellValue = "<p class=label>" + todayYear + "</p>"
		document.all.mon_year.rows(0).cells(1).innerHTML = cellValue;
		document.all.dates.rows(6).cells(1).innerText = "Today's Date : " + todayDate + "-" + (todayMon+1) + "-" + year;
		showdates();

}

function show_searchcal(Pixel)
{


		cal.style.top = search_Table.offsetTop + document.all[Pixel].offsetTop +174 + "px";
		cal.style.left = "154px";
		cal.style.visibility = "visible";
		mon = month.selectedIndex = todayMon;
		year = todayYear;
		mon--;
		var cellValue = "<p class=label>" + todayYear + "</p>"
		document.all.mon_year.rows(0).cells(1).innerHTML = cellValue;
		document.all.dates.rows(6).cells(1).innerText = "Today's Date : " + todayDate + "-" + (todayMon+1) + "-" + year;
		showdates();

} 


function show_usercal(Pixel)
{
		cal.style.top = search_Table.offsetTop + document.all[Pixel].offsetTop +174 + "px";
		cal.style.left = "0px";
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

//	alert("Inside showdates!");

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