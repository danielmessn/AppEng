<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    print_r($_POST);
    $guid = $_POST["guid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $trikotnr= $_POST["trikotnr"];
    $birthdate = $_POST["birthdate"];

    //todo birthdate, if empty string null or empty?
    $sql="UPDATE player SET plyr_firstname = '$firstname', plyr_lastname = '$lastname', plyr_trikotnr = '$trikotnr', plyr_birthdate = null WHERE plyr_guid='$guid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../players.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>