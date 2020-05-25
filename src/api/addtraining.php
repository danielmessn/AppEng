<?php

  // Define variables and initialize with empty values
  $datetime = $desc = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $datetime = $conn->real_escape_string($_POST["datetime"]);
      $desc = $conn->real_escape_string($_POST["desc"]);
      $teamguid = $conn->real_escape_string($_POST["teamguid"]);

      $desc = !empty(trim($desc)) ? "'".$desc."'" : 'null';

      /* Build the query escaping the values */
      $query = "INSERT INTO trainings VALUES (uuid(), '$datetime', $desc,'$teamguid')";

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