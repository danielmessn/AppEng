<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guid = $_POST["guid"];

    $sql="DELETE FROM player WHERE plyr_guid='$guid'";

    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>