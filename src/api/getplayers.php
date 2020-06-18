<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $teamguid = '';

    if(isset($_GET['teamguid']))
        $teamguid = $_GET['teamguid'];

    /*if(empty($teamguid))
        $sql="SELECT * FROM player ORDER BY plyr_lastname";
    else
        $sql = "Select * from player 
        where player.plyr_team_guid = '". $conn->real_escape_string($teamguid). "'
        order by player.plyr_lastname";

    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $guid = $row["plyr_guid"];
        $firstname = $row["plyr_firstname"];
        $lastname = $row["plyr_lastname"];
        $trikotnr = $row["plyr_trikotnr"];
        $birthdate = $row["plyr_birthdate"];
        $posguid = $row["plyr_pos_guid"];    
        $toJSON [] = ["plyr_guid"=>$guid,"plyr_firstname"=>$firstname,"plyr_lastname"=>$lastname,"plyr_trikotnr"=>$trikotnr,
        "plyr_birthdate"=>$birthdate, "plyr_pos_guid"=>$posguid];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();*/

    if(empty($teamguid))
        $sql="SELECT player.*, position.pos_shortcut
        FROM player LEFT JOIN position ON player.plyr_pos_guid = position.pos_guid
        ORDER BY plyr_lastname";
    else
        $sql = "SELECT player.*, position.pos_shortcut
        FROM player LEFT JOIN position ON player.plyr_pos_guid = position.pos_guid
        where player.plyr_team_guid = '". $conn->real_escape_string($teamguid). "'
        order by player.plyr_lastname";

    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $guid = $row["plyr_guid"];
        $firstname = $row["plyr_firstname"];
        $lastname = $row["plyr_lastname"];
        $trikotnr = $row["plyr_trikotnr"];
        $birthdate = $row["plyr_birthdate"];
        $pos_shortcut = $row["pos_shortcut"];
        $toJSON [] = ["plyr_guid"=>$guid,"plyr_firstname"=>$firstname,"plyr_lastname"=>$lastname,"plyr_trikotnr"=>$trikotnr,
        "plyr_birthdate"=>$birthdate, "pos_shortcut"=>$pos_shortcut];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>