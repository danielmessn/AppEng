<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guid = $conn->real_escape_string($_POST["guid"]);
    $desc = $conn->real_escape_string($_POST["desc"]);
    
    $sql="UPDATE team SET team_name = '$desc' WHERE team_guid='$guid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../settings.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>