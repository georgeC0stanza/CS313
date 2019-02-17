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

        function login(username){
            print("start.");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState>3 && xhttp.status==200) { 
                    alert("logged in!");
                }
            };
            xhttp.open("POST",  "signin.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("username=" + username);

            print("end.");
            return false;
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


    <form name="users" action = "" id = "username" method="POST" onsubmit="return login()">
      <div class="whole">
          <h1> Welcome</h1>
          <hr/>

      <div class="section">








    <p>Username</p>
    <input id = "username" required type="text">
    <br/>
    <input type="submit" class="button" value="Sign In">



<!--
    echo "<input type=\"button\" class=\"button\" name=", $file, "\" Value= \"Add to Cart\" onclick=\"addToCart(this.name)\"/>";
    echo "<br />";


-->
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

      </div>
      <div>        
        <p id="page"></p> 
      </div>
    </form>

  </body>
</html>
