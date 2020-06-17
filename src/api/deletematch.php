<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guid = $conn->real_escape_string($_POST["guid"]);

    $sql="DELETE FROM matches WHERE match_guid='$guid'";

    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>