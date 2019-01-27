<?php
    session_start();


    $_session["cart"][] = array_diff($_session["cart"] $_POST["item"]);


?>
