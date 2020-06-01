<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $sql="SELECT * FROM team ORDER BY team_name";
    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $guid = $row["team_guid"];
        $name = $row["team_name"];
        $toJSON [] = ["team_guid"=>$guid,"team_name"=>$name];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>