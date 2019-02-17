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
     <script>
         function addNewCard(){
            new_front = document.getElementById("new_front").innertext;
            new_back = document.getElementById("new_back").innertext;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState>3 && xhttp.status==200) { 
                    alert("card added!");
                }
                if (xhttp.status >= 300) { 
                    alert("error adding card!");
                }
            };
            xhttp.open("POST",  "addcard.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("new_front=" + new_front + "&new_back=" + new_back);
            return false;
         }
     </script>
     <script> 
     
        function flipcard(card_id)
        {
           document.getElementById(card_id).style.visibility = "visible";
        } 
        
     
     </script> 
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


    <form name="users" action = "" id = "usersname" method="POST" onsubmit="return addNewCard()">
      <div class="whole">
          <h1> What would You like To study Today?</h1>
          <hr/>

      <div class="section">

<?php
    $user_id = $_session["user_id"];
    $user_id = 1 ;

//    echo ($user_id);
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
                <span>$cardtext_front</span>
                <span hidden id='$count_id'>$cardtext_back </span>
                <button type='button' onclick='flipcard(this)'>Flip Card!</button> 
                </div>");
    }

?>
        <p>Add a New Card:</p>
        <textarea id="new_front" required placeholder="Front of Card"></textarea>
        <textarea id="new_back" required placeholder="Back of Card"></textarea>
        <br/>
        <input type="submit" class="button" value="Submit">
        <br/>
      </div>

    </form>

  </body>
</html>


