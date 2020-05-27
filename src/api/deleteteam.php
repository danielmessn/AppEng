<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/db/config.php';
    $guid = $conn->real_escape_string($_POST["guid"]);

    $sql="DELETE FROM team WHERE team_guid='$guid'";

    $teamdeleted = false;

    if ($conn->query($sql) === TRUE) {
        $teamdeleted = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        die();
    }

    if($teamdeleted)
    {
        //change team in settings to another team

        $sql="UPDATE settings SET set_team_guid = (Select team_guid from team limit 1)";

        if ($conn->query($sql) === TRUE) {
            echo true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>