<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $sql="SELECT * FROM settings";
    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $teamguid = $row["set_team_guid"];
        $toJSON [] = ["set_team_guid"=>$teamguid];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>