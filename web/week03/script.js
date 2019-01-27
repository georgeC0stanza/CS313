// get focus
function getfocus(target){
    document.getElementById(target).focus();
}

//lose focus
function losefocus(target) {
    document.getElementById(target).blur();
}

//submit
function submitPurchase(){
    alert("Your order has been placed!");
}

//cancel order
function cancel(){
    alert("Your order was canceled!");
}

//
function cart(){
	var table = document.getElementById("tableCart");
	var row = table.insertRow(0);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    
	cell1.innerHTML = "product";
	cell2.innerHTML = "quantity";
	cell3.innerHTML = "cost";
}

// table generation
function addCell(table, product, quantity, cost) {
	var table = document.getElementById(table);
	var row = table.insertRow(1);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    
	cell1.innerHTML = product;
	cell2.innerHTML = quantity;
	cell3.innerHTML = cost;
}

// add product 
function add(item, cost){
    addCell("tableCart", item, 1, cost);
}

// **shipping/payment function**
function validateName(theName, theID) {
    var shipping = "shipping";
    getfocus(shipping);

    // reset
    document.getElementById(theID).textContent = "";

    // remove spaces
    theName = theName.replace(/\s+/g, '');
    
    // if there are symbols or numbers give error
    if (/^[a-zA-Z]+$/.test(theName)){
        document.getElementById(theID).textContent 
        = "";        
    } else {
        document.getElementById(theID).textContent = "Name Cannot Contain Numbers or Symbols!";
    }
}

// **shipping function**
function validateAddress(){
    //litterally anything could be valid...
}

// **shipping function**
function validateCity(){
    // again litterally anything could be valid...
    // we might ask for no symbols but who knows if there are cities 
    // with symbols in the name or not
}

// **shipping function**
function validateState(state, theID){
    //reset
    document.getElementById(theID).textContent = "Invalid state abbreviation";    
    // remove spaces
    state = state.replace(/\s+/g, '');

    // change to uppercase
    state[0] == state[0].toUpperCase();
    state[1] == state[1].toUpperCase();
    
    // list of valid states
    var stateList = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", 
        "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", 
        "MA", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", 
        "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", 
        "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"];
    // check if entered state is in the state list
    if (stateList.indexOf(state) > -1) {
        document.getElementById(theID).textContent = "";
    } else {
        document.getElementById(theID).textContent = "Invalid state abbreviation";
    }
}

// **shipping function**
function validateZIP(theZIP, theID) {
    // remove spaces
    theZIP = theZIP.replace(/\s+/g, '');

    //number check
    if (isNaN(theZIP) === false) {
        //check for conditions
        if (theZIP >= 0 && theZIP <= 118) {
            document.getElementById(theID).textContent = "";
        } else {
            document.getElementById(theID).textContent = "Invalid ZIP Code";
        }
    } else {
        document.getElementById(theID).textContent = "Invalid Code";
    }
}

// **shipping function**
function validatePhone(phone, theID){
    // if ten digits good
    if (phone.length == 10 && isNaN(phone) === false){
	    document.getElementById(theID).textContent = "";   
    } else{
      // if not a number
      // parse into three numbers and check
        var str, matches, index, num0, num1, num2;
        var num = [num0, num1, num2]

        matches = phone.match(/\d+/g);
        for (index = 0; index < matches.length; ++index) {
            num[index] = parseInt(matches[index], 10);
        }

        // now we are going to say if it is valid or not
        if (isNaN(num[0]) === false && num[0].toString().length == 3){
            if (isNaN(num[1]) === false && num[1].toString().length == 3){
                if (isNaN(num[2]) === false && num[2].toString().length == 4){
                    // yay, each part has only numbers!
                    document.getElementById(theID).textContent = "";
                } else {
                    document.getElementById(theID).textContent = "Invalid Phone Number";
                }
            } else {
                document.getElementById(theID).textContent = "Invalid Phone Number";
            }
        } else {
            document.getElementById(theID).textContent = "Invalid Phone Number";
        }        
    }
}

// **payment function**
function validateCVV(theCode, theID) {
    //number check
    if (isNaN(theCode) === false) {
        //check for conditions
        if (theCode >= 0 && theCode <= 9999) {
            document.getElementById(theID).textContent = "";
        } else {
            document.getElementById(theID).textContent = "Invalid Security Code";
        }
    } else {
        document.getElementById(theID).textContent = "Invalid Security Code";
    }
}

// **payment function**
function validateCCN(ccn, theID){
    // check for empty string
    if (ccn !== ''){
        // remove spaces
        ccn = ccn.replace(/\s+/g, '');

        // check if number
        if (isNaN(ccn) === false){
            // check if number is correct length
            if (ccn.length == 16){
                document.getElementById(theID).textContent = "";
            } else {
                document.getElementById(theID).textContent = "Invalid credit card number";    
            }
        } else {
            document.getElementById(theID).textContent = "Invalid credit card number";
        }
    }

}

// **payment function**
function validateExp(date, theID){
    //seperate
    var str, matches, index, num0, num1;
    var num = [num0, num1]
    // split into pieces
    matches = date.match(/\d+/g);
    for (index = 0; index < matches.length; ++index) {
        num[index] = parseInt(matches[index], 10);
    }
    // now we are going to say if it is valid or not
    if (num[0] >= 1 && num[0] <= 12){
        if (num[1] >= 1 && num[1] <= 99){
                document.getElementById(theID).textContent = "";
        } else {
            document.getElementById(theID).textContent = "Invalid date";
        }
    } else {
        document.getElementById(theID).textContent = "Invalid date";
    }
}


//mostly works. doesn't invalidate numbers like 1.0 or 1.000. 
// needs more conditions.. 
function validateDollar(dollar, theID){
    // remove spaces
    dollar = dollar.replace(/\s+/g, '');
    // remove dollar sign
    dollar = dollar.replace(/\$/g, '');    
    // flag variables
    var comma = 1;
    var decimal = 1;
    // if there is a comma, there has to be three digits following
        // we have to use--for lack of a better word--reverse logic with 
        // the comma and decimal. kinda like an XOR? i dunno, it's 
        // late haha!
    if (dollar.search(",") > 0) {      
        // check the first character following the comma
        if (isNaN(dollar[dollar.search(",") + 1]) === false 
        // check the second
        && isNaN(dollar[dollar.search(",") + 2]) === false 
        // check the third
        && isNaN(dollar[dollar.search(",") + 3]) === false) {
            comma = 1;
        } else { 
            comma = 0;
        }
    }
    // if there is a decimal, there has to be two digits
    if (dollar.search(".") > 0) {      
        // check the first character following the decimal
        if (isNaN(dollar[dollar.search(".") + 1]) === false 
        // check the second
        && isNaN(dollar[dollar.search(".") + 2]) === false
        // check the one after
        && isNaN(dollar[dollar.search(".") + 3]) === true) {
            decimal = 1;
        } else {
            decimal = 0;
        }
    } 
    // if both the decimal and comma check out, then validate!
    if (decimal == 1 && comma == 1){
        document.getElementById(theID).textContent = "Valid money amount";        
    } else {
        document.getElementById(theID).textContent = "Invalid money amount";        
    }

}

 