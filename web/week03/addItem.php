<?php
    session_start();
    

    $_session["cart"][] = $_POST["item"];
    $_session["cart"][] = "russia (1).jpg";

?>
