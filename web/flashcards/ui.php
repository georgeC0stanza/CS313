<?php
    session_start();

    require "dbconnect.php";
    $db = get_db();

?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>comingalongnicely.jpg</title>
   <!-- <script type="text/javascript" src="script.js"></script> -->

    <script>

        function login(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState>3 && xhttp.status==200) { 
                    alert("logged in!");
                }
                else if (xhttp.status >= 500) { 
                    alert("Sorry the provided credentials are incorrect.");
                }
                else if (xhttp.status >= 300) { 
                    alert("error logging in!");
                }
            };
            xhttp.open("POST",  "signin.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + username + "&password=" + password);
            return true;
        }

        function newAccount(){
            var username = document.getElementById("create_username").value;
            var password = document.getElementById("create_password").value;
            var password2 = document.getElementById("create_password2").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState>3 && xhttp.status==200) { 
                    alert("Congratulations! Your account has been created!");
                }
                else if (xhttp.status >= 300) { 
                    alert("Sorry your account cannot be created currently; please try again later.");
                }
            };
            xhttp.open("POST",  "signup.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + username + "&password=" + password + "&password2=" + password2);
            return true;
        }

    </script>



    <link rel="stylesheet" type="text/css" href="css.css">
  
  </head>
  
<body>
    <header>
        <div class="header">
          <h1>
              Welcome
          </h1>
          <div class="headerSmall">
          </div>
        </div> 
    </header>
    <br/>


    <form name="form_sign_in" action = "cards.php" id = "sign_in" method="POST" onsubmit="return login()">
        <div class="whole">
            <h1>Sign In</h1>
            <hr/>

            <span>Username:</span>
            <input id = "username" required type="text">
            <br/>


            <span>Password: </span>
            <input id = "password" required type="text">
            <br/>
            <br/>
            
            <input type="submit" class="button" value="Sign In">
        </div>

    </form>
    <br/>
    <form name="form_new_account" action = "ui.php" id = "new_account" method="POST" onsubmit="return newAccount()">
        <div class="whole">
            <h1>Create a New Account</h1>
            <hr/>

            <span>Username:</span>
            <input id = "create_username" required type="text">
            <br/>


            <span>Password: </span>
            <input id = "create_password" required type="text">
            <br/>

            <span>Confirm Password:</span>
            <input id = "create_password2" required type="text">
            <br/>
            <br/>
            
            <input type="submit" class="button" value="Create Account">
        </div>

    </form>


<?php




/*

    $statement = $db->prepare("SELECT username, passwrd FROM person");
    $statement->execute();
    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $username = $row['username'];
        $passwrd = $row['passwrd'];
 
        echo "<p>  $username's password is $passwrd! <p>";
    }

    $statement = $db->prepare("SELECT user_id, cardtext_front, cardtext_back FROM cardset");
    $statement->execute();
    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $cardtext_front = $row['cardtext_front'];
        $cardtext_back = $row['cardtext_back'];
 
        echo "<p>  $cardtext_front : $cardtext_back! <p>";
    }

    $statement = $db->prepare("SELECT cardtext_front, cardtext_back FROM cardset where  user_id = 1");
    $statement->execute();
    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $cardtext_front = $row['cardtext_front'];
        $cardtext_back = $row['cardtext_back'];
 
        echo "<p>  $cardtext_front : $cardtext_back! <p>";
    }
    */
?>


  </body>
</html>
