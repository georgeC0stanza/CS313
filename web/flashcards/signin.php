<?php
    session_start();
    
    require_once('dbconnect.php');
    $db = get_db();

$query = "SELECT id FROM person WHERE username = '$_POST['username']'";
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($users as $user) {
        $_session["user_id"] = $user;
    }

?>
