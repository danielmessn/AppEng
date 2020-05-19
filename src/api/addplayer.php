<?php

  // Define variables and initialize with empty values
  $firstname = $lastname = $trikotnr = $birthdate = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $trikotnr = trim($_POST['trikotnr']);
      $birthdate = trim($_POST['birthdate']);

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $trikotnr = !empty($trikotnr) ? "'". $conn->real_escape_string($trikotnr)."'" : 'null';
      $birthdate = !empty($birthdate) ? "'".  $conn->real_escape_string($birthdate)."'" : 'null';

      /* Build the query escaping the values */
      $query = "INSERT INTO player (plyr_guid, plyr_firstname, plyr_lastname, plyr_trikotnr, plyr_birthdate) VALUES 
      (uuid(), '" . $conn->real_escape_string($firstname) . "', '" . $conn->real_escape_string($lastname) . "'
      , " . $trikotnr . ", " . $birthdate . ")";

      /* Execute the SQL query */
      if ($conn->query($query))
      {
        // Redirect user to players.php page
        header("location: ../players.php");
      } else {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . $conn->error;
      }

      $conn->close();

  }

?>