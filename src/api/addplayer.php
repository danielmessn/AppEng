<?php

  // Define variables and initialize with empty values
  $firstname = $lastname = $trikotnr = $birthdate = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $trikotnr = trim($_POST['trikotnr']);
      $birthdate = trim($_POST['birthdate']);
      $teamguid = $_POST["teamguid"];

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $trikotnr = !empty($trikotnr) ? "'". $conn->real_escape_string($trikotnr)."'" : 'null';
      $birthdate = !empty($birthdate) ? "'".  $conn->real_escape_string($birthdate)."'" : 'null';

      $guidnewplayer = GUID(); 
      $playerinserted = false;

      /* Build the query escaping the values */
      $query = "INSERT INTO player (plyr_guid, plyr_firstname, plyr_lastname, plyr_trikotnr, plyr_birthdate) VALUES 
      ('$guidnewplayer', '" . $conn->real_escape_string($firstname) . "', '" . $conn->real_escape_string($lastname) . "'
      , " . $trikotnr . ", " . $birthdate . ")";

      /* Execute the SQL query */
      if ($conn->query($query))
      {
        // Redirect user to players.php page
        $playerinserted = true;
        header("location: ../players.php");
      } else {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . $conn->error;
        $conn->close();
        die();
      }

      if ($playerinserted)
      {
        $query = "INSERT INTO player_to_team VALUES 
        (uuid(), '$guidnewplayer', '" . $conn->real_escape_string($teamguid) . "')";

        if ($conn->query($query))
        {
          // Redirect user to players.php page
          header("location: ../players.php");
        } else {
          /* if mysqli_query() returns FALSE it means an error occurred */
          echo 'Query error: ' . $conn->error;
          $conn->close();
          die();
        }

        $conn->close();
      }

  }

  function GUID()
  {
      if (function_exists('com_create_guid') === true)
      {
          return trim(com_create_guid(), '{}');
      }

      return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
  }

?>