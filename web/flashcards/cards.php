<?php
    session_start();
    require "dbconnect.php";
    $db = get_db();

?>

<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8"/>
     <title>Week 03</title>
     <script type="text/javascript" src="script.js"></script>
     <script> 
     
        function flipcard(card_id)
        {
           // card.parentElement.;
           document.getElementById(card_id).style.visibility = "visible";
        } 
        
     
     </script> 
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
    $user_id = $_session["user_id"];

//    echo ($user_id);
    $statement = $db->prepare("SELECT id, cardtext_front, cardtext_back FROM cardset WHERE user_id = 1 ");
    $statement->execute();
    // Go through each result
    $count_id = 1;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $card_number = $row['id'];
        $cardtext_front = $row['cardtext_front'];
        $cardtext_back = $row['cardtext_back'];
        

        echo ("<div id='$card_number'> 
                <span>$cardtext_front</span>
                <span hidden id='$count_id>$cardtext_back </span>
                <button type='button' onclick='flipcard(this)'>Flip Card!</button> ");
    }

?>

      </div>
      <div>        
        <p id="page"></p> 
      </div>
    </form>

  </body>
</html>


<!--

   <body>
    <form name="Browse" action = "" id = "week03" method="POST" onsubmit="return validateForm()">
    <h1>Browse Items</h1>

<?php
/*
    $path = "../images/week03";

    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            // do something with the file
            echo "<img src=\"", $path , "\\", $file, "\"> ";
            echo "<p>", $file , "</p>" ;

            echo "<input type=\"button\" class=\"button\" name=", $file, "\" Value= \"Add to Cart\" onclick=\"addToCart(this.name)\"/>";
            echo "<br />";


        }
        closedir($handle);
    }
    $_session["cart"][] = "russia (1).jpg";
    echo $_SESSION["cart"]
    */
?>



      <br/>
      <a href="..\index.html">HOME</a>
      <br/>
      <a href="cart.php">Cart</a>
      </form>
   </body>
</html>
