<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';

    $sql="SELECT * FROM position order by pos_shortcut";
    $result = $conn->query($sql);
    $toJSON = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $guid = $row["pos_guid"];
        $shortcut = $row["pos_shortcut"];
        $desc = $row["pos_desc"];
        $toJSON [] = ["pos_guid"=>$guid,"pos_shortcut"=>$shortcut,"pos_desc"=>$desc];
        }
    } else {
        $toJSON = null;
    }
    echo json_encode($toJSON);
    $conn->close();
?>