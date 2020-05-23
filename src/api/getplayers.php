<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $teamguid = '';

    if(isset($_GET['teamguid']))
        $teamguid = $_GET['teamguid'];

    if(empty($teamguid))
        $sql="SELECT * FROM player ORDER BY plyr_lastname";
    else
        $sql = "Select * from player inner JOIN
        player_to_team on player.plyr_guid = player_to_team.plyrtoteam_plyr_guid
        where player_to_team.plyrtoteam_team_guid = '". $conn->real_escape_string($teamguid). "'
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
        $toJSON [] = ["plyr_guid"=>$guid,"plyr_firstname"=>$firstname,"plyr_lastname"=>$lastname,"plyr_trikotnr"=>$trikotnr,
        "plyr_birthdate"=>$birthdate];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>