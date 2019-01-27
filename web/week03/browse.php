<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8"/>
     <title>Week 03</title>
   </head>
   <body>
      <h1>Browse Items</h1>


<?php

    $path = "../images/week03";

    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            // do something with the file
            echo "<img src=\"", $path , "\\", $file, "\"> ";
            echo "<p>", $file , "</p>" ;

            echo "<input type=\"button\" class=\"button\" Value= \"Add to Cart\" onclick=\"addToCart()\"/>";



        }
        closedir($handle);
    }


?>



      <br/>
      <a href="hello.php">HOME</a>
      <br/>
      <a href="week03\browse.php">Browse Items</a>
   </body>
</html>
