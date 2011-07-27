
var n = "";

function validateWord(input,output) 
{

var iText = input.value;

	/*if (iText.length == 0) 
	{
		//alert ('Please Enter A Number.');
		//document.myform.textver.value = "";
		return true;
	}
	else */

	convert(iText,output);
}

function d1(x) 
{ // single digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= " One "; break;
		case '2': n= " Two "; break;
		case '3': n= " Three "; break;
		case '4': n= " Four "; break;
		case '5': n= " Five "; break;
		case '6': n= " Six "; break;
		case '7': n= " Seven "; break;
		case '8': n= " Eight "; break;
		case '9': n= " Nine "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d2(x) 
{ // 10x digit terms
	switch(x) 
	{
		case '0': n= ""; break;
		case '1': n= ""; break;
		case '2': n= " Twenty "; break;
		case '3': n= " Thirty "; break;
		case '4': n= " Forty "; break;
		case '5': n= " Fifty "; break;
		case '6': n= " Sixty "; break;
		case '7': n= " Seventy "; break;
		case '8': n= " Eighty "; break;
		case '9': n= " Ninety "; break;
		default: n = "Not a Number";
	}
	return n;
}

function d3(x) 
{ // teen digit terms
	switch(x) 
	{
		case '0': n= " Ten "; break;
		case '1': n= " Eleven "; break;
		case '2': n= " Twelve "; break;
		case '3': n= " Thirteen "; break;
		case '4': n= " Fourteen "; break;
		case '5': n= " Fifteen "; break;
		case '6': n= " Sixteen "; break;
		case '7': n= " Seventeen "; break;
		case '8': n= " Eighteen "; break;
		case '9': n= " Nineteen "; break;
		default: n=  "Not a Number";
	}
	return n;
}

function convert(input,output) 
{
	var inputlength = input.length;
	var x = 0;
	var teen1 = "";
	var teen2 = "";
	var teen3 = "";
	var numName = "";
	var invalidNum = "";
	var a1 = ""; // for insertion of million, thousand, hundred 
	var a2 = "";
	var a3 = "";
	var a4 = "";
	var a5 = "";
	digit = new Array(inputlength); // stores output
	
	for (i = 0; i < inputlength; i++)  
	{
		// puts digits into array
		digit[inputlength - i] = input.charAt(i)
	};
	
	store = new Array(9); // store output
	
	for (i = 0; i < inputlength; i++) 
	{
		x= inputlength - i;
		switch (x) 
		{ // assign text to each digit
			case x=9: d1(digit[x]); store[x] = n; break;
			case x=8: if (digit[x] == "1") {teen3 = "yes"}
					  else {teen3 = ""}; d2(digit[x]); store[x] = n; break;
			case x=7: if (teen3 == "yes") {teen3 = ""; d3(digit[x])}
					  else {d1(digit[x])}; store[x] = n; break;
			case x=6: d1(digit[x]); store[x] = n; break;
			case x=5: if (digit[x] == "1") {teen2 = "yes"}
					  else {teen2 = ""}; d2(digit[x]); store[x] = n; break;
			case x=4: if (teen2 == "yes") {teen2 = ""; d3(digit[x])}    
					  else {d1(digit[x])}; store[x] = n; break;
			case x=3: d1(digit[x]); store[x] = n; break;
			case x=2: if (digit[x] == "1") {teen1 = "yes"}
					  else {teen1 = ""}; d2(digit[x]); store[x] = n; break;
			case x=1: if (teen1 == "yes") {teen1 = "";d3(digit[x])}     
					  else {d1(digit[x])}; store[x] = n; break;
		}
		
		if (store[x] == "Not a Number"){invalidNum = "yes"};
		
		switch (inputlength)
		{
			case 1:   store[2] = ""; 
			case 2:   store[3] = ""; 
			case 3:   store[4] = ""; 
			case 4:   store[5] = "";
			case 5:   store[6] = "";
			case 6:   store[7] = "";
			case 7:   store[8] = "";
			case 8:   store[9] = "";
		}
		
		if (store[9] != "") { a1 =" Hundred "} else {a1 = ""};
		if ((store[9] != "")||(store[8] != "")||(store[7] != ""))
		{ a2 =" Million "} else {a2 = ""};
		if (store[6] != "") { a3 =" Hundred "} else {a3 = ""};
		if ((store[6] != "")||(store[5] != "")||(store[4] != ""))
		{ a4 =" Thousand "} else {a4 = ""};
		if (store[3] != "") { a5 =" Hundred "} else {a5 = ""};
	}
	// add up text, cancel if invalid input found
	if (invalidNum == "yes"){numName = "Invalid Input"}
	else 
	{
		numName =  store[9] + a1 + store[8] + store[7] 
		+ a2 + store[6] + a3 + store[5] + store[4] 
		+ a4 + store[3] + a5 + store[2] + store[1];
	}
	
	store[1] = ""; store[2] = ""; store[3] = ""; 
	store[4] = ""; store[5] = ""; store[6] = "";
	store[7] = ""; store[8] = ""; store[9] = "";
	if (numName == ""){numName = "Zero"};
	//document.myform.textver.value = numName;

	output.value = numName + " Rupees Only";
	return true;
}
