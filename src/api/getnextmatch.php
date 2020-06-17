<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $teamguid = '';

    if(isset($_GET['teamguid']))
        $teamguid = $_GET['teamguid'];

    if(empty($teamguid))
        $sql="SELECT * FROM matches WHERE match_datetime >= CURDATE() ORDER BY match_datetime limit 1";
    else
        $sql = "SELECT * FROM matches WHERE match_datetime >= CURDATE() AND match_team_guid = '" . $conn->real_escape_string($teamguid) . "' ORDER BY match_datetime limit 1";


    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $guid = $row["match_guid"];
            $datetime = $row["match_datetime"];
            $teamguid = $row["match_team_guid"];
            $opponent = $row["match_team_opponent"];
            $home = $row["match_home_away"];
            $team_score = $row["match_team_score"];
            $opponent_score = $row["match_opponent_score"];
            $toJSON [] = ["match_guid"=>$guid,"match_datetime"=>$datetime,"match_team_guid"=>$teamguid,"match_team_opponent"=>$opponent, "match_home_away"=>$home, "match_team_score"=>$team_score, "match_opponent_score"=>$opponent_score];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>