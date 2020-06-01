<?php

  // Define variables and initialize with empty values
  $datetime = $desc = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $desc = $conn->real_escape_string($_POST["desc"]);

      $guidnewteam = GUID(); 
      $teaminserted = false;

      /* Build the query escaping the values */
      $query = "INSERT INTO team VALUES ('$guidnewteam', '$desc')";

      /* Execute the SQL query */
      if ($conn->query($query))
      {
        $teaminserted = true;
      } else {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . $conn->error;
        $conn->close();
        die();
      }

      if ($teaminserted)
      {
        $query = "UPDATE settings SET set_team_guid = '" . $conn->real_escape_string($guidnewteam) . "'";

        if ($conn->query($query))
        {
          // Redirect user to settings.php page
          header("location: ../settings.php");
        } else {
          /* if mysqli_query() returns FALSE it means an error occurred */
          echo 'Query error: ' . $conn->error;
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