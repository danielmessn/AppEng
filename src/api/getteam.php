<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guidTeam = $_GET['guidTeam'];
    $sql="SELECT * FROM team WHERE team_guid='". $conn->real_escape_string($guidTeam). "'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $guid = $row["team_guid"];
            $desc = $row["team_name"];
            $sea_guid = $row["team_sea_guid"];
        }
    }
    header("Location: ../editteam.php?guid=".$guid."&desc=".$desc."&seaGuid=".$sea_guid); 
    $conn->close();
?>