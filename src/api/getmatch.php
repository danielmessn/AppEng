<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guidMatch = $_GET['guidMatch'];
    $sql="SELECT * FROM matches WHERE match_guid='". $conn->real_escape_string($guidMatch). "'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $guid = $row["match_guid"];
            $datetime = $row["match_datetime"];
            $opponent = $row["match_team_opponent"];
            $home_away = $row["match_home_away"];
            $team_score = $row["match_team_score"];
            $opponent_score = $row["match_opponent_score"];
        }
    }
    header("Location: ../editmatch.php?guid=".$guid."&datetime=".$datetime."&opponent=".$opponent."&home_away=".$home_away."&team_score=".$team_score."&opponent_score=".$opponent_score); 
    $conn->close();
?>