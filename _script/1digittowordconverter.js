
function digitToWordConvertor(number)
{
	try
	{
		var number = getRoundedAmount(number);
		var result = convertCrores(number);
		//dump("\n Number: "+ "["+number+"] " + convertCrores(number));
		return result;
	}
	catch (ex)
	{
		//dump("\n digitToWordConvertor =>" + ex);
	}
}


function convertCrores(number)
{
	try
	{
		var result;
		if (number < 1000000000)
		{
			if (number/10000000 >= 1)
			{
				result = convertTens(number/10000000) + " Crores";
				if (number < 100000000)
				{
					var crores = String(number)+" ";
					crores = crores.slice(1,-1);
					//////dump("\n Thousunds :" + crores);
					result = result + convertLakhs(crores);
				}else{
					var crores = String(number)+" ";
					crores = crores.slice(2,-1);
					//////dump("\n Thousunds :" + crores);
					result = result + convertLakhs(crores);
				}
			}else{
				result = convertLakhs(number);
			}
		}else{
			////dump("\n Number is bigger than 10000000.");
		}
		return String(result);
	}
	catch (ex)
	{
		//dump("\n convertcrores =>" + ex);
	}
}


function convertLakhs(number)
{
	try
	{
		var result;
		if (number < 10000000)
		{
			if (number/100000 >= 1)
			{
				result = convertTens(number/100000) + " Lakhs";
				if (number < 1000000)
				{
					var lakhs = String(number)+" ";
					lakhs = lakhs.slice(1,-1);
					//////dump("\n Thousunds :" + lakhs);
					result = result + convertThousund(lakhs);
				}else{
					var lakhs = String(number)+" ";
					lakhs = lakhs.slice(2,-1);
					//////dump("\n Thousunds :" + lakhs);
					result = result + convertThousund(lakhs);
				}
			}else{
				result = convertThousund(number);
			}
		}
		return String(result);
	}
	catch (ex)
	{
		//dump("\n convertLakhs =>" + ex);
	}
}

function convertThousund(number)
{
	try
	{
		var result;
		if (number < 100000)
		{
			if (number/1000 >= 1)
			{
				result = convertTens(number/1000) + " Thousand";
				if (number < 10000)
				{
					var thousunds = String(number)+" ";
					thousunds = thousunds.slice(1,-1);
					//////dump("\n Thousunds :" + thousunds);
					result = result + convertHundred(thousunds);
				}else{
					var thousunds = String(number)+" ";
					thousunds = thousunds.slice(2,-1);
					//////dump("\n Thousunds :" + thousunds);
					result = result + convertHundred(thousunds);
				}
			}else{
				result = convertHundred(number);
			}
		}else{
			////dump("\n Number is bigger than 100000.");
		}
		return String(result);
	}
	catch (ex)
	{
		//dump("\n convertThousund =>" + ex);
	}
}


function convertHundred(number)
{
	try
	{
		var result;
		if (number < 1000)
		{
			if (number/100 >= 1)
			{
				result = convertDigit(number/100) + " Hundred";
				var tens = String(number)+" ";
				tens = tens.slice(1,-1);
				result = result + convertTwoDigits(tens);
			}else{
				result = convertTwoDigits(number);
			}
		}else{
			////dump("\n Number is bigger than 1000.");
		}
		return result;
	}
	catch (ex)
	{
		//dump("\n convertHundred =>" + ex);
	}
}


function convertTwoDigits(number)
{
	try
	{
		var result;
		if (number < 100)
		{
			if (number >= 10)
			{
				result = convertTens(number) + " ";
				var tens1 = String(number)+" ";
				tens1 = tens1.slice(3,-1);
				result = result + convertDecimals(tens1);
			}else{
				result = convertTens(number) + " ";
				var tens2 = String(number)+" ";
				tens2 = tens2.slice(2,-1);
				result = result + convertDecimals(tens2);
			}
		}else{
			////dump("\n Number is bigger than 99.");
		}
		return result;
	}
	catch (ex)
	{
		//dump("\n convertTwoDigits =>" + ex);
	}
}


