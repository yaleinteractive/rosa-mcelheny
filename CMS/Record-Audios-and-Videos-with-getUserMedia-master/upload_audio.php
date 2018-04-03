<?php

    include "connect.php";

    // TODO: Add a row to the database
    // TODO: Name the mp3 with the id of the row we just added, instead of audio.mp3

    $blob = fopen('php://input', rb);
    if ($file = fopen('sounds/1.mp3', 'wb')) {
        while (!feof($blob)) {
            fwrite($file, fread($blob, 4096));
        }
    }
    
    $conn->close();

?>