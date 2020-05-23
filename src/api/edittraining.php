<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guid = $conn->real_escape_string($_POST["guid"]);
    $datetime = $conn->real_escape_string($_POST["datetime"]);
    $desc = $conn->real_escape_string($_POST["desc"]);
    
    //if variables are empty, insert null
    $desc = !empty(trim($desc)) ? "'".$desc."'" : 'null';
    
    $sql="UPDATE trainings SET train_datetime = '$datetime', train_desc = $desc WHERE train_guid='$guid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../trainings.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>