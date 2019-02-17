<?php
    session_start();
    
    require_once('dbconnect.php');
    $db = get_db();

    $username = $_POST["username"];
    
    $query = "SELECT id FROM person WHERE username = '$username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $_session["user_id"] = $statement->fetchAll(PDO::FETCH_ASSOC);
    
?>
