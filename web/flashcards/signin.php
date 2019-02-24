<?php
    session_start();
    
    require_once('dbconnect.php');
    $db = get_db();

    $user_username = htmlspecialchars($_POST["username"]);
    $user_password = htmlspecialchars($_POST["password"]);

    //
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    $query = "UPDATE person SET passwrd = ' $hashed_password ' WHERE username = '$user_username'";
    $statement = $db->prepare($query);
    $statement->execute();
   //

    $query = "SELECT id, passwrd FROM person WHERE username = '$user_username'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);


    $id;
    $db_password;

    foreach ($user as $user_element) {
        $id = $user_element['id'];
        $db_password = $user_element['passwrd'];
    }

    if(password_verify($user_password, $db_password)) {
        
        $_session["user_id"] = $id;

    } 
    else
    {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'INVALID CREDENTIALS', 'code' => 1337)));
    }

?>
