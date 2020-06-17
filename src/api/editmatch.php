<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    
    $guid = $conn->real_escape_string($_POST["guid"]);
    $datetime = $conn->real_escape_string($_POST["datetime"]);
    $opponent = $conn->real_escape_string($_POST["opponent"]);
    $home_away = $conn->real_escape_string($_POST["home_away"]);
    $team_score = $conn->real_escape_string($_POST["team_score"]);
    $opponent_score = $conn->real_escape_string($_POST["opponent_score"]);
    
    //if variables are empty, insert null
    $team_score = !empty(trim($team_score)) ? $team_score : 'null';
    $opponent_score = !empty(trim($opponent_score)) ? $opponent_score : 'null';
    
    $sql="UPDATE matches SET match_datetime = '$datetime', match_team_opponent = '$opponent', match_home_away = '$home_away', match_team_score = $team_score, match_opponent_score = $opponent_score WHERE match_guid='$guid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../matches.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>