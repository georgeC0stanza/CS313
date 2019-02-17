








function addToCart(itemName){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState>3 && xhttp.status==200) { 
            alert("Cart Updated!");
         }
    };
    xhttp.open("POST",  "addItem.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("item=" + itemName);
}




function removeFromCart(itemName){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState>3 && xhttp.status==200) { 
            alert("Cart Updated!");
         }
    };
    xhttp.open("POST",  "removeItem.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("item=" + itemName);
}




function purchase(){

    var address = document.getElementById("address");


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState>3 && xhttp.status==200) { 
            window.location = "confirmation.php";
         }
    };
    xhttp.open("POST",  "purchase.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("address=" + address);
}

