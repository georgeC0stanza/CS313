<?php
    session_start();
    
    require('dbconnect.php');
    $db = get_db();

    
    $user_username = htmlspecialchars($_POST["username"]);
    $user_password = htmlspecialchars($_POST["password"]);
    $user_password2 = htmlspecialchars($_POST["password2"]);

    if ($user_password == $user_password2)
    {
        $query = "SELECT id, FROM person WHERE username = '$user_username'";
        $statement = $db->prepare($query);
        $statement->execute();
        $id = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($id > 0)
        {

            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
            $query = "INSERT INTO person (username, passwrd) VALUES ('$user_username', '$hashed_password')";
            $statement = $db->prepare($query);
            $statement->execute();
        }
        else 
        {

        }
    }
    else
    {

    }
?>
 