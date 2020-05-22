<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $idPlayer = $_GET['idPlayer'];
    $sql="SELECT * FROM player WHERE plyr_guid='". $conn->real_escape_string($idPlayer). "'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $guid = $row["plyr_guid"];
            $firstname = $row["plyr_firstname"];
            $lastname = $row["plyr_lastname"];
            $trikotnr= $row["plyr_trikotnr"];
            $birthdate = $row["plyr_birthdate"];
            $posguid = $row["plyr_pos_guid"];             
        }
    }
    header("Location: ../editplayer.php?guid=".$guid."&firstname=".$firstname."&lastname=".$lastname."&trikotnr=".$trikotnr."&birthdate=".$birthdate."&selectPosition=".$posguid); 
    $conn->close();
?>