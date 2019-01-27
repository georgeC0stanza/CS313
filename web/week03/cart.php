<?php
    session_start();
    
?>

<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8"/>
     <title>Week 03</title>
     <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="css.css">
   </head>
   <body>
    <form name="Cart" action = "" id = "week03" method="POST" onsubmit="return validateForm()">
    <h1>Cart</h1>

<?php
    $path = "../images/week03";

    if(!isset($_SESSION['cart'])){
        foreach ($_SESSION["cart"] as $element) {


            // do something with the file
            echo "<img src=\"", $path , "\\", $element, "\"> ";
            echo "<p>", $element , "</p>" ;

            echo "<input type=\"button\" class=\"button\" name=", $element, "\" Value= \"Remove from Cart\" onclick=\"removeFromCart(this.name)\"/>";

            echo "<br />";

        }
    }
        echo $_SESSION["cart"];


?>


      <a href="checkout.php">Checkout</a>

      <br/>
      <a href="browse.php">Browse Items</a>

      </form>
   </body>
</html>
