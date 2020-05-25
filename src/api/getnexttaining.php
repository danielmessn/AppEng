<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $teamguid = '';

    if(isset($_GET['teamguid']))
        $teamguid = $_GET['teamguid'];

    if(empty($teamguid))
        $sql="SELECT * FROM trainings ORDER BY train_datetime limit 1";
    else
        $sql = "SELECT * FROM trainings WHERE train_team_guid = '" . $conn->real_escape_string($teamguid) . "' limit 1";

    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $guid = $row["train_guid"];
        $datetime = $row["train_datetime"];
        $desc = $row["train_desc"];
        $teamguid = $row["train_team_guid"];
        $toJSON [] = ["train_guid"=>$guid,"train_datetime"=>$datetime,"train_desc"=>$desc,"train_team_guid"=>$teamguid];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>