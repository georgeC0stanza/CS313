<?php
    session_start();
    echo session_id();

    $_session["cart"][] = $_POST["item"];


?>
