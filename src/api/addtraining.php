<?php

  // Define variables and initialize with empty values
  $datetime = $desc = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $datetime = $_POST["datetime"];
      $desc = $_POST["desc"];
      $teamguid = $_POST["teamguid"];
    
      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $desc = !empty($desc) ? "'". $conn->real_escape_string($desc)."'" : 'null';

      /* Build the query escaping the values */
      $query = "INSERT INTO trainings VALUES (uuid(), '" . $conn->real_escape_string($datetime) . "', " . $desc . ",'" . $conn->real_escape_string($teamguid) . "')";

      /* Execute the SQL query */
      if ($conn->query($query))
      {
        // Redirect user to players.php page
        header("location: ../trainings.php");
      } else {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . $conn->error;
      }

      $conn->close();

  }

?>