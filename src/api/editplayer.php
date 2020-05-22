<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    print_r($_POST);
    $guid = $conn->real_escape_string($_POST["guid"]);
    $firstname = $conn->real_escape_string($_POST["firstname"]);
    $lastname = $conn->real_escape_string($_POST["lastname"]);
    $trikotnr= $conn->real_escape_string($_POST["trikotnr"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $posguid = $conn->real_escape_string($_POST["position"]);

    //if variables are empty, insert null
    $trikotnr = !empty(trim($trikotnr)) ? "'".$trikotnr."'" : 'null';
    $birthdate = !empty(trim($birthdate)) ? "'".$birthdate."'" : 'null';
    $posguid = !empty(trim($posguid)) ? "'".$posguid."'" : 'null';

    $sql="UPDATE player SET plyr_firstname = '$firstname', plyr_lastname = '$lastname', plyr_trikotnr = $trikotnr, plyr_birthdate = $birthdate, plyr_pos_guid = $posguid WHERE plyr_guid='$guid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../players.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>