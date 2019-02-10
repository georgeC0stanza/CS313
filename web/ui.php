<?php
require "dbconnect.php";
$db = get_db();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lookie Here</title>
   <!-- <script type="text/javascript" src="213.05.PonderProblem.js"></script> -->
    <link rel="stylesheet" type="text/css" href="css.css">
  
  </head>
  
<body>
    <header>
        <div class="header">
          <h1>What Do We Have Stored in the Data Store?</h1>
          <div class="headerSmall">
          </div>
        </div> 
    </header>
    <br/>


    <form name="registration" action = "" id = "week11" method="GET" onsubmit="return validateForm()">
      <div class="whole">
          <h1> Piano Registration</h1>
          <hr/>

      <div class="section">

<?php
    $statement = $db->prepare("SELECT username, passwrd FROM person");
    $statement->execute();
    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $username = $row['username'];
        $passwrd = $row['passwrd'];
 
        echo "<p>  $username's password is $passwrd! <p>";
    }

    $statement = $db->prepare("SELECT user_id, cardtext_front, cardtext_back FROM cardset");
    $statement->execute();
    // Go through each result
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        // The variable "row" now holds the complete record for that
        // row, and we can access the different values based on their
        // name
        $cardtext_front = $row['cardtext_front'];
        $cardtext_back = $row['cardtext_back'];
 
        echo "<p>  $cardtext_front : $cardtext_back! <p>";
    }
?>









        <p>Performance Type:</p>
        <select required class="input" id="performance_type" onchange="performanceCheck(this.value)">
          <option name="solo" value="solo" id="solo">solo</option>
          <option name="duet" value="duet" id="duet">duet</option>
          <option name="concerto" value="concerto" id="concerto">concerto</option>
        </select>
        <br/>

        <p>First Name:</p>
        <input name = "name_first" id = "name_first" required type="text">
        <br/>

        <p>Last Name:</p>
        <input name = "name_last" id = "name_last" required type="text">
        <br/>
      
        <p>Student ID:</p>
        <input name="StudentID" id = "StudentID" required type="text" />
        <br>

        <span id="secondStudent"></span> 
        <br>

        <p>Skill Level:</p>
        <select name="skill" class="input" id="skill">
          <option name="beginner" value="beginner" id="beginner">beginner</option>
          <option name="intermediate" value="intermediate" id="intermediate">intermediate</option>
          <option name="pre-advanced" value="pre-advanced" id="pre-advanced">pre-advanced</option>
          <option name="advanced" value="advanced" id="advanced">advanced</option>
        </select>

        <p>Instrument:</p>
        <select name="instrument" class="input" id="instrument">
          <option name="piano" value="piano" id="piano">piano</option>
          <option  value="voice" id="voice">voice</option>
          <option  value="string" id="string">string</option>
          <option  value="organ" id="organ">organ</option>
          <option  value="other" id="other">other</option>
        </select>

        <p>Location:</p>
        <input name = "location" required type="text">

        <p>Room Number:</p>
        <input name = "rmNumber" required type="text">

        <p>Time Slot:</p>
        <input name = "time" required type="text">
        <br/>
        <br/>

        <input type="button" class="button" Value= "Submit" onclick="studentSubmit()"/>
        <input type="reset" class="button" Value= "Clear Form"/>

      </div>
      <div>        
        <p id="page"></p> 
      </div>
    </form>

  </body>
</html>
