<?php

  // Define variables and initialize with empty values
  $firstname = $lastname = $trikotnr = $birthdate = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $firstname = $conn->real_escape_string($_POST["firstname"]);
      $lastname = $conn->real_escape_string($_POST["lastname"]);
      $trikotnr = $conn->real_escape_string($_POST['trikotnr']);
      $birthdate = $conn->real_escape_string($_POST['birthdate']);
      $teamguid = $conn->real_escape_string($_POST["teamguid"]);

      $trikotnr =  !empty(trim($trikotnr)) ? "'".$trikotnr."'" : 'null';
      $birthdate = !empty(trim($birthdate)) ? "'".$birthdate."'" : 'null';

      $guidnewplayer = GUID(); 
      $playerinserted = false;

      /* Build the query escaping the values */
      $query = "INSERT INTO player (plyr_guid, plyr_firstname, plyr_lastname, plyr_trikotnr, plyr_birthdate, plyr_team_guid) VALUES 
      ('$guidnewplayer', '$firstname', '$lastname'
      , $trikotnr, $birthdate, '$teamguid')";

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

  function GUID()
  {
      if (function_exists('com_create_guid') === true)
      {
          return trim(com_create_guid(), '{}');
      }

      return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
  }

?>