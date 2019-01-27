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

    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            // do something with the file
            echo "<img src=\"", $path , "\\", $file, "\"> ";
            echo "<p>", $file , "</p>" ;

            echo "<input type=\"button\" class=\"button\" name=", $file, "\" Value= \"Remove from Cart\" onclick=\"removeFromCart(this.name)\"/>";

            echo "<br />";

        }
        closedir($handle);
    }


?>



      <br/>
      <a href="..\hello.php">HOME</a>
      <br/>
      <a href="browse.php">Browse Items</a>

      </form>
   </body>
</html>
