<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guidTraining = $_GET['guidTraining'];
    $sql="SELECT * FROM trainings WHERE train_guid='". $conn->real_escape_string($guidTraining). "'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $guid = $row["train_guid"];
            $datetime = $row["train_datetime"];
            $desc = $row["train_desc"];
        }
    }
    header("Location: ../edittraining.php?guid=".$guid."&datetime=".$datetime."&desc=".$desc); 
    $conn->close();
?>