function convertTens(number)
{
	try
	{
		 var convertTensResult;
		 if (number < 100)
		 {
			 if (number >= 10)
			 {
				if (number >= 10 && number <= 19)
				{
					if (number >= 10 && number < 11)
					{
						convertTensResult = " Ten";
					}
					else if (number >= 11 && number < 12)
					{
						convertTensResult = " Eleven";
					}
					else if (number >= 12 && number < 13)
					{
						convertTensResult = " Twelve";
					}
					else if (number >= 13 && number < 14)
					{
						convertTensResult = " Thirteen";
					}
					else if (number >= 14 && number < 15)
					{
						convertTensResult = " Fourteen";
					}
					else if (number >= 15 && number < 16)
					{
						convertTensResult = " Fifteen";
					}
					else if (number >= 16 && number < 17)
					{
						convertTensResult = " Sixteen";
					}
					else if (number >= 17 && number < 18)
					{
						convertTensResult = " Seventeen";
					}
					else if (number >= 18 && number < 19)
					{
						convertTensResult = " Eighteen";
					}
					else if (number >= 19 && number < 20)
					{
						convertTensResult = " Nineteen";
					}
					//////dump("\n convertTensResult: " + convertTensResult);
				}
				else
				{
					var digitAtTen;
					digitAtTen = number/10;

					if (digitAtTen >= 2 && digitAtTen < 3)
					{
						convertTensResult = " Twenty";
					}
					else if (digitAtTen >= 3 && digitAtTen < 4)
					{
						convertTensResult = " Thirty";
					}
					else if (digitAtTen >= 4 && digitAtTen < 5)
					{
						convertTensResult = " Forty";
					}
					else if (digitAtTen >= 5 && digitAtTen < 6)
					{
						convertTensResult = " Fifty";
					}
					else if (digitAtTen >= 6 && digitAtTen < 7)
					{
						convertTensResult = " Sixty";
					}
					else if (digitAtTen >= 7 && digitAtTen < 8)
					{
						convertTensResult = " Seventy";
					}
					else if (digitAtTen >= 8 && digitAtTen < 9)
					{
						convertTensResult = " Eighty";
					}
					else if (digitAtTen >= 9)
					{
						convertTensResult = " Ninety";
					}
					else if (digitAtTen >= 0)
					{
						convertTensResult = ""; 
					}
					convertTensResult = convertTensResult +""+ convertDigit(String(number).charAt(1));
				}
			 }else{
				convertTensResult = convertDigit(number);
			 }
		 }else{
			////dump("\n [ERROR:convertTens] The number provided is greater than 100.");
			//convertTensResult = convertDigit(number);
		 }
		 return convertTensResult;
	}
	catch (ex)
	{
		//dump("\n convertTens =>" + ex);
	}
}


function convertDigit(number)
{
	try
	{
		var convertDigitResult
			if (number >= 0 && number < 1)
			{
				convertDigitResult = "";
			}
			else if (number >= 1 && number < 2)
			{
				convertDigitResult = " One";
			}
			else if (number >= 2 && number < 3)
			{
				convertDigitResult = " Two";
			}
			else if (number >= 3 && number < 4)
			{
				convertDigitResult = " Three";
			}
			else if (number >= 4 && number < 5)
			{
				convertDigitResult = " Four";
			}
			else if (number >= 5 && number < 6)
			{
				convertDigitResult = " Five";
			}
			else if (number >= 6 && number < 7)
			{
				convertDigitResult = " Six";
			}
			else if (number >= 7 && number < 8)
			{
				convertDigitResult = " Seven";
			}
			else if (number >= 8 && number < 9)
			{
				convertDigitResult = " Eight";
			}
			else if (number >= 9 && number < 20)
			{
				convertDigitResult = " Nine";
			}
		return convertDigitResult;
	}
	catch (ex)
	{
		//dump("\n convertDigit =>" + ex);
	}
}

function convertDecimals(number)
{
	try
	{
		var result;
		if (number != '00')
		{
			////dump("\n decimals: " + number);
//			result = "and paisa"+ convertTens(number) +" Only";
result = convertTens(number) +" Only";
		}else{
			result = "Only";
		}
		return result;
	}
	catch (ex)
	{
		//dump("\n  =>" + ex);
	}
}



//Convert and round a number to two decimals
function getRoundedAmount(original_number)
{
	var decimals = 2;
	var result1 = original_number * Math.pow(10, decimals)
    var result2 = Math.round(result1)
    var result3 = result2 / Math.pow(10, decimals)
    return pad_with_zeros(result3, decimals)
}
function pad_with_zeros(rounded_value, decimal_places) {

    // Convert the number to a string
    var value_string = rounded_value.toString()
    
    // Locate the decimal point
    var decimal_location = value_string.indexOf(".")

    // Is there a decimal point?
    if (decimal_location == -1) {
        
        // If no, then all decimal places will be padded with 0s
        decimal_part_length = 0
        
        // If decimal_places is greater than zero, tack on a decimal point
        value_string += decimal_places > 0 ? "." : ""
    }
    else {

        // If yes, then only the extra decimal places will be padded with 0s
        decimal_part_length = value_string.length - decimal_location - 1
    }
    
    // Calculate the number of decimal places that need to be padded with 0s
    var pad_total = decimal_places - decimal_part_length
    
    if (pad_total > 0) {
        
        // Pad the string with 0s
        for (var counter = 1; counter <= pad_total; counter++) 
            value_string += "0"
        }
    return value_string
}