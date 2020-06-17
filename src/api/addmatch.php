<?php

  // Define variables and initialize with empty values
  $datetime = $desc = "";

  //handling data from form
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      require_once($_SERVER['DOCUMENT_ROOT'].'/db/config.php');

      $datetime = $conn->real_escape_string($_POST["datetime"]);
      $opponent = $conn->real_escape_string($_POST["opponent"]);
      $teamguid = $conn->real_escape_string($_POST["teamguid"]);
      $home_away = $conn->real_escape_string($_POST["home_away"]);
      $team_score = $conn->real_escape_string($_POST["team_score"]);
      $opponent_score = $conn->real_escape_string($_POST["opponent_score"]);

      //if variables are empty, insert null
      $team_score = !empty(trim($team_score)) ? $team_score : 'null';
      $opponent_score = !empty(trim($opponent_score)) ? $opponent_score : 'null';

      /* Build the query escaping the values */
      $query = "INSERT INTO matches (match_guid, match_datetime, match_team_guid, match_team_opponent, match_home_away, match_team_score, match_opponent_score)  VALUES (uuid(), '$datetime','$teamguid', '$opponent', '$home_away', $team_score, $opponent_score)";

      /* Execute the SQL query */
      if ($conn->query($query))
      {
        // Redirect user to matches.php page
        header("location: ../matches.php");
      } else {
        /* if mysqli_query() returns FALSE it means an error occurred */
        echo 'Query error: ' . $conn->error;
      }

      $conn->close();

  }

?>