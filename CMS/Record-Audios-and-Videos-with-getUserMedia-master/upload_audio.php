<?php

    include "connect.php";

    // Add a row to the database
    $type = audio;

    $sql = "INSERT INTO files (type) VALUES('$type')";
    $result = $conn->query($sql);
    
    // Name the mp3 with the id of the row we just added, instead of audio.mp3
    $id = $conn->insert_id;

    // upload the blob to the server in the sounds folder
   $blob = fopen('php://input', rb);
    if ($file = fopen('sounds/'.$id.'.mp3', 'wb')) {
        while (!feof($blob)) {
            fwrite($file, fread($blob, 4096));
        }
    }

    $conn->close();

?>