<?php
    session_start();
    
    require_once('dbconnect.php');
    $db = get_db();

    $new_front = htmlspecialchars($_POST["new_front"]);
    $new_back = htmlspecialchars($_POST["new_back"]);
    $user_id = $_SESSION["user_id"];

    $query = "INSERT INTO cardset (user_id, cardtext_front, cardtext_back) VALUES ('$user_id', '$new_front', '$new_back')";

    $statement = $db->prepare($query);
//    $statement->bindValue(':user_id', $user_id, PDO::PARAM_STR);
//    $statement->bindValue(':new_front', $new_front, PDO::PARAM_STR);
//    $statement->bindValue(':new_back', $new_back, PDO::PARAM_INT);
    $statement->execute();

?>
