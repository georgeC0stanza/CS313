<?php
require "dbconnect.php";
$db = get_db();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lookie Here</title>
   <!-- <script type="text/javascript" src="213.05.PonderProblem.js"></script> -->
    <link rel="stylesheet" type="text/css" href="css.css">
  
  </head>
  
<body>
    <header>
        <div class="header">
          <h1>What Do We Have Stored in the Data Store?</h1>
          <div class="headerSmall">
          </div>
        </div> 
    </header>
    <br/>


    <form name="users" action = "" id = "usersname" method="POST" onsubmit="return validateForm()">
      <div class="whole">
          <h1> What would You like Today?</h1>
          <hr/>

      <div class="section">

<?php
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
?>

      </div>
      <div>        
        <p id="page"></p> 
      </div>
    </form>

  </body>
</html>
