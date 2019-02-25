<?php
    session_start();
    require "dbconnect.php";
    $db = get_db();
?>

<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8"/>
     <title>Week 03</title>
     <script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" type="text/css" href="css.css">
   </head>

    <body>
    <header>
        <div class="header">
          <h1>Study Time!</h1>
          <div class="headerSmall">
          </div>
        </div> 
    </header>
    <br/>


    <form name="users" action = "cards.php" id = "usersname" method="POST" onsubmit="return addNewCard()">
      <div class="whole">
          <h1> What would You like To study Today?</h1>
          <hr/>

<?php
    $user_id = $_SESSION["user_id"];

    $statement = $db->prepare("SELECT id, cardtext_front, cardtext_back FROM cardset WHERE user_id = '$user_id' ");
    $statement->execute();
    // Go through each result
    $count_id = 1;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $card_number = $row['id'];
        $cardtext_front = $row['cardtext_front'];
        $cardtext_back = $row['cardtext_back'];
        

        echo ("<div id='$card_number'> 
                --------------------------------------------------------------------------------------------
                <span>$cardtext_front</span> || 
                <span hidden id='card_id_$count_id'>$cardtext_back </span>
                --------------------------------------------------------------------------------------------
                <button type='button' onclick='flipcard(\"card_id_$count_id\")'>Flip Card!</button> 
                </div>");
                $count_id ++;
    }

?>
        <hr/>
        <h3>Add a New Card:</h3>
        <textarea id="new_front" required placeholder="Front of Card"></textarea>
        <textarea id="new_back" required placeholder="Back of Card"></textarea>
        <br/>
        <input type="submit" class="button" value="Submit">
        <br/>
      </div>

    </form>

  </body>
</html>


