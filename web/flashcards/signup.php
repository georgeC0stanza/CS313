<?php
    session_start();
    
    require('dbconnect.php');
    $db = get_db();

    
    $user_username = htmlspecialchars($_POST["username"]);
    $user_password = htmlspecialchars($_POST["password"]);
    $user_password2 = htmlspecialchars($_POST["password2"]);

    if ($user_password == $user_password2)
    {
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
        $query = "INSERT INTO person (username, passwrd) VALUES ('$user_username', '$hashed_password')";
        $statement = $db->prepare($query);
        $statement->execute();
    }
    else
    {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'INVALID CREDENTIALS', 'code' => 1337)));
    }
?>
